<x-admin.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">forms</x-slot>

    <x-admin.header />

    <main>

        <div class="page_title mb-4">
            <h1 class="text-end">EDIT: USER</h1>

            <div class="title_decoration">
                <div class="circle"></div>
            </div>
        </div>

        <span><a class="general_button ms-5" href="{{ route('admin-dashboard') }}">go back</a></span>

        <div class="d-flex justify-content-center">
            <x-msg-session key="account-edit" class-name="success text-center" />
            <x-msg-session key="password-edit" class-name="success text-center" />
        </div>

        <div class="admin_create_container mx-auto mt-4">
            <div id="account_create" class="form-container border_box py-4">

                <h3 class="text-center mt-sm-3">EDIT A USER ACCOUNT</h3>

                <form action="{{ route('user-update', $user->id) }}" method="post"
                    class="d-flex flex-column align-items-start gap-2 gap-md-0 w-100 mt-3 mt-sm-4">
                    @csrf

                    <div class="d-flex flex-column flex-md-row align-items-start gap-2 gap-md-5 mb-md-3 mb-lg-4 w-100">
                        <div class="d-flex flex-column w-100">
                            <label for="first_name" class="mb-1">FIRST NAME</label>
                            <input id="first_name" name="first_name" type="text" value="{{ $user->first_name }}">
                            <x-msg-error field="first_name" />
                        </div>

                        <div class="d-flex flex-column w-100">
                            <label for="last_name" class="mb-1">LAST NAME</label>
                            <input id="last_name" name="last_name" type="text" value="{{ $user->last_name }}">
                            <x-msg-error field="last_name" />
                        </div>
                    </div>

                    <div class="d-flex flex-column mb-md-3 mb-lg-4 w-100">
                        <label for="email" class="mb-1">E-MAIL</label>
                        <input id="email" name="email" type="text" value="{{ $user->email }}">
                        <x-msg-error field="email" />
                    </div>

                    <input type="submit" class="align-self-center mt-3 mt-md-0">
                </form>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div id="account_create" class="form-container border_box py-4 mt-4">
                <h3 class="text-center mt-sm-3">CHANGE PASSWORD</h3>

                <form action="{{ route('password-update', $user->id) }}" method="post"
                    class="d-flex flex-column align-items-start gap-2 gap-md-0 w-100 mt-3 mt-sm-4">
                    @csrf

                    <div class="d-flex flex-column flex-md-row align-items-start gap-2 gap-md-5 mb-md-3 mb-lg-4 w-100">
                        <div class="d-flex flex-column w-100">
                            <label for="password" class="mb-1">PASSWORD</label>
                            <input id="password" name="password" type="password">
                            <x-msg-error field="password" />
                        </div>

                        <div class="d-flex flex-column w-100">
                            <label for="password_confirm" class="mb-1">CONFIRM PASSWORD</label>
                            <input id="password_confirm" name="password_confirm" type="password">
                            <x-msg-error field="password_confirm" />
                        </div>
                    </div>

                    <input type="submit" class="align-self-center mt-3 mt-md-0">
                </form>
            </div>
        </div>

    </main>

    <x-footer />

</x-admin.layout>
