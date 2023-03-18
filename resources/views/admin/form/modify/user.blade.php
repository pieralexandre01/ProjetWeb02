<x-admin.layout>
    {{-- <x-slot name="titre"></x-slot> --}}
<<<<<<< HEAD
=======
    <form action="{{ route('user-update', ['id' => $user->id]) }}" method="post">
        @csrf
        <input type="hidden" name="privilege_type" value="public">
        <input type="text" name="first_name" value="{{ $user->first_name }}">
        <input type="text" name="last_name" value="{{ $user->last_name }}">
        <input type="email" name="email" value="{{ $user->email }}">
        <input type="password" name="password" >
        <input type="password" name="password_confirm">
        <input type="submit">
    </form>
>>>>>>> PaDev

    <x-admin.header />

    <main>

        <form action="{{ route('user-update') }}" method="post">
            @csrf
            <input type="hidden" name="privilege_type" value="public">
            <input type="text" name="first_name" placeholder="{{ $user->first_name }}">
            <input type="text" name="last_name" placeholder="{{ $user->last_name }}">
            <input type="email" name="email" placeholder="{{ $user->email }}">
            <input type="password" name="password" >
            <input type="password" name="password_confirm">
            <input type="submit">
        </form>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

    </main>

    <x-admin.footer />

</x-admin.layout>
