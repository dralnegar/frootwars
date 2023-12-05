@props([
    'name', 
    'type' => 'text', 
    'label' => '', 
    'class' => 'border border-gray-200 p-2 w-full rounded',  
    'value' => '', 
    'placeholder' => '', 
    'autocomplete' => '', 
    'required' => false
])
<x-form.field>
    @if ($label !== '')    
        <x-form.label name="{{ $name }}" label="{{ $label }}" />
    @endif
    <input 
        class="{{ $class }}" 
        type="{{ $type }}" 
        id="{{ $name }}"
        name="{{ $name }}" 
        value="{{ $value }}" 
    @if ($placeholder !== '')    
        placeholder="{{ $placeholder }}"
    @endif
    @if ($autocomplete !== '')    
        autocomplete="{{ $autocomplete }}"
    @endif
    @if ($required == true)    
        required
    @endif
    />
    <x-form.error name="{{ $name }}" />
</x-form.field>
