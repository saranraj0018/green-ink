<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    .instaReelSwiper .swiper-pagination-bullet {
        background: #9ca3af;
        /* gray */
        opacity: 1;

    }

    .instaReelSwiper .swiper-pagination-bullet-active {
        background: #008357;
        /* your primary color */
    }

    .instaReelSwiper .swiper-pagination-bullet {
        width: 10px;
        height: 10px;
    }

    .instaReelSwiper .swiper-button-prev,
    .instaReelSwiper .swiper-button-next {
        color: #008357;
        /* arrow color */
    }

    .instaReelSwiper .swiper-button-prev::after,
    .instaReelSwiper .swiper-button-next::after {
        font-size: 22px;
        font-weight: bold;
    }

    .instaReelSwiper .swiper-button-prev,
    .instaReelSwiper .swiper-button-next {
        background: white;
        width: 42px;
        height: 42px;
        border-radius: 50%;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }

    .instaReelSwiper .swiper-button-prev:hover,
    .instaReelSwiper .swiper-button-next:hover {
        background: #008357;
        color: #fff;
    }
</style>
<div class="my-container my-10">
    <h2 class="text-primary text-3xl text-center font-medium">
        Meet our Brand Ambassadors!
    </h2>
    <p class="text-lg font-medium text-center mb-8">
        Real voices. Remarkable journeys. Limitless inspiration.
    </p>

    <!-- Swiper -->
    <div class="swiper instaReelSwiper">
        <div class="swiper-wrapper">
            <!-- Slide 2 -->
            <div class="swiper-slide flex justify-center md:mx-8">
                <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/reel/DRogVY2iZFs/"
                    data-instgrm-version="14">
                </blockquote>
            </div>

            <!-- Slide 3 -->
            <div class="swiper-slide flex justify-center md:mx-8">
                <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/reel/DRoL9yTFLpt/"
                    data-instgrm-version="14">
                </blockquote>
            </div>
            <!-- Slide 3 -->
            <div class="swiper-slide flex justify-center md:mx-8">
                <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/reel/DRmkv6SDMvc/"
                    data-instgrm-version="14">
                </blockquote>
            </div>
            <div class="swiper-slide flex justify-center md:mx-8">
                <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/reel/DRPSiBtjamf/"
                    data-instgrm-version="14">
                </blockquote>
            </div>

            <!-- Slide 2 -->
            <div class="swiper-slide flex justify-center md:mx-8">
                <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/reel/DRHyLwxATlr/"
                    data-instgrm-version="14">
                </blockquote>
            </div>

            <!-- Slide 3 -->
            <div class="swiper-slide flex justify-center md:mx-8">
                <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/reel/DRHyLwxATlr/"
                    data-instgrm-version="14">
                </blockquote>
            </div>
            <!-- Slide 3 -->
            <div class="swiper-slide flex justify-center md:mx-8">
                <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/reel/DRFUPDak6ez/"
                    data-instgrm-version="14">
                </blockquote>
            </div>
            <!-- Slide 3 -->
            <div class="swiper-slide flex justify-center md:mx-8">
                <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/reel/DREX-usEV1e/"
                    data-instgrm-version="14">
                </blockquote>
            </div>
            <!-- Slide 3 -->
            <div class="swiper-slide flex justify-center md:mx-8">
                <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/reel/C_mkxwMSvoF/"
                    data-instgrm-version="14">
                </blockquote>
            </div>

        </div>


        <!-- Navigation -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <!-- Pagination -->
        <div class="swiper-pagination"></div>

    </div>
</div>

<!-- Instagram Embed -->
<script async src="//www.instagram.com/embed.js"></script>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    const instaSwiper = new Swiper(".instaReelSwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 4,
            },
        },
        on: {
            slideChangeTransitionEnd: function() {
                if (window.instgrm) {
                    window.instgrm.Embeds.process();
                }
            }
        }
    });

    // Initial load
    window.addEventListener("load", () => {
        if (window.instgrm) {
            window.instgrm.Embeds.process();
        }
    });
</script>
