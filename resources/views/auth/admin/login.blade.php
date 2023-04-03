<x-admin.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">connect</x-slot>

    <x-admin.header />

    <main class="d-flex align-items-center">

        <div class="container d-flex flex-nowrap justify-content-center align-items-center">
            <div class="form-container border_box py-2 py-md-4">

                <h3 class="text-center mt-3">ADMIN LOGIN</h3>

                <x-msg-session key="login-blocked" class_name="error" />
                <x-msg-session key="login-failed" class_name="error" />

                <form action="{{ route('login') }}" method="post" class="d-flex flex-column align-items-start mt-5">
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

            </div>

            <img src="{{ asset('/../media/images/login.png') }}" class="d-none d-lg-block ps-lg-5 ms-lg-5"
                alt="Digital imaging of a human body">
        </div>

    </main>

    <x-footer />

</x-admin.layout>
