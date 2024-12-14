    <x-form.input 
        name="title" 
        label='Title' 
        placeholder='Enter Post Title' 
        required=true 
        value="{{ old('title', $post->title) }}" 
    />
    
    <x-form.input 
        name="slug" 
        label='Slug' 
        placeholder='Enter Post Slug' 
        required=true 
        value="{{ old('slug', $post->slug) }}"
    />
    
    
    <div class="flex-1 mt-6 w-full">
        <div class="flex">
            <x-form.input name="thumbnail" label='Thumbnail' placeholder='Select Post Thumbnail' type="file" value="{{ old('thumbnail', $post->thumbnail) }}"/>
        </div>
        @if ($post->thumbnail != '') 
            <img src="{{ asset('storage/'. $post->thumbnail) }}" alt="{{ $post->title }}" class="rounded-xl ml-6" width="100">
        @endif
    </div>
    
    <x-form.textarea name="excerpt" label='Excerpt' placeholder='Enter Post Exceprt' required=true value="{!! old('excerpt', strip_tags($post->excerpt)) !!}"/>
    
    <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_API_KEY') }}/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#body',
            plugins: ['powerpaste', 'advcode', 'table', 'lists', 'checklist'],
            toolbar: 'formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | table | link image | bullist numlist | removeformat | src',
            menubar: false
        });
    </script>
    
    <x-form.textarea 
        name="body" 
        label='Body' 
        placeholder='Enter Post Body' 
        required=true 
        value="{!! old('body', $post->body) !!}"
    />
    
    <x-form.select 
        name="category_id" 
        label='Category' 
        placeholder='Select Post Category' 
        required=true 
        :options="$categories" 
        value="{{ old('category', $post->category_id) }}"
    /> 
    
    @php
    $statuses = [
        'Draft' => 'Draft',
        'Live'  => 'Live'
    ];
    @endphp
    <x-form.select 
        name="status" 
        label="Status" 
        placeholder="Select Post Status" 
        required=true 
        :options="$statuses" 
        value="{{ old('status', $post->status) }}"
    />