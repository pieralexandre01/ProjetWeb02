<x-public.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">public/about</x-slot>

    <x-public.header :page="$page" />

    <main>

        <div class="about">

            <div class="container-fluid ps-5 pt-5">
                <div class="page_title">
                    <h1 class="text-end">ABOUT US</h1>
                    <div class="title_decoration">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-8 pe-5">
                        <p class="paragraph">In 2023, Mirror World was born thanks to Jacqueline Lebel, Patricia Massie, and Pier-Alexandre Auger-Matteau, during their training in Web Design and Programming at Cégep de Saint-Jérôme. Their goal was to create an online festival that would celebrate technological advances while promoting moral and ethical use of technology.</p>
                        <p class="paragraph">Mirror World offers you the opportunity to enjoy the festival from the comfort of your own home, while sipping on your favorite beverages and without having to worry about who will be the designated driver. You can explore the latest technological advancements while socializing with festival-goers from around the world in the comfort of your own home thanks to virtual reality.</p>
                        <p class="paragraph">The Mirror World team strives to offer a varied and stimulating program for all tastes. Renowned guest speakers share their expertise on topics ranging from the ethics of artificial intelligence to virtual reality and advances in robotics. Top artists perform live to offer a unique musical experience, while virtual reality and video game experiences immerse festival-goers in a futuristic world.</p>
                        <p class="paragraph">In summary, Mirror World is a place where festival-goers can imagine the future and explore the endless possibilities of technology, guided by ethical reflection and social responsibility. We hope you will join us to celebrate creativity, ethics, and the exciting future of technology at Mirror World.</p>
                    </div>
                    <div class="col-4">
                        <img src="{{ asset('/../media/images/about.webp') }}" alt="">
                    </div>
                </div>
            </div>

        </div>

    </main>

    <x-public.footer />

</x-public.layout>
