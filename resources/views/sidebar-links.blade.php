<ul class="text-lg font-bold">
    <li class="mb-4 block"><a href="{{route('home')}}">Home</a></li>
    <li class="mb-4 block"><a href="/explore">Explore</a></li>
    <li class="mb-4 block"><a href="">Notifications</a></li>
    <li class="mb-4 block"><a href="">Messages</a></li>
    <li class="mb-4 block"><a href="">Bookmarks</a></li>
    <li class="mb-4 block"><a href="">Lists</a></li>
    @if(auth()->check())
    <li class="mb-4 block"><a href="{{ route('profile', auth()->user()) }}">Profile</a></li>
    @endif
    <li class="mb-4 block"><a href="">More</a></li>
</ul>
<button class="bg-blue-400 rounded-full  px-6 text-xs text-white">Tweet-a-roo</button>