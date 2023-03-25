<x-public.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    {{-- <x-slot name="css_file">public/activities</x-slot> --}}
    <x-slot name="css_file">public/articles</x-slot>

    <x-public.header :page="$page" />

    {{-- <main></main> --}}

    <main id="article">

        <div class="page_title">
            <h1 class="text-end">ARTICLES</h1>

            <div class="title_decoration">
                <div class="circle"></div>
            </div>

            <div class="breadcrumb_trail d-none d-md-block container pt-2 text-end">
                <span>
                    <a href="{{ route('articles') }}">articles</a>
                </span>
                <span class="mx-2">></span>
                {{-- lien vers une catégorie de la page d'articles --}}
                <span>
                    <a href="{{ route('articles') }}#">virtual reality</a>
                </span>
                <span class="mx-3">></span>
                <span class="current_article">
                    {{-- make link below disabled --}}
                    <a href="#" aria-current="{{ $page }}">Beyond reality: ...</a>
                </span>
            </div>
        </div>

        <div class="content container">

            <div class="d-flex flex-column">
                <div class="d-flex flex-column ">
                    <div class="d-flex flex-column">
                        <h3 class="text-end">BEYOND REALITY: VR REVOLUTION</h3>
                        <span class="hr mt-3 mb-2 text-start">
                            <div class="d-flex">
                                <span>by Angela Doe</span>
                                <span class="date ms-md-5">2023-02-08</span>
                            </div>
                        </span>
                    </div>
                    <span class="pill_box">
                        <span class="category_tag d-flex align-self-center">virtual reality</span>
                    </span>
                </div>

                <p class="mb-0 mt-5">Virtual reality is transforming the way we interact with the world, from immersive gaming experiences to revolutionizing education and training. Discover how VR is changing the way we experience reality.</p>


            </div>

        </div>
    </main>


    <x-public.footer />

</x-public.layout>
