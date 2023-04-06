@props(['field'])

@error($field)
    <p class="error mb-0">{{ $message }}</p>
@enderror
