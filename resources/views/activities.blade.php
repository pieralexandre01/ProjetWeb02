<x-public.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">public/activities</x-slot>

    <x-public.header :page="$page" />

    <main >
        <div class="page_title">
            <h1 class="text-end">ACTIVITIES</h1>

            <div class="title_decoration">
                <div class="circle"></div>
            </div>
        </div>

        <div class="container mt-5 px-4 px-md-0 d-lg-none">

            <div class="accordion" id="accordion">

                @foreach ($activities as $activity)

                    <div class="accordion-item">
                        <div class="accordion-header">
                            <button class="accordion-button @if ($activity->id != 1) collapsed @endif px-4 px-md-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $activity->id }}" aria-expanded="false" aria-controls="collapse{{ $activity->id }}">
                                {{ $activity->title }}
                            </button>
                        </div>
                        {{-- add condition to add background-color accordion-button if show is active --}}
                        <div id="collapse{{ $activity->id }}" class="accordion-collapse collapse @if ($activity->id == 1) show @endif" data-bs-parent="#activity_accordion">
                            <div class="accordion-body px-sm-4 px-md-5">

                                @if ($activity->subcategory != null)
                                    {{-- en lettres majuscules: --}}
                                    <h2>{{ $activity->subcategory }}</h2>
                                    <div class="subcategory_bar mb-4"></div>
                                @endif

                                <div class="d-flex flex-column flex-md-row-reverse align-items-center">
                                    <div class="d-flex flex-column align-items-center">
                                        <img src="{{ asset('/../' . $activity->image ) }}" class="activity_image"  alt="">
                                        <div class="activity_date align-self-end my-3 mb-md-0 d-none d-md-block">{{ $activity->date }}</div>
                                    </div>

                                    <div class="activity_date align-self-end my-3 d-md-none">{{ $activity->date }}</div>

                                    <p class="mb-0 pb-md-4 pe-md-5">{{ $activity->description }}</p>
                                </div>

                                {{-- ENLEVER ??? : <p>check your e-mail to access this event!</p> --}}
                            </div>
                        </div>

                    </div>

                @endforeach

            </div>

        </div>


        <div class="container mt-5 d-none d-lg-block d-flex flex-row flex-nowrap">

            <section id="activity_list" class="d-flex flex-column">

                @foreach ($activities as $key => $activity)

                    <button class="activity_button px-3" type="button" @@click="activity = {{ $key }}">
                        {{ $activity->title }}
                    </button>

                @endforeach

            </section>


            <section id="spa">

                @foreach ($activities as $key => $activity)
                    <div class="activity border_box px-sm-4 px-md-5" v-show="{{ $key }} == activity">

                        @if ($activity->subcategory != null)
                            {{-- en lettres majuscules: --}}
                            <h2>{{ $activity->subcategory }}</h2>
                            <div class="subcategory_bar mb-4"></div>
                        @endif

                        <div class="d-flex flex-column flex-md-row-reverse align-items-center">
                            <div class="d-flex flex-column align-items-center">
                                <img src="{{ asset('/../' . $activity->image ) }}" class="activity_image" alt="">
                                <div class="activity_date align-self-end my-3 mb-md-0 d-none d-md-block">{{ $activity->date }}</div>
                            </div>

                            <div class="activity_date align-self-end my-3 d-md-none">{{ $activity->date }}</div>

                            <p class="mb-0 pb-md-4 pe-md-5">{{ $activity->description }}</p>
                        </div>

                    </div>

                @endforeach

            </section>
        </div>

    </main>


    <x-public.footer />

</x-public.layout>
