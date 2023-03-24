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
                <div class="row">
                    {{-- revoir les distances/largeurs --}}
                    <div class="col-7">
                        <h2>{{ $package->title }}</h2>
                        {{-- ajuster la ligne --}}
                        {{-- <div class="title_decoration">
                            <div class="circle"></div>
                        </div> --}}
                        <p>{{ $package->description }}</p>

                        {{-- AJOUTER LES AUTRES INFOS --}}

                        {{-- styliser les boutons --}}
                        <form action="{{ route('package-addtocart', $package->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="package_id" value="{{ $package->id }}">
                            <select name="package_quantity">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <input class="" type="submit" value="reserve">
                            {{-- class de Jackie : read_more_button --}}
                        </form>
                    </div>

                    <div class="col-7">
                        <img src="" alt="">
                    </div>
                </div>
            @endforeach
    </main>

    <x-public.footer />

</x-public.layout>
