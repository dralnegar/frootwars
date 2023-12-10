@props(['post', 'categories'])
<x-layout>
    <x-slot name="content">
        <x-setting :heading="'Edit Post: ' . $post->title">
            <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <x-form.input name="title" label='Title' placeholder='Enter Post Title' required=true value="{{ old('title', $post->title) }}" />
                <x-form.input name="slug" label='Slug' placeholder='Enter Post Slug' required=true value="{{ old('slug', $post->slug) }}"/>
                <div class="flex-1 mt-6 w-full">
                    <div class="flex">
                        <x-form.input name="thumbnail" label='Thumbnail' placeholder='Select Post Thumbnail' type="file" value="{{ old('thumbnail', $post->thumbnail) }}"/>
                    </div>
                    @if ($post->thumbnail != '') 
                        <img src="{{ asset('storage/'. $post->thumbnail) }}" alt="{{ $post->title }}" class="rounded-xl ml-6" width="100">
                    @endif
                </div>
                <x-form.textarea name="excerpt" label='Excerpt' placeholder='Enter Post Exceprt' required=true value="{{ old('excerpt', strip_tags($post->excerpt)) }}"/>
                <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
                <script>
                    tinymce.init({
                        selector: '#body',
                        plugins: ['powerpaste', 'advcode', 'table', 'lists', 'checklist'],
                        toolbar: 'formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | table | link image | bullist numlist | removeformat | src',
                        menubar: false
                    });
                </script>
                <x-form.textarea name="body" label='Body' placeholder='Enter Post Body' required=true value="{{ old('body', strip_tags($post->body)) }}"/>
                <x-form.select name="category_id" label='Category' placeholder='Select Post Category' required=true :options="$categories" value="{{ old('caegory', $post->category_id) }}"/>
                <x-form.submit>Save</x-formsubmit>
            </form>
        </x-setting>
    </x-slot>
</x-layout>
