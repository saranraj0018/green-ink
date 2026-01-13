<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseVideo;
use App\Models\Category;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
{
  $search   = $request->input('search');
    $category = $request->input('category');

    $this->data['categories'] = Category::all();

    $this->data['course'] = Course::with('get_category')
        ->where('status', 1)

        ->when($search, function ($q) use ($search) {
            $q->where(function ($sub) use ($search) {
                $sub->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        })

                   ->when($category, function ($q) use ($category) {
                $q->where('category_id', $category);
            })


        ->get();

    $this->data['category'] = $category;
    $this->data['search']  = $search;

    return view('courses.main')->with($this->data);
}

    public function viewCourse(Request $request)
    {
        $courseId = decrypt($request->id);
        $this->data['course'] = Course::with('get_category')->where('id', $courseId)->first();
        $this->data['course_videos'] = CourseVideo::where('course_id', $courseId)->first();
        return view('courses.course_view')->with($this->data);
    }

    // CourseController.php
    public function enrollFree(Request $request)
    {
        $course = Course::find($request->course_id);
        $user = auth()->user();

        // Check if already enrolled
        if ($user->courses()->where('course_id', $course->id)->exists()) {
            return response()->json(['success' => false, 'message' => 'Already enrolled']);
        }

        $user->courses()->attach($course->id); // Assuming many-to-many relation
        return response()->json(['success' => true]);
    }
}
