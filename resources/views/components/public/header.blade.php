<header>
    <nav class="homepage_nav text-center">
        <ul class="d-flex flex-nowrap justify-content-between align-items-center p-0 m-0">
            <li class="me-3"><a href="{{ route('homepage') }}" class="active">homepage</a></li>
            <li class="me-3"><a href="{{ route('homepage') }}">activities</a></li>
            <li class="me-3"><a href="{{ route('homepage') }}">packages</a></li>
            <li>
                <a href="{{ route('homepage') }}" class="logo d-flex flex-column text-center flex-nowrap">
                    <div class="title d-flex flex-column">
                        MIRROR WORLD
                        <div class="festival">festival</div>
                    </div>

                    <div class="title_reflection">MIRROR WORLD</div>
                </a>
            </li>
            <li class="ms-2 me-3"><a href="{{ route('homepage') }}">about</a></li>
            <li class="me-3"><a href="{{ route('homepage') }}">articles</a></li>
            <li class="me-3"><a href="{{ route('homepage') }}">contact</a></li>
            <li>
                <button href="{{ route('homepage') }}" class="link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
</header>
