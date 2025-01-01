@props(['category'])
<x-layout>
    <x-slot name="content">
        <x-setting :heading="'Edit Category: ' . $category->name">
            <form method="POST" action="/admin/categories/edit/{{ $category->id }}" enctype="multipart/form-data">
                @csrf
                @include('admin.categories.form')
                <x-form.submit>Save</x-formsubmit>
            </form>
        </x-setting>
    </x-slot>
</x-layout>
