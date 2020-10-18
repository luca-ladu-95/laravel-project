<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{

    public function index()
    {
        //Load all the tweet written by the logged user
        $tweets = auth()->user()->timeline();

        return view('tweets.index',[
            'tweets'=>$tweets
        ]);
    }

    public function store()
    {

        $attributes = request()->validate(['body' => 'required|max:255']);
        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body']
        ]);


        return redirect('/tweets');

    }


}
