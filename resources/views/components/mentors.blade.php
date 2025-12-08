<!--@props(['mentors'])  {{-- Must be the first line --}}

<section class="py-16 bg-white">
    <div class="text-center mb-10">
        <span class="bg-yellow-200 text-yellow-600 px-4 py-1 rounded-full text-sm font-medium">
            Expert Mentors
        </span>
        <h2 class="text-2xl md:text-3xl font-bold mt-3">LEARN FROM INDUSTRY LEADERS</h2>
        <p class="text-gray-500 text-sm mt-2">
            Get Personalized guidance from professionals with real-world expertise
        </p>
    </div>

    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            @foreach ($mentors as $mentor)
            <div class="bg-white shadow-md rounded-2xl p-6 border border-gray-200 text-center hover:shadow-lg transition">

                <div class="flex justify-center mb-4">
                    <img src="{{ asset($mentor['image']) }}" class="w-24 h-24 rounded-full object-cover">
                </div>

                <h3 class="font-semibold text-lg">{{ $mentor['name'] }}</h3>
                <p class="text-gray-500 text-sm mb-2">{{ $mentor['title'] }}</p>

                <div class="flex justify-center items-center gap-1 text-sm mt-2 bg-yellow-100 text-yellow-700 rounded-full px-3 py-1 inline-flex">
                    ⭐ {{ $mentor['rating'] }} Ratings
                </div>

                <div class="flex flex-wrap justify-center gap-2 my-4">
                    @foreach ($mentor['skills'] as $skill)
                        <span class="px-3 py-1 border border-green-600 rounded-full text-xs text-green-700">
                            {{ $skill }}
                        </span>
                    @endforeach
                </div>

                <div class="flex justify-center gap-12 mt-4 text-sm text-gray-700">
                    <div class="flex flex-col items-center">
                        <span class="font-semibold">{{ $mentor['students'] }}</span>
                        <span class="text-xs">Students</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <span class="font-semibold">{{ $mentor['courses'] }}</span>
                        <span class="text-xs">Courses</span>
                    </div>
                </div>

            </div>
            @endforeach

        </div>
    </div>
</section>
-->


