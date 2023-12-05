<nav class="md:flex md:justify-between md:items-center">
    <div>
        <a href="/">
            <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
        </a>
    </div>

    <div class="mt-8 md:mt-0 flex items-center">
        @auth
            <x-dropdown>
                <x-slot name="trigger">
                    <button class="text-xs font-bold uppercase">Welcome {{ auth()->user()->name }}</button>
                </x-slot>
                <x-dropdown-item href="/admin/dashboard" :active="request()->routeIS('admin.dashboard')">Dashboard</x-dropdown-item>
                <x-dropdown-item href="/admin/posts/create" :active="request()->routeIS('post.create')">New Post</x-dropdown-item>
                <x-dropdown-item href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">Log Out</x-dropdown-item>
            </x-dropdown>
            <form id="logout-form" method="POST" action="/logout" class="hidden">
                @csrf
            </form>
        @else
            <a href="/register" class="text-xs font-bold uppercase hover:text-blue-500">Register</a>
            <a href="/login" class="ml-6 text-xs font-bold uppercase hover:text-blue-500" >Log In</a>
        @endguest

        <a href="#newsletter"
            class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
            Subscribe for Updates
        </a>
    </div>
</nav>