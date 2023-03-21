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
        <p>Cart</p>

        @foreach ($packages as $package)
            {{ $package['title'] }}
            {{ $package['price'] }}
            {{ $package['quantity'] }}
            <a href="">delete</a> {{-- Supprimer le forfait de la session --}}
            <br>
        @endforeach

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        {{-- <div id="paypal">
            <total-price-component v-bind:variable-vue="{{ json_encode($total_price) }}">
            </total-price-component>
        </div> --}}

        {{ $total_price }}

        {{-- <a href="{{ route('reservation-store') }}">buy</a> --}}
        {{-- <div id="paypal-button-container"></div> --}}

    </main>

    <x-public.footer />

    {{-- <script
        src="https://www.paypal.com/sdk/js?client-id=Ab1B6QPVTldsAdp5TMypbJ33_GcAhBwCMN3ky3hZKiv6m9MUZ7D3A0c2XydAQTfKtZRsavmoPEMbugO6&currency=CAD">
    </script>
    <script src="{{ asset('js/paypal.js') }}" type="module"></script> --}}

</x-public.layout>
