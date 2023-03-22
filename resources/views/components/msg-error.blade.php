@props(['field'])

@error($field)
    <p class="">{{ $message }}</p>
@enderror

{{-- Exemple d'utilisation : --}}
{{-- <x-msg-error field="email" /> --}}
