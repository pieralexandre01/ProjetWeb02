<x-public.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">public/dashboard</x-slot>

    <style>
        :root {
            --color: var(--dark-turquoise);
            --color-hover: var(--vivid-turquoise);
        }

        .user_icon:hover,
        .user_icon:focus {
            background-image: url("../../media/icons/user_icon_turquoise.svg") !important;
        }

        .user_icon_connected {
            background-image: url("../../media/icons/user_icon_turquoise_connected.svg") !important;
        }

        .user_icon_connected:hover,
        .user_icon_connected:focus {
            background-image: url("../../media/icons/user_icon_turquoise_connected_hover.svg") !important;
        }
    </style>

    <x-public.header :page="$page" />

    <main>
        <h1>Cart</h1>

        @if (!empty($cart))

            @foreach ($cart as $counter => $package)
                {{ $package['title'] }}
                {{ $package['price'] }}
                {{ $package['quantity'] }}

                <a href="{{ route('cart-package-delete', $counter) }}">delete</a>
                <br>
            @endforeach

            {{ $total_price }}
            <div id="paypal-button-container"></div>
        @else
            <p>Empty cart</p>
            <p>boutons</p>
        @endif

    </main>

    <x-public.footer />

    <script>
        const cart = {!! json_encode($cart) !!}
        const price = {{ $total_price }}
    </script>
    <script
        src="https://www.paypal.com/sdk/js?client-id=Ab1B6QPVTldsAdp5TMypbJ33_GcAhBwCMN3ky3hZKiv6m9MUZ7D3A0c2XydAQTfKtZRsavmoPEMbugO6&currency=CAD">
    </script>
    <script src="{{ asset('js/cart.js') }}" type="module"></script>

</x-public.layout>
