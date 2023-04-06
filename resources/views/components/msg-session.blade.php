@props(['key', 'className'])

@if (session($key))
    <p class="{{ $className }} mb-0">{{ session($key) }}</p>
@endif
