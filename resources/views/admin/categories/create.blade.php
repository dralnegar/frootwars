@props(['categories'])
<x-layout>
    <x-slot name="content">
        <x-setting heading="Add New Categoy">
            <form method="POST" action="/admin/categories/create" enctype="multipart/form-data">
                @csrf
                @include('admin.categories.form')
                <x-form.submit>Save</x-formsubmit>
            </form>
        </x-setting>
    </x-slot>
</x-layout>
