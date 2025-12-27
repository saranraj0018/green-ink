<!-- Swiper CSS -->
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>

<!-- Slider -->
<div class="swiper mySwiper w-full relative">
    <div class="swiper-wrapper">
        <a href="/courses" class="swiper-slide">
            <img src="/assets/hero-banner.png" alt="banner">
        </a>
        <a href="/courses" class="swiper-slide">
            <img src="/assets/banner2.png" alt="banner">
        </a>
        <a href="/courses" class="swiper-slide">
            <img src="/assets/banner3.png" alt="banner">
        </a>
    </div>

    <!-- Navigation -->
    <button class="swiper-btn prev-btn">‹</button>
    <button class="swiper-btn next-btn">›</button>
</div>

<style>
.mySwiper {
    width: 100%;
    height: 85vh;
    position: relative;
}

@media (max-width: 769px) {
    .mySwiper {
        height: 50vh !important;
    }
}
@media (max-width: 420px) {
    .mySwiper {
        height: 25vh !important;
    }
}

.mySwiper .swiper-slide {
    width: 100%;
    height: 100%;
}

.mySwiper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.swiper-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
    background: rgba(0, 0, 0, 0.5);
    color: #fff;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    border: none;
    cursor: pointer;
    font-size: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.prev-btn { left: 20px; }
