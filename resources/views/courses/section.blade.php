<!-- banner section-->
<a href="/feature">
<img src="/assets/courses/coursebanner.png" class="w-full" alt="" />
</a>
<!-- serach bar-->
<section class="w-full my-10">
    <div class="my-container text-center">
        <!-- Title -->
        <h2 class="text-2xl font-semibold text-black">
            Explore Our Categories
        </h2>

        <!-- Subtitle -->
        <p class="text-black font-normal mt-2">
            Discover courses that will help you achieve your goals
        </p>

        <!-- Search Bar -->
        <div class="mt-8">
            <div class="relative">
                <input id="courseSearch" type="text" placeholder="Search Courses"
                    class="w-full py-4 pl-12 pr-4 rounded-full shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none border border-gray-200 text-gray-700" />

                <!-- Search Icon -->
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 search">
                    🔍
                </span>
            </div>
        </div>

        {{-- ADDED FILTER BUTTONS - NEED TO SET DYNAMIC --}}
        <div class="my-5">
            <div class="flex gap-1 my-5">
                <span class="FilterIcon"></span>
                <div class="text-primary-light text-[16px] my-auto font-medium">
                    Filter by category
                </div>
            </div>

            <div class="flex flex-wrap gap-3">
                <a href="#"
                    class="bg-white focus:bg-primary-light py-1 px-2 rounded-full text-sm text-primary-light focus:text-white border border-primary-light">
                    All Courses
                </a>
                <a href="#"
                    class="bg-white focus:bg-primary-light py-1 px-2 rounded-full text-sm text-primary-light focus:text-white border border-primary-light">
                    Design
                </a>
                <a href="#"
                    class="bg-white focus:bg-primary-light py-1 px-2 rounded-full text-sm text-primary-light focus:text-white border border-primary-light">
                    Marketing
                </a>
                <a href="#"
                    class="bg-white focus:bg-primary-light py-1 px-2 rounded-full text-sm text-primary-light focus:text-white border border-primary-light">
                    Programming
                </a>
                <a href="#"
                    class="bg-white focus:bg-primary-light py-1 px-2 rounded-full text-sm text-primary-light focus:text-white border border-primary-light">
                    Data Science
                </a>
                <a href="#"
                    class="bg-white focus:bg-primary-light py-1 px-2 rounded-full text-sm text-primary-light focus:text-white border border-primary-light">
                    Management
                </a>
            </div>

        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", () => {

        const search = `
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
            <path d="M4.875 0C6.16793 0 7.40791 0.513614 8.32215 1.42785C9.23639 2.34209 9.75 3.58207 9.75 4.875C9.75 6.0825 9.3075 7.1925 8.58 8.0475L8.7825 8.25H9.375L13.125 12L12 13.125L8.25 9.375V8.7825L8.0475 8.58C7.16278 9.33485 6.03798 9.74966 4.875 9.75C3.58207 9.75 2.34209 9.23639 1.42785 8.32215C0.513614 7.40791 0 6.16793 0 4.875C0 3.58207 0.513614 2.34209 1.42785 1.42785C2.34209 0.513614 3.58207 0 4.875 0ZM4.875 1.5C3 1.5 1.5 3 1.5 4.875C1.5 6.75 3 8.25 4.875 8.25C6.75 8.25 8.25 6.75 8.25 4.875C8.25 3 6.75 1.5 4.875 1.5Z" fill="#787878"/>
            </svg>
        `;

        const tickElements = document.getElementsByClassName('search');

        for (let i = 0; i < tickElements.length; i++) {
            tickElements[i].innerHTML = search;
        }
        const FilterIcon = `
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 30 30" fill="none">
            <path d="M18.75 18.75H26.25M18.75 22.5H24.375M4.6875 4.6875H23.4375V8.4375L16.62 16.875V25.3125L11.505 23.4375V16.875L4.6875 8.4375V4.6875Z" stroke="url(#paint0_linear_1_23283)" stroke-width="2" stroke-linejoin="round"/>
            <defs>
                <linearGradient id="paint0_linear_1_23283" x1="26.25" y1="15" x2="4.6875" y2="15" gradientUnits="userSpaceOnUse">
                <stop stop-color="#008357"/>
                <stop offset="1" stop-color="#35D39E"/>
                </linearGradient>
            </defs>
            </svg>
        `;

        const tickElements2 = document.getElementsByClassName('FilterIcon');

        for (let i = 0; i < tickElements2.length; i++) {
            tickElements2[i].innerHTML = FilterIcon;
        }

    });
</script>
