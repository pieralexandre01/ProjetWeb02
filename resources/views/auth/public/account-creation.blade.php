<x-public.layout>
    {{-- <x-slot name="title"></x-slot> --}}

    <style>
        a:hover,
        button:focus,
        .link:hover,
        .dropdown-item:hover {
            color: var(--dark-turquoise) !important;
        }

        .logo:hover {
            color: var(--vivid-turquoise) !important;
        }

        .user_icon:hover,
        .user_icon:focus {
            background-image: url("../../media/icons/user_icon_turquoise.svg");
        }

        .menu_bar:hover,
        .menu_bar:focus,
        .menu_bar:active {
            background-color: var(--dark-turquoise) !important;
        }

        footer {
            height: 45px !important;
        }

    </style>

    <x-public.header />

    <main>

        <form action="{{ route('account-create') }}" method="post">
            @csrf

            {{-- INPUT TYPE HIDDEN IS ALREADY ACTIVE WITH @csrf --}}
            <input type="hidden" name="privilege_type" value="public">
            <input type="text" name="first_name">
            <input type="text" name="last_name">
            <input type="email" name="email">
            <input type="password" name="password" >
            <input type="password" name="password_confirm">
            <input type="submit">
        </form>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

    </main>

    <x-footer />

</x-public.layout>
