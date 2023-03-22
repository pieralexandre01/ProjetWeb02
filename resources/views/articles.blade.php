<x-public.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">public/articles</x-slot>

    <x-public.header :page="$page" />

    <main>

        <div class="container pt-5">
            <div class="page_title">

                <h1 class="text-end">ARTICLES</h1>

                <div class="title_decoration">
                    <div class="circle"></div>
                </div>

            </div>
        </div>

    </main>

    <x-public.footer />

</x-public.layout>
