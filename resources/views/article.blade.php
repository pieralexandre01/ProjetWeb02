<x-public.layout>
    {{-- <x-slot name="title"></x-slot> --}}

    <style>
        :root {
            --color: var(--dark-blue);
            --color-hover: var(--vivid-blue);
        }

        .user_icon:hover,
        .user_icon:focus {
            background-image: url("../../media/icons/user_icon_blue.svg") !important;
        }

        .user_icon_connected {
            background-image: url("../../media/icons/user_icon_blue_connected.svg") !important;
        }

        .user_icon_connected:hover,
        .user_icon_connected:focus {
            background-image: url("../../media/icons/user_icon_blue_connected_hover.svg") !important;
        }
    </style>

    <x-public.header />

    <main></main>

    <x-public.footer />

</x-public.layout>

