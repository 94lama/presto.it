<x-layout>
    <div class="container-fluid margin-nav mb-lg-5">
        <div class="row p-5 mx-lg-5 align-items-center">
            <div class="col-12 d-flex flex-wrap text-center ps-5 pe-5">
                <h6 class="col-1 fs-3 text-center text-nowrap mt-3 ps-5">
                    <span class="border border-2 rounded-4 p-1 ">{{ __("ui.$announcement->category_id") }}</span>
                </h6>
                <h2 class="col-11 px-5 fs-3">{{ $announcement->title }}</h2>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <p class="text-header text-end fs-2 fst-italic lead">{{ $announcement->price }} €</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row announcement-image-main mx-auto mb-2 overflow-hidden">
            <img alt="Immagine selezionata" id="announcementImageSelected" class="img-cover">
        </div>
        <div class="row justify-content-center">
            <div class="col-12 h-show-carousel" id="swiperContainer">
                {{-- <x-carousel> --}}
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @if ($announcement->images && count($announcement->images) > 0)
                            @foreach ($announcement->images as $image)
                                <div class="swiper-slide h-auto">
                                    <img class="img-fluid image-carousel rounded"
                                        src="{{ $image->getUrl(1280, 800) }}" />
                                </div>
                            @endforeach
                        @else
                            <div class="swiper-slide">
                                <img class="img-fluid rounded" src="/images/articles/placeholder.jpg" />
                            </div>
                        @endif
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                {{-- </x-carousel> --}}
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h5>{{ $announcement->body }}
                </h5>
                <p class="card-footer">
                    {{ __('ui.published') }}: {{ $announcement->created_at->format('d/m/Y') }}
                </p>
            </div>
        </div>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    {{-- JS custom --}}
    <script>
        //swiper
        var swiper = new Swiper(".mySwiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            /* autoplay:true, */
            /* loop: true, */
            slidesPerView: 3,
            /* ---------------------------------------------------------- */
            coverflowEffect: {
                rotate: 20,
                stretch: 0,
                depth: 120,
                modifier: 1,
                slideShadows: true,
            },
            pagination: {
                el: ".swiper-pagination",
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
        // Immagine grande
        let imageContainer = document.getElementById('announcementImageSelected');
        let selectedSlide = document.querySelector('.swiper-slide-active');
        imageContainer.src = selectedSlide.childNodes[1].src;

        const centralSlide = document.querySelector('.swiper-slide-next');
        const options = {
            attributes: true
        };

        function callback(mutationList, observer) {
            let selectedSlide = document.querySelector('.swiper-slide-active')
            imageContainer.src = selectedSlide.childNodes[1].src
        };

        const observer = new MutationObserver(callback);
        observer.observe(centralSlide, options);
    </script>

</x-layout>
