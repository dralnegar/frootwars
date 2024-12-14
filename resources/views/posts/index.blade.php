@props(['posts', 'categories'])
<x-layout>   
    <x-slot name="content">
    
        @include ('posts._header')

        <style>
        .post_image {
            padding: 5px;
            border-radius: 10px;
            background-image: -webkit-linear-gradient(top, #1b9fbe, #118eb1);
        }

        .post_image img {

            width: 100%;
            border-radius: 10px;
        }

        article:hover {
            cursor: pointer;
        }
        </style>

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            @if ($posts->count()) 
                {{ $posts->links() }}
                <x-posts-grid :posts="$posts"/>
                {{ $posts->links() }}
            @else
                <p class="text-center">No posts yet. Please check back later.</p>
            @endif
        </main>
       
    </x-slot>
</x-layout>
