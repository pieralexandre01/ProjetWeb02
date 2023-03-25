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

            <div class="breadcrumb_trail d-none d-md-block container pt-2 text-end">
                <span>
                    <a href="{{ route('articles') }}">articles</a>
                </span>
                <span class="mx-1 mx-lg-2">></span>
                {{-- lien vers une catégorie de la page d'articles --}}
                <span>
                    <a href="{{ route('articles') }}#">artificial intelligence</a>
                </span>
                <span class="mx-1 mx-lg-2">></span>
                <span class="current_article">
                    {{-- make link below disabled --}}
                    <a href="#" aria-current="{{ $page }}">Beyond reality...</a>
                </span>
            </div>
        </div>

        <div class="content container px-4">

            <div class="d-flex flex-column">
                <div class="d-flex flex-column ">
                    <div class="d-flex flex-column">
                        <h3 class="text-end">{{ $article->title }}</h3>
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
    </main>

    <x-public.footer />

</x-public.layout>

