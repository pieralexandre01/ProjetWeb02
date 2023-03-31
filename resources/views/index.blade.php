<x-public.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">public/homepage</x-slot>

    <x-public.header :page="$page" />

    <main>
        {{-- <section id="intro_header">
            <img src="{{ asset('/media/images/homepage_header.webp') }}" class="header_image" alt="Digital showroom">
            <div class="container">
                <p id="festival_date" class="text-center">8-9-10 september 2023</p>

                <p id="festival_tagline" class="text-center">Immerse yourself in a world of limitless possibilities and visionary technologies shaping tomorrow</p>
            </div>
        </section> --}}

        {{-- <div id="interactive_text" class="d-flex flex-nowrap" @@mouseenter="animateText()">
            <div class="line_decoration1">
                <div class="circle"></div>
            </div>
            <div class="d-flex flex-column">

                <span class="span_1 pt-5 px-5">Reflecting the Future</span>
                @verbatim
                    <span class="span_2 ps-5">Where <span class="animated_word" :data-value="original_word1"></span>{{ word1 }}</span>
                    <span class="span_3 mb-0 pb-5 pe-5">Meets <span class="animated_word" :data-value="original_word2"></span>{{ word2 }}</span>
                @endverbatim

            </div>
            <div class="line_decoration2">
                <a href="#scroll_down" class="arrow_down d-inline-block">
                    <img src="{{ asset('/../media/icons/down_arrow.svg') }}" alt="Arrow directing downwards">
                </a>
            </div>
            <div class="bottom_line"></div>
        </div> --}}

        {{-- <div class="container">
            <div class="text-center">
                <a href="#scroll_down">
                    <img src="{{ asset('/../media/icons/down_arrow.svg') }}" class="arrow_down" alt="Arrow directing downwards">
                </a>
            </div>
        </div> --}}

        <section id="scroll_down">
            <div class="container text-center">
                <p>SCROLL TO GET A <span>GLIMPSE</span></p>
                <div class="d-flex align-items-center justify-content-center">
                    <p>OF THE</p>
                    <p class="grey_effect">&nbsp;FESTIVAL&nbsp;</p>
                    <p>OF THE</p>
                </div>
                <p class="rainbow_effect">FUTURE</p>
            </div>
        </section>

        <section id="keywords">
            <div class="container d-flex flex-column align-items-center flex-sm-row justify-content-sm-center">
                <span class="dark_pink">innovate</span>
                <span>
                    <span class="d-none d-sm-inline-block">&nbsp;.&nbsp;</span>
                    <span class="white">connect</span>
                    <span class="d-none d-sm-inline-block">&nbsp;.&nbsp;</span>
                </span>
                <span class="dark_blue">transform</span>
            </div>
        </section>

        <section id="about" class="call_to_action">
            <div class="container px-sm-2 px-lg-5">
                <div class="d-flex flex-column align-items-end">
                    <h2 class="text-end mb-5">BEHIND THE SCENES</h2>
                    <div class="d-flex flex-column flex-md-row-reverse align-items-center justify-content-between w-100">
                        <p class="ps-md-5 ps-xxl-0 text-end mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus deserunt in, dolorum inventore obcaecati ab culpa amet nemo mollitia tempore repudiandae laboriosam labore reiciendis, dolorem debitis expedita non eveniet unde?</p>
                        <div class="">
                            <a href="{{ route('about') }}" class="general_button d-block d-md-inline-block text-center mt-5 mt-md-0">read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="experience_divider">
            <img src="{{ asset('/../media/images/homepage/experience.webp') }}" alt="Experience VR image">

            <div class="d-flex flex-column align-items-end">
                <div class="d-flex flex-row flex-nowrap align-items-center w-100">
                    <div class="first_line w-100 me-2"></div>
                    <span>EXPERIENCE</span>
                </div>
                <span>virtual reality with</span>
                <span>the latest technology</span>
            </div>
            <div class="second_line mt-2"></div>
        </section>

        <section id="packages" class="call_to_action">
            <div class="container px-sm-2 px-lg-5">
                <div class="d-flex flex-column align-items-start">
                    <h2 class="mb-5">PACKAGES</h2>
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between w-100">
                        <p class="pe-md-5 pe-xxl-0 mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus deserunt in, dolorum inventore obcaecati ab culpa amet nemo mollitia tempore repudiandae laboriosam labore reiciendis, dolorem debitis expedita non eveniet unde?</p>
                        <div>
                            <a href="{{ route('about') }}" class="general_button d-block d-md-inline-block text-center mt-5 mt-md-0">read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @foreach( $activities as $activity)

            <section id="interact_divider">
                <img src="{{ $activity->image }}" class="mb-5" alt="{{ $activity->subcategory }}">
                <div class="d-flex flex-column align-items-end">
                    <div class="d-flex flex-row flex-nowrap align-items-center w-100">
                        <div class="first_line w-100 me-2"></div>
                        <span>INTERACT</span>
                    </div>
                    <span>with cyber legends</span>
                    <span>{{ $activity->subcategory }}</span>
                </div>
                <div class="second_line mt-2"></div>
            </section>

        @endforeach

        <section id="activities" class="call_to_action">
            <div class="container px-sm-2 px-lg-5">
                <div class="d-flex flex-column align-items-end">
                    <h2 class="text-end mb-5">ACTIVITIES</h2>
                    <div class="d-flex flex-column flex-md-row-reverse align-items-center justify-content-between w-100">
                        <p class="ps-md-5 ps-xxl-0 text-end mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus deserunt in, dolorum inventore obcaecati ab culpa amet nemo mollitia tempore repudiandae laboriosam labore reiciendis, dolorem debitis expedita non eveniet unde?</p>
                        <div>
                            <a href="{{ route('about') }}" class="general_button d-block d-md-inline-block text-center mt-5 mt-md-0">read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="discover_divider">
            <img src="{{ asset('/../media/images/homepage/discover.png') }}" class="mb-5" alt="Image of human-like robot">

            <div class="d-flex flex-column align-items-end">
                <div class="d-flex flex-row flex-nowrap align-items-center w-100">
                    <div class="first_line w-100 me-2"></div>
                    <span>DISCOVER</span>
                </div>
                <span>the most advanced</span>
                <span>autonomous systems</span>
            </div>
            <div class="second_line mt-2"></div>
        </section>

        <section id="tech_talks" class="call_to_action">
            <div class="container px-sm-2 px-lg-5">
                <div class="d-flex flex-column align-items-start">
                    <h2 class="mb-5">TECH NEWS</h2>
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between w-100">
                        <p class="pe-md-5 pe-xxl-0 mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus deserunt in, dolorum inventore obcaecati ab culpa amet nemo mollitia tempore repudiandae laboriosam labore reiciendis, dolorem debitis expedita non eveniet unde?</p>
                        <div class="button_space">
                            <a href="{{ route('about') }}" class="general_button d-block d-md-inline-block text-center mt-5 mt-md-0">read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="byte-side_CTA">

                 <div class="d-flex flex-column text-center">
                    <p class="grey_effect mb-5">JOIN THE BYTE-SIDE</p>

                    <div>
                        <a href="{{ route('account-create') }}" class="general_button text-center mt-5 mt-md-0">read more</a>
                    </div>
                </div>

        </section>

        <section id="immerse_text">
            <div class="container text-center">
                <p class="glow_effect">IMMERSE YOURSELF</p>
            </div>
        </section>

    </main>

    <x-public.footer />

</x-public.layout>
