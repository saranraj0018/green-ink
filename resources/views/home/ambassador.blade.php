<style>
    .video-swiper {
    width: 100%;
    padding: 10px 0;
}

.video-swiper .swiper-slide {
    height: auto;
}

.shorts-box {
    position: relative;
    width: 100%;
    aspect-ratio: 9 / 16; /* YouTube Shorts */
    background: #000;
    border-radius: 12px;
    overflow: hidden;
}

.shorts-box iframe {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    border: 0;
}
/* NAV BUTTON BASE */
.video-swiper .swiper-button-prev,
.video-swiper .swiper-button-next {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: #ffffff;
    border: 2px solid #22c55e; /* green */
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    transition: all 0.3s ease;
}

/* ICON COLOR */
.video-swiper .swiper-button-prev::after,
.video-swiper .swiper-button-next::after {
    font-size: 16px;
    font-weight: bold;
    color: #22c55e; /* green icon */
}

/* HOVER EFFECT */
.video-swiper .swiper-button-prev:hover,
.video-swiper .swiper-button-next:hover {
    background: #22c55e;
}

.video-swiper .swiper-button-prev:hover::after,
.video-swiper .swiper-button-next:hover::after {
    color: #ffffff;
}

/* POSITION FIX */
.video-swiper .swiper-button-prev {
    left: -10px;
}

.video-swiper .swiper-button-next {
    right: -10px;
}

/* MOBILE ADJUSTMENT */
@media (max-width: 640px) {
    .video-swiper .swiper-button-prev,
    .video-swiper .swiper-button-next {
        width: 38px;
        height: 38px;
    }

    .video-swiper .swiper-button-prev::after,
    .video-swiper .swiper-button-next::after {
        font-size: 14px;
    }
}
</style>

<section class="my-container mt-10">
    <h2 class="text-primary text-lg md:text-3xl text-center font-medium mb-10"> Real voices. Remarkable journeys. Limitless inspiration. </h2>
<div class="swiper video-swiper swiper-initialized swiper-horizontal swiper-backface-hidden">
    <div class="swiper-wrapper" id="swiper-wrapper-1c101c779f7a3c526" aria-live="polite">




            <div class="swiper-slide swiper-slide-active" style="width: 285.75px; margin-right: 16px;" role="group" aria-label="1 / 4" data-swiper-slide-index="0">
                <div class="shorts-box">
                    <iframe src="https://www.youtube.com/embed/Jx-L3qz7gRI?rel=0&amp;modestbranding=1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="">
                    </iframe>
                </div>
            </div><div class="swiper-slide swiper-slide-next" style="width: 285.75px; margin-right: 16px;" role="group" aria-label="2 / 4" data-swiper-slide-index="1">
                <div class="shorts-box">
                    <iframe src="https://www.youtube.com/embed/s5AocL0gSOQ?rel=0&amp;modestbranding=1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="">
                    </iframe>
                </div>
            </div><div class="swiper-slide" style="width: 285.75px; margin-right: 16px;" role="group" aria-label="3 / 4" data-swiper-slide-index="2">
                <div class="shorts-box">
                    <iframe src="https://www.youtube.com/embed/3K_YYr6DWcE?rel=0&amp;modestbranding=1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="">
                    </iframe>
                </div>
            </div><div class="swiper-slide" style="width: 285.75px; margin-right: 16px;" role="group" aria-label="4 / 4" data-swiper-slide-index="3">
                <div class="shorts-box">
                    <iframe src="https://www.youtube.com/embed/K4-zUFr9Pj4?rel=0&amp;modestbranding=1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="">
                    </iframe>
                </div>
            </div></div>

    <!-- dots -->
    <!--<div class="swiper-pagination"></div>-->

    <!-- arrows -->
    <div class="swiper-button-prev bg-white rounded-full px-3 text-primary swiper-button-lock" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-1c101c779f7a3c526"></div>
    <div class="swiper-button-next bg-white rounded-full px-3 text-primary swiper-button-lock" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-1c101c779f7a3c526"></div>
<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
</section>
<script>
document.addEventListener('DOMContentLoaded', () => {
    new Swiper('.video-swiper', {
        loop: true,
        spaceBetween: 16,

        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 4,
            },
        },
    });
});
</script>
