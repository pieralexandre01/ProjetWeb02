<x-public.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">public/articles</x-slot>

    <x-public.header :page="$page" />

    <main>
        <div class="page_title">
            <h1 class="text-end">ARTICLES</h1>

            <div class="title_decoration">
                <div class="circle"></div>
            </div>

            <div class="category_selector container pt-5 d-flex flex-column gap-4 gap-xl-4 gap-xxl-5">

                @foreach ($categories as $category)

                    <span><a href="#{{ $category->name_reference }}" class="category_button d-inline-block">{{ $category->name }}</a></span>

                @endforeach

            </div>
        </div>

        <div class=""><img src="{{ asset('/../media/images/articles.webp') }}" class="w-100" alt="Digital image of a robotic hand and a human hand sharing an electric current"></div>

        <div class="container">

            @foreach ($categories as $category)

            <section id="{{ $category->name_reference }}">
                <h2 class="text-end mb-5">{{ $category->name }}</h2>

                @foreach ($articles as $article)

                    @if ($article->category->name == $category->name)

                        <div class="article_preview border_box mobile_frame d-flex flex-column py-5">

                            <div class="d-flex flex-column flex-md-row justify-content-md-between">
                                <div class="d-flex flex-column">
                                    <h3 class="mb-4 mb-md-0 text-end text-md-start">{{ $article->title }}</h3>

                                    <div class="d-flex mt-3 mb-2 mb-md-0 text-start">
                                        <span class="hr d-flex flex-column flex-sm-row justify-content-sm-between">
                                            <span>by {{ $article->author }}</span>
                                            <span class="date ms-sm-5">{{ $article->date_creation }}</span>
                                        </span>
                                    </div>
                                </div>

                                <div class="pt-1">
                                    <span class="pill_box">
                                        <span class="category_tag text-start ms-md-5">{{ $category->name }}</span>
                                    </span>
                                </div>
                            </div>

                            <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-end mt-4">
                                <p class="mb-0">{{ $article->summary }}</p>

                                <div><a href="{{ route('article', $article->id) }}" class="general_button d-block d-md-inline-block text-center mt-5 mt-md-0">read more</a></div>
                            </div>
                        </div>

                    @endif

                @endforeach

            </section>

            @endforeach

        </div>
    </main>

    <x-public.footer />

</x-public.layout>
