<x-public.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">public/contact</x-slot>

    <x-public.header :page="$page" />

    <main class="d-md-flex flex-md-nowrap align-items-md-center">
        <div class="page_title d-md-none">
            <h1 class="text-end">CONTACT US</h1>

            <div class="title_decoration">
                <div class="circle"></div>
            </div>
        </div>

        <div class="container d-flex flex-nowrap justify-content-center align-items-center mt-5 px-4 px-lg-3 gap-xl-5">
            <div
                class="border_box d-flex flex-column justify-content-between align-items-center align-items-md-stretch gap-1">

                <h1 class="d-none d-md-block h3 mb-4 mt-3 text-end">CONTACT US</h1>

                <div class="d-flex flex-column text-center gap-4 justify-content-between text-md-start gap-md-0">
                    <div
                        class="d-flex flex-column text-center fap-4 justify-content-between flex-nowrap flex-md-row text-md-start gap-md-0">
                        <div>
                            <p>1-888-888-8888</p>
                            <p>info@mirrorworld.com</p>
                        </div>

                        <div
                            class="social_media_icons my-2 d-flex flex-nowrap justify-content-center justify-content-md-around">
                            <a href="https://www.instagram.com" class="instagram_icon">
                                <img src="{{ asset('media/icons/instagram.svg') }}" alt="Instagram icon">
                            </a>

                            <a href="https://www.facebook.com" class="facebook_icon ms-4 me-2">
                                <img src="{{ asset('media/icons/facebook.svg') }}" alt="Facebook icon">
                            </a>

                            <a href="https://discord.com" class="discord_icon">
                                <img src="{{ asset('media/icons/discord.svg') }}" alt="Discord icon">
                            </a>
                        </div>
                    </div>

                    <div class="d-none d-md-block d-flex flex-column pb-md-3">
                        <span class="d-block">297 rue St-Georges</span>
                        <span class="d-block">Saint-Jérôme, Québec</span>
                        <span class="d-block">Canada, A1B 2C3</span>
                    </div>

                    <div class="address d-md-none d-flex flex-column justify-content-center pb-md-2">
                        <span>297 rue St-Georges</span>
                        <span>Saint-Jérôme, Québec</span>
                        <span>Canada, A1B 2C3</span>
                    </div>
                </div>

                <div class="d-md-none mt-4">
                    <a href="#google_map">
                        <img src="{{ asset('/../media/icons/down_arrow.svg') }}" class="arrow_down"
                            alt="Arrow directing downwards">
                    </a>
                </div>

                <div id="google_map" class="pb-1 mt-5 mt-md-0">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2782.746598551334!2d-74.00520964870815!3d45.77626842048395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccf2ca136664c05%3A0x90430ecdc061500!2s297%20Rue%20St%20Georges%2C%20Saint-J%C3%A9r%C3%B4me%2C%20QC%20J7Z%205A2!5e0!3m2!1sen!2sca!4v1679435133586!5m2!1sen!2sca"
                        style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        class="border_box"></iframe>
                </div>

            </div>

            <div class="align-self-center"><img src="{{ asset('/../media/images/contact_us.png') }}"
                    class="d-none d-lg-block ms-lg-3 img-fluid" alt="Digital imaging of planet Earth"></div>
        </div>

    </main>

    <x-public.footer />

</x-public.layout>
