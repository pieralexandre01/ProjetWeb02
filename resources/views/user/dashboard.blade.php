{{-- Ce dashboard est celui du "client" --}}

<x-public.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">public/dashboard</x-slot>

    <x-public.header :page="$page" />

    <main>
        <p>Dashboard</p>

        @isset($reservations)

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

        @endisset

        {{-- @if ($reservations == null)
            <p>boutons</p>
        @endif --}}



    </main>

    <x-public.footer />

</x-public.layout>
