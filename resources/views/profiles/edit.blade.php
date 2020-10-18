@extends('layouts.app')


@section('content')



    <form method="POST" action="{{ $user->path() }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-6">

            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="name">
                Name
            </label>

            <input class="border border-gray-400 p2 w-full"
            type="text"
            name="name"
            id="name"
                   value="{{$user->name}}"
            required>

            @error('name')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">

            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="username">
                Username
            </label>

            <input class="border border-gray-400 p2 w-full"
                   type="text"
                   name="username"
                   id="username"
                   value="{{$user->username}}"
                   required>

            @error('username')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-6">

            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="avatar">
               Avatar
            </label>

            <input class="border border-gray-400 p2 w-full"
                   type="file"
                   name="avatar"
                   id="avatar"

                   >

            @error('avatar')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-6">

            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="email">
                Email
            </label>

            <input class="border border-gray-400 p2 w-full"
                   type="text"
                   name="email"
                   id="email"
                   value="{{$user->email}}"
                   required>

            @error('email')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-6">

            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="password">
                Password
            </label>

            <input class="border border-gray-400 p2 w-full"
                   type="password"
                   name="password"
                   id="password"
                   required>

            @error('password')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">

            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="password_confirmation">
                Password Confirmation
            </label>

            <input class="border border-gray-400 p2 w-full"
                   type="password"
                   name="password_confirmation"
                   id="password_confirmation"
                   required>

            @error('password_confirmation')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">

            <button type="submit" class="bg-blue-500 rounded-lg p-1 text-white font-bold py-2 my-2  ">Submit</button>

        </div>






    </form>

@endsection
