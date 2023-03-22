@props(['key', 'class_name'])

@if (session($key))
    <p class="{{ $class_name }}">{{ session($key) }}</p>
@endif

{{-- Exemple d'utilisation : --}}
{{-- <x-msg-session key="key-name" class_name="success" /> --}}
{{-- <x-msg-session key="key-name" class_name="error" /> --}}
