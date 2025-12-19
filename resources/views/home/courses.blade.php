<section class="py-16 bg-white">
    <div class="my-container">

        <!-- Section Header -->
        <div class="text-center mb-12">
            <span class="px-4 py-2 bg-[#F4F4F4] rounded-full text-sm font-medium border-t-2 border-primary-light">
                Featured Courses
            </span>

            <h2 class="text-2xl md:text-3xl font-bold mt-5 text-gray-800">
                START YOUR LEARNING JOURNEY
            </h2>

            <p class="text-gray-600 mt-2">
                Handpicked courses designed by industry experts to accelerate your career
            </p>
        </div>


        <!-- Courses Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($courses as $course)
                <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all border border-gray-200">

                    <!-- Course Image -->
                    <div class="relative">
                        <img src="{{ asset('assets/courses/course1.png') }}" class="rounded-xl w-full h-44 object-cover">
                        @if ($course->type == 'paid')
                            <span
                                class= "absolute top-13 right-3 bg-[#FFC31F] text-green-900 px-3 text-sm py-1 rounded-full">
                                Premium
                            </span>
                        @endif
                        <span
                            class="absolute top-3 right-3 bg-white px-3 py-1 rounded-full text-sm font-bold shadow-md flex items-center gap-1">
                            <span class="star"></span> {{ $course['star_point'] }}
                        </span>
                    </div>

                    <!-- Course Category -->
                    <div class="p-4">
                        <span
                            class="inline-block mt-4 px-3 py-1 bg-[#FFB100] text-white rounded-full text-xs font-semibold">
                            {{ $course->get_category->name ?? '' }}
                        </span>

                        <!-- Course Title -->
                        <h3 class="font-semibold text-gray-800 text-md mt-2">
                            {{ $course['title'] }}
                        </h3>

                        <!-- Instructor & Info -->
                        <p class="text-sm text-gray-600 mt-1">{{ $course['instructor'] }}</p>

                        <div class="flex gap-2 text-sm text-gray-700 mt-2">
                            <p class="flex gap-1 font-medium text-primary-light"> <span class="studentsGroup"></span>
                                {{ $course['students'] }}</p>
                            <p class="flex gap-1 font-medium text-primary-light"> <span class="duration"></span>
                                {{ $course['hours'] }}hrs</p>
                        </div>

                        <!-- Price & Button -->
                        <div class="mt-4 flex justify-between items-center">
                            <span
                                class="text-sm font-bold text-primary-light border border-primary-light rounded-3xl py-1 px-5">{{ $course['amount'] }}</span>

                            <a href="{{ route('view_course', ['id' => encrypt($course->id)]) }}"
                                class="px-4 py-1 text-white rounded-full hover:bg-green-700 transition text-sm"
                                style="background: linear-gradient(180deg, #008357 0%, #39B28A 100%);">
                                View Course
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>


