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
                    <a href="{{ route('articles') }}#{{ $article->category->name_reference }}">{{ $article->category->name }}</a>
                </span>
                <span class="mx-1 mx-lg-2">></span>
                <span class="current_article">
                    {{ Str::words($article->title, 2) }}
                </span>
            </div>
        </div>

        <div class="content container px-4">

            <div class="d-flex flex-column">
                <div class="d-flex flex-column">
                    <div class="d-flex flex-column">
                        <h3 class="text-end ms-5 ps-5">{{ $article->title }}</h3>

                        <div class="d-flex mt-3 mb-2 text-start">
                            <span class="hr d-flex flex-column flex-sm-row">
                                <span>by {{ $article->author }}</span>
                                <span class="date ms-sm-5">{{ $article->date_creation }}</span>
                            </span>
                        </div>

                    </div>
                    <div>
                        <span class="pill_box">
                            <span class="category_tag">{{ $article->category->name }}</span>
                        </span>
                    </div>
                </div>

                <p class="mb-0 mt-5">{!! $article->formatted_text !!}</p>
            </div>

        </div>

        <section class="suggestions container">
            <p class="sub_title">check out more <span>{{ $article->category->name }}</span> articles :</p>

            <div class="d-flex flex-column flex-xxl-row justify-content-xxl-between">
                @foreach ($more_articles as $article)

                <div class="article_suggestion border_box mobile_frame d-flex flex-column justify-content-between py-5">

                    <h3 lang="en" class="article_suggestion_title mb-4 text-end">{{ $article->title }}</h3>

                    <div>
                        <div class="mt-3">
                            <p class="my-0">
                                <span class="hr">by {{ $article->author }}</span>
                            </p>
                        </div>

                        <p class="date">{{ $article->date_creation }}</p>

                        <p class="mb-0">{{ Str::limit($article->summary, 120) }}</p>

                        <div class=" mt-5">
                            <a href="{{ route('article', $article->id) }}" class="general_button">read more</a>
                        </div>
                    </div>

                 </div>

                @endforeach
            </div>
        </section>

    </main>

    <x-public.footer />

</x-public.layout>

