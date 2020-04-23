@if($tweets->count() > 0)
<div class="border rounded-lg border-gray-300">
    @forelse($tweets as $tweet)
    @include('tweet')
    @empty
    <p class="p-4">You don't have friends, how do you expect to have tweets on your timeline</p>
    @endforelse

    {{ $tweets->links()}}
</div>
@endif