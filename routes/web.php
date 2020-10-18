<?php

use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware('auth')->group(function(){


        Route::get('/tweets', [\App\Http\Controllers\TweetController::class,'index'])->name('home');
        Route::post('/tweets',[\App\Http\Controllers\TweetController::class,'store'])->name('tweet_create');
        Route::post('/profile/{user:username}/follow',[\App\Http\Controllers\FollowsController::class,'store']);
    Route::get('profiles/{user:username}/edit',[\App\Http\Controllers\ProfilesController::class,'edit'])
        ->middleware('can:update,user');


    Route::patch('profiles/{user:username}',[\App\Http\Controllers\ProfilesController::class,'update'])
        ->middleware('can:update,user');

    Route::get('/explore',[\App\Http\Controllers\ExploreController::class,'index']);


});


Route::get('/profiles/{user:username}',[\App\Http\Controllers\ProfilesController::class,'show'])->name('profile');




