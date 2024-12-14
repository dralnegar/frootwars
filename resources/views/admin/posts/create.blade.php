@props(['categories'])
<x-layout>
    <x-slot name="content">
        <x-setting heading="Publish New Post">
            <form method="POST" action="/admin/posts/create" enctype="multipart/form-data">
                @csrf
                @include('admin.posts.form')
                <x-form.submit>Publish</x-formsubmit>
            </form>
        </x-setting>
    </x-slot>
</x-layout>
