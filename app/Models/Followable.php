<?php


namespace App\Models;


trait Followable
{


    public function follow(User $user)
    {
        //allow to follow someone

        return $this->follows()->save($user);

    }


    public function unFollow(User $user){

        return $this->follows()->detach($user);

    }

    public function follows()
    {

        return $this->belongsToMany(User::class,
            'follows',
            'user_id',
            'following_user_id');
    }

    public function isFollowing(User $user)
    {

        return $this->follows()->where('following_user_id', $user->id)->exists();

    }
}
