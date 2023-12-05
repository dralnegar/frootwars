@props(['name', 'type' => 'text', 'label' => '', 'class' => 'border border-gray-200 p-2 w-full rounded',  'options', 'value' => '', 'placeholder' => '', 'required' => false])
<x-form.field>
    @if ($label !== '')    
        <x-form.label name="{{ $name }}" label="{{ $label }}" />
    @endif
    <select
        class="{{ $class }}" 
        type="{{ $type }}" 
        id="{{ $name }}"
        name="{{ $name }}" 
    @if ($required == true)    
        required
    @endif
    >
    @if ($placeholder !== '')    
        <option value=""
        @if ($value === '')    
            selected="selected"
        @endif    
        >{{ $placeholder }}</option>
    @endif
    @foreach ($options as $oKey => $oLabel)
        <option value="{{ $oKey }}"
        @if ($value == $oKey)    
            selected="selected"
        @endif    
        >{{ ucwords($oLabel) }}</option>
    @endforeach
    </select>
    <x-form.error name="{{ $name }}" />
</x-form.field>