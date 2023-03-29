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
                                {{ $activity->formatted_title }}
                            </button>
                        </div>
                        {{-- add condition to add background-color accordion-button if show is active --}}
                        <div id="collapse{{ $activity->id }}" class="accordion-collapse collapse @if ($activity->id == 1) show @endif" data-bs-parent="#activity_accordion">
                            <div class="accordion-body px-sm-4 px-md-5">

                                @if ($activity->subcategory != null)
                                    {{-- en lettres majuscules: --}}
                                    <h2>{{ $activity->subcategory }}</h2>
                                @else
                                    <h2>{{ $activity->formatted_title }}</h2>
                                    @endif
                                    <div class="subcategory_bar"></div>

                                <div class="d-flex flex-column flex-md-row-reverse align-items-center">
                                    <div class="d-flex flex-column align-items-center">
                                        <img src="{{ asset('/../' . $activity->image ) }}" class="activity_image"  alt="">
                                        <div class="activity_date align-self-end my-3 mb-md-0 d-none d-md-block">{{ $activity->date }}</div>
                                    </div>

                                    <div class="activity_date align-self-end my-3 d-md-none">{{ $activity->date }}</div>

                                    <p class="mb-0 pb-md-4 pe-md-5">{{ $activity->description }}</p>
                                </div>

                            </div>
                        </div>

                    </div>

                @endforeach

            </div>

        </div>


        <div id="desktop_version" class="container mt-5 d-none d-lg-flex flex-nowrap align-items-center">

            <section id="activity_list" class="d-flex flex-column me-5 justify-content-between">

                <div class="d-flex flex-column justify-content-between">
                    @foreach ($activities as $key => $activity)
                        <button class="activity_button px-3 text-start" type="button" @@click="activity = {{ $key }}" v-show="activity_list == {{ floor($key / 9) + 1}}">
                            {{ $activity->formatted_title }}
                        </button>
                    @endforeach
                </div>

                <div class="activity_list_pagination text-center d-flex justify-content-center align-items-center">
                    <button class="activity_list_button" @@click="activity_list = 1">1</button>
                    <button class="activity_list_button" @@click="activity_list = 2">2</button>
                </div>

            </section>

            <section id="spa">

                @foreach ($activities as $key => $activity)

                    <div class="activity border_box p-5" v-show="{{ $key }} == activity">

                        <h2 class="text-end">{{ $activity->clean_title }}</h2>
                        <div class="subcategory_bar mb-2 w-100"></div>
                        @if ($activity->subcategory != null)
                            {{-- en lettres majuscules: --}}
                            <div class="d-flex flex-nowrap align-items-start justify-content-between">
                                <h3>{{ $activity->subcategory }}</h3>

                                <div class="activity_date pt-1">{{ $activity->date }}</div>
                            </div>

                        @else

                            <div class="activity_date text-end">{{ $activity->date }}</div>

                        @endif

                        <div class="d-flex flex-column flex-md-row-reverse align-items-center mt-4">
                            <div class="d-flex flex-column align-items-center">
                                <img src="{{ asset('/../' . $activity->image ) }}" class="activity_image" alt="">
                            </div>

                            <div class="activity_date align-self-end my-3 d-md-none">{{ $activity->date }}</div>

                            <p class="mb-0 pe-md-5">{{ $activity->description }}</p>
                        </div>

                    </div>

                @endforeach

            </section>
        </div>

    </main>


    <x-public.footer />

</x-public.layout>
