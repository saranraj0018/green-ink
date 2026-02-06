@php
    $mentors = [
        [
            'img' => '/assets/about/mohan.png',
            'role' => 'Ex-Banker | Guest Faculty - RBI & Indian Bank',
            'name' => 'Mohan Kumar',
            'designation' => 'Research Scientist',
            'description' =>
                'With service at BOI, IPPB, and BOM—and a Finance Ministry award to his credit—Mohan Kumar sir has designed GreenInk’s Central Government Exams curriculum, mentoring students to crack exams with confidence.',
            // 'star' => 4.9,
            // 'students' => '25,000+ Students',
            // 'courses' => '8+ Courses',
        ],
        [
            'img' => '/assets/about/profile.png',
            'role' => 'Author | Competitive Exams Expert',
            'name' => 'Ilayaraja Kannan',
            'designation' => 'Research Scientist',
            'description' =>
                ' Renowned TNPSC author and mentor to 200+ government officers, Ilayaraja Kannan sir brings deep exam insight and proven strategies to help aspirants excel. Recipient of the Dr. A.P.J. Abdul Kalam Award.',
            // 'star' => 4.9,
            // 'students' => '25,000+ Students',
            // 'courses' => '8+ Courses',
        ],
    ];
    $galleryImages = [
        '/assets/gallery/img (1).jpg',
        '/assets/gallery/img (2).jpg',
        '/assets/gallery/img (3).jpg',
        '/assets/gallery/img (4).jpg',
        '/assets/gallery/img (5).jpg',
        '/assets/gallery/img (6).jpg',
        
    ];
@endphp


<section class="my-container py-3">
    <h2 class="text-center text-2xl md:text-4xl font-bold text-primary-light">AI-Powered Personalized For Practice
    </h2>
    <p class="text-center text-black text-sm my-2">GreenInk’s AI-integrated LMS transforms practice into smart learning:
    </p>

    <div class="grid grid-cols-12 py-5 gap-5">
        <div class="col-span-12 md:col-span-3 bg-[#f0fffa] shadow-sm font-medium py-5 px-5 rounded-2xl">
            <!--<h2 class="text-center text-black font-medium text-lg">Personalised Learning System</h2>-->
            <p class="text-primary text-[15px] py-1">Practice as much as you want - Unlimited exercises tailored to you
            </p>
        </div>
        <div class="col-span-12 md:col-span-3 bg-[#f0fffa] shadow-sm font-medium py-5 px-5 rounded-2xl">
            <!-- <h2 class="text-center text-black font-medium text-lg"> Expert Mentors</h2>-->
            <p class="text-primary text-[15px] py-1">Personalized reports - Track repeated mistakes and weak areas
            </p>
        </div>
        <div class="col-span-12 md:col-span-3 bg-[#f0fffa] shadow-sm font-medium py-5 px-5 rounded-2xl">
            <!--<h2 class="text-center text-black font-medium text-lg">Smart Assessments & Instant Reports</h2>-->
            <p class="text-primary text-[15px] py-1"> Active recall system - Reinforce learning efficiently</p>
        </div>
        <div class="col-span-12 md:col-span-3 bg-[#f0fffa] shadow-sm font-medium py-5 px-5 rounded-2xl">
            <!-- <h2 class="text-center text-black font-medium text-lg">Flexible Online Learning</h2>-->
            <p class="text-primary text-[15px] py-1">Cognitive-level tracking - Ensures concepts are understood deeply
            </p>
        </div>
    </div>
    <div class="grid grid-cols-12 py-1 gap-5">
        <div class="col-span-12 md:col-span-4 bg-[#f0fffa] shadow-sm font-medium py-5 px-5 rounded-2xl">
            <p class="text-primary text-[15px] py-1">Interactive games - Keep your brain sharp and engaged</p>
        </div>
        <div class="col-span-12 md:col-span-4 bg-[#f0fffa] shadow-sm font-medium py-5 px-5 rounded-2xl">
            <p class="text-primary text-[15px] py-1"> Downloadable & audible notes - Study anywhere, anytime</p>
        </div>
        <div class="col-span-12 md:col-span-4 bg-[#f0fffa] shadow-sm font-medium py-5 px-5 rounded-2xl">
            <p class="text-primary text-[15px] py-1"> Bilingual content - Learn in English or Tamil</p>
        </div>
    </div>
