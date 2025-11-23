<!--@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-4 py-10">

    <!-- Filter Header -->
   <!-- <div class="mb-6 flex items-center gap-2 text-green-600 font-semibold">
        <span>🔎</span>
        <span>Filter By Category</span>
    </div>

    <!-- Category Buttons -->
    <!--<div class="flex flex-wrap gap-3 mb-10">
        <button data-category="all"
            class="category-btn px-6 py-2 rounded-full border border-green-400 text-green-600 hover:bg-green-50">
            All Courses
        </button>

        @foreach ($categories as $cat)
        <button data-category="{{ $cat->slug }}"
            class="category-btn px-6 py-2 rounded-full border border-green-400 text-green-600 hover:bg-green-50">
            {{ $cat->name }}
        </button>
        @endforeach

        <button
            class="px-6 py-2 rounded-full border border-green-400 text-green-600 hover:bg-green-50">
            More
        </button>
    </div>

    <!-- Courses Grid -->
    <!--<div id="courseGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        @foreach ($courses as $course)
        <div class="course-card bg-white p-4 rounded-xl shadow hover:shadow-lg transition border border-gray-100"
            data-category="{{ $course->category_slug }}">

            <!-- Course Image -->
           <!-- <img src="{{ $course->image }}" class="rounded-lg w-full h-40 object-cover">

            <!-- Badge -->
            <!--<div class="mt-3">
                <span class="px-3 py-1 text-xs bg-green-100 text-green-700 rounded-full">
                    {{ $course->category }}
                </span>
                @if($course->is_premium)
                <span class="px-3 py-1 text-xs bg-yellow-400 text-white rounded-full float-right">
                    premium
                </span>
                @endif
            </div>

            <!-- Title -->
           <!-- <h3 class="font-semibold mt-3 text-gray-800">
                {{ $course->title }}
            </h3>

            <!-- Stats -->
            <!--<div class="mt-2 text-sm flex gap-4 text-gray-500">
                <span>⭐ {{ $course->rating }}</span>
                <span>👥 {{ number_format($course->students) }}</span>
                <span>⏱️ {{ $course->hours }}hrs</span>
            </div>

            <!-- Price & Button -->
            <!--<div class="mt-4 flex justify-between items-center">
                <span class="text-green-700 font-bold text-lg">${{ $course->price }}</span>

                <a href="/courses/{{ $course->id }}"
                    class="px-5 py-2 bg-green-600 text-white text-sm rounded-full hover:bg-green-700">
                    View Courses
                </a>
            </div>
        </div>
        @endforeach

    </div>
</div>

<!-- jQuery Category Filter -->
<script>
$(document).ready(function () {
    
    $(".category-btn").on("click", function () {
        let category = $(this).data("category");

        $(".category-btn").removeClass("bg-green-600 text-white")
            .addClass("text-green-600");

        $(this).addClass("bg-green-600 text-white");

        if (category === "all") {
            $(".course-card").show();
        } else {
            $(".course-card").hide();
            $(`.course-card[data-category="${category}"]`).show();
        }
    });

});
</script>

@endsection
