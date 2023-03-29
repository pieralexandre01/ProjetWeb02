<x-public.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">public/homepage</x-slot>

    <x-public.header :page="$page" />

    <main>
        <section id="intro_header">
            <img src="{{ asset('/media/images/homepage_header.webp') }}" class="header_image" alt="Digital showroom">
            <div class="container">
                <p id="festival_date" class="text-center">8-9-10 september 2023</p>
                {{-- <div id="festival_logo" class="nav_logo">
                    <div class="logo d-flex flex-column text-center flex-nowrap flex-shrink-1">
                        <div class="title d-flex flex-column">
                            MIRROR WORLD
                            <div class="festival">festival</div>
                        </div>
                        <div class="title_reflection">MIRROR WORLD</div>
                    </div>
                </div> --}}
                <p id="festival_tagline" class="text-center">Immerse yourself in a world of limitless possibilities and visionary technologies shaping tomorrow</p>
            </div>

            <div id="interactive_text" class="d-flex flex-column">
                <span>Reflecting the Future</span>
                <span>Where <span>Reality</span></span>
                <span class="text-end">Meets <span>Innovation</span></span>
            </div>
        </section>


        <section id="scroll_down">
            <div class="container text-center">
                <p>SCROLL TO GET A GLIMPSE</p>
                <div>
                    <p>OF THE <span>FESTIVAL</span> OF THE</p>
                    <p>FUTURE</p>
                </div>
            </div>
        </section>

        <section id="keywords">
            <div class="container text-center">
                <span class="dark_pink">innovate</span>
                <span> . connect . </span>
                <span class="dark_blue">transform</span>
            </div>
        </section>

        <section id="about" class="call_to_action">
            <div class="container">
                <div class="d-flex flex-column align-items-end">
                    <h2 class="text-end mb-5">BEHIND THE SCENES</h2>
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <div>
                            <a href="{{ route('about') }}" class="general_button d-block d-md-inline-block text-center mt-5 mt-md-0">read more</a>
                        </div>
                        <p class="text-end mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus deserunt in, dolorum inventore obcaecati ab culpa amet nemo mollitia tempore repudiandae laboriosam labore reiciendis, dolorem debitis expedita non eveniet unde?</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="packages" class="call_to_action">
            <div class="container">
                <div class="d-flex flex-column align-items-start">
                    <h2 class="mb-5">PACKAGES</h2>
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <p class="mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus deserunt in, dolorum inventore obcaecati ab culpa amet nemo mollitia tempore repudiandae laboriosam labore reiciendis, dolorem debitis expedita non eveniet unde?</p>
                        <div>
                            <a href="{{ route('about') }}" class="general_button d-block d-md-inline-block text-center mt-5 mt-md-0">read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="activities" class="call_to_action">
            <div class="container">
                <div class="d-flex flex-column align-items-end">
                    <h2 class="text-end mb-5">ACTIVITIES</h2>
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <div>
                            <a href="{{ route('about') }}" class="general_button d-block d-md-inline-block text-center mt-5 mt-md-0">read more</a>
                        </div>
                        <p class="text-end mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus deserunt in, dolorum inventore obcaecati ab culpa amet nemo mollitia tempore repudiandae laboriosam labore reiciendis, dolorem debitis expedita non eveniet unde?</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="tech_talks" class="call_to_action">
            <div class="container">
                <div class="d-flex flex-column align-items-start">
                    <h2 class="mb-5">TECH TALKS</h2>
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <p class="mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus deserunt in, dolorum inventore obcaecati ab culpa amet nemo mollitia tempore repudiandae laboriosam labore reiciendis, dolorem debitis expedita non eveniet unde?</p>
                        <div>
                            <a href="{{ route('about') }}" class="general_button d-block d-md-inline-block text-center mt-5 mt-md-0">read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="byte-side_CTA">
            <div class="container flex-column text-center">
                <p>JOIN THE BYTE-SIDE</p>
                <div class="">
                    <a href="{{ route('account-create') }}" class="general_button text-center mt-5 mt-md-0">read more</a>
                </div>
            </div>
        </section>

    </main>

    <x-public.footer />

</x-public.layout>