<script>
    document.addEventListener("DOMContentLoaded", () => {
        const students = `
    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
        <path d="M4.30375 6.35266C4.30375 5.79105 4.53047 5.25244 4.93402 4.85532C5.33758 4.45821 5.88492 4.23511 6.45564 4.23511C7.02635 4.23511 7.57369 4.45821 7.97725 4.85532C8.38081 5.25244 8.60752 5.79105 8.60752 6.35266C8.60752 6.91427 8.38081 7.45287 7.97725 7.84999C7.57369 8.24711 7.02635 8.47021 6.45564 8.47021C5.88492 8.47021 5.33758 8.24711 4.93402 7.84999C4.53047 7.45287 4.30375 6.91427 4.30375 6.35266ZM6.45564 3.29398C5.63127 3.29398 4.84067 3.61623 4.25775 4.18984C3.67484 4.76346 3.34736 5.54144 3.34736 6.35266C3.34736 7.16387 3.67484 7.94186 4.25775 8.51547C4.84067 9.08908 5.63127 9.41134 6.45564 9.41134C7.28 9.41134 8.0706 9.08908 8.65352 8.51547C9.23644 7.94186 9.56391 7.16387 9.56391 6.35266C9.56391 5.54144 9.23644 4.76346 8.65352 4.18984C8.0706 3.61623 7.28 3.29398 6.45564 3.29398ZM11.8946 14.2535C12.4092 14.4605 13.0567 14.5876 13.8677 14.5876C15.6667 14.5876 16.6613 13.9589 17.1854 13.238C17.4594 12.86 17.6309 12.4195 17.6837 11.958C17.6884 11.9152 17.6916 11.8722 17.6933 11.8291V11.7642C17.6933 11.5788 17.6562 11.3952 17.5841 11.2239C17.512 11.0527 17.4063 10.897 17.2731 10.7659C17.1399 10.6349 16.9817 10.5309 16.8077 10.4599C16.6336 10.389 16.4471 10.3525 16.2587 10.3525H11.8306C12.0601 10.6254 12.2323 10.9444 12.3327 11.2936H16.2587C16.3855 11.2936 16.5071 11.3432 16.5968 11.4314C16.6865 11.5197 16.7369 11.6394 16.7369 11.7642V11.815L16.7321 11.862C16.6962 12.1606 16.5843 12.4455 16.4069 12.6902C16.0942 13.1222 15.4151 13.6464 13.8677 13.6464C13.1676 13.6464 12.6454 13.5391 12.2542 13.382C12.1758 13.6455 12.062 13.9429 11.8946 14.2535ZM1.43457 12.2347C1.43457 11.7355 1.6361 11.2568 1.99481 10.9038C2.35353 10.5508 2.84005 10.3525 3.34736 10.3525H9.56391C10.0712 10.3525 10.5577 10.5508 10.9165 10.9038C11.2752 11.2568 11.4767 11.7355 11.4767 12.2347V12.3138L11.4748 12.3514L11.4652 12.4785C11.3974 13.0884 11.1773 13.6723 10.8244 14.1782C10.154 15.1334 8.85905 15.9993 6.45564 15.9993C4.05222 15.9993 2.75726 15.1334 2.08683 14.1791C1.73382 13.673 1.51368 13.0887 1.44605 12.4785C1.44059 12.4237 1.43676 12.3688 1.43457 12.3138V12.2347ZM2.39096 12.2912V12.3081L2.39766 12.3863C2.44956 12.8374 2.61309 13.2691 2.87394 13.6436C3.33971 14.3062 4.31618 15.0581 6.45564 15.0581C8.59509 15.0581 9.57157 14.3062 10.0373 13.6436C10.2982 13.2691 10.4617 12.8374 10.5136 12.3863C10.5174 12.3505 10.5194 12.3245 10.5194 12.3081L10.5203 12.2921V12.2347C10.5203 11.9851 10.4195 11.7458 10.2402 11.5693C10.0608 11.3928 9.81757 11.2936 9.56391 11.2936H3.34736C3.09371 11.2936 2.85044 11.3928 2.67108 11.5693C2.49173 11.7458 2.39096 11.9851 2.39096 12.2347V12.2912ZM12.4331 7.05851C12.4331 6.6841 12.5842 6.32503 12.8533 6.06028C13.1223 5.79554 13.4872 5.64681 13.8677 5.64681C14.2482 5.64681 14.6131 5.79554 14.8821 6.06028C15.1511 6.32503 15.3023 6.6841 15.3023 7.05851C15.3023 7.43291 15.1511 7.79198 14.8821 8.05673C14.6131 8.32147 14.2482 8.47021 13.8677 8.47021C13.4872 8.47021 13.1223 8.32147 12.8533 8.05673C12.5842 7.79198 12.4331 7.43291 12.4331 7.05851ZM13.8677 4.70567C13.2336 4.70567 12.6254 4.95356 12.177 5.3948C11.7286 5.83604 11.4767 6.4345 11.4767 7.05851C11.4767 7.68252 11.7286 8.28097 12.177 8.72221C12.6254 9.16345 13.2336 9.41134 13.8677 9.41134C14.5018 9.41134 15.11 9.16345 15.5584 8.72221C16.0068 8.28097 16.2587 7.68252 16.2587 7.05851C16.2587 6.4345 16.0068 5.83604 15.5584 5.3948C15.11 4.95356 14.5018 4.70567 13.8677 4.70567Z" fill="#008357"/>
    </svg>
    `;
        const duration = `
    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
    <path d="M18.651 10.3525C18.651 12.4689 17.7956 14.4987 16.2731 15.9952C14.7505 17.4918 12.6855 18.3325 10.5323 18.3325C8.37907 18.3325 6.31404 17.4918 4.79149 15.9952C3.26894 14.4987 2.41357 12.4689 2.41357 10.3525C2.41357 8.23605 3.26894 6.2063 4.79149 4.70976C6.31404 3.21322 8.37907 2.37247 10.5323 2.37247C12.6855 2.37247 14.7505 3.21322 16.2731 4.70976C17.7956 6.2063 18.651 8.23605 18.651 10.3525Z" stroke="#008357" stroke-width="0.941133" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M9.87402 5.82327V10.9995H13.3848" stroke="#008357" stroke-width="0.941133" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    `;
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

        const tickElements = document.getElementsByClassName('studentsGroup');

        for (let i = 0; i < tickElements.length; i++) {
            tickElements[i].innerHTML = students;
        }
        const tickElements2 = document.getElementsByClassName('duration');

        for (let i = 0; i < tickElements2.length; i++) {
            tickElements2[i].innerHTML = duration;
        }
        const tickElements3 = document.getElementsByClassName('star');

        for (let i = 0; i < tickElements3.length; i++) {
            tickElements3[i].innerHTML = star;
        }

    });
</script>
