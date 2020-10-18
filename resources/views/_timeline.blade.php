
<div class="lg:flex-1 lg:mx-10" style="max-width: 700px">


    @forelse($tweets as $tweet)
        @include('_tweet')
    @empty
        <p class="p-5">No tweets yet</p>
    @endforelse


</div>
