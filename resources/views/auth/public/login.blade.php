<x-public.layout>
    {{-- <x-slot name="titre"></x-slot> --}}

    <x-public.header />

    <main>

        <form action="{{ route('login') }}" method="post">
            @csrf
            <input name="email" type="text">
            <input name="password" type="password">
            <input type="submit">
        </form>

    </main>

    <x-public.footer />

</x-public.layout>
