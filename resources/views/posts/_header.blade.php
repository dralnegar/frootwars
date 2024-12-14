<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-2xl">
        <span class="text-blue-500">Latest Liberators Gaming Club News</span>
    </h1>


    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
        <!--  Category -->
        <div class="relative lg:inline-flex rounded-xl">
            <select id="category_field" name="category" placeholder="Select Category" class="border border-gray-200 p-2 w-full rounded">
                <option value="all" {{ request('category') == 'all' ? 'selected' : '' }}>All Categories</option>
                @foreach ($categories as $key => $category)
                    <option value="{{ $key }}" {{ request('category') == $key ? 'selected' : '' }}>{{ ucwords($category) }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="relative lg:inline-flex rounded-xl">
            <input type="text" 
                    id="search_field"
                    name="search" 
                    placeholder="Find something"
                    class="border border-gray-200 p-2 w-full rounded"
                    value="{{ request('search') }}"
                >
        </div>

        <div class="relative lg:inline-flex rounded-xl">
            <button class="button">
                Search
            </button>
        </div>

        
        <form method="GET" action="/posts">
            <input type="hidden" id="category" name="category" value="{{ request('category') }}"/>
            <input type="hidden" id="search" name="search" value="{{ request('search') }}"/>
        </form>

        
        
                     
    </div>
</header>