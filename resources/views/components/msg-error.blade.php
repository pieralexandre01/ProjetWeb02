@props(['field'])

@error($field)
    <p class="error">{{ $message }}</p>
@enderror

{{-- Exemple d'utilisation : --}}
{{-- <x-msg-error field="email" /> --}}
