<header>
    <nav>
        <ul>
            <li><a href="{{ route('homepage') }}" class="homepage_link">homepage</a></li>
            <li><a href="{{ route('homepage') }}">activities</a></li>
            <li><a href="{{ route('homepage') }}">packages</a></li>
            <li>
                <a href="{{ route('homepage') }}" class="homepage_link">
                    <h1>MIRROR WORLD</h1>
                    <h1 class="title_reflection">MIRROR WORLD</h1>
                    <span>festival</span>
                </a>
            </li>
            <li><a href="{{ route('homepage') }}">about</a></li>
            <li><a href="{{ route('homepage') }}">articles</a></li>
            <li><a href="{{ route('homepage') }}">contact</a></li>
            <li>
                <button href="{{ route('homepage') }}" class="link btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="#" alt="User icon">
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">dashboard</a></li>
                    <li><a class="dropdown-item" href="#">logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
