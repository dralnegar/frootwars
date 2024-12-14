@props(['post', 'categories'])
<x-layout>
    <x-slot name="content">
        <x-setting :heading="'Edit Post: ' . $post->title">
            <form method="POST" action="/admin/posts/edit/{{ $post->id }}" enctype="multipart/form-data">
                @csrf
                @include('admin.posts.form')
                <x-form.submit>Save</x-formsubmit>
            </form>
        </x-setting>
    </x-slot>
</x-layout>
