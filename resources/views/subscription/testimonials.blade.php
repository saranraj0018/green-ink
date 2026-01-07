<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

@php
    $reviews = [
        [
            'name' => 'Suresh Kumar',
            'img' => 'https://i.pravatar.cc/40?img=1',
            'rating' => 5,
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt.',
        ],
        [
            'name' => 'Raj',
            'img' => 'https://i.pravatar.cc/40?img=2',
            'rating' => 5,
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt.',
        ],
        [
            'name' => 'Suresh Kumar',
            'img' => 'https://i.pravatar.cc/40?img=3',
            'rating' => 5,
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt.',
        ],
        [
            'name' => 'Raj',
            'img' => 'https://i.pravatar.cc/40?img=4',
            'rating' => 5,
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt.',
        ],
    ];
@endphp
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">

<div class="border border-blue-300 rounded-2xl p-6 bg-white">
    <div class="grid grid-cols-12 gap-6 items-center">

        <!-- LEFT : Rating Summary (UNCHANGED) -->
        <div class="col-span-12 md:col-span-4 flex gap-6">

            <div class="w-1/3">
                <h2 class="text-3xl font-semibold">
                    4.8<span class="text-sm font-normal">/5</span>
                </h2>
                <div class="flex text-yellow-400 text-sm mt-1">★★★★★</div>
                <p class="text-xs text-gray-500 mt-1">120 ratings</p>
            </div>

            <div class="space-y-1 w-2/3">
                @foreach ([80, 60, 40, 20, 10] as $i => $width)
                    <div class="flex items-center gap-2 text-xs">
                        <span class="w-10">{{ 5 - $i }} Star</span>
                        <div class="h-1.5 bg-gray-200 rounded w-full">
                            <div class="h-1.5 bg-yellow-400 rounded" style="width: {{ $width }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

        <!-- RIGHT : Reviews Swiper -->
        <div class="col-span-12 md:col-span-8 relative">
            <div class="swiper reviewSwiper">
                <div class="swiper-wrapper">

                    @foreach ($reviews as $review)
                        <div class="swiper-slide">
                            <div class="bg-gray-100 rounded-xl p-4 h-full">
                                <div class="flex items-center gap-3 mb-2">
                                    <img src="{{ $review['img'] }}" class="w-10 h-10 rounded-full"
                                        alt="{{ $review['name'] }}">
                                    <div>
                                        <p class="text-sm font-medium">{{ $review['name'] }}</p>
                                        <div class="text-yellow-400 text-xs">
                                            {{ str_repeat('★', $review['rating']) }}
                                        </div>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-600 leading-relaxed">
                                    {{ $review['text'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <!-- Navigation -->
            <div class="absolute right-0 top-1/2 -translate-y-1/2 z-10">
                <div class="swiper-button-next text-gray-400! scale-50"></div>
            </div>
            <div class="absolute left-0 top-1/2 -translate-y-1/2 z-10">
                <div class="swiper-button-prev text-gray-400! scale-50"></div>
            </div>
        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script>
    new Swiper(".reviewSwiper", {
        slidesPerView: 2,
        spaceBetween: 12,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            0: {
                slidesPerView: 1
            },
            768: {
                slidesPerView: 2
            }
        }
    });
</script>
