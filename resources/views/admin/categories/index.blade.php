@props(['posts'])
<x-layout>
    <x-slot name="content">
        <x-setting heading="Manage Posts">
           <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-1 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <style>
                            .odd {
                                background-color: #f5f5f5;
                            }
                            .even {
                                background-color: #ffffff;
                            }
                            .item:hover {
                                background-color: #f0f0f0;
                            }
                            </style>
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Slug
                                    </th>
                                    
                                    @if (auth()->user()->access_level >= 2) 
                                        
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span> 
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Delete</span> 
                                        </th>
                                    @endif
                                </thead>  
                                <tbody>
                                    @php
                                    $oddoreven = 'odd';
                                    @endphp
                                    @foreach ($categories as $category) 
                                    <tr class="item {{ $oddoreven }}">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                   {{ $category->name }}</a>
                                                </div>  
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                   {{ $category->name }}</a>
                                                </div>  
                                            </div>
                                        </td>

                      
                                        @if (Auth::user()->access_level >= 2)
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-500 font-medium">
                                            <a href="/admin/categories/edit/{{ $category->id }}" class="text-blue-500 hover:text-blue-600 btn btn-primary">Edit</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-500 font-medium">
                                            <form method="POST" action="/admin/categories/delete/{{ $category->id }}">
                                                @csrf 
                                                <button class="text-xs text-gray-400 btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        @endif
                                    </tr>
                                    @php
                                    $oddoreven = ($oddoreven == 'odd' ? 'even' : 'odd');
                                    @endphp
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
