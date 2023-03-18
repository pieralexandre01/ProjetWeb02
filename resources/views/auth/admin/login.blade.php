<x-admin.layout>
    {{-- <x-slot name="titre"></x-slot> --}}

    <x-admin.header />

    <main>

        <form action="{{ route('login') }}" method="post">
            @csrf
            <input name="email" type="text">
            <input name="password" type="password">
            <input type="submit">
        </form>

    </main>

    <x-admin.footer />

</x-admin.layout>
