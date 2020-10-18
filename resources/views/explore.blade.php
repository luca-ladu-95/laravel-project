@extends('layouts.app')

@section('content')


    @foreach($users as $user)

        <ul>
            <li>


            <div class="flex items-center  lg:flex lg:justify-between text-sm mb-2 ">
                <a href="{{route('profile',$user)}}" class="flex items-center text-sm">
                    <img src="https://api.adorable.io/avatars/40/abott@adorable.png" alt=""
                         class="rounded-full mr-4 "
                    >
                    {{$user->name}}
                </a>

                <div class="items-center">


                @unless(auth()->user()->is($user))
                    <form method="POST" action="/profile/{{$user->username}}/follow">
                        @csrf
                        <button
                            type="submit"
                            class="bg-blue-500 rounded-full p-1 text-white font-bold py-2 mr-12">

                            {{auth()->user()->isFollowing($user) ? 'Unfollow me' : 'Follow me'}}

                        </button>
                    </form>
                @endunless
                </div>

            </div>
            </li>
        </ul>

    @endforeach

@endsection
