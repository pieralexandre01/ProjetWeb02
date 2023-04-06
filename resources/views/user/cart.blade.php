<x-public.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">public/dashboard</x-slot>

    <x-public.header :page="$page" />

    <main>
        <div class="page_title">
            <h1 class="text-end">Cart</h1>

            <div class="title_decoration">
                <div class="circle"></div>
            </div>
        </div>

        <div class="container mt-5 pt-3">

            <x-msg-session key="package-cart-delete" class-name="success text-start" />

            @if (!empty($cart))
                <hr class="pb-3">

                @foreach ($cart as $counter => $package)
                    <div class="d-flex justify-content-between py-3">

                        <div class="d-lg-flex w-100">

                            <p class="package_title">{{ $package['title'] }}</p>
                            <p class="package_price">$ {{ $package['price'] }}</p>
                            <p>{{ $package['quantity'] }} x</p>

                        </div>

                        <div>
                            @if (now() < $package['start_date'])
                                <a href="{{ route('cart-package-delete', $counter) }}">delete</a>
                            @endif
                        </div>

                    </div>
                    <hr class="pb-3">
                @endforeach

                <div class="d-flex flex-column align-items-end mt-5 pt-3">
                    <p class="subtotal"> subtotal : <span>{{ $total_price }}</span> $</p>
                    <div id="paypal-button-container"></div>
                </div>
            @else
                <h2 class="mb-4">Empty cart</h2>
                <a class="general_button me-2 d-inline-block w-auto mb-4" href="{{ route('packages') }}">check out our
                    packages</a>
                <a class="general_button" href="{{ route('activities') }}">check out our activities</a>

            @endif

        </div>
    </main>

    <x-public.footer />

    <x-slot name="scripts">
        <script>
            const cart = {!! json_encode($cart) !!}
            const price = {{ $total_price }}
        </script>
        <script
            src="https://www.paypal.com/sdk/js?client-id=AYVxBcqWnIGx-aTKA4Y0o_UcwXsNCKuNvf1U6hvk5Er3ZN8KUky8MHs9eJ1gmHNoZgjB6tez_s_ib_-W&currency=CAD">
        </script>
        {{-- <script src="{{ asset('js/cart.js') }}" type="module"></script>s --}}
    </x-slot>


</x-public.layout>
