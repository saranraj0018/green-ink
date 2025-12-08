<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;

class CoursesController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->input('category');

        $categories = Category::all();

        $courses = Course::when($category && $category !== 'all', function ($query) use ($category) {
            $query->where('category_slug', $category);
        })->paginate(9);

        return view('courses.index', compact('courses', 'categories', 'category'));
    }
}
