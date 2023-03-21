{{-- Ce dashboard est celui du "client" --}}

<x-public.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">public/dashboard</x-slot>

    <x-public.header :page="$page" />

    <main>
        <p>Dashboard</p>
    </main>

    <x-public.footer />

</x-public.layout>