</section>
<section class="my-container py-10" style="background: linear-gradient(0deg, #F8FFFE 0%, #FDD57B 100%);">
    <h2 class="text-center text-xl md:text-3xl font-bold text-primary">Featured on Television
    </h2>
    <p class="text-center text-black text-[16px] my-2">A trusted name in outcome-driven education—recognized on TV for impact, innovation, and results that matter. </p>
    <div class="grid grid-cols-12 gap-3 md:gap-5 mt-10">
        <div class="col-span-12 md:col-span-2 bg-white rounded-2xl p-4 my-auto">
            <p class="text-[15px]">
                GreenInk Academy was featured on Vijay Super Channel, showcasing our dedication to transforming
                education and empowering students across the nation.
            </p>
        </div>
        <div class="col-span-12 md:col-span-4">
            <img src="/assets/about/vijay1.png" class="w-6/7 mx-auto" alt="pic" />
        </div>
        <div class="col-span-12 md:col-span-4">
            <img src="/assets/about/news7.png" class="w-6/7 mx-auto" alt="pic" />
        </div>
        <div class="col-span-12 md:col-span-2 bg-white rounded-2xl p-4 my-auto">
            <p class="text-[15px]">
                GreenInk Academy was featured on News 7 Channel for its innovative approach to competitive exam coaching & The award highlights GreenInk’s commitment to research-driven and result-oriented education.
            </p>
        </div>
    </div>
</section>
@include('about.testimonials')
<section class="my-container my-10 space-y-3">

    <h2
        class="border border-[#573D00] rounded-full bg-[#FFD77B] text-sm md:text-xl font-medium text-[#573D00] px-3 py-1 w-max mx-auto">
        MEET OUR EXPERT MENTORS/TRAINERS
    </h2>
    <h3 class="text-center font-medium text-xl">
        LEARN FROM INDUSTRY LEADERS
    </h3>
    <p class="text-center text-sm">
        Get Personalized guidance from professionals with real-world expertise
    </p>

    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
                <div class="relative bg-white rounded-xl md:flex gap-5 items-start">
                    <!-- Profile Image -->
                    <div class="relative z-10">
                        <span
                            class="absolute left-30 bg-green-900 text-white text-sm px-8 py-1
                    rounded-tl-xl rounded-br-xl z-50 w-max">
                            Mentor
                        </span>
                        <div class="absolute -bottom-2 -right-2 w-full h-full bg-yellow-400 rounded-xl"></div>
                        <img src="/assets/about/sylendra.png" class="relative w-50 h-50 object-cover rounded-xl"
                            alt="Sylendra Babu IPS">
                    </div>

                    <!-- Content -->
                    <div class="flex-1 pt-6">
                        <h3 class="text-lg font-semibold mt-2">
                            Sylendra Babu IPS
                        </h3>

                        <p class="text-sm">
                           Ex-DGP, Tamil Nadu
                        </p>

                        <p class="text-sm mt-2">
                            A guiding force at GreenInk, Sylendra Babu sir inspires aspirants through powerful webinars and mentoring sessions—instilling discipline, clarity, and the mindset to aim higher.
                        </p>

                        {{-- <!-- Rating -->
                        <div class="flex items-center gap-2 mt-3 bg-[#FFD77B] rounded-full px-3 py-1 w-max">
                            <span class="starIcon"></span>
                            <span class="text-sm font-medium">4.9</span>
                        </div>

                        <!-- Stats -->
                        <div class="flex gap-6 mt-4 text-sm text-gray-600">
                            <div class="flex flex-col items-center gap-2">
                                <span class="user"></span>
                                <span class="text-[#BE8400]">25,000+ Students</span>
                            </div>
                            <div class="flex flex-col items-center gap-2">
                                <span class="courses"></span>
                                <span class="text-[#BE8400]">8+ Courses</span>
                            </div>
                        </div> --}}
                    </div>

                </div>
            </div>
        @foreach ($mentors as $mentor)
            <div class="col-span-12 lg:col-span-6">
                <div class="relative bg-white rounded-xl md:flex gap-5 items-start">
                    <!-- Profile Image -->
                    <div class="relative z-10">
                        <span
                            class="absolute left-30 bg-green-900 text-white text-sm px-8 py-1
                    rounded-tl-xl rounded-br-xl z-50 w-max">
                            {{ $mentor['role'] }}
                        </span>
                        <div class="absolute -bottom-2 -right-2 w-full h-full bg-yellow-400 rounded-xl"></div>
                        <img src="{{ asset($mentor['img']) }}" class="relative w-50 h-50 object-cover rounded-xl"
                            alt="{{ $mentor['name'] }}">
                    </div>

                    <!-- Content -->
                    <div class="flex-1 pt-6">
                        <h3 class="text-lg font-semibold mt-2">
                            {{ $mentor['name'] }}
                        </h3>

                        <p class="text-sm">
                            {{ $mentor['designation'] }}
                        </p>

                        <p class="text-sm mt-2">
                            {{ $mentor['description'] }}
                        </p>

                        {{-- <!-- Rating -->
                        <div class="flex items-center gap-2 mt-3 bg-[#FFD77B] rounded-full px-3 py-1 w-max">
                            <span class="starIcon"></span>
                            <span class="text-sm font-medium">{{ $mentor['star'] }}</span>
                        </div>

                        <!-- Stats -->
                        <div class="flex gap-6 mt-4 text-sm text-gray-600">
                            <div class="flex flex-col items-center gap-2">
                                <span class="user"></span>
                                <span class="text-[#BE8400]">{{ $mentor['students'] }}</span>
                            </div>
                            <div class="flex flex-col items-center gap-2">
                                <span class="courses"></span>
                                <span class="text-[#BE8400]">{{ $mentor['courses'] }}</span>
                            </div>
                        </div> --}}
                    </div>

                </div>
            </div>
        @endforeach
    </div>


