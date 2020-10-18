<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function index(){

        $this->authorize('update',auth()->user());

        return view('explore',[
            'users'=> User::paginate(20),
        ]);
    }
}
