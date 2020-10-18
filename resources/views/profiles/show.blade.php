@extends('layouts.app')

@section('content')

   <header class="mb-6 relative">
       <img class="rounded mb-2 align-content-center" src="">


       <hr>
       <div class="flex justify-between items-center">
           <div>
               <h2 class="font-bold mb-0">{{$user->name}}</h2>
               <p class="">Joined {{$user->created_at->diffForHumans()}}</p>
           </div>
           <div class="flex">


               @can('update',$user)
               <a href="{{$user->path("edit")}}" class="rounded-full shadow text-sm  rounded-lg p-1 text-black  py-2 my-2">Edit Profile</a>

               @endcan

               @unless(auth()->user()->is($user))
               <form method="POST" action="/profile/{{$user->username}}/follow">
                   @csrf
                   <button
                       type="submit"
                       class="bg-blue-500 rounded-full p-1 text-white font-bold py-2 my-2">

                   {{auth()->user()->isFollowing($user) ? 'Unfollow me' : 'Follow me'}}

                   </button>
               </form>
               @endunless

           </div>
       </div>

       <img style="width: 150px; left: calc(50% - 75px); top: 47% " src="{{$user->avatar}}" alt="{{$user->avatar}}"
            class="rounded-full mr-4 absolute"
       >


   </header>






    @include('_timeline',[
    'tweets' => $user->tweets
])

@endsection
