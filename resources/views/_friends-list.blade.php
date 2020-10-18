<div class="bg-gray-200 rounded-lg py-4 px-6">
    <h3 class="font-bold text-xl mb-2">Following</h3>
    <ul>

        @forelse(auth()->user()->follows as $user)
            <li>
                <div class="flex items-center text-sm mb-2">
                    <a href="{{route('profile',$user)}}" class="flex items-center text-sm">
                        <img src="https://api.adorable.io/avatars/40/abott@adorable.png" alt=""
                             class="rounded-full mr-4 "
                        >
                        {{$user->name}}
                    </a>
                </div>
            </li>
        @empty
            <p class="p-2">No friends yet</p>

        @endforelse
    </ul>
</div>