</section>

<!-- Welcome to GreenInk Academy section-->
<section class="w-full mx-auto py-5 bg-cover bg-center bg-no-repeat"
    style="background-image: url('{{ asset('/assets/about/ab2bg.png') }}');">
    <div class="my-container py-10">
        <h2 class="text-center text-2xl font-semibold text-primary-light">
            Our Strengths
        </h2>
        <p class="text-center text-sm font-normal text-black pt-2">
            Expert-Designed Programs: Every course is thoughtfully designed by experienced educators, subject experts, and industry mentors to ensure academic depth and real-world relevance.
        </p>
        <p class="text-center text-sm font-normal text-black pt-2">
            Strong Academic & Industry Network: Collaboration with leading educators, industry professionals, and serving officers, supported by a robust national academic network.
        </p>
        <p class="text-center text-sm font-normal text-black pt-2">
            Research-Driven Learning: A dedicated R&D team develops exam-relevant, application-oriented practice questions aligned with evolving exam patterns.
        </p>
        <p class="text-center text-sm font-normal text-black pt-2">
            Technology-Enabled Education: Continuous innovation using AI-enabled practice tools and smart learning systems to enhance efficiency, tracking, and outcomes.
        </p>
        <p class="text-center text-sm font-normal text-black pt-2">
            System-Centric Quality Delivery: Structured programs, experienced faculty, and continuous feedback ensure consistency, quality, and skill development.
        </p>
    </div>

</section>


<!--gallery-->
<section class="my-container py-10 bg-white">
    <h2 class="text-center text-lg md:text-5xl font-bold text-primary-light">
        GALLERY
    </h2>
    <p class="text-center text-sm text-gray-500 py-2">
        Snapshots of our vibrant learning community
    </p>

    <!-- Masonry -->
    <div class="columns-2 md:columns-3 gap-4 py-6">
        @foreach ($galleryImages as $index => $image)
            <div class="mb-4 break-inside-avoid">
                <img src="{{ $image }}" onclick="openGallery({{ $index }})"
                    class="w-full rounded-xl cursor-zoom-in transition hover:opacity-90" alt="Gallery image" />
            </div>
        @endforeach
    </div>
    <div class="flex justify-center my-6">
        <a href="/gallery" class="text-lg text-white font-medium py-2 px-10 bg-[#202020] rounded-3xl">
            View more
        </a>
    </div>
</section>
<!-- Lightbox -->
<div id="lightbox" class="fixed inset-0 bg-black/95 hidden z-10000 flex items-center justify-center">

    <!-- Close -->
    <button onclick="closeGallery()" class="absolute top-6 right-6 text-white text-4xl leading-none hover:opacity-70">
        &times;
    </button>

    <!-- Image Wrapper -->
    <div class="max-w-[95vw] max-h-[90vh] flex items-center justify-center">
        <img id="lightboxImg" class="object-contain max-w-full max-h-full rounded-lg shadow-2xl"
            alt="Gallery Preview" />
    </div>
</div>

