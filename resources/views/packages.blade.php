<x-public.layout>
    {{-- <x-slot name="title"></x-slot> --}}

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
        .dropdown_connected:hover,
        .logo:hover {
            color: var(--vivid-pink) !important;
        }

        li.user_name,
        li.user_name:hover {
            cursor: default !important;
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

    <main>

        @foreach ($packages as $package)
            <h2>{{ $package->title }}</h2>
            <form action="{{ route('package-addtocart', $package->id) }}" method="post">
                @csrf
                <input type="hidden" name="package_id" value="{{ $package->id }}">
                <select name="package_quantity">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <input type="submit" value="add to cart">
            </form>
        @endforeach

    </main>

    <x-public.footer />

</x-public.layout>
