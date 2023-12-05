@auth
<x-panel class="bg-gray-100">
    <form method="POST" action="/posts/{{ $post->slug }}/comments/">
        @csrf
        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="Avatar" width="40" height="40" class="rounded-full"> 
            <h2 class="ml-4">Want to participate?</h2>
        </header>
        <x-form.textarea name="body" label="" placeholder="Quick think of something to say!" class="w-full text-sm focus:outline-none focus:ring border border-gray-200 p-6 rounded-xl" rows="10"/>
        <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
            <x-form.button>Post</x-form.button>
        </div>
    </form>
</x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Register</a> or 
        <a href="/login" class="hover:underline">Login</a> 
        to leave a comment.
    </p>
@endauth