<x-public.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">public/articles</x-slot>

    <x-public.header :page="$page" />

    <main id="article">
        <div class="page_title">
            <h1 class="text-end">ARTICLE</h1>

            <div class="title_decoration">
                <div class="circle"></div>
            </div>

            <div class="breadcrumb_trail d-none d-md-block container pt-2 text-end me-0">
                <span>
                    <a href="{{ route('articles') }}">articles</a>
                </span>
                <span class="mx-1 mx-lg-2">></span>
                {{-- lien vers une catégorie de la page d'articles --}}
                <span>
                    <a href="{{ route('articles') }}#">{{ $article->category->name }}</a>
                </span>
                <span class="mx-1 mx-lg-2">></span>
                <span class="current_article">
                    {{-- make link below disabled --}}
                    <a href="#" aria-current="{{ $page }}">{{ Str::words($article->title, 2) }}</a>
                </span>
            </div>
        </div>

        <div class="content container px-4">

            <div class="d-flex flex-column">
                <div class="d-flex flex-column">
                    <div class="d-flex flex-column">
                        <h3 class="text-end ms-5 ps-5">{{ $article->title }}</h3>
                        <span class="hr mt-3 mb-2 text-start">
                            <div class="d-flex">
                                <span>by {{ $article->author }}</span>
                                <span class="date ms-md-5">{{ $article->date_creation }}</span>
                            </div>
                        </span>
                    </div>
                    <span class="pill_box">
                        <span class="category_tag d-flex align-self-center">{{ $article->category->name }}</span>
                    </span>
                </div>

                <p class="mb-0 mt-5">{!! $article->formatted_text !!}</p>
            </div>

        </div>


        <section class="suggestions container">
            <p class="sub_title">check out more <span>{{ $article->category->name }}</span> articles :</p>

            <div class="d-flex flex-column flex-xxl-row justify-content-xxl-between">
                @foreach ($more_articles as $article)

                    <div class="article_suggestion border_box mobile_frame d-flex flex-column justify-content-between py-5">
                        <h3 class="mb-4 text-end">{{ $article->title }}</h3>

                        <div>
                            <div class="hr mt-3">
                                <p class="my-0">by {{ $article->author }}</p>
                            </div>
                            <p class="date">{{ $article->date_creation }}</p>
                            <p class="mb-0">{{ Str::limit($article->summary, 120) }}</p>
                            <a href="{{ route('article', $article->id) }}">
                                <button href="#" class="general_button mt-5">read more</button>
                            </a>
                            {{-- <a href="#" class="general_button mt-5 ms-md-4">read more</a> --}}
                        </div>
                    </div>

                @endforeach
            </div>
        </section>

    </main>

    <x-public.footer />

</x-public.layout>

