<x-public.layout>
    <x-slot name="title"></x-slot>

    <style>
        a:hover,
        button:focus,
        .link:hover,
        .dropdown-item:hover,
        .dropdown_connected {
            color: var(--dark-pink) !important;
        }

        .user_name,
        .user_name:hover,
        .logo:hover {
            color: var(--vivid-pink) !important;
        }

        .user_icon:hover,
        .user_icon:focus {
            background-image: url("../../media/icons/user_icon_pink.svg") !important;
        }

        .user_icon_connected {
            background-image: url("../../media/icons/user_icon_pink_connected.svg") !important;
        }

        .user_icon_connected:hover,
        .user_icon_connected:focus {
            background-image: url("../../media/icons/user_icon_pink_connected_hover.svg") !important;
        }

        .menu_bar:hover,
        .menu_bar:focus,
        .menu_bar:active {
            background-color: var(--dark-pink) !important;
        }
    </style>

    <x-public.header />

    <main></main>

    <x-public.footer />

</x-public.layout>
