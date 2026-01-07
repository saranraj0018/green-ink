<div>
    <h2 class="text-center text-xl font-semibold text-black mb-8">
        Partners with
        <span class="text-[#008357]"> Top Institutions </span>
        to produce
        <span class="text-[#008357]"> Best Quality Education</span>
    </h2>

    @php
        $partners = [
            '/assets/courses/logos/icons (1).png',
            '/assets/courses/logos/icons (2).png',
            '/assets/courses/logos/icons (3).png',
            '/assets/courses/logos/icons (4).png',
            '/assets/courses/logos/icons (5).png',
            '/assets/courses/logos/icons (6).png',
            '/assets/courses/logos/icons (7).png',
            '/assets/courses/logos/icons (9).png',
            '/assets/courses/logos/icons (10).png',
            '/assets/courses/logos/icons (11).png',
            '/assets/courses/logos/icons (12).png',
            '/assets/courses/logos/icons (13).png',
            '/assets/courses/logos/icons (14).png',
            '/assets/courses/logos/icons (15).png',
            '/assets/courses/logos/icons (16).png',
            '/assets/courses/logos/icons (17).png',
        ];
    @endphp
    <!-- Swiper -->
    <div class="swiper partnerSwiper h-[200px]">
        <div class="swiper-wrapper">
            @foreach($partners as $logo)
                <div class="swiper-slide flex items-center justify-center">
                    <img
                        src="{{ $logo }}"
                        class="w-30 h-30 object-contain"
                        alt="partner"
                    >
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="swiper-pagination mt-1"></div>
    </div>
</div>

<script>
    new Swiper(".partnerSwiper", {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 2,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            768: {
                slidesPerView: 4,
            },
            1024: {
                slidesPerView: 8,
            }
        }
    });
</script>