<script>
    const images = @json($galleryImages);
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightboxImg');

    function openGallery(index) {
        lightbox.classList.remove('hidden');
        lightboxImg.src = images[index];
        document.body.style.overflow = 'hidden';
    }

    function closeGallery() {
        lightbox.classList.add('hidden');
        lightboxImg.src = '';
        document.body.style.overflow = 'auto';
    }

    // Close on background click
    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) {
            closeGallery();
        }
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", () => {

        const star = `
    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13" fill="none">
    <path d="M6.01662 0.472611C6.08652 0.330764 6.19474 0.211318 6.32901 0.127793C6.46329 0.0442679 6.61827 0 6.7764 0C6.93453 0 7.08951 0.0442679 7.22379 0.127793C7.35806 0.211318 7.46628 0.330764 7.53618 0.472611L9.17092 3.7853L12.8275 4.31638C12.9839 4.3391 13.1309 4.40515 13.2518 4.50705C13.3726 4.60895 13.4626 4.74265 13.5114 4.893C13.5602 5.04336 13.566 5.20438 13.5281 5.35785C13.4901 5.51131 13.41 5.6511 13.2968 5.7614L10.6507 8.34057L11.2758 11.9819C11.3025 12.1377 11.285 12.2978 11.2255 12.4442C11.1659 12.5906 11.0666 12.7174 10.9387 12.8103C10.8108 12.9031 10.6595 12.9584 10.5019 12.9698C10.3443 12.9812 10.1866 12.9482 10.0467 12.8747L6.77725 11.1552L3.50606 12.8747C3.3662 12.948 3.20863 12.9807 3.05115 12.9692C2.89366 12.9577 2.74252 12.9024 2.61479 12.8096C2.48706 12.7168 2.38783 12.5901 2.3283 12.4438C2.26877 12.2975 2.2513 12.1376 2.27788 11.9819L2.90213 8.33973L0.256045 5.7614C0.142796 5.6511 0.0626742 5.51131 0.0247433 5.35785C-0.0131876 5.20438 -0.00741339 5.04336 0.0414127 4.893C0.0902387 4.74265 0.180168 4.60895 0.301027 4.50705C0.421885 4.40515 0.56885 4.3391 0.725294 4.31638L4.38188 3.7853L6.01662 0.472611Z" fill="url(#paint0_linear_298_3351)"/>
    <defs>
        <linearGradient id="paint0_linear_298_3351" x1="13.5517" y1="13.2634" x2="-0.38176" y2="0.11517" gradientUnits="userSpaceOnUse">
        <stop stop-color="#FF6F47"/>
        <stop offset="1" stop-color="#FFCD0F"/>
        </linearGradient>
    </defs>
    </svg>
    `;
        const user = `
   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="17" viewBox="0 0 24 17" fill="none">
    <path d="M0 16.3631V14.3264C0 13.7526 0.148396 13.2592 0.445187 12.8461C0.742803 12.4339 1.14265 12.1041 1.64472 11.8568C2.71729 11.3457 3.78244 10.9384 4.84017 10.635C5.89708 10.3316 7.16916 10.1799 8.65641 10.1799C10.1437 10.1799 11.4162 10.3316 12.4739 10.635C13.5316 10.9384 14.5968 11.3457 15.6693 11.8568C16.1706 12.1041 16.57 12.4339 16.8676 12.8461C17.1644 13.2592 17.3128 13.7526 17.3128 14.3264V16.3631H0ZM19.7861 16.3631V14.2695C19.7861 13.5522 19.641 12.8758 19.3508 12.2402C19.0614 11.6037 18.65 11.058 18.1166 10.6029C18.7242 10.7265 19.3096 10.898 19.8727 11.1173C20.4349 11.3374 20.9914 11.5843 21.5421 11.8581C22.078 12.1276 22.498 12.4727 22.8022 12.8931C23.1064 13.3136 23.2585 13.7724 23.2585 14.2695V16.3631H19.7861ZM8.65641 7.42102C7.63661 7.42102 6.76354 7.05745 6.03723 6.33031C5.31092 5.60317 4.94735 4.7297 4.94652 3.70989C4.9457 2.69009 5.30927 1.81702 6.03723 1.09071C6.76519 0.364395 7.63825 0.000825819 8.65641 1.3989e-06C9.67457 -0.000823021 10.548 0.362746 11.2768 1.09071C12.0056 1.81867 12.3688 2.69173 12.3663 3.70989C12.3638 4.72805 12.0007 5.60194 11.2768 6.33155C10.553 7.06116 9.67952 7.42391 8.65641 7.41978M17.6467 3.70989C17.6467 4.73053 17.2831 5.60441 16.556 6.33155C15.8289 7.05869 14.9558 7.42143 13.9368 7.41978C13.8841 7.41978 13.8173 7.41401 13.7365 7.40247C13.6557 7.39093 13.5889 7.37774 13.5362 7.3629C13.9558 6.85011 14.2777 6.28126 14.502 5.65635C14.727 5.03061 14.8396 4.38097 14.8396 3.70742C14.8396 3.03387 14.7221 2.39082 14.4871 1.77828C14.2522 1.16573 13.9352 0.592348 13.5362 0.0581235C13.6029 0.0342153 13.6697 0.0185512 13.7365 0.0111314C13.8033 0.00371166 13.87 1.3989e-06 13.9368 1.3989e-06C14.9566 1.3989e-06 15.8297 0.363571 16.556 1.09071C17.2823 1.81785 17.6459 2.69091 17.6467 3.70989ZM1.23663 15.1265H16.0762V14.3264C16.0762 14.0362 16.0036 13.7827 15.8586 13.5658C15.7135 13.349 15.4529 13.1413 15.077 12.9426C14.1545 12.4496 13.1817 12.072 12.1586 11.8098C11.1354 11.5477 9.96807 11.4166 8.65641 11.4166C7.34476 11.4166 6.17697 11.5477 5.15304 11.8098C4.13076 12.072 3.15794 12.4496 2.23459 12.9426C1.85948 13.1404 1.59938 13.3482 1.45428 13.5658C1.30918 13.7827 1.23663 14.0362 1.23663 14.3264V15.1265ZM8.65641 6.18439C9.33656 6.18439 9.91901 5.94201 10.4038 5.45725C10.8885 4.97249 11.1305 4.39004 11.1297 3.70989C11.1289 3.02975 10.8869 2.44771 10.4038 1.96377C9.92066 1.47984 9.33821 1.23746 8.65641 1.23663C7.97462 1.23581 7.39258 1.47819 6.91029 1.96377C6.42801 2.44935 6.18563 3.0314 6.18315 3.70989C6.18068 4.38839 6.42306 4.97084 6.91029 5.45725C7.39752 5.94366 7.97956 6.18563 8.65641 6.18315" fill="#BE8400"/>
    </svg>
    `;
        const courses = `
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="17" viewBox="0 0 30 30" fill="none">
    <path d="M24.7327 18.5495C24.7327 20.8546 24.7327 22.0071 24.3567 22.9148C24.1082 23.515 23.7438 24.0604 23.2844 24.5198C22.825 24.9792 22.2797 25.3436 21.6794 25.5921C20.7705 25.9693 19.618 25.9693 17.3129 25.9693H13.603C8.93844 25.9693 6.60615 25.9693 5.15682 24.52C3.70996 23.0719 3.70996 20.7396 3.70996 16.0763V8.65648C3.70996 7.34458 4.23111 6.08642 5.15876 5.15876C6.08642 4.23111 7.34458 3.70996 8.65648 3.70996" stroke="#BE8400" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M12.3661 10.5114L12.9028 15.4196C12.9256 15.6208 13.0006 15.8126 13.1204 15.9759C13.2401 16.1392 13.4004 16.2684 13.5855 16.3507C14.4338 16.7155 16.0229 17.3128 17.3127 17.3128C18.6025 17.3128 20.1915 16.7155 21.0399 16.3507C21.2251 16.2686 21.3857 16.1395 21.5057 15.9761C21.6256 15.8128 21.7008 15.6209 21.7237 15.4196L22.2592 10.5114M25.3508 9.27474V13.9368M17.3127 4.94653L8.65625 8.65643L17.3127 12.3663L25.9691 8.65643L17.3127 4.94653Z" stroke="#BE8400" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    `;

        const tickElements = document.getElementsByClassName('starIcon');

        for (let i = 0; i < tickElements.length; i++) {
            tickElements[i].innerHTML = star;
        }
        const tickElements2 = document.getElementsByClassName('user');

        for (let i = 0; i < tickElements2.length; i++) {
            tickElements2[i].innerHTML = user;
        }
        const tickElements3 = document.getElementsByClassName('courses');

        for (let i = 0; i < tickElements3.length; i++) {
            tickElements3[i].innerHTML = courses;
        }

    });
</script>
