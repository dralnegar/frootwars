@props(['name'])
@if ($errors->has($name))
    @foreach ($errors->get($name) as $message)
        <p class="text-red-800 text-xs mt-2">{{ $message }}</p>
    @endforeach
@endif