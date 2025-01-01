<x-layout>
    <x-slot name="content">
        <x-setting heading="Dashboard">

            <div class="grid grid-cols-2 gap-4">
                <div class="bg-white p-7 rounded-lg shadow-lg">
                    <h2 class="text-lg font-bold mb-4">Users</h2>
                    <p class="text-3xl font-bold">{{ $userCount }}</p>
                </div>
                <div class="bg-white p-7 rounded-lg shadow-lg">
                    
                    <div class="w-1/3 float-left">
                        <h2 class="text-lg font-bold mb-4">Posts</h2>
                        <p class="text-3xl font-bold">{{ $postCount }}</p>
                    </div>
                    <div class="w-2/3 float-left text-center">
                        <a href="/admin/posts/create" class="text-blue-500">Create new post</a>
                        <br/>
                        <a href="/admin/posts" class="text-blue-500">View all posts</a>
                    </div>
                
                </div>
                <div class="bg-white p-7 rounded-lg shadow-lg">
                    <div class="w-1/3 float-left p-1">
                        <h2 class="text-lg font-bold mb-4">Categories</h2>
                        <p class="text-3xl font-bold">{{ $categoryCount }}</p>
                    </div>
                    <div class="w-2/3 float-left text-center">
                        <a href="/admin/categories/create" class="text-blue-500">Create new category</a>
                        <br/>
                        <a href="/admin/categories" class="text-blue-500">View all categories</a>
                    </div>
                    
                </div>
                <div class="bg-white p-7 rounded-lg shadow-lg">
                    <h2 class="text-lg font-bold mb-4">Tags</h2>
                    <p class="text-3xl font-bold">&nbsp;</p>
                </div>
                
            </div>

        </x-setting>
    </x-slot>
</x-layout>