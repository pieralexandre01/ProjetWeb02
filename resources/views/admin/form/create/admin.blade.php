<x-admin.layout>
    {{-- <x-slot name="titre"></x-slot> --}}
    <form action="{{ route('admin-update') }}" method="post">
        @csrf
        <input type="hidden" name="privilege_type" value="admin">
        <input type="text" name="first_name">
        <input type="text" name="last_name">
        <input type="email" name="email">
        <input type="password" name="password" >
        <input type="password" name="password_confirm">
        <input type="submit">
    </form>

    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

</x-admin.layout>
