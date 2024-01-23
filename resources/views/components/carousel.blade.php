
<!-- Swiper -->
<div class="swiper mySwiper">
    <div class="swiper-wrapper">
            {{ $slot }}
    </div>
    <div class="swiper-pagination"></div>
</div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        /* autoplay:true, */
        /* loop: true, */
        slidesPerView: 3,
        /* ---------------------------------------------------------- */
        coverflowEffect: {
            rotate: 40,
            stretch: 0,
            depth: 120,
            modifier: 1,
            slideShadows: true,
        },
        pagination: {
            el: ".swiper-pagination",
        },
    });
</script>
