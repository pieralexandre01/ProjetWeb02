<x-public.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">public/homepage</x-slot>

    {{-- <x-public.header :page="$page" /> --}}

    <main>

        <aside id="scroll_bar" class="d-none d-sm-block">
            <div class="scroll_indicator" :style="{ top: state.scrollHeight + '%'}"></div>
        </aside>

        {{-- <section id="intro_header">
            <img src="{{ asset('/media/images/homepage_header.webp') }}" class="header_image" alt="Digital showroom">
            <div class="container">
                <p id="festival_date" class="text-center">8-9-10 september 2023</p>

                <p id="festival_tagline" class="text-center">Immerse yourself in a world of limitless possibilities and visionary technologies shaping tomorrow</p>
            </div>
        </section> --}}

        <section id="intro_main">
            <div id="robot_carousel" ref="robot_carousel">
                <img src="{{ asset('/../media/images/homepage/robot1.png') }}" id="image1" ref="image1" class="animate_img img-fluid" alt="Digital image representing robotics where reality meets innovation">
                <img src="{{ asset('/../media/images/homepage/robot2.png') }}" id="image2" ref="image2" class="animate_img img-fluid" alt="Digital image representing robotics where curiosity meets exploration">
                <img src="{{ asset('/../media/images/homepage/robot3.png') }}" id="image3" ref="image3" class="animate_img img-fluid" alt="Digital image representing robotics where humanity meets automation">
                <img src="{{ asset('/../media/images/homepage/robot4.png') }}" id="image4" ref="image4" class="animate_img img-fluid" alt="Digital image representing robotics where impossibility meets opportunity">
            </div>

            <div id="interactive_text" ref="interactive_text" class="d-flex flex-nowrap">
                <div class="line_decoration1" :style="{ width: 'calc(3.45% + ' + (state.scrollHeight <= 20 ? '5 * ' + state.scrollHeight + '%' : '100%') + ')' }">
                    <div class="circle"></div>
                </div>
                <div class="d-flex flex-column">

                    <span class="span_1 pt-5 px-5">Reflecting the Future</span>
                    @verbatim
                        <span class="span_2 ps-5">Where <span class="animated_word" :data-value="original_word1"></span>{{ word1 }}</span>
                        <span class="span_3 mb-0 pb-5 pe-5">Meets <span class="animated_word" :data-value="original_word2"></span>{{ word2 }}</span>
                    @endverbatim

                </div>
                <div class="line_decoration2" :style="{ height: state.scrollHeight >= 20 ? Math.min((state.scrollHeight - 20) * 5, 100) + '%' : '0%' }">
                    <a href="#scroll_down" class="arrow_down d-inline-block" :style="{ opacity: state.scrollHeight >= 37 ? '1'  : '0', animation: state.scrollHeight >= 40 ? 'arrow_down 0.75s linear infinite alternate' : 'none' }">
                        <img src="{{ asset('/../media/icons/down_arrow.svg') }}" alt="Arrow directing downwards">
                    </a>
                </div>
                <div class="bottom_line"></div>
            </div>

        </section>

        <section id="scroll_down">
            <div class="scroll_down_text container text-center">
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
                        <div>
                            <p class="ps-md-5 ps-xxl-0 text-end">Welcome to the "Behind the Scenes" of Mirror World, the online festival that celebrates the future of technology!</p>
                            <p class="ps-md-5 ps-xxl-0 text-end mb-0">Through this virtual platform, festival-goers from around the world can engage in stimulating discussions led by renowned speakers, enjoy live musical performances, and immerse themselves in virtual reality experiences that showcase the latest technological advancements.
                            </p>
                        </div>
                        <div class="button_space">
                            <a href="{{ route('about') }}" class="general_button d-block d-md-inline-block text-center mt-5 mt-md-0">read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="experience_divider" class="text-center">
            <div class="first_line d-none d-md-block mt-2 mt-md-0"></div>

            <div class="divider_block d-md-flex align-items-center">
                <img src="{{ asset('/../media/images/homepage/experience.webp') }}" class="divider_img mb-4 pb-2 mb-md-0 pb-md-0" alt="Experience VR image">
                <div class="divider_text d-none d-md-block m-auto d-flex">
                    <div class="content d-flex flex-column align-items-end">
                        <span>EXPERIENCE</span>
                        <span>virtual reality with</span>
                        <span>the latest technology</span>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-column align-items-end d-md-none">
                <div class="d-flex flex-row flex-nowrap align-items-center w-100">
                    <div class="first_line w-100 me-2"></div>
                    <span>EXPERIENCE</span>
                </div>
                <span>virtual reality with</span>
                <span>the latest technology</span>
            </div>

            <div class="second_line mt-2 mt-md-0"></div>
        </section>

        <section id="packages" class="call_to_action">
            <div class="container px-sm-2 px-lg-5">
                <div class="d-flex flex-column align-items-start">
                    <h2 class="mb-5">PACKAGES</h2>
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between w-100">
                        <div>
                            <p class="pe-md-5 pe-xxl-0">Choose from five unique packages that aligns with your interests to fully immerse yourself in the Mirror World festival experience!</p>
                            <p class="pe-md-5 pe-xxl-0 mb-0"> Our Unlimited Access package grants access to all feature. The General Access package offers all benefits minus virtual reality. Robotics Access provides exclusive access to related content, while Innovative AI Access offers specialized speaker sessions and exhibits. Finally, Immersive VR Access offers exclusive access to our virtual reality experiences.</p>
                        </div>
                        <div class="button_space">
                            <a href="{{ route('about') }}" class="general_button d-block d-md-inline-block text-center mt-5 mt-md-0">read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        @foreach( $activities as $activity)

            <section id="interact_divider" class="text-center">
                <div class="first_line d-none d-md-block mt-2 mt-md-0"></div>

                <div class="divider_block d-md-flex flex-md-row-reverse  align-items-center">
                    <img src="{{ $activity->image }}" class="divider_img mb-4 pb-2 mb-md-0 pb-md-0" alt="{{ $activity->subcategory }}">
                    <div class="divider_text d-none d-md-block mx-auto d-flex">
                        <div class="content d-flex flex-column text-start">
                            <span>INTERACT</span>
                            <span>with cyber legends</span>
                            <span class="cyber_name align-self-end mt-2 pt-1">{{ strtoupper($activity->subcategory) }}</span>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-column align-items-end d-md-none">
                    <div class="d-flex flex-row flex-nowrap align-items-center w-100">
                        <div class="first_line w-100 me-2"></div>
                        <span>INTERACT</span>
                    </div>
                    <span>with cyber legends</span>
                    <span class="cyber_name align-self-center pt-1">{{ strtoupper($activity->subcategory) }}</span>
                </div>

                <div class="second_line mt-2 mt-md-0"></div>
            </section>

        @endforeach

        <section id="activities" class="call_to_action">
            <div class="container px-sm-2 px-lg-5">
                <div class="d-flex flex-column align-items-end">
                    <h2 class="text-end mb-5">ACTIVITIES</h2>
                    <div class="d-flex flex-column flex-md-row-reverse align-items-center justify-content-between w-100">
                        <div>
                            <p class="ps-md-5 ps-xxl-0 text-end">Mirror World offers a wide range of exciting activities to keep you engaged and entertained throughout the festival. From Tech Talks and a Cyber Soirée to an Autom-A-Thon and Next Gen VR, there's something for everyone.</p>
                            <p class="ps-md-5 ps-xxl-0 text-end mb-0">Explore stunning art pieces created by machine minds at AI Artistry, take a deep dive into big data at The Big Data Bonanza, or pilot drones at Robo Revolution. From the interconnected world of IoT at Smart Systems to the latest in blockchain technology at Cyber Insights, join us for a celebration of technology!</p>
                        </div>
                        <div class="button_space">
                            <a href="{{ route('about') }}" class="general_button d-block d-md-inline-block text-center mt-5 mt-md-0">read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="discover_divider" class="text-center">
            <div class="first_line d-none d-md-block mt-2 mt-md-0"></div>

            <div class="divider_block d-md-flex align-items-center">
                <img src="{{ asset('/../media/images/homepage/discover.png') }}" class="robot_img" alt="Image of human-like robot">
                <div class="divider_text d-none d-md-block m-auto d-flex">
                    <div class="content d-flex flex-column align-items-end">
                        <span>DISCOVER</span>
                        <span>the most advanced</span>
                        <span>autonomous systems</span>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-column align-items-end d-md-none">
                <div class="d-flex flex-row flex-nowrap align-items-center w-100">
                    <div class="first_line w-100 me-2"></div>
                    <span>DISCOVER</span>
                </div>
                <span>the most advanced</span>
                <span>autonomous systems</span>
            </div>

            <div class="second_line mt-2 mt-md-0"></div>
        </section>


        <section id="tech_talks" class="call_to_action">
            <div class="container px-sm-2 px-lg-5">
                <div class="d-flex flex-column align-items-start">
                    <h2 class="mb-5">TECH NEWS</h2>
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between w-100">
                        <div>
                            <p class="pe-md-5 pe-xxl-0">Mirror World's tech news covers a range of topics in the field of technology. From the transformative potential of VR in healthcare to the benefits and risks of using VR for education, our articles delve into the latest technological advancements.</p>
                            <p class="pe-md-5 pe-xxl-0 mb-0">We explore the rise of quantum computing and the fascinating world of artificial intelligence. Additionally, our news covers how robotics is transforming various industries such as agriculture, entertainment, and healthcare. Stay up-to-date on the latest tech news with Mirror World.</p>
                        </div>
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
