@props(['posts'])
<x-layout>
    <x-slot name="content">
        <x-setting heading="Manage Posts">
           <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-1 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Title
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Thumbnail
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Excerpt
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span> 
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Delete</span> 
                                    </th>
                                </thead>  
                                <tbody>
                                    @foreach ($posts as $post) 
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
                                                </div>  
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    @if ($post->thumbnail != '') 
                                                        <img src="{{ asset('storage/'. $post->thumbnail) }}" alt="{{ $post->title }}" class="rounded-xl ml-6" width="100">
                                                    @endif
                                                </div>  
                                            </div>
                                        </td>

                                        
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $post->status }}
                                                </div>  
                                            </div>
                                        </td>

                         
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold-full bg-green-100 text-green-800">
                                                Active
                                            </span>
                                        </td>
                        
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-500 font-medium">
                                            <a href="/admin/posts/edit/{{ $post->id }}" class="text-blue-500 hover:text-blue-600">Edit</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-500 font-medium">
                                            <form method="POST" action="/admin/posts/{{ $post->id }}">
                                                @csrf 
                                                @method('DELETE')
                                                <button class="text-xs text-gray-400">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>    
                    </div>    
                </div>
           </div>
        </x-setting>
    </x-slot>
</x-layout>
