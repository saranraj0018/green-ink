<section class="py-16 bg-white">
    <div class="container max-w-7xl mx-auto px-4">

        <!-- Section Header -->
        <div class="text-center mb-12">
            <span class="px-4 py-1 bg-green-100 text-green-700 rounded-full text-sm font-medium">
                Featured Courses
            </span>

            <h2 class="text-2xl md:text-3xl font-bold mt-5 text-gray-800">
                START YOUR LEARNING JOURNEY
            </h2>

            <p class="text-gray-600 mt-2">
                Handpicked courses designed by industry experts to accelerate your career
            </p>
        </div>

        @php
            $courses = [
                [
                    'image' => 'assets/courses/course1.png',
                    'category' => 'Technology',
                    'title' => 'Complete Web Development Bootcamp',
                    'instructor' => 'Dr. Angela Yu',
                    'students' => '8k Students',
                    'price' => '₹ 3,770',
                    'duration' => '32 Hours',
                    'rating' => '4.9'
                ],
                // Duplicate for example (normally replace from database)
                [
                    'image' => 'assets/courses/course1.jpg',
                    'category' => 'Technology',
                    'title' => 'Complete Web Development Bootcamp',
                    'instructor' => 'Dr. Angela Yu',
                    'students' => '8k Students',
                    'price' => '₹ 3,770',
                    'duration' => '32 Hours',
                    'rating' => '4.9'
                ],
                [
                    'image' => 'assets/courses/course1.jpg',
                    'category' => 'Technology',
                    'title' => 'Complete Web Development Bootcamp',
                    'instructor' => 'Dr. Angela Yu',
                    'students' => '8k Students',
                    'price' => '₹ 3,770',
                    'duration' => '32 Hours',
                    'rating' => '4.9'
                ],
                [
                    'image' => 'assets/courses/course1.jpg',
                    'category' => 'Technology',
                    'title' => 'Complete Web Development Bootcamp',
                    'instructor' => 'Dr. Angela Yu',
                    'students' => '8k Students',
                    'price' => '₹ 3,770',
                    'duration' => '32 Hours',
                    'rating' => '4.9'
                ],
                [
                    'image' => 'assets/courses/course1.jpg',
                    'category' => 'Technology',
                    'title' => 'Complete Web Development Bootcamp',
                    'instructor' => 'Dr. Angela Yu',
                    'students' => '8k Students',
                    'price' => '₹ 3,770',
                    'duration' => '32 Hours',
                    'rating' => '4.9'
                ],
                [
                    'image' => 'assets/courses/course1.jpg',
                    'category' => 'Technology',
                    'title' => 'Complete Web Development Bootcamp',
                    'instructor' => 'Dr. Angela Yu',
                    'students' => '8k Students',
                    'price' => '₹ 3,770',
                    'duration' => '32 Hours',
                    'rating' => '4.9'
                ]
            ];
        @endphp

        <!-- Courses Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

            @foreach ($courses as $course)
                <div class="bg-white  rounded-2xl shadow-md hover:shadow-xl transition-all border border-gray-200">

                    <!-- Course Image -->
                    <div class="relative">
<img src="{{ asset('assets/courses/course1.png') }}" class="rounded-xl w-full h-44 object-cover">

                        <span class="absolute top-3 right-3 bg-white px-3 py-1 rounded-full text-sm font-bold shadow-md flex items-center gap-1">
                            ⭐ {{ $course['rating'] }}
                        </span>
                    </div>

                    <!-- Course Category -->
                     <div class="pt-2 pb-6 px-5">
                    <span class="inline-block mt-4 px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-semibold">
                        {{ $course['category'] }}
                    </span>

                    <!-- Course Title -->
                    <h3 class="font-semibold text-gray-800 text-lg mt-2">
                        {{ $course['title'] }}
                    </h3>

                    <!-- Instructor & Info -->
                    <p class="text-sm text-gray-600 mt-1">{{ $course['instructor'] }}</p>

                    <div class="flex justify-between text-sm text-gray-700 mt-2">
                        <span>👨‍🎓 {{ $course['students'] }}</span>
                        <span>⏳ {{ $course['duration'] }}</span>
                    </div>

                    <!-- Price & Button -->
                    <div class="mt-4 flex justify-between items-center">
                        <span class="text-lg font-bold text-green-600 border border-green-600 rounded-3xl py-1 px-5">{{ $course['price'] }}</span>

                        <a href="#"
                            class="px-4 py-2 bg-green-600 text-white rounded-full hover:bg-green-700 transition text-sm">
                            View Course
                        </a>
                    </div>
</div>
                </div>
            @endforeach

        </div>
    </div>
</section>
