<x-admin.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">admin_dashboard</x-slot>

    <x-admin.header />

    <main>

        <div class="container py-5 mt-5">
            <div class="mb-5">
                <x-msg-session key="account-created" class-name="success" />
                <x-msg-session key="account-edit" class-name="success" />
                <x-msg-session key="user-blocked" class-name="success" />
                <x-msg-session key="user-unblocked" class-name="success" />

                <x-msg-session key="article-create" class-name="success" />
                <x-msg-session key="article-edit" class-name="success" />
                <x-msg-session key="article-delete" class-name="success" />

                <x-msg-session key="activity-create" class-name="success" />
                <x-msg-session key="activity-edit" class-name="success" />
                <x-msg-session key="activity-delete" class-name="success" />
                <x-msg-session key="activity-max" class-name="error" />

                <x-msg-session key="reservation-delete" class-name="success" />
            </div>


            <section id="users_admin" class="mb-5 pb-2">
                <div class="accordion">

                    <div class="ps-0 d-flex justify-content-between" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

                        <button class="collapsed accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <h2 class="h3 text-white">users: admin</h2>
                        </button>

                    </div>
                    <hr class="mt-0">

                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">

                        <div class="my-5"><a class="general_button" href="{{ route('admin-create') }}">add</a></div>

                        @foreach ($users_admin as $i => $user_admin)
                            <div class="d-flex justify-content-between pt-3">

                                <div class="infos d-flex @if ($user_admin->deleted_at != null) user_block @endif">
                                    <p class="first_name">{{ $user_admin->first_name }}</p>
                                    <p class="last_name">{{ $user_admin->last_name }}</p>
                                    <p class="email">{{ $user_admin->email }}</p>
                                </div>

                                <div class="buttons d-flex">

                                    @if ($user_admin->deleted_at == null)
                                        <a href="{{ route('admin-edit', $user_admin->id) }}" class="edit me-5">EDIT</a>

                                        <a id="message_modal" class="delete" data-bs-toggle="modal"
                                            data-bs-target="#block_admin_{{ $i }}">BLOCK</a>

                                        <x-admin.modals.modal-admin-block :id='$user_admin->id' :iteration='$i' />
                                    @else
                                        <a id="message_modal" class="delete" data-bs-toggle="modal"
                                            data-bs-target="#unblock_admin_{{ $i }}">UNBLOCK</a>

                                        <x-admin.modals.modal-admin-unblock :id='$user_admin->id' :iteration='$i' />
                                    @endif
                                </div>

                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </section>


            <section id="articles" class="mb-5 pb-2">
                <div class="accordion">

                    <div class="ps-0 d-flex justify-content-between" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">

                        <button class="collapsed accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            <h2 class="h3 text-white">articles</h2>
                        </button>

                    </div>
                    <hr class="mt-0">

                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">

                        <div class="my-5"><a class="general_button" href="{{ route('article-create') }}">add</a>
                        </div>

                        @foreach ($articles as $article)
                            <div class="d-flex justify-content-between pt-3">

                                <div class="infos d-flex">
                                    <p class="article_title">{{ $article->title }}</p>
                                    <p>{{ $article->category->name }}</p>
                                </div>

                                <div class="buttons d-flex">
                                    <a href="{{ route('article-edit', $article->id) }}" class="edit me-5">EDIT</a>

                                    <a id="message_modal" class="delete" data-bs-toggle="modal"
                                        data-bs-target="#delete_article_{{ $i }}">DELETE</a>

                                    <x-admin.modals.modal-article-delete :id='$article->id' :iteration='$i' />
                                </div>

                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </section>



            <section id="activities" class="mb-5 pb-2">
                <div class="accordion">

                    <div class="ps-0 d-flex justify-content-between" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">

                        <button class="collapsed accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                            <h2 class="h3 text-white">activities</h2>
                        </button>

                    </div>
                    <hr class="mt-0">

                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">

                        <div class="my-5"><a class="general_button" href="{{ route('activity-create') }}">add</a>
                        </div>

                        @foreach ($activities as $activity)
                            <div class="d-flex justify-content-between align-items-center pt-3">

                                <div class="infos d-flex align-items-center">
                                    <img src="{{ $activity->image }}" class="image rounded">
                                    <p>{{ $activity->title }}</p>
                                </div>

                                <div class="buttons d-flex">
                                    <a href="{{ route('activity-edit', $activity->id) }}" class="edit me-5">EDIT</a>

                                    <a id="message_modal" class="delete" data-bs-toggle="modal"
                                        data-bs-target="#delete_activity_{{ $i }}">DELETE</a>

                                    <x-admin.modals.modal-activity-delete :id='$activity->id' :iteration='$i' />
                                </div>

                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </section>

            <section id="reservations" class="mb-5 pb-2">
                <div class="accordion">

                    <div class="ps-0 d-flex justify-content-between" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">

                        <button class="collapsed accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                            <h2 class="h3 text-white">reservations</h2>
                        </button>

                    </div>
                    <hr class="mt-0">

                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">

                        @forelse ($reservations as $reservation)
                            <div class="d-flex justify-content-between align-items-center pt-3">

                                <div
                                    class="infos d-flex align-items-center @if ($reservation->user->deleted_at != null) user_block @endif">
                                    <p class="full_name">{{ $reservation->user->first_name }}
                                        {{ $reservation->user->last_name }}</p>
                                    <p class="package_title">{{ $reservation->package->title }}</p>
                                    <p>{{ $reservation->quantity }}</p>
                                </div>

                                <div class="buttons d-flex">

                                    <a id="message_modal" class="delete" data-bs-toggle="modal"
                                        data-bs-target="#delete_reservation_{{ $i }}">DELETE</a>

                                    <x-admin.modals.modal-reservation-delete :id='$reservation->id' :iteration='$i' />
                                </div>

                            </div>
                            <hr>
                        @empty
                            <p>No reservations.</p>
                        @endforelse

                    </div>
                </div>
            </section>


            <section id="users_public" class="mb-5 pb-2">
                <div class="accordion">

                    <div class="ps-0 d-flex justify-content-between" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">

                        <button class="collapsed accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                            <h2 class="h3 text-white">users</h2>
                        </button>

                    </div>
                    <hr class="mt-0">

                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">

                        @foreach ($users_public as $user_public)
                            <div class="d-flex justify-content-between pt-3">

                                <div class="infos d-flex @if ($user_public->deleted_at != null) user_block @endif">
                                    <p class="first_name">{{ $user_public->first_name }}</p>
                                    <p class="last_name">{{ $user_public->last_name }}</p>
                                    <p class="email">{{ $user_public->email }}</p>
                                </div>

                                <div class="buttons d-flex">

                                    @if ($user_public->deleted_at == null)
                                        <a href="{{ route('user-edit', $user_public->id) }}"
                                            class="edit me-5">EDIT</a>

                                        <a id="message_modal" class="delete" data-bs-toggle="modal"
                                            data-bs-target="#block_user_{{ $i }}">BLOCK</a>

                                        <x-admin.modals.modal-user-block :id='$user_public->id' :iteration='$i' />
                                    @else
                                        <a id="message_modal" class="delete" data-bs-toggle="modal"
                                            data-bs-target="#unblock_user_{{ $i }}">UNBLOCK</a>

                                        <x-admin.modals.modal-user-unblock :id='$user_public->id' :iteration='$i' />
                                    @endif
                                </div>

                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </section>


        </div>

    </main>

    <x-footer />

</x-admin.layout>
