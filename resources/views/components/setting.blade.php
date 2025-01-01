@props(['heading'])
<section name="content" class="px-6 max-w-4xl mx-auto" >
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{ $heading }}
    </h1>
    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <h4 class="font-semibold mb4">Links</h4>
            <ul>
                <li> 
                    <a href="/admin/dashboard" class="{{ request()->routeIS('admin.dashboard') ? 'text-blue-500' : '' }}">Dashboard</a>
                </li>
                <li>
                    <a href="/admin/posts" class="{{ request()->routeIS('post.index') ? 'text-blue-500' : '' }}">All Posts</a>
                </li>
                <li>
                    <a href="/admin/posts/create" class="{{ request()->routeIS('post.create') ? 'text-blue-500' : '' }}">Create Post</a>
                </li>
                <li>
                    <a href="/admin/categories" class="{{ request()->routeIS('categories.index') ? 'text-blue-500' : '' }}">All Categories</a>
                </li>
                <li>
                    <a href="/admin/categories/create" class="{{ request()->routeIS('categories.create') ? 'text-blue-500' : '' }}">Create Categories</a>
                </li>
                
                <li>
                    <a href="#" id="logout-link">Log Out</a>
                </li>
            </ul>
        </aside>
        <main class="flex-1">
            <x-panel>
            {{ $slot }}
            </x-panel>
        </main>
    </div>
    <script>
        document.getElementById('logout-link').addEventListener("click", function() {
            document.getElementById('logout-form').submit();
            return false;
        });
    </script>
        
</section>    