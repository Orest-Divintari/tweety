<x-app>
    <form action="{{$user->profile()}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">Username</label>
            <input value="{{$user->username}}" class="border border-gray-400 p-2 w-full" type="text" id="username"
                name="username" required>
            @error('username')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="avatar">Avatar</label>
            <div class="flex justify-between items-center">
                <input class="border border-gray-400 p-2 w-full" type="file" id="avatar" name="avatar">
                <img class="ml-3" src="{{$user->getAvatar()}}" width="40" height="40" alt="">
            </div>
            @error('avatar')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror

        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">Name</label>
            <input value="{{$user->name}}" class="border border-gray-400 p-2 w-full" type="text" id="name" name="name"
                required>
            @error('name')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">Email</label>
            <input value="{{$user->email}}" class="border border-gray-400 p-2 w-full" type="email" id="email"
                name="email" required>
            @error('email')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">Password</label>
            <input class="border border-gray-400 p-2 w-full" type="password" id="password" name="password" required>
            @error('password')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password_confirmation">Password
                Confirmation</label>
            <input class="border border-gray-400 p-2 w-full" type="password" id="password_confirmation"
                name="password_confirmation" required>
            @error('password_confirmation')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>

        <div>
            <button type="submit">Save</button>
        </div>
    </form>
</x-app>