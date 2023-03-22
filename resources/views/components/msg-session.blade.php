@props(['key', 'className'])

@if (session($key))
    <p class="{{ $className }} mb-0 text-center">{{ session($key) }}</p>
@endif

{{-- Exemple d'utilisation : --}}
{{-- <x-msg-session key="key-name" class_name="success" /> --}}
{{-- <x-msg-session key="key-name" class_name="error" /> --}}
