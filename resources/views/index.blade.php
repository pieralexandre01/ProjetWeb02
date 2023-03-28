<x-public.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">public/homepage</x-slot>

    {{-- <x-public.header :page="$page" /> --}}

    <header>
        <nav class="fixed-top d-flex flex-row justify-content-center">

            <ul id="homepage_left-side_menu" class="d-md-flex flex-nowrap justify-content-start justify-content-xxl-between align-items-center p-0 m-0">
                <li class="d-none d-md-block d-xxl-none ms-2 dropdown-center align-self-center">
                    <button class="link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        experience
                    </button>
                    <ul class="dropdown-menu drop-center text-center p-0">
                        <li><a class="dropdown-item" href="{{ route('homepage') }}" class="@if($page == 'homepage') active_link @endif" aria-current="{{ $page }}">homepage</a></li>
                        <hr class="m-0">
                        <li><a class="dropdown-item" href="{{ route('activities') }}" class="@if($page == 'activities') active_link @endif" aria-current="{{ $page }}">activities</a></li>
                        <hr class="m-0">
                        <li><a class="dropdown-item" href="{{ route('packages') }}" class="@if($page == 'packages') active_link @endif" aria-current="{{ $page }}">packages</a></li>
                    </ul>
                </li>
                <li class="d-none d-xxl-block"><a href="{{ route('homepage') }}" class="@if($page == 'homepage') active_link @endif" aria-current="{{ $page }}">homepage</a></li>
                <li class="d-none d-xxl-block"><a href="{{ route('activities') }}" class="@if($page == 'activities') active_link @endif" aria-current="{{ $page }}">activities</a></li>
                <li class="d-none d-xxl-block"><a href="{{ route('packages') }}" class="@if($page == 'packages') active_link @endif" aria-current="{{ $page }}">packages</a></li>
            </ul>

            <div class="nav_center">

                <div id="festival_logo" class="nav_center-logo">
                    <div class="logo d-flex flex-column text-center flex-nowrap flex-shrink-1">
                        <div class="title d-flex flex-column">
                            MIRROR WORLD
                            <div class="festival">festival</div>
                        </div>
                        <div class="title_reflection">MIRROR WORLD</div>
                    </div>\activities
                </div>

            </div>

            <ul id="homepage_right-side_menu" class="d-md-flex flex-nowrap justify-content-end justify-content-xxl-between align-items-center p-0 m-0">
                <li class="d-none d-xxl-block"><a href="{{ route('about') }}" class="@if($page == 'about') active_link @endif" aria-current="{{ $page }}">about</a></li>
                <li class="d-none d-xxl-block"><a href="{{ route('articles') }}" class="@if($page == 'articles') active_link @endif" aria-current="{{ $page }}">articles</a></li>
                <li class="d-none d-xxl-block"><a href="{{ route('contact') }}" class="@if($page == 'contact') active_link @endif" aria-current="{{ $page }}">contact</a></li>
                <li class="d-none d-md-block d-xxl-none dropdown-center">
                    <button class="link dropdown-toggle me-4" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        discover
                    </button>
                    <ul class="dropdown-menu text-center p-0">
                        <li><a class="dropdown-item" href="{{ route('about') }}" class="@if($page == 'about') active_link @endif" aria-current="{{ $page }}">about</a></li>
                        <hr class="m-0">
                        <li><a class="dropdown-item" href="{{ route('articles') }}" class="@if($page == 'articles') active_link @endif" aria-current="{{ $page }}">articles</a></li>
                        <hr class="m-0">
                        <li><a class="dropdown-item" href="{{ route('contact') }}" class="@if($page == 'contact') active_link @endif" aria-current="{{ $page }}">contact</a></li>
                    </ul>
                </li>
                <li class="user_btn d-none d-md-block align-self-start">
                    @auth
                        <button class="user_icon_connected" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('media/icons/user_icon_pink_connected.svg') }}" alt="User icon">
                        </button>
                        <ul class="dropdown-menu dropdown_right text-end p-0">
                            <li class="user_name dropdown-item dropdown_right">{{ Auth::user()->first_name }}</li>
                            <hr class="m-0">
                            <li><a class="dropdown-item" href="{{ route('cart') }}" class="@if($page == 'cart') active_link @endif" aria-current="{{ $page }}">cart</a></li>
                                <hr class="m-0">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}" class="@if($page == 'dashboard') active_link @endif" aria-current="{{ $page }}">dashboard</a></li>
                            <hr class="m-0">
                            <li><a class="dropdown-item" href="{{ route('logout') }}">logout</a></li>
                        </ul>
                    @endauth
                    @guest
                        <button class="user_icon" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('media/icons/user_icon.svg') }}" alt="User icon">
                        </button>
                        <ul class="dropdown-menu dropdown_right text-end p-0">
                            <li><a class="right_item dropdown-item" href="{{ route('login') }}" class="@if($page == 'login') active_link @endif" aria-current="{{ $page }}">login</a></li>
                            <hr class="m-0">
                            <li><a class="dropdown-item" href="{{ route('account-create') }}" class="@if($page == 'account-create') active_link @endif" aria-current="{{ $page }}">create account</a></li>
                        </ul>
                    @endguest
                </li>

            </ul>

            <div id="homepage_dropdown_menu" class="menu_container d-block d-md-none dropdown">
                <button id="menu_burger" class="d-block d-md-none me-5" type="button" data-bs-toggle="dropdown" aria-expanded="false" :class="{ open_menu : is_open }" @@click="toggleMenu()">
                    <div class="menu_bar bar_1"></div>
                    <div class="menu_bar bar_2"></div>
                </button>

                <ul class="dropdown-menu dropdown_right text-end p-0 mt-3">
                    <li><a class="dropdown-item right_item" href="{{ route('homepage') }}" class="@if($page == 'homepage') active_link @endif" aria-current="{{ $page }}">homepage</a></li>
                    <hr class="m-0">
                    <li><a class="dropdown-item" href="{{ route('activities') }}" class="@if($page == 'activities') active_link @endif" aria-current="{{ $page }}">activities</a></li>
                    <hr class="m-0">
                    <li><a class="dropdown-item" href="{{ route('packages') }}" class="@if($page == 'packages') active_link @endif" aria-current="{{ $page }}">packages</a></li>
                    <hr class="m-0">
                    <li><a class="dropdown-item" href="{{ route('about') }}" class="@if($page == 'about') active_link @endif" aria-current="{{ $page }}">about</a></li>
                    <hr class="m-0">
                    <li><a class="dropdown-item" href="{{ route('articles') }}" class="@if($page == 'articles') active_link @endif" aria-current="{{ $page }}">articles</a></li>
                    <hr class="m-0">
                    <li><a class="dropdown-item" href="{{ route('contact') }}" class="@if($page == 'contact') active_link @endif" aria-current="{{ $page }}">contact</a></li>
                    <hr class="m-0">
                    @auth
                        <li class="user_name dropdown-item dropdown_right">{{ Auth::user()->first_name }}</li>
                        <hr class="m-0">
                        <li><a class="dropdown_connected dropdown-item" href="{{ route('cart') }}" class="@if($page == 'cart') active_link @endif" aria-current="{{ $page }}">cart</a></li>
                        <hr class="m-0">
                        <li><a class="dropdown_connected dropdown-item" href="{{ route('dashboard') }}" class="@if($page == 'dashboard') active_link @endif" aria-current="{{ $page }}">dashboard</a></li>
                        <hr class="m-0">
                        <li><a class="dropdown_connected dropdown-item" href="{{ route('logout') }}">logout</a></li>
                    @endauth
                    @guest
                        <li><a class="right_item dropdown-item" href="{{ route('login') }}" class="@if($page == 'login') active_link @endif" aria-current="{{ $page }}">login</a></li>
                        <hr class="m-0">
                        <li><a class="dropdown-item" href="{{ route('account-create') }}" class="@if($page == 'account-create') active_link @endif" aria-current="{{ $page }}">create account</a></li>
                    @endguest
                </ul>
            </div>

        </nav>
    </header>



    <main class="pt-0">

        <section id="intro_header">
            <img src="{{ asset('/../media/images/homepage_header.webp') }}" class="header_image" alt="Digital showroom">

            <div class="container">
                <p id="festival_date" class="text-center">8-9-10 september 2023</p>

                <div id="festival_logo" class="nav_center-logo">
                    <div class="logo d-flex flex-column text-center flex-nowrap flex-shrink-1">
                        <div class="title d-flex flex-column">
                            MIRROR WORLD
                            <div class="festival">festival</div>
                        </div>
                        <div class="title_reflection">MIRROR WORLD</div>
                    </div>
                </div>

                <p id="festival_tagline" class="text-center">Immerse yourself in a world of limitless possibilities and visionary technologies shaping tomorrow</p>
            </div>

        </section>
    </main>

    <x-public.footer />

</x-public.layout>
