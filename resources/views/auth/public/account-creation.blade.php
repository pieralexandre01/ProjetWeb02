<x-public.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">connect</x-slot>

    <x-public.header :page="$page" />

        <main class="d-flex align-items-center">

            <div class="container d-flex flex-nowrap justify-content-center align-items-center mb-5">
                <div id="account_create" class="form-container d-inline-block py-2 py-md-4 w-100">

                    <h3 class="text-center mb-3 mb-sm-4 mb-md-5 mt-sm-3">CREATE AN ACCOUNT</h3>

                    <form action="{{ route('account-create') }}" method="post" class="d-flex flex-column align-items-start gap-2 gap-md-0 w-100">
                        @csrf

                        <input type="hidden" name="privilege_type" value="public">

                        <div class="d-flex flex-column flex-md-row align-items-start gap-2 gap-md-5 mb-md-3 mb-lg-4 mb-xxl-5 w-100">
                            <div class="d-flex flex-column w-100">
                                <label for="first_name" class="mb-1">FIRST NAME</label>
                                <input id="first_name" name="first_name" type="text">
                            </div>
                            <div class="d-flex flex-column w-100">
                                <label for="last_name" class="mb-1">LAST NAME</label>
                                <input id="last_name" name="last_name" type="text">
                            </div>
                        </div>

                        <div class="d-flex flex-column mb-md-3 mb-lg-4 mb-xxl-5 w-100">
                            <label for="email" class="mb-1">E-MAIL</label>
                            <input id="email" name="email" type="text">
                        </div>

                        <div class="d-flex flex-column flex-md-row align-items-end gap-2 gap-md-5 mb-md-5 w-100">
                            <div class="d-flex flex-column w-100">
                                <label for="password" class="mb-1">PASSWORD</label>
                                <input id="password" name="password" type="password">
                            </div>
                            <div class="d-flex flex-column w-100">
                                <label for="password_confirm" class="mb-1">CONFIRM PASSWORD</label>
                                <input id="password_confirm" name="password_confirm" type="password">
                            </div>
                        </div>

                        <input type="submit" class="align-self-center mt-3 mt-md-0">
                    </form>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <p class="mt-4 text-center"><span class="d-none d-md-inline-block">already</span> have an account? <a href="{{ route('login') }}" class="text_link">login!</a></p>
                </div>

                <img src="{{ asset('/../media/images/account_create_img.png') }}" class="d-none d-xxl-block ps-xxl-5 ms-xxl-5" alt="Digital imaging of a human body">
            </div>

        </main>

    <x-footer />

</x-public.layout>
