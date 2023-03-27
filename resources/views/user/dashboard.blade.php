<x-public.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">public/dashboard</x-slot>

    <x-public.header :page="$page" />

    <main>
        <div class="page_title">
            <h1 class="text-end">Dashboard</h1>

            <div class="title_decoration">
                <div class="circle"></div>
            </div>
        </div>

        <div class="container mt-5 pt-3">
            <h2 class="user_name pb-5">Hello {{ Auth::user()->first_name }} !</h2>

            <x-msg-session key="reservation-success" class-name="success text-start" />
            <x-msg-session key="reservation-delete" class-name="success text-start" />

            <hr class="pb-3">
            @if (!$reservations->isEmpty())

                @foreach ($reservations as $reservation)
                    <div class="d-flex justify-content-between py-3">

                        <div class="d-lg-flex w-100">
                            <p class="package_title">{{ $reservation->package->title }}</p>
                            <p class="package_date">
                                {{ $reservation->package->formattedDate('start_date') . ' - ' . $reservation->package->formattedDate('start_date') }}
                            </p>
                            <p class="package_quantity">{{ $reservation->quantity }} x</p>
                        </div>

                        <div>
                            @if (now() < $reservation->package->start_date)
                                <a href="{{ route('reservation-delete', $reservation->id) }}">cancel</a>
                            @endif
                        </div>

                    </div>
                    <hr class="pb-3">
                @endforeach
            @else
                <p class="mb-4">You have not made any reservations.</p>
                <a class="general_button me-2 d-inline-block w-auto mb-4" href="{{ route('packages') }}">check out our
                    packages</a>
                <a class="general_button" href="{{ route('activities') }}">check out our activities</a>
            @endif

        </div>
    </main>

    <x-public.footer />

</x-public.layout>
