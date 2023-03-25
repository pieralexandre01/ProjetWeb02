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
                <span><button href="#virtual_reality" class="button category_button">virtual reality</button></span>
                <span><button href="#artificial_intelligence" class="button category_button">artificial intelligence</button></span>
                <span><button href="#robotics" class="button category_button">robotics</button></span>
            </div>
        </div>

        <div class=""><img src="{{ asset('/../media/images/articles.webp') }}" class="w-100" alt="Digital image of a robotic hand and a human hand sharing an electric current"></div>

        <div class="container h-100">

            <section id="virtual_reality">
                <h2 class="text-end mb-5">virtual reality</h2>

                <div class="border_box mobile_frame d-flex flex-column py-5">

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

            </section>


            <section id="artificial_intelligence">
                <h2 class="text-end mb-5">artificial intelligence</h2>

                <div class="border_box mobile_frame d-flex flex-column py-5">

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
                            <span class="category_tag d-flex align-self-center ms-md-5">artificial intelligence</span>
                        </span>
                    </div>


                    <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-end mt-4">
                        <p class="mb-0">Virtual reality is transforming the way we interact with the world, from immersive gaming experiences to revolutionizing education and training. Discover how VR is changing the way we experience reality.</p>
                        <button class="read_more_button mt-5 ms-md-4 text-md-end">read more</button>
                    </div>

                </div>
            </section>

            <section id="robotics">

                <h2 class="text-end mb-5">robotics</h2>

                <div class="border_box mobile_frame d-flex flex-column py-5">

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
                            <span class="category_tag d-flex align-self-center ms-md-5">robotics</span>
                        </span>
                    </div>


                    <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-end mt-4">
                        <p class="mb-0">Virtual reality is transforming the way we interact with the world, from immersive gaming experiences to revolutionizing education and training. Discover how VR is changing the way we experience reality.</p>
                        <button class="read_more_button mt-5 ms-md-4 text-md-end">read more</button>
                    </div>

                </div>
            </section>

        </div>
    </main>

    <x-public.footer />

</x-public.layout>
