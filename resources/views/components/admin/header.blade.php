<header>
    <nav class="admin_nav px-5">
        <ul class="d-md-flex flex-nowrap justify-content-between align-items-center p-0 m-0">

            <li class="test1 me-3">
                <a href="{{ route('homepage') }}" class="d-flex flex-nowrap align-items-center" aria-current="page">
                    <img src="{{ asset('media/return.svg') }}" class="pe-3" alt="Return-arrow icon">
                    public homepage
                </a>
            </li>

            <li>
                <a href="{{ route('homepage') }}" class="logo d-flex flex-column text-center flex-nowrap">
                    <div class="title d-flex flex-column">
                        MIRROR WORLD
                        <div class="festival">festival</div>
                    </div>

                    <div class="title_reflection">MIRROR WORLD</div>
                </a>
            </li>

            @auth
                <a href="{{ url('/logout') }}" class="test1 d-flex flex-nowrap  justify-content-end align-items-center">
                        logout
                        <img src="{{ asset('media/logout.svg') }}" class="logout_icon ps-3" alt="Logout icon">
                    </a>
                </li>
            @endauth

        </ul>
    </nav>
</header>
