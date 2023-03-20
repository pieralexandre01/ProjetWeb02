{{-- Ce dashboard est celui du "client" --}}

<x-public.layout>
    {{-- <x-slot name="title"></x-slot> --}}

    <style>
        a:hover,
        button:focus,
        .link:hover,
        .dropdown-item:hover,
        .dropdown_connected {
            color: var(--dark-turquoise) !important;
        }

        .user_name,
        .user_name:hover,
        .dropdown_connected:hover,
        .logo:hover {
            color: var(--vivid-turquoise) !important;
        }

        li.user_name,
        li.user_name:hover {
            cursor: default !important;
        }

        .user_icon:hover,
        .user_icon:focus {
            background-image: url("../../media/icons/user_icon_turquoise.svg");
        }

        .user_icon_connected {
            background-image: url("../../media/icons/user_icon_turquoise_connected.svg");
        }

        .user_icon_connected:hover,
        .user_icon_connected:focus {
                background-image: url("../../media/icons/user_icon_turquoise_connected_hover.svg");
            }

        .menu_bar:hover,
        .menu_bar:focus,
        .menu_bar:active {
            background-color: var(--dark-turquoise) !important;
        }
    </style>

    <x-public.header />

    <main>
        <p>Dashboard</p>
    </main>

    <x-public.footer />

</x-public.layout>
