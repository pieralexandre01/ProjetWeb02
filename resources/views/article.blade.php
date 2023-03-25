<x-public.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">public/article</x-slot>

    <x-public.header :page="$page" />

    <main>

        <div class="page_title">
            <h1 class="text-end">ARTICLES</h1>

            <div class="title_decoration">
                <div class="circle"></div>
            </div>

            <div class="breadcrumb_trail d-none d-md-block container pt-5 d-flex gap-4 gap-xl-4 gap-xxl-5">
                <span>
                    <a href="{{ route('articles') }}">articles</a>
                </span>
                <span>
                    >
                </span>
                {{-- lien vers une catégorie de la page d'articles --}}
                <span>
                    <a href="{{ route('articles') }}#{{ $category->title }}">{{ $category->title }}</a>
                </span>
                <span>
                    >
                </span>
                <span class="current_article">
                    <a href="#" aria-current="{{ $page }}">{{ $article->title }}</a>
                </span>
            </div>
        </div>

        <div class="container">

            <div class="d-flex flex-column">
                <div class="d-flex flex-column flex-md-row justify-content-md-between">
                    <div class="d-flex flex-column">
                        <h3 class="mb-4 mb-md-0 text-end text-md-start">BEYOND REALITY: VR REVOLUTION</h3>
                        <span class="hr mt-3 mb-2 mb-md-0 text-start">
                            <div class="d-flex flex-column flex-md-row">
                                <span>by Angela Doe</span>
                                <span class="date ms-md-5">2023-02-08</span>
                            </div>
                        </span>
                    </div>
                    <span class="pill_box">
                        <span class="category_tag d-flex align-self-center ms-md-5">virtual reality</span>
                    </span>
                </div>
                <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-end mt-4">
                    <p class="mb-0">Virtual reality is transforming the way we interact with the world, from immersive gaming experiences to revolutionizing education and training. Discover how VR is changing the way we experience reality.</p>
                    <button class="read_more_button mt-5 ms-md-4 text-md-end">read more</button>
                </div>
            </div>

        </div>
    </main>

    <x-public.footer />

</x-public.layout>

