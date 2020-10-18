<div class="border border-blue-400 rounded-lg px-8 py-5 mb-8">
    <form action="/tweets" method="POST">
     @csrf

                <textarea name="body" class="w-full h-full "
                          placeholder="Whats'up doc?"
                            required
                >

                </textarea>

        <hr class="my-2 mb-2">
        <footer class="flex justify-between ">
            <div class="flex items-center text-sm mb-2">
                <img src="https://api.adorable.io/avatars/40/abott@adorable.png" alt=""
                     class="rounded-full mr-4 "
                >
                {{auth()->user()->name}}
            </div>

            <button type="submit" class="bg-blue-500 rounded-lg p-1 text-white font-bold py-2 my-2  ">Tweet-a-root</button>
        </footer>

        @error('body')
        <p class="text-red-500 font-bold text-sm">{{ $message }}</p>
        @enderror



    </form>



</div>
