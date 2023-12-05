@props(['categories'])
<x-layout>
    <x-slot name="content">
        <x-setting heading="Publish New Post">
            <form method="POST" action="/admin/posts" enctype="multipart/form-data">
                @csrf
                <x-form.input name="title" label='Title' placeholder='Enter Post Title' required=true value="{{ old('title') }}" />
                <x-form.input name="slug" label='Slug' placeholder='Enter Post Slug' required=true value="{{ old('slug') }}"/>
                <x-form.input name="thumbnail" label='Thumbnail' placeholder='Select Post Thumbnail' type="file" required=false value="{{ old('thumbnail') }}"/>
                <x-form.textarea name="excerpt" label='Excerpt' placeholder='Enter Post Exceprt' required=true value="{{ old('excerpt') }}"/>
                <x-form.textarea name="body" label='Body' placeholder='Enter Post Body' required=true value="{{ old('body') }}"/>
                <x-form.select name="category_id" label='Category' placeholder='Select Post Category' required=true :options="$categories" value="{{ old('category_id') }}"/>
                <x-form.submit>Publish</x-formsubmit>
            </form>
        </x-setting>
    </x-slot>
</x-layout>
