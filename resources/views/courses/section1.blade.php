<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<section class="my-container py-10">
    <h2 class="text-black text-lg font-medium mb-6">
        Hear From Our Achievers
    </h2>

    <div class="rounded-3xl bg-cover bg-center bg-no-repeat relative py-10 px-5 h-max"
        style="background-image:url('{{ asset('assets/courses/test-bg.png') }}');">

        <!-- Swiper -->
        <div class="swiper achieverSwiper">
            <div class="swiper-wrapper">

                <!-- Slide 1 -->
                <div class="swiper-slide">
                    <div class="p-8 rounded-3xl border border-white bg-black/40 min-h-50">
                        <div class="flex gap-4 items-center">
                            <img src="/assets/courses/Ellipse 5.png" class="w-14 h-14 rounded-full" />
                            <h2 class="text-white text-lg font-semibold">Arun Kumar</h2>
                        </div>
                        <p class="text-white text-sm mt-4 text-justify">
                            I honestly didn't believe I could clear Group exams before joining GreenInk. Their guidance,
                            practice tests, and constant support changed everything. I cleared it with confidence.”
                        </p>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide">
                    <div class="p-8 rounded-3xl border border-white bg-black/40 min-h-50">
                        <div class="flex gap-4 items-center">
                            <img src="/assets/courses/Ellipse 5.png" class="w-14 h-14 rounded-full" />
                            <h2 class="text-white text-lg font-semibold">Meena Raj</h2>
                        </div>
                        <p class="text-white text-sm mt-4 text-justify">
                            “GreenInk gave me clarity when I was completely confused. The mentors showed me how to
                            prepare, not just what to study. That made all the difference in my Group exam.”
                        </p>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide">
                    <div class="p-8 rounded-3xl border border-white bg-black/40 min-h-50">
                        <div class="flex gap-4 items-center">
                            <img src="/assets/courses/Ellipse 5.png" class="w-14 h-14 rounded-full" />
                            <h2 class="text-white text-lg font-semibold">Sathish Kumar</h2>
                        </div>
                        <p class="text-white text-sm mt-4 text-justify">
                            “I trusted GreenInk and followed their system sincerely. Step by step, my confidence grew —
                            and finally, I cleared the Group exam.”
                        </p>
                    </div>
                </div>

                <!-- Slide 4 -->
                <div class="swiper-slide">
                    <div class="p-8 rounded-3xl border border-white bg-black/40 min-h-50">
                        <div class="flex gap-4 items-center">
                            <img src="/assets/courses/Ellipse 5.png" class="w-14 h-14 rounded-full" />
                            <h2 class="text-white text-lg font-semibold">Priya</h2>
                        </div>
                        <p class="text-white text-sm mt-4 text-justify">
                            “They don't push shortcuts. They teach patiently and make sure you understand everything.
                            That trust helped me clear my exam peacefully.”
                        </p>
                    </div>
                </div>
                <!-- Slide 4 -->
                <div class="swiper-slide">
                    <div class="p-8 rounded-3xl border border-white bg-black/40 min-h-50">
                        <div class="flex gap-4 items-center">
                            <img src="/assets/courses/Ellipse 5.png" class="w-14 h-14 rounded-full" />
                            <h2 class="text-white text-lg font-semibold">Nivetha</h2>
                        </div>
                        <p class="text-white text-sm mt-4 text-justify">
                            “I had many doubts and fear before. GreenInk's mentoring and revision plan helped me stay
                            calm and focused. I cleared my Group exam without stress.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="swiper-pagination mt-6"></div>
        </div>
    </div>
</section>

<script>
    new Swiper(".achieverSwiper", {
        loop: true,
        spaceBetween: 20,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            }
        }
    });
</script>


<!--slider -->

<section class="my-container py-5">
    <h2 class="text-center text-xl font-semibold text-black">Partners with<span
            class="text-center text-xl font-semibold text-[#008357]"> Top Institutions</span> to produce <span
            class="text-center text-xl font-semibold text-[#008357]">Best Quality Education</span></h2>
    <img src="/assets/courses/image 84 (1).png" class=" py-5" alt="parterns" />
</section>

<!--end scetion-->
<section class="my-container pt-5 pb-10">
    <h2 class="text-center text-black text-2xl font-semibold">Can't Find What You're Looking For ?</h2>
    <p class="text-center text-black text-sm font-normal py-3">we're constantly adding new courses. Contact us with
        your suggestions!</p>
    <div class="flex justify-center pt-3">
        <a href="/contact" class="text-center text-white text-lg rounded-3xl py-2 px-10 bg-[#008357] ">GET IN
            TOUCH</a>
    </div>
</section>
