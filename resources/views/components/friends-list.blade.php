<div class="bg-gray-200 border border-gray-300 rounded-lg py-4 px-6">
    @if(auth()->check())
    <h3 class="font-bold text-xl mb-4">Following</h3>
    <ul>
        @forelse(auth()->user()->follows as $following)
        <li class="mb-4">
            <a class="flex items-center text-sm" href="{{route('profile', $following)}}">
                <img src="{{ $following->getAvatar() }}" width="40" class="mr-2 rounded-full" alt="">
                {{ $following->name }}
            </a>
        </li>
        @empty
        <p class="font-bold text-xs">You are alone in this world</p>
        @endforelse

    </ul>
    @endif
</div>