@can('follow', $user)
<form action="{{route('follow', $user->username)}}" method="POST">
    @csrf
    <button
        class="bg-blue-500 rounded-full shadow py-2 px-2 text-white text-xs">{{ current_user()->following($user) ? 'Unfollow' : 'Follow' }}
    </button>

</form>
@endcan