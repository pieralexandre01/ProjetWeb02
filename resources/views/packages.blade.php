<x-public.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">public/packages</x-slot>

    <x-public.header :page="$page" />

    <main>
        {{-- comment arranger le footer qui embarque sur le contenu? --}}

        <div class="page_title pb-5">
            <h1 class="text-end">PACKAGES</h1>

            <div class="title_decoration">
                <div class="circle"></div>
            </div>
        </div>

        <div class="container">

            {{-- style à appliquer sur le premier forfait seulement --}}
            {{-- border_box = est-ce une classe créé par Jackie puisqu'elle s'adapte bien au rose? --}}
            <div class="border_box p-2">
            </div>

            @foreach ($packages as $package)
                <section class="row">
                    {{-- ajouter une classe dynamique pour inverser un sur deux --}}
                    {{-- revoir les distances/largeurs --}}
                    <div class="col-7">
                        <h2>{{ $package->title }}</h2>
                        {{-- ajuster la ligne --}}
                        {{-- <div class="title_decoration">
                            <div class="circle"></div>
                        </div> --}}
                        <p>{{ $package->description }}</p>

                        {{-- styliser les boutons --}}

                        <form action="{{ route('package-addtocart', $package->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="package_id" value="{{ $package->id }}">

                            <div class="d-flex align-items-center justify-content-between">

                                <div class="price">
                                    <p>$ {{ $package->price }}</p>
                                </div>

                                <div class="d-flex align-items-center">
                                    @if (now() < $package->end_date)
                                        <select name="package_quantity">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>

                                        <span class="ms-3"><input type="submit" value="reserve"></span>
                                    @else
                                        <p class="m-0">the festival is over</p>
                                        {{-- style différent pour ce bouton --}}
                                        <span class="ms-3"><input type="submit" disabled value="reserve"></span>
                                    @endif
                                </div>

                            </div>
                        </form>
                    </div>

                    <div class="col-4 ms-auto">
                        <img src=" {{ $package->image }}" alt=" {{ $package->title }} " class="img-fluid">
                    </div>

                </section>
            @endforeach

    </main>

    <x-public.footer />

</x-public.layout>
