@props(['name', 'type' => 'text', 'label' => '', 'value' => '', 'class' => 'border border-gray-200 p-2 w-full rounded', 'rows' => '', 'placeholder' => '', 'required' => false])
<x-form.field>
    @if ($label !== '')    
        <x-form.label name="{{ $name }}" label="{{ $label }}" />
    @endif
    <textarea 
        class="{{ $class }}" 
        id="{{ $name }}"
        name="{{ $name }}" 
    @if ($placeholder !== '')    
        placeholder="{{ $placeholder }}"
    @endif;
    @if ($rows !== '')    
        rows="{{ $rows }}"
    @endif;
    @if ($required == true)    
        required
    @endif;
    >{{ $value }}</textarea>
    <x-form.error name="{{ $name }}" />
</x-form.field>
