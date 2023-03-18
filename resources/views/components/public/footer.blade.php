<footer>

    <div class="wrapper w-100">
        <div class="marquee">
            <span class="p-0">
                <span class="dark_pink"> discover</span> . connect . <span class="dark_blue">engage</span> . innovate . <span class="dark_pink">experience</span> . learn . <span class="dark_blue">revolutionize</span> . design . <span class="dark_pink">inspire</span> . evolve . <span class="dark_blue">imagine</span> . explore . <span class="dark_pink">transform</span> . visualize . <span class="dark_blue">create</span> . invent .
            </span>
            <span class="p-0">
                <span class="dark_pink"> discover</span> . connect . <span class="dark_blue">engage</span> . innovate . <span class="dark_pink">experience</span> . learn . <span class="dark_blue">revolutionize</span> . design . <span class="dark_pink">inspire</span> . evolve . <span class="dark_blue">imagine</span> . explore . <span class="dark_pink">transform</span> . visualize . <span class="dark_blue">create</span> . invent .
            </span>
        </div>
    </div>

    <div class="social_media_icons">
        <span class="icon"><img src="{{ asset('media/instagram.svg') }}" alt="Instagram icon"></span>
        <span class="icon mx-5"><img src="{{ asset('media/facebook.svg') }}" alt="Facebook icon"></span>
        <span class="icon"><img src="{{ asset('media/discord.svg') }}" alt="Discord icon"></span>
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
        <div class="d-none copyright">
            <img src="{{ asset('media/copyright.svg') }}" alt="Copyright Trio">
            <span>trio</span>
        </div>
    </section>

    <div id="copyright">
        <img src="{{ asset('media/copyright.svg') }}" alt="Copyright Trio">
        <span>trio</span>
    </div>

</footer>
