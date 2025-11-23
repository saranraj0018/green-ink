<!--banner-->

<img src="/assets/homebanner.png"  alt="banner"/>


<section class="py-12 bg-white">
    <div class="container max-w-6xl mx-auto px-4">
        
        <!-- Title -->
        <h2 class="text-center text-xl  font-semibold text-gray-800 mb-10">
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
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach ($categories as $category)
                <div class="flex items-center gap-8 bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100">

                    <div class="bg-green-50 p-4 rounded-full">
                        <img src="{{ asset($category['icon']) }}" class="h-12 w-12" alt="{{ $category['title'] }}">
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">{{ $category['title'] }}</h3>
                        <p class="text-sm text-gray-600">{{ $category['courses'] }}</p>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</section>
