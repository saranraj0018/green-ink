<script src="{{ asset('users/js/home.js') }}"></script>

<!-- Hero Section -->
    <section class="py-20 bg-gray-100 ">
        <div class="container mx-auto text-center px-6">

            <!-- Badge -->
            <div class="inline-flex items-center gap-2 bg-white shadow px-5 py-2 rounded-full mb-6">
                <span class="text-green-600 font-semibold text-sm">Start Your Journey Today</span>
            </div>

            <!-- Heading -->
            <h1 class="text-4xl md:text-5xl font-bold text-green-700 leading-tight">
                Join 100,000+ Learners Building <br> Their Future
            </h1>

            <!-- Subtitle -->
            <p class="text-gray-600 mt-4 max-w-3xl mx-auto">
                Get unlimited access to premium courses, expert mentors, and career transforming skills
            </p>

            <!-- Features Grid -->
            <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-6 my-container text-left">

                <div class="flex gap-3 items-start">
                    <span class="GreenTick"></span>
                    <p class="text-gray-700">Lifetime access to all courses materials</p>
                </div>

                <div class="flex gap-3 items-start">
                    <span class="GreenTick"></span>
                    <p class="text-gray-700">24/7 mentor support and guidance</p>
                </div>

                <div class="flex gap-3 items-start">
                    <span class="GreenTick"></span>
                    <p class="text-gray-700">Industry-recognized certifications</p>
                </div>

                <div class="flex gap-3 items-start">
                    <span class="GreenTick"></span>
                    <p class="text-gray-700">Real-world projects and assignments</p>
                </div>
            </div>

            <!-- CTA Button -->
            <div class="mt-10">
                <a href="#"
                   class="bg-green-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-green-700 transition">
                    Get Started Free
                </a>
            </div>
        </div>
    </section>

    <!-- count section-->
     <section class="py-16 bg-linear-to-b from-white to-[#F6CC6D] rounded-b-xl">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center">
<div>
    <h2 class="text-5xl font-extrabold text-yellow-900 counter" data-target="500">500</h2>
    <p class="text-gray-700 mt-2 text-lg">Expert Courses</p>
</div>

<div>
    <h2 class="text-5xl font-extrabold text-yellow-900 counter" data-target="100000">100000</h2>
    <p class="text-gray-700 mt-2 text-lg">Active Learners</p>
</div>

<div>
    <h2 class="text-5xl font-extrabold text-yellow-900 counter" data-target="95">95</h2>
    <p class="text-gray-700 mt-2 text-lg">Success Rate</p>
</div>



    </div>
</section>

<script>

 document.addEventListener("DOMContentLoaded", () => {
    const GreenTick = `
    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 20 20" fill="none">
        <path d="M17.8126 10.9374C17.1876 14.0624 14.8315 17.0045 11.5242 17.6623C8.21702 18.3202 4.86092 16.7818 3.20046 13.847C1.54 10.9122 1.94992 7.24312 4.21716 4.74709C6.4844 2.25106 10.3126 1.56246 13.4376 2.81246" stroke="#033A29" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M7.1875 9.6875L10.3125 12.8125L17.8125 4.6875" stroke="#033A29" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    `;
        const tickElements = document.getElementsByClassName('GreenTick');

        for (let i = 0; i < tickElements.length; i++) {
            tickElements[i].innerHTML = GreenTick;
        }

    });

</script>
