<x-public.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">public/about</x-slot>

    <x-public.header :page="$page" />

    <main></main>

    <x-public.footer />

</x-public.layout>
