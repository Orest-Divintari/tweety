<x-app>
    <header class="mb-6">
        <div class="relative">
            <img class="mb-2" src="{{asset('/images/default-profile-banner.jpg')}}" alt="">
            <img style="left:50%" width="150"
                class="rounded-full absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
                src="{{$user->getAvatar()}}" alt="">
        </div>
        <div class="flex justify-between items-center">
            <div class="break-all" style="max-width:35%">
                <h2 class="font-bold text-2xl">{{$user->name}}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>
            <div class="flex">
                @can('update', $user)
                <a href="{{route('edit-profile', $user)}}"
                    class="mr-2 bg-white rounded-full border border-gray-300 py-2 px-2 text-black text-xs">Edit
                    Profile</a>
                @endcan
                <x-follow-button :user="$user">
                </x-follow-button>
            </div>
        </div>
        <p class="text-sm mt-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est culpa voluptas dolore
            sint
            necessitatibus beatae
            fuga ad quo nesciunt tempora! Minima reiciendis voluptatibus numquam obcaecati. Itaque placeat fuga ipsa
            praesentium.</p>


    </header>


    @include('timeline')
</x-app>