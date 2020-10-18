<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tweets(){
        return $this->hasMany(Tweet::class);
    }


    public function timeline(){
        //include all the follow tweets
        //order by date


        // retrive ids
        $ids = $this->follows()->pluck('id');

        $ids->push($this->id);



        return Tweet::whereIn('user_id',$ids)->latest()->get() ;
    }

    public function getAvatarAttribute($value){
        return Storage::disk(config('filesystems.default'))->url($value);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }


    public function setPasswordAttribute($value){
        $this->attributes['password'] = Hash::make($value);
    }


    public function path($append = ""){


        $path= route('profile',$this->username);

        return $append ? "{$path}/{$append}" : $path;
    }
}
