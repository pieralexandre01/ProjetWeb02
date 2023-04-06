<x-public.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">connect</x-slot>

    <x-public.header :page="$page" />

    <x-public.modal-message />

    <main class="d-flex align-items-center">

        <div class="container d-flex flex-nowrap justify-content-center align-items-center">
            <div class="form-container border_box py-2">

                <h3 class="text-center mt-3">LOGIN</h3>

                <x-msg-session key="login-blocked" class_name="error text-center" />
                <x-msg-session key="login-failed" class_name="error text-center" />

                <form action="{{ route('login') }}" method="post" class="d-flex flex-column align-items-start mt-4">
                    @csrf

                    <div class="d-flex flex-column mb-5 w-100">
                        <label for="email" class="mb-1">E-MAIL</label>
                        <input id="email" name="email" type="text">
                        <x-msg-error field="email" />
                    </div>

                    <div class="d-flex flex-column mb-5 w-100">
                        <label for="password" class="mb-1">PASSWORD</label>
                        <input id="password" name="password" type="password">
                        <x-msg-error field="password" />
                    </div>

                    <input type="submit" class="align-self-center" value="submit">
                </form>

                <p class="mt-4 text-center">
                    don't have an account?&nbsp;
                    <a href="{{ route('account-create') }}" class="text_link">create one!</a>
                </p>
            </div>

            <img src="{{ asset('/../media/images/login.png') }}" class="d-none d-lg-block ps-lg-5 ms-lg-5"
                alt="Digital imaging of a human body">
        </div>

    </main>

    <x-footer />

</x-public.layout>
