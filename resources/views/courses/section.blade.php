<!-- banner section-->
<img src="/assets/courses/couresebanner.png" class="w-full" alt=""/>
<!-- serach bar-->
 <section class="w-full py-12">
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
                    <input
                        id="courseSearch"
                        type="text"
                        placeholder="Search Courses"
                        class="w-full py-4 pl-12 pr-4 rounded-full shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none border border-gray-200 text-gray-700"
                    />

                    <!-- Search Icon -->
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 search">
                        🔍
                    </span>
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

    });
</script>



