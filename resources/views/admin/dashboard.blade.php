<x-admin.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">admin_dashboard</x-slot>

    <x-admin.header />

    <main>

        <div class="container py-5 mt-5">

            <x-msg-session key="account-created" class-name="success" />
            <x-msg-session key="account-edit" class-name="success" />
            <x-msg-session key="user-blocked" class-name="success" />
            <x-msg-session key="user-unblocked" class-name="success" />


            <section id="users_admin">
                <div class="accordion">

                    <div class="collapsed ps-0 d-flex justify-content-between" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <h2 class="h3 text-white">admin</h2>
                        </button>

                    </div>
                    <hr class="mt-0">

                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">

                        <div class="my-5"><a class="general_button" href="{{ route('admin-create') }}">add</a></div>

                        @foreach ($users_admin as $user_admin)
                            <div class="d-flex justify-content-between pt-3">

                                <div class="infos d-flex">
                                    {{-- ajuster les distances --}}
                                    <p class="admin_first_name">{{ $user_admin->first_name }}</p>
                                    <p class="admin_last_name">{{ $user_admin->last_name }}</p>
                                    <p class="admin_email">{{ $user_admin->email }}</p>
                                </div>

                                <div class="buttons d-flex">

                                    @if ($user_admin->deleted_at == null)
                                        <a href="{{ route('admin-edit', $user_admin->id) }}" class="edit me-5">EDIT</a>
                                        <a href="{{ route('user-block', $user_admin->id) }}" class="delete">BLOCK</a>
                                    @else
                                        <a href="{{ route('user-unblock', $user_admin->id) }}"
                                            class="delete">UNBLOCK</a>
                                    @endif
                                </div>

                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </section>

        </div>

        </div>

    </main>

    <x-footer />

</x-admin.layout>
