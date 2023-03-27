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

        <div class="container mt-5 pt-5">
            <h2 class="user_name pb-5 mb-5">Hello {{ Auth::user()->first_name }} !</h2>


            @if (!empty($reservations))
                @foreach ($reservations as $reservation)
                    {{ $reservation->package->title }}
                    {{ $reservation->package->price }}
                    {{ $reservation->quantity }}

                    {{-- à ajouter dans la zone admin pour l'annulation aussi --}}
                    @if (now() < $reservation->package->start_date)
                        <a href="{{ route('reservation-delete', $reservation->id) }}">cancel</a>
                    @endif

                    <br>
                @endforeach
            @else
                <p>You have not made any reservations.</p>
                <a class="general_button" href="">check out our packages</a>
                <a class="general_button" href="">check out our activities</a>
            @endif

        </div>
    </main>

    <x-public.footer />

</x-public.layout>
