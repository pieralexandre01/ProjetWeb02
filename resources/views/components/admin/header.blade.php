<header>
    <nav class="admin_nav px-5">
        <ul class="d-md-flex flex-nowrap justify-content-between align-items-center p-0 m-0">

            <li class="li_space me-3">
                <a href="{{ route('homepage') }}" class="d-flex flex-nowrap align-items-center" aria-current="page">
                    <div class="return_icon">
                        <img src="{{ asset('media/icons/return.svg') }}"  alt="Return-arrow icon">
                    </div>
                    <div class="admin_link ps-3">public homepage</div>
                </a>
            </li>

            <li>
                <span href="{{ route('homepage') }}" class="logo d-flex flex-column text-center flex-nowrap">
                    <div class="title d-flex flex-column">
                        MIRROR WORLD
                        <div class="festival">festival</div>
                    </div>

                    <div class="title_reflection">MIRROR WORLD</div>
                </span>
            </li>

            <li class="li_space">
                @auth
                    <a href="{{ route('logout') }}" class="d-flex flex-nowrap justify-content-end align-items-center">
                        <div class="admin_link pe-3">logout</div>
                        <div class="logout_icon">
                            <img src="{{ asset('media/icons/logout.svg') }}" alt="Logout icon">
                        </div>
                    </a>
                @endauth
            </li>

        </ul>
    </nav>
</header>
