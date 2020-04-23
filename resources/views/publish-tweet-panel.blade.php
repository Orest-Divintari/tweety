<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form action="/tweets" method="POST">
        @csrf
        <textarea class="w-full resize-none" name="body" placeholder="What's up doc"></textarea>

        <hr class="my-4">
        <footer class="flex justify-between items-center">
            <img width="50" src="{{ auth()->user()->getAvatar() }}" class="mr-2 rounded-full" alt="">
            <button class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white">Twee-a-roo</button>
        </footer>


    </form>
    @error('body')
    <div class="text-red-500 text-sm mt-3">{{ $message }}</div>
    @enderror
</div>