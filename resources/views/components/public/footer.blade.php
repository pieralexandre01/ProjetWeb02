<footer>

    <div class="wrapper w-100">
        <div class="marquee">
            <span class="p-0">
                <span class="dark_pink"> discover</span> . connect . <span class="dark_blue">engage</span> . innovate .
                <span class="dark_pink">experience</span> . learn . <span class="dark_blue">revolutionize</span> . design
                . <span class="dark_pink">inspire</span> . evolve . <span class="dark_blue">imagine</span> . explore .
                <span class="dark_pink">transform</span> . visualize . <span class="dark_blue">create</span> . invent .
            </span>

            <span class="p-0">
                <span class="dark_pink"> discover</span> . connect . <span class="dark_blue">engage</span> . innovate .
                <span class="dark_pink">experience</span> . learn . <span class="dark_blue">revolutionize</span> .
                design . <span class="dark_pink">inspire</span> . evolve . <span class="dark_blue">imagine</span> .
                explore . <span class="dark_pink">transform</span> . visualize . <span class="dark_blue">create</span> .
                invent .
            </span>
        </div>
    </div>

    <div class="social_media_icons d-flex flex-nowrap justify-content-center">
        <a href="https://www.instagram.com" class="instagram_icon"><img src="{{ asset('media/icons/instagram.svg') }}"
                alt="Instagram icon"></a>
        <a href="https://www.facebook.com" class="facebook_icon ms-5 me-4"><img
                src="{{ asset('media/icons/facebook.svg') }}" alt="Facebook icon"></a>
        <a href="https://discord.com" class="discord_icon"><img src="{{ asset('media/icons/discord.svg') }}"
                alt="Discord icon"></a>
    </div>

    <section id="footer_nav" class="container">
        <ul class="d-flex flex-column flex-md-row flex-md-nowrap justify-content-md-around mx-5">
            <li class="me-md-4 me-lg-3 mb-4 mb-md-0"><a href="{{ route('homepage') }}">homepage</a></li>
            <li class="me-md-4 me-lg-3 mb-4 mb-md-0"><a href="{{ route('activities') }}">activities</a></li>
            <li class="me-md-4 me-lg-3 mb-4 mb-md-0"><a href="{{ route('packages') }}">packages</a></li>
            <li class="me-md-4 me-lg-3 mb-4 mb-md-0"><a href="{{ route('about') }}">about</a></li>
            <li class="me-md-4 me-lg-3 mb-4 mb-md-0"><a href="{{ route('articles') }}">articles</a></li>
            <li><a href="{{ route('contact') }}">contact</a></li>
        </ul>
    </section>

    <div id="copyright">
        <img src="{{ asset('media/icons/copyright.svg') }}" alt="Copyright Trio">
        <span>trio</span>
    </div>

</footer>
