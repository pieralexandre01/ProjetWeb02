<x-admin.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">admin_dashboard</x-slot>

    <x-admin.header />

    {{-- comment arranger le footer qui embarque sur le contenu? --}}

    {{-- à mettre dans le fichier css ------------------------------------------------------------------------------ --}}
    <style>
        .accordion-button,
        .accordion-button:not(.collapsed) {
            background-color: transparent;
        }

        .accordion-button:not(.collapsed)::after,
        .accordion-button.collapsed::before {
            color: #fff;
        }

        div.arrow {
            background-color: #fff;
            width: 30px;
            /* changer pour la bonne couleur */
            color: blue;
        }
    </style>
    {{-- --------------------------------------------------------------------------------------------------------- --}}

    <main>

        <div class="container pt-5 mt-5">

            <section id="users_admin">
                <div class="accordion">

                    <div class="collapsed ps-0 d-flex justify-content-between" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        {{-- mettre le style du h3 au h2 --}}
                        <h2 class="text-white">admin</h2>
                        <div class="arrow d-flex justify-content-center align-items-center">
                            <div>V</div> {{-- toggle sur une flèche qui change de direction (et couleur?) --}}
                        </div>
                    </div>
                    <hr class="mt-0">

                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        {{-- styliser le bouton --}}
                        <div class="my-5"><a href="">add</a></div>

                        @foreach ($users_admin as $user_admin)
                            <div class="d-flex justify-content-between pt-3">

                                <div class="infos d-flex">
                                    {{-- ajuster les distances --}}
                                    <p class="">{{ $user_admin->email }}</p>
                                    <p class="">{{ $user_admin->first_name }}</p>
                                    <p class="">{{ $user_admin->last_name }}</p>
                                </div>

                                <div class="buttons d-flex">
                                    {{-- changer les couleurs et hover --}}
                                    <a href="" class="me-4">modifier</a>
                                    <a href="">supprimer</a>
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
