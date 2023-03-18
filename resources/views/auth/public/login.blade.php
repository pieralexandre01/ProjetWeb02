<x-public.layout>
    {{-- <x-slot name="titre"></x-slot> --}}

    <x-public.header />

    <main>

        <div class="container mt-5">
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

                <p class="mt-4">don't have an account? <a href="{{ route('account-create') }}" class="text-decoration-underline">create one</a></p>
            </div>
        </div>

    </main>

    <x-public.footer />

</x-public.layout>
