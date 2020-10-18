<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{

    public function show(User $user){


        return view('profiles.show',compact('user'));
    }


    public function edit(User $user){

        $this->authorize('update',$user);




        return view('profiles.edit',[
         'user'=>$user
        ]);
    }


    public function update(User $user){
        $this->authorize('update',$user);

        $attributes= $this->validator($user);

        if(request('avatar')){
            $attributes['avatar']= request('avatar')->store('avatars');

        }


        $user->update($attributes);

        return redirect($user->path());

    }


    protected function validator(User $user)
    {


        return request()->validate( [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',Rule::unique('users')->ignore($user) ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar'=>['file'],
            'username'=>['string','required','max:255','alpha_dash',Rule::unique('users')->ignore($user)],
        ]);


    }
}
