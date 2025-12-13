<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseVideo;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $this->data['courses'] = Course::with('get_category')->paginate(10);
        $this->data['category'] = Category::get();
        return view('admin.courses.course_list')->with($this->data);
    }

    public function courseSave(Request $request)
    {
        try {
            $rules =
                [
                    'title' => 'required|max:255',
                    'category_id' => 'required',
                    'type' => 'required',
                    'hours' => 'required',
                    'star_point' => 'required',
                    'description' => 'required',
                    'course_overview' => 'required',
                    'learning_outcomes' => 'required',
                    'status' => 'required',
                ];

            // only require image if creating OR no existing image provided
            if (empty($request['course_id']) && !$request->has('existing_image')) {
                $rules['course_image'] = 'required|image|mimes:jpeg,png,jpg';
            } else if ($request->hasFile('course_image')) {
                // validate new uploaded image if provided
                $rules['course_image'] = 'image|mimes:jpeg,png,jpg';
            }

            $request->validate($rules);

            if (!empty($request['course_id'])) {
                $message = 'Course Updated successfully';
                $course = Course::find($request['course_id']);
            } else {
                $course = new Course();
                $message = 'Course saved successfully';
            }

            $course->category_id = $request['category_id'];
            $course->title = $request['title'];
            $course->type = $request['type'];
            $course->amount = $request['amount'] ?? 0;
            $course->hours = $request['hours'];
            $course->star_point = $request['star_point'];
            $course->description = $request['description'] ?? 0;
            $course->hours = $request['hours'];
            $course->star_point = $request['star_point'];
            $course->course_overview = $request['course_overview'];
            $course->learning_outcomes = $request['learning_outcomes'];
            $course->status = $request['status'];

            if ($request->hasFile('cover_video')) {
                $img_name = $request->file('cover_video')->getClientOriginalName();
                $img_name = time() . '_' . $img_name;
                $request->cover_video->storeAs('cover_videos/', $img_name, 'public');
                $course->cover_video =  'cover_videos/' . $img_name;
            } else if ($request->has('existing_cover_video')) {
                // keep the existing cover video path
                $course->cover_video = $request->existing_cover_video;
            }

            // // handle image upload
            if ($request->hasFile('course_image')) {
                $img_name = $request->file('course_image')->getClientOriginalName();
                $img_name = time() . '_' . $img_name;
                $request->course_image->storeAs('courses/', $img_name, 'public');
                $course->image =  'courses/' . $img_name;
            } else if ($request->has('existing_image')) {
                // keep the existing image path
                $course->image = $request->existing_image;
            }

            $course->save();

            if ($request->hasFile('videos')) {
                foreach ($request->file('videos') as $video) {
                    $fileName = $video->getClientOriginalName();
                    $path = $video->storeAs('course_videos', $fileName, 'public');
                    // $filePath = $file->storeAs('student_upload_proof', $fileName, 'public');
                    $exists = CourseVideo::where(['course_id' => $course->id, 'file_name' =>  $fileName, 'file_path' => $path])->first();
                    if (!$exists) {
                        $upload = new CourseVideo();
                        $upload->course_id  = $course->id;
                        $upload->file_name  = $fileName ?? null;
                        $upload->file_path  = $path; // Original filename
                        $upload->file_type  = $video->getClientMimeType();         // Public path
                        $upload->save();
                    }
                }
            }

            return response()->json([
                'success' => true,
                'message' => $message,
                'category' => $course
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to save course',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
