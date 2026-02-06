<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
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

@php

$videos = [
    'MjRwX93nH4c',
    'R4yH86a61d0',
    '9M27ZjZkHQU',
    'VysOhj1dmgQ',
    'nyC-Oa6k8bM',
    'jvGROu6ENWI',
    'ulLPUsdEIUU',
    '45V8rxAXEQQ',
    'P4oxQr4WZMg',
    'rRpYJxgJ0a4',
    'iRDMlhot2J8',
    'KLPVhKpzJLE',
];
@endphp

<section class="my-container mt-20">
    <h2 class="text-primary text-3xl text-center font-medium mb-10"> Real voices. Remarkable journeys. Limitless inspiration. </h2>
<div class="swiper video-swiper">
    <div class="swiper-wrapper">
        @foreach($videos as $id)
            <div class="swiper-slide">
                <div class="shorts-box">
                    <iframe
                        src="https://www.youtube.com/embed/{{ $id }}?rel=0&modestbranding=1"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        @endforeach
    </div>

    <!-- dots -->
    <!--<div class="swiper-pagination"></div>-->

    <!-- arrows -->
    <div class="swiper-button-prev bg-white rounded-full px-3 text-primary"></div>
    <div class="swiper-button-next bg-white rounded-full px-3 text-primary"></div>
</div>
</section>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

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
