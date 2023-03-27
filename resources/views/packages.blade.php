<x-public.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">public/packages</x-slot>

    <x-public.header :page="$page" />

    <main class="px-5">

        <div class="page_title">
            <h1 class="text-end">PACKAGES</h1>

            <div class="title_decoration">
                <div class="circle"></div>
            </div>
        </div>

        <div class="container">

            @foreach ($packages as $package)
                <section>

                    @if ($package->id == 1)
                        <h3 class="m-0 featured_package">featured package</h3>
                    @endif

                    <div
                        class="row align-items-center @if ($package->id % 2 == 1) flex-lg-row-reverse @endif @if ($package->id == 1) border_box p-5 @endif">

                        <div
                            class="col-12 col-lg-4 package_img @if ($package->id % 2 == 1) me-lg-auto @else ms-lg-auto @endif mb-5 mb-lg-0 p-0">
                            <img src=" {{ $package->image }}" alt=" {{ $package->title }} ">
                        </div>

                        <div class="col-12 col-lg-8 @if ($package->id % 2 == 1) pe-lg-5 @else ps-lg-5 @endif">

                            <h2 class="ps-4">{{ $package->title }}</h2>

                            <div class="title_decoration mb-5">
                                <div class="circle"></div>
                            </div>

                            <p class="description">{{ $package->description }}</p>

                            <div class="d-sm-flex align-items-center justify-content-between">
                                <div class="price">
                                    <p>*$ {{ $package->price }}</p>
                                </div>
                                <form action="{{ route('package-addtocart', $package->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="package_id" value="{{ $package->id }}">
                                    <div class="d-flex align-items-center">

                                        @if (now() < $package->end_date)
                                            <select name="package_quantity" class="rounded">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                            <span class="ms-3"><input type="submit" value="reserve"></span>
                                        @else
                                            <p class="m-0 festival_over">the festival is over</p>
                                            <span class="ms-3"><input class="disabled" type="submit" disabled
                                                    value="reserve"></span>
                                        @endif

                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </section>
            @endforeach

    </main>

    <div class="footer">
        <x-public.footer />
    </div>

</x-public.layout>
