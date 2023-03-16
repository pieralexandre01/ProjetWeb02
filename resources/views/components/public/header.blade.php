{{-- <header>
    <nav class="homepage_nav text-center">
        <ul class="d-flex flex-nowrap justify-content-between align-items-center p-0 m-0">
            <li class="me-3"><a href="{{ route('homepage') }}" class="active nav_v3">homepage</a></li>
            <li class="me-3"><a href="{{ route('activities') }}" class="nav_v3">activities</a></li>
            <li class="me-1"><a href="{{ route('packages') }}" class="nav_v3">packages</a></li>
            <li><a href="{{ route('about') }}" class="nav_v32">experience</a></li>
            <li class="center">
                <a href="{{ route('homepage') }}" class="logo d-flex flex-column text-center flex-nowrap flex-shrink-1">
                    <div class="title d-flex flex-column">
                        MIRROR WORLD
                        <div class="festival">festival</div>
                    </div>

                    <div class="title_reflection">MIRROR WORLD</div>
                </a>
            </li>
            <li class="me-3"><a href="{{ route('about') }}" class="nav_v32 right">discover</a></li>
            <li class="me-3"><a href="{{ route('about') }}" class="nav_v3">about</a></li>
            <li class="me-3"><a href="{{ route('articles') }}" class="nav_v3">articles</a></li>
            <li class="me-3"><a href="{{ route('contact') }}" class="nav_v3">contact</a></li>
            <li>
                <button  type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('media/user_icon.svg') }}" alt="User icon">
                </button>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">dashboard</a></li>
                    <hr class="m-0">
                    <li><a class="dropdown-item" href="#">logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header> --}}

<header>
    <nav class="homepage_nav text-center">
        <ul class="d-flex flex-nowrap justify-content-between align-items-center p-0 m-0">

            <li class="nav_v2 ms-2 dropdown-center">
                <button class="link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    experience
                </button>

                <ul class="dropdown-menu drop-center text-center">
                    <li><a class="dropdown-item" href="{{ route('activities') }}">activities</a></li>
                    <hr class="m-0">
                    <li><a class="dropdown-item" href="{{ route('packages') }}">packages</a></li>
                </ul>
            </li>

{{-- aria-current="page" and class="active" need to be dynamic --}}

            <li class="me-3"><a href="{{ route('homepage') }}" class="active nav_v3" aria-current="page">homepage</a></li>
            <li class="me-3"><a href="{{ route('activities') }}" class="nav_v3">activities</a></li>
            <li class="me-1"><a href="{{ route('packages') }}" class="nav_v3">packages</a></li>

            <li class="nav_center-logo">
                <a href="{{ route('homepage') }}" class="logo d-flex flex-column text-center flex-nowrap flex-shrink-1">
                    <div class="title d-flex flex-column">
                        MIRROR WORLD
                        <div class="festival">festival</div>
                    </div>

                    <div class="title_reflection">MIRROR WORLD</div>
                </a>
            </li>

            <li class="me-3"><a href="{{ route('about') }}" class="nav_v3">about</a></li>
            <li class="me-3"><a href="{{ route('articles') }}" class="nav_v3">articles</a></li>
            <li class="me-3"><a href="{{ route('contact') }}" class="nav_v3">contact</a></li>

            <li class="nav_v2 me-3 dropdown-center">
                <button class="link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    discover
                </button>

                <ul class="dropdown-menu text-center">
                    <li><a class="dropdown-item" href="{{ route('about') }}">about</a></li>
                    <hr class="m-0">
                    <li><a class="dropdown-item" href="{{ route('articles') }}">articles</a></li>
                    <hr class="m-0">
                    <li><a class="dropdown-item" href="{{ route('contact') }}">contact</a></li>
                </ul>
            </li>

            <li class="user_btn align-self-start">
                <button class="user_icon" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('media/user_icon.svg') }}"  alt="User icon">
                </button>

                <ul class="dropdown-menu dropdown-right text-end">
                    <li><a class="dropdown-item" href="#">dashboard</a></li>
                    <hr class="m-0">
                    <li><a class="dropdown-item" href="#">logout</a></li>
                </ul>
            </li>

        </ul>
    </nav>
</header>
