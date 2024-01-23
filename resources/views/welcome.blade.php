<x-layout>
    <header>
        <div class="landing-page">
            {{-- <img src="landingpage/6.jpg" class="h-100" alt="Landing image"> --}}
        </div>
        <div class="z-1 position-absolute text-wrap" style="overflow-wrap:break-word; top: 18vh; right: 5vw">
            <h1 data-aos="fade-down" class="font-title text-white">Pr<span class="text-neon color-tertiary">e</span>sto<span class="text-normal-rounded color-tertiary">.</span>it</h1>
            {{-- <h2 data-aos='fade-left' class="text-header">La comodit<span class="text-normal font-500">à</span> dello shopping</h2> --}}
            <h2 {{-- data-aos='fade-left' --}} class="fade-left text-header text-white">{{ __('ui.subtitle') }}</h2>
        </div>
        <a href="#Novita" class="position-absolute" style="width: 4rem; top:90vh; left: calc(50vw - 1rem);">
            <i class="fa-solid fa-angle-down fa-4x text-neon color-neon fa-beat"></i>
        </a>
    </header>

    <section class="mt-5 px-5" id="Novita">
        <h2 class="ms-5 mb-5">{{ __('ui.latestNews') }}</h2>
        <div class="row p-2 justify-content-center">
            @foreach ($announcements as $announcement)
                <x-card :announcement="$announcement" />
            @endforeach
        </div>
    </section>

    <section class="max-vw-100 container-fluid d-none d-md-block category-swiper">
        <!-- Demo styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

        <!-- Swiper -->

        <div class="swiper mySwiper">
            <div class="swiper-wrapper py-5">
                @foreach ($categories as $category)
                    <div class="swiper-slide bg-transparent text-center">
                        <x-card-category route="$route" :category="$category"></x-card-category>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
        <!-- Initialize Swiper -->
        <script>
            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 5,
                spaceBetween: 10,
                /* breakpoints: {
                    640: {
                        slidePerView: 2,
                        spaceBetween: 20,
                    },
                }, */
                loop: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev"
                }
            });
            /* console.log(swiper); */
        </script>
    </section>

    {{-- ///[Categoria preferita] INSERIRE CATEGORIE ALL'INTERNO --}}
    {{-- <h2>Potrebbero interessarti</>
  <div class="row w-75 mx-auto">
    <x-carousel :elements="$announcements" /> 
  </div> --}}

  {{-- AOS JS --}}
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</x-layout>
