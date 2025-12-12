<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseVideo;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $this->data['course'] = Course::with('get_category')->get();
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