.next-btn { right: 20px; }
</style>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
new Swiper(".mySwiper", {
    slidesPerView: 1,
    loop: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".next-btn",
        prevEl: ".prev-btn",
    },
});
</script><!-- Tabs Wrapper -->
<section class="mt-10 lg:mt-10 mb-10">

    <!-- Tabs -->
    <div class="flex flex-col md:flex-row justify-center mx-auto w-max bg-yellow-500 rounded-2xl md:rounded-full p-1 space-x-4">
        <button class="tab-btn active-tab px-2 py-1 font-semibold text-sm text-primary" data-tab="tab1">Non-Technical
            Exams</button>
        <button class="tab-btn px-2 py-1 font-semibold text-sm text-primary" data-tab="tab2">Technical Exams</button>
        <button class="tab-btn px-2 py-1 font-semibold text-sm text-primary" data-tab="tab3">Seasonal /
            Notification-Based Courses</button>
        <button class="tab-btn px-2 py-1 font-semibold text-sm text-primary" data-tab="tab4">Green Ink - Junior
            IAS</button>
    </div>

    <!-- TAB CONTENT 1 -->
    <div id="tab1" class="tab-content block">
        <section class="my-10">
            <div class="my-container space-y-5">

                <h2 class="text-center text-2xl font-bold text-gray-800">
                    Non-Technical Exams
                </h2>
                <p class="text-center text-sm md:text-lg text-gray-600">
                    Coaching for TNPSC, Banking, SSC, Railways, <br>TET & TNUSRB with concept clarity, exam-oriented
                    practice and personalised support.
                </p>

                @php
                    $categories = [
                        [
                            'icon' => '/assets/in1.png',
                            'title' => 'TNPSC (Group I, II, IIA, IV)',
                            'courses' => 'Complete syllabus coverage, test series, revision plans & 1-to-1 guidance.',
                        ],
                        [
                            'icon' => '/assets/in2.png',
                            'title' => 'Banking (IBPS | SBI | Others)',
                            'courses' =>
                                'Aptitude speed, mock tests & interview readiness for national-level recruitment.',
                        ],
                        [
                            'icon' => '/assets/in3.png',
                            'title' => 'SSC (Central government staff selection exams)',
                            'courses' => 'Foundation strengthening, accuracy training & time-managed revision.',
                        ],
                        [
                            'icon' => '/assets/in4.png',
                            'title' => 'Railways (RRB)',
                            'courses' => 'Pattern analysis, regular practice & performance-based mocks.',
                        ],
                        [
                            'icon' => '/assets/in5.png',
                            'title' => 'TET (Teacher Eligibility Test)',
                            'courses' => 'Pedagogy, child psychology & exam-specific preparation.',
                        ],
                        [
                            'icon' => '/assets/in6.png',
                            'title' => 'TNUSRB (Police, Jail Warder, and Fire & Rescue Services exams)',
                            'courses' => 'Written tests, physical test guidance & mental readiness.',
                        ],
                    ];
                @endphp

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                    @foreach ($categories as $category)
                        <div
                            class="flex items-center gap-3 md:gap-8 bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100">
                            <div class="bg-green-50 p-2 rounded-full">
                                <img src="{{ $category['icon'] }}"/>
                            </div>

                            <div class="space-y-2">
                                <h3 class="text-[13px] font-semibold text-[#533B04]">
                                    {{ $category['title'] }}
                                </h3>
                                <p class="text-sm font-medium">
                                    {{ $category['courses'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
    </div>

    <!-- TAB CONTENT 2 -->
    <div id="tab2" class="tab-content hidden p-6">
        <section class="my-10">
            <div class="my-container space-y-5">
                <p class="text-center text-sm md:text-lg text-gray-600">
                    Specialised training for Engineering & Diploma-based exams with core subjects, numerical
                    problem-solving & exam strategies.
                </p>

                @php
                    $categories = [
                        ['icon' => 'development', 'title' => 'Engineering', 'courses' => '150+ Courses'],
                        ['icon' => 'DataScience', 'title' => 'Diploma-based exams', 'courses' => '150+ Courses'],
                    ];
                @endphp

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                    @foreach ($categories as $category)
                        <div
                            class="flex items-center gap-3 md:gap-8 bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100">
                            <div class="bg-green-50 p-4 rounded-full">
                                <span class="{{ $category['icon'] }}"></span>
                            </div>

                            <div class="space-y-2">
                                <h3 class="text-[13px] font-semibold text-[#533B04]">
                                    {{ $category['title'] }}
                                </h3>
                                <p class="text-sm font-medium">
                                    {{ $category['courses'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
    </div>

    <!-- TAB CONTENT 3 -->
    <div id="tab3" class="tab-content hidden p-6 text-center">
        <div class="my-container">
            <div class="grid grid-cols-12 gap-3">
                <div class="col-span-12 md:col-span-4">
                    <img src="/assets/2nd-img.png" alt="2ndimg">
                </div>
                <div class="col-span-12 md:col-span-8 flex flex-col justify-center items-center">
                    <p class="text-2xl font-medium">
                        Fast-track, high-intensity coaching for fresh government exam notifications within short
                        timelines.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div id="tab4" class="tab-content hidden p-6 text-center">
        <div class="my-container">
            <div class="grid grid-cols-12 gap-3">
                <div class="col-span-12 md:col-span-4">
                    <img src="/assets/2nd-img.png" alt="2ndimg">
                </div>
                <div class="col-span-12 md:col-span-8 flex flex-col justify-center items-center">
                    <p class="text-2xl font-medium">
                        Foundation program for school & college aspirants to build reasoning, discipline, and early
                        civil-services awareness.
                    </p>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- Tab JS -->
<script>
    const tabBtns = document.querySelectorAll(".tab-btn");
    const tabContents = document.querySelectorAll(".tab-content");

    tabBtns.forEach(btn => {
        btn.addEventListener("click", () => {

            tabBtns.forEach(b => b.classList.remove("active-tab"));
            btn.classList.add("active-tab");

            const tab = btn.getAttribute("data-tab");

            tabContents.forEach(content => {
                content.classList.add("hidden");
                content.classList.remove("block");
            });

            document.getElementById(tab).classList.add("block");
            document.getElementById(tab).classList.remove("hidden");

        });
    });
</script>

<!-- Style for Active Tab -->
<style>
    .active-tab {
        background: white;
        border-radius: 50px;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", () => {

        const development = `
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
            <g clip-path="url(#clip0_465_42)">
                <path d="M25.4883 50C17.2176 50 10.4881 38.7852 10.4881 25C10.4881 11.2148 17.2176 0 25.4883 0C33.7589 0 40.4884 11.2148 40.4884 25C40.4884 38.7852 33.7589 50 25.4883 50ZM25.4883 1.66664C18.1362 1.66664 12.1548 12.1338 12.1548 25C12.1548 37.8662 18.1362 48.3334 25.4883 48.3334C32.8403 48.3334 38.8218 37.8666 38.8218 25C38.8218 12.1334 32.8403 1.66664 25.4883 1.66664Z" fill="#F0C419"/>
                <path d="M35.5125 42.7479C30.2181 42.7479 23.9697 41.0271 17.9882 37.574C5.85136 30.566 -0.658417 19.0376 3.47672 11.8752C7.61147 4.7123 20.8488 4.58488 32.9884 11.5925C45.1252 18.6008 51.635 30.1289 47.4998 37.2917C45.4021 40.9248 40.9626 42.7479 35.5125 42.7479ZM15.3923 8.02727C10.5858 8.02727 6.72455 9.58328 4.9202 12.7083C1.24435 19.075 7.48062 29.5826 18.8217 36.1305C30.1643 42.6788 42.3813 42.8253 46.0564 36.4582C49.7314 30.0911 43.4959 19.5843 32.1548 13.0363C26.3798 9.7023 20.3777 8.02727 15.3923 8.02727Z" fill="#955BA5"/>
                <path d="M15.464 42.7479C10.0132 42.7479 5.57442 40.9252 3.47672 37.2917C-0.658417 30.1289 5.85136 18.6008 17.9882 11.5925C30.1262 4.58527 43.3643 4.71191 47.4998 11.8752C51.6357 19.038 45.1252 30.566 32.9884 37.574C27.0077 41.0267 20.7584 42.7479 15.464 42.7479ZM18.8217 13.0363C7.48062 19.5843 1.24435 30.0915 4.9202 36.4582C8.59642 42.8249 20.8134 42.6781 32.1548 36.1305C43.4967 29.5826 49.7322 19.075 46.0564 12.7083C42.3798 6.34041 30.1632 6.48766 18.8217 13.0363Z" fill="#E64C3C"/>
                <path d="M25.4883 15.0002C21.8048 15.0002 18.8217 15.8669 18.8217 16.9334V31.3999C18.8217 32.4665 21.8048 33.3332 25.4883 33.3332C29.1718 33.3332 32.1548 32.4665 32.1548 31.3999V16.9334C32.1548 15.8669 29.1718 15.0002 25.4883 15.0002Z" fill="#F0C419"/>
                <path d="M32.1548 16.9334C32.1548 17.9916 29.1718 18.8583 25.4883 18.8583C21.8048 18.8583 18.8217 17.9916 18.8217 16.9334C18.8217 15.8669 21.8048 15.0002 25.4883 15.0002C29.1718 15.0002 32.1548 15.8669 32.1548 16.9334Z" fill="#F3D55B"/>
                <path d="M32.1548 16.9334V21.7583C32.1548 22.8168 29.1718 23.6832 25.4883 23.6832C21.8048 23.6832 18.8217 22.8168 18.8217 21.7583V16.9334C18.8217 17.9916 21.8048 18.8583 25.4883 18.8583C29.1718 18.8583 32.1548 17.9916 32.1548 16.9334Z" fill="#F0C419"/>
                <path d="M32.1548 21.7583V26.5751C32.1548 27.6417 29.1718 28.5084 25.4883 28.5084C21.8048 28.5084 18.8217 27.6417 18.8217 26.5751V21.7583C18.8217 22.8168 21.8048 23.6832 25.4883 23.6832C29.1718 23.6832 32.1548 22.8168 32.1548 21.7583Z" fill="#F29C1F"/>
                <path d="M32.1548 26.5751V31.3999C32.1548 32.4665 29.1718 33.3332 25.4883 33.3332C21.8048 33.3332 18.8217 32.4665 18.8217 31.3999V26.5751C18.8217 27.6417 21.8048 28.5084 25.4883 28.5084C29.1718 28.5084 32.1548 27.6417 32.1548 26.5751Z" fill="#F0C419"/>
                <path d="M3.82156 7.50008C1.98059 7.50008 0.488281 6.00777 0.488281 4.16679C0.488281 2.32582 1.98059 0.833511 3.82156 0.833511C5.66254 0.833511 7.15485 2.32582 7.15485 4.16679C7.15294 6.007 5.66177 7.49817 3.82156 7.50008ZM3.82156 2.50015C2.90108 2.50015 2.15492 3.24631 2.15492 4.16679C2.15492 5.08728 2.90108 5.83344 3.82156 5.83344C4.74205 5.83344 5.4882 5.08728 5.4882 4.16679C5.48706 3.24669 4.74167 2.50092 3.82156 2.50015Z" fill="#24AE5F"/>
                <path d="M43.8217 50C41.9807 50 40.4884 48.5077 40.4884 46.6667C40.4884 44.8257 41.9807 43.3334 43.8217 43.3334C45.6627 43.3334 47.155 44.8257 47.155 46.6667C47.1531 48.5069 45.6619 49.9981 43.8217 50ZM43.8217 45.0001C42.9012 45.0001 42.1551 45.7462 42.1551 46.6667C42.1551 47.5872 42.9012 48.3334 43.8217 48.3334C44.7422 48.3334 45.4884 47.5872 45.4884 46.6667C45.4872 45.7466 44.7418 45.0012 43.8217 45.0001Z" fill="#24AE5F"/>
                <path d="M46.3215 2.50015C45.8614 2.50015 45.4884 2.12708 45.4884 1.66664V0.833511C45.4884 0.373077 45.8614 0 46.3215 0C46.7819 0 47.155 0.373077 47.155 0.833511V1.66664C47.155 2.12708 46.7819 2.50015 46.3215 2.50015Z" fill="#F0C419"/>
                <path d="M46.3215 6.66656C45.8614 6.66656 45.4884 6.29349 45.4884 5.83344V4.99992C45.4884 4.53987 45.8614 4.16679 46.3215 4.16679C46.7819 4.16679 47.155 4.53987 47.155 4.99992V5.83344C47.155 6.29349 46.7819 6.66656 46.3215 6.66656Z" fill="#F0C419"/>
                <path d="M44.6548 4.16679H43.8217C43.3613 4.16679 42.9882 3.79372 42.9882 3.33328C42.9882 2.87323 43.3613 2.50015 43.8217 2.50015H44.6548C45.1153 2.50015 45.4884 2.87323 45.4884 3.33328C45.4884 3.79372 45.1153 4.16679 44.6548 4.16679Z" fill="#F0C419"/>
                <path d="M48.8216 4.16679H47.9881C47.5281 4.16679 47.155 3.79372 47.155 3.33328C47.155 2.87323 47.5281 2.50015 47.9881 2.50015H48.8216C49.2817 2.50015 49.6548 2.87323 49.6548 3.33328C49.6548 3.79372 49.2817 4.16679 48.8216 4.16679Z" fill="#F0C419"/>
                <path d="M3.82156 45.8332C3.36151 45.8332 2.98843 45.4601 2.98843 45.0001V44.1666C2.98843 43.7065 3.36151 43.3334 3.82156 43.3334C4.282 43.3334 4.65508 43.7065 4.65508 44.1666V45.0001C4.65508 45.4601 4.282 45.8332 3.82156 45.8332Z" fill="#F0C419"/>
                <path d="M3.82156 50C3.36151 50 2.98843 49.6269 2.98843 49.1665V48.3334C2.98843 47.8729 3.36151 47.4998 3.82156 47.4998C4.282 47.4998 4.65508 47.8729 4.65508 48.3334V49.1665C4.65508 49.6269 4.282 50 3.82156 50Z" fill="#F0C419"/>
                <path d="M2.15492 47.4998H1.32179C0.861359 47.4998 0.488281 47.1268 0.488281 46.6667C0.488281 46.2063 0.861359 45.8332 1.32179 45.8332H2.15492C2.61536 45.8332 2.98843 46.2063 2.98843 46.6667C2.98843 47.1268 2.61536 47.4998 2.15492 47.4998Z" fill="#F0C419"/>
                <path d="M6.32172 47.4998H5.4882C5.02815 47.4998 4.65508 47.1268 4.65508 46.6667C4.65508 46.2063 5.02815 45.8332 5.4882 45.8332H6.32172C6.78177 45.8332 7.15485 46.2063 7.15485 46.6667C7.15485 47.1268 6.78177 47.4998 6.32172 47.4998Z" fill="#F0C419"/>
            </g>
            <defs>
                <clipPath id="clip0_465_42">
                <rect width="50" height="50" fill="white"/>
                </clipPath>
            </defs>
        </svg>
    `;

        const DataScience = `
    <svg xmlns="http://www.w3.org/2000/svg" width="39" height="50" viewBox="0 0 39 50" fill="none">
        <path d="M20.5078 36.8164V42.6758C20.5078 43.4844 19.8516 44.1406 19.043 44.1406C18.2344 44.1406 17.5781 43.4844 17.5781 42.6758V36.8164C17.5781 36.0078 18.2344 35.3516 19.043 35.3516C19.8516 35.3516 20.5078 36.0078 20.5078 36.8164Z" fill="#E0F4FE"/>
        <path d="M20.5078 36.8164V42.6758C20.5078 43.4844 19.8516 44.1406 19.043 44.1406V35.3516C19.8516 35.3516 20.5078 36.0078 20.5078 36.8164Z" fill="#BCDBFD"/>
        <path d="M37.2764 26.7168L31.417 23.7871C31.0049 23.5811 30.5186 23.5811 30.1064 23.7871L19.043 29.3193L7.97949 23.7871C7.56738 23.5811 7.08105 23.5811 6.66894 23.7871L0.80957 26.7168C0.313477 26.9648 0 27.4727 0 28.0273C0 28.582 0.313477 29.0898 0.80957 29.3379L18.3877 38.127C18.5938 38.2295 18.8184 38.2812 19.043 38.2812C19.2676 38.2812 19.4922 38.2295 19.6982 38.127L37.2764 29.3379C37.7725 29.0898 38.0859 28.582 38.0859 28.0273C38.0859 27.4727 37.7725 26.9648 37.2764 26.7168Z" fill="#FF637B"/>
        <path d="M38.0859 28.0273C38.0859 28.582 37.7725 29.0898 37.2764 29.3379L19.6982 38.127C19.4922 38.2295 19.2676 38.2812 19.043 38.2812V29.3193L30.1064 23.7871C30.5186 23.5811 31.0049 23.5811 31.417 23.7871L37.2764 26.7168C37.7725 26.9648 38.0859 27.4727 38.0859 28.0273Z" fill="#E63950"/>
        <path d="M37.2764 20.8574L31.417 17.9277C31.0049 17.7217 30.5186 17.7217 30.1064 17.9277L19.043 23.46L7.97949 17.9277C7.56738 17.7217 7.08105 17.7217 6.66894 17.9277L0.80957 20.8574C0.313477 21.1055 0 21.6133 0 22.168C0 22.7227 0.313477 23.2305 0.80957 23.4785L18.3877 32.2676C18.5938 32.3701 18.8184 32.4219 19.043 32.4219C19.2676 32.4219 19.4922 32.3701 19.6982 32.2676L37.2764 23.4785C37.7725 23.2305 38.0859 22.7227 38.0859 22.168C38.0859 21.6133 37.7725 21.1055 37.2764 20.8574Z" fill="#979FEF"/>
        <path d="M38.0859 22.168C38.0859 22.7227 37.7725 23.2305 37.2764 23.4785L19.6982 32.2676C19.4922 32.3701 19.2676 32.4219 19.043 32.4219V23.46L30.1064 17.9277C30.5186 17.7217 31.0049 17.7217 31.417 17.9277L37.2764 20.8574C37.7725 21.1055 38.0859 21.6133 38.0859 22.168Z" fill="#6B77E8"/>
        <path d="M32.2266 48.5352H5.85938C5.85938 44.4971 9.14551 41.2109 13.1836 41.2109H24.9023C28.9404 41.2109 32.2266 44.4971 32.2266 48.5352Z" fill="#E0F4FE"/>
        <path d="M32.2266 48.5352H19.043V41.2109H24.9023C28.9404 41.2109 32.2266 44.4971 32.2266 48.5352Z" fill="#BCDBFD"/>
        <path d="M35.1562 48.5352C35.1562 49.3438 34.5 50 33.6914 50H4.39453C3.58594 50 2.92969 49.3438 2.92969 48.5352C2.92969 47.7266 3.58594 47.0703 4.39453 47.0703H33.6914C34.5 47.0703 35.1562 47.7266 35.1562 48.5352Z" fill="#BCDBFD"/>
        <path d="M35.1562 48.5352C35.1562 49.3438 34.5 50 33.6914 50H19.043V47.0703H33.6914C34.5 47.0703 35.1562 47.7266 35.1562 48.5352Z" fill="#9BBAD9"/>
        <path d="M37.2764 14.998L19.6982 6.20898C19.4922 6.10547 19.2676 6.05469 19.043 6.05469C18.8184 6.05469 18.5938 6.10547 18.3877 6.20898L0.80957 14.998C0.313477 15.2461 0 15.7539 0 16.3086C0 16.8633 0.313477 17.3711 0.80957 17.6191L18.3877 26.4082C18.5938 26.5107 18.8184 26.5625 19.043 26.5625C19.2676 26.5625 19.4922 26.5107 19.6982 26.4082L37.2764 17.6191C37.7725 17.3711 38.0859 16.8633 38.0859 16.3086C38.0859 15.7539 37.7725 15.2461 37.2764 14.998Z" fill="#FFCC75"/>
        <path d="M38.0859 16.3086C38.0859 16.8633 37.7725 17.3711 37.2764 17.6191L19.6982 26.4082C19.4922 26.5107 19.2676 26.5625 19.043 26.5625V6.05469C19.2676 6.05469 19.4922 6.10547 19.6982 6.20898L37.2764 14.998C37.7725 15.2461 38.0859 15.7539 38.0859 16.3086Z" fill="#FF9D49"/>
        <path d="M20.5078 1.46484V16.3086C20.5078 17.1172 19.8516 17.7734 19.043 17.7734C18.2344 17.7734 17.5781 17.1172 17.5781 16.3086V1.46484C17.5781 0.65625 18.2344 0 19.043 0C19.8516 0 20.5078 0.65625 20.5078 1.46484Z" fill="#E0F4FE"/>
        <path d="M20.5078 1.46484V16.3086C20.5078 17.1172 19.8516 17.7734 19.043 17.7734V0C19.8516 0 20.5078 0.65625 20.5078 1.46484Z" fill="#BCDBFD"/>
    </svg>
    `;

        const devEls = document.getElementsByClassName('development');
        for (let i = 0; i < devEls.length; i++) {
            devEls[i].innerHTML = development;
        }

        const dsEls = document.getElementsByClassName('DataScience');
        for (let i = 0; i < dsEls.length; i++) {
            dsEls[i].innerHTML = DataScience;
        }


    });
</script>
