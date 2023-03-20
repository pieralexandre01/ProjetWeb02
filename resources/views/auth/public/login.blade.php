<x-public.layout>
    {{-- <x-slot name="titre"></x-slot> --}}

    <style>
        :root {
            --color: var(--dark-turquoise);
            --color-hover: var(--vivid-turquoise);
        }

        .user_icon:hover,
        .user_icon:focus {
            background-image: url("../../media/icons/user_icon_turquoise.svg") !important;
        }

        footer {
            height: 45px !important;
        }
    </style>

    <x-public.header :page="$page" />

    <main class="d-flex align-items-center">

        <div class="container d-flex flex-nowrap justify-content-center align-items-center">
            <div class="form-container d-inline-block">

                <h3 class="text-center mb-4">LOGIN</h3>

                <form action="{{ route('login') }}" method="post" class="d-flex flex-column align-items-start">
                    @csrf
                    <div class="d-flex flex-column mb-5 w-100">
                        <label for="email" class="mb-1">E-MAIL</label>
                        <input id="email" name="email" type="text">
                    </div>
                    <div class="d-flex flex-column mb-5 w-100">
                        <label for="password" class="mb-1">PASSWORD</label>
                        <input id="password" name="password" type="password">
                    </div>
                    <input type="submit" class="align-self-center">
                </form>

                <p class="mt-4">don't have an account? <a href="{{ route('account-create') }}" class="text_link">create one!</a></p>
            </div>

            <img src="{{ asset('/../media/images/login_img.png') }}" class="d-none d-lg-block" alt="Digital imaging of a human body">
        </div>

    </main>

    <x-footer />

</x-public.layout>
