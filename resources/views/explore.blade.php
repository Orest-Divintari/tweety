<x-app>
    <div class="">

        @foreach($users as $user)
        <a class="flex items-center mb-4" href=" {{$user->profile()}}">
            <img class="mr-4 rounded-full" src="{{$user->getAvatar()}}" width="60" alt="">


            <div>
                <h4 class="font-bold">{{ '@' . $user->username }}</h4>
            </div>
        </a>
        @endforeach
        {{ $users->links() }}
    </div>

</x-app>