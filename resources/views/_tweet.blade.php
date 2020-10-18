

    <div class="border border-gray-200 rounded-lg mb-2">

        <div class="flex p-3">
            <div class="mr-4 flex-shrink-0 ">

                <div class="flex items-center text-sm mb-2">
                    <a href="{{route('profile',$tweet->user)}}">
                        <img src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/74/74cb4322b0f6a05cf423020c45e05c69db2cc2a4.jpg" alt=""
                             class="rounded-full mr-4 "
                        >
                    </a>


                </div>

            </div>

            <div>

                <a href="{{route('profile',$tweet->user)}}">
                <h5 class="font-bold mb-4">{{$tweet->user->name}} </h5>
                </a>

                <p class="text-sm">
                    {{$tweet->body}}
                </p>

            </div>


        </div>


    </div>



