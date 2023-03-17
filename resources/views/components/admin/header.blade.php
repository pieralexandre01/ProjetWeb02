<header>
    <nav class="admin_nav">
        <ul class="d-md-flex flex-nowrap justify-content-between align-items-center p-0 m-0">

            <li class="me-3">
                <a href="{{ route('homepage') }}" class="d-flex flex-nowrap" aria-current="page">
                    <img src="{{ asset('media/return.svg') }}" alt="Return-arrow icon">
                    public homepage
                </a>
            </li>

            <li>
                <a href="{{ route('homepage') }}" class="logo d-flex flex-column text-center flex-nowrap flex-shrink-1">
                    <div class="title d-flex flex-column">
                        MIRROR WORLD
                        <div class="festival">festival</div>
                    </div>

                    <div class="title_reflection">MIRROR WORLD</div>
                </a>
            </li>

            @auth
                <li>
                    <a href="{{ url('/logout') }}" class="d-flex flex-nowrap">
                        logout
                        <img src="{{ asset('media/logout.svg') }}" class="logout_icon d-block" alt="Logout icon">
                    </a>
                </li>
            @endauth

        </ul>
    </nav>
</header>
