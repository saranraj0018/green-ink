<!--banner-->

<img src="/assets/homebanner.png" alt="banner" />


<section class="my-10">
    <div class="my-container space-y-5">

        <!-- Title -->
        <h2 class="text-center text-2xl font-bold text-gray-800">
            Explore Top Categories
        </h2>

        @php
            $categories = [
                ['icon' => 'assets/icons/Group 585.png', 'title' => 'Development', 'courses' => '150+ Courses'],
                ['icon' => 'assets/icons/Group 586.png', 'title' => 'Data Science', 'courses' => '150+ Courses'],
                ['icon' => 'assets/icons/Group 587.png', 'title' => 'Business', 'courses' => '150+ Courses'],
                ['icon' => 'assets/icons/Group 588.png', 'title' => 'Development', 'courses' => '150+ Courses'],
                ['icon' => 'assets/icons/Group 589.png', 'title' => 'Marketing', 'courses' => '150+ Courses'],
                ['icon' => 'assets/icons/Group 590.png', 'title' => 'Development', 'courses' => '150+ Courses'],
            ];
        @endphp

        <!-- Grid Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
            @foreach ($categories as $category)
                <div
                    class="flex items-center gap-3 md:gap-14 bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="bg-green-50 p-4 rounded-full">
                        <img src="{{ asset($category['icon']) }}" class="h-12 w-12" alt="{{ $category['title'] }}">
                    </div>

                    <div class="space-y-2">
                        <h3 class="text-lg md:text-2xl font-semibold text-[#533B04]">{{ $category['title'] }}</h3>
                        <p class="text-md font-medium">{{ $category['courses'] }}</p>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</section>
