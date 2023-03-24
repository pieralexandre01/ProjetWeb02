<x-admin.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">forms</x-slot>

    <x-admin.header />

    <main>
        <form action="{{ route('account-create') }}" method="post">
            @csrf
            {{-- <input type="hidden" name="privilege_type" value="admin"> --}}
            <input type="text" name="first_name">
            <input type="text" name="last_name">
            <input type="email" name="email">
            <input type="password" name="password">
            <input type="password" name="password_confirm">
            <input type="submit">
        </form>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </main>

    <x-footer />

</x-admin.layout>
