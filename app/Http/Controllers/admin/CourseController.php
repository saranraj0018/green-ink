<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        DB::beginTransaction();

        try {

            /* ================= VALIDATION ================= */

            $rules = [
                'title' => 'required|max:255',
                'category_id' => 'required',
                'type' => 'required',
                'hours' => 'required',
                'star_point' => 'required',
                'description' => 'required',
                'course_overview' => 'required',
                'learning_outcomes' => 'required',
                'status' => 'required',
                'instructor' => 'required'
            ];

            if (empty($request->course_id) && !$request->has('existing_image')) {
                $rules['course_image'] = 'required|image|mimes:jpeg,png,jpg';
            } elseif ($request->hasFile('course_image')) {
                $rules['course_image'] = 'image|mimes:jpeg,png,jpg';
            }

            $request->validate($rules);

            /* ================= CREATE / UPDATE ================= */

            if ($request->course_id) {
                $course = Course::findOrFail($request->course_id);
                $message = 'Course updated successfully';
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
            $course->instructor = $request['instructor'];

            /* ================= COVER VIDEO ================= */

            if ($request->hasFile('cover_video')) {

                // delete old cover video
                if ($course->cover_video && Storage::disk('public')->exists($course->cover_video)) {
                    Storage::disk('public')->delete($course->cover_video);
                }

                $name = time() . '_' . $request->cover_video->getClientOriginalName();
                $path = $request->cover_video->storeAs('cover_videos', $name, 'public');
                $course->cover_video = $path;
            } elseif ($request->filled('existing_cover_video')) {
                $course->cover_video = $request->existing_cover_video;
            }

            /* ================= COURSE IMAGE ================= */

            if ($request->hasFile('course_image')) {

                if ($course->image && Storage::disk('public')->exists($course->image)) {
                    Storage::disk('public')->delete($course->image);
                }

                $name = time() . '_' . $request->course_image->getClientOriginalName();
                $path = $request->course_image->storeAs('courses', $name, 'public');
                $course->image = $path;
            } elseif ($request->filled('existing_image')) {
                $course->image = $request->existing_image;
            }

            $course->save();

            /* ================= EXISTING COURSE VIDEOS ================= */

            $existingVideos = CourseVideo::where('course_id', $course->id)->get();

            $keepVideos = collect(
                json_decode($request->exiting_course_videos ?? '[]', true)
            );

            $keepIds = $keepVideos->pluck('id')->toArray();

            foreach ($existingVideos as $video) {
                if (!in_array($video->id, $keepIds)) {

                    if (Storage::disk('public')->exists($video->file_path)) {
                        Storage::disk('public')->delete($video->file_path);
                    }

                    $video->delete();
                }
            }

            /* ================= NEW COURSE VIDEOS ================= */

            if ($request->hasFile('videos')) {

                foreach ($request->file('videos') as $video) {

                    $fileName = time() . '_' . $video->getClientOriginalName();
                    $path = $video->storeAs('course_videos', $fileName, 'public');

                    CourseVideo::create([
                        'course_id' => $course->id,
                        'file_name' => $fileName,
                        'file_path' => $path,
                        'file_type' => $video->getClientMimeType(),
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => $message,
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Failed to save course',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function courseDelete(Request $request)
{
    try {

        $course = Course::findOrFail($request->id);

        /* DELETE COURSE IMAGE */
        if ($course->image && Storage::disk('public')->exists($course->image)) {
            Storage::disk('public')->delete($course->image);
        }

        /* DELETE COVER VIDEO */
        if ($course->cover_video && Storage::disk('public')->exists($course->cover_video)) {
            Storage::disk('public')->delete($course->cover_video);
        }

        /* DELETE COURSE VIDEOS */
        $videos = CourseVideo::where('course_id', $course->id)->get();

        foreach ($videos as $video) {
            if (Storage::disk('public')->exists($video->file_path)) {
                Storage::disk('public')->delete($video->file_path);
            }
            $video->delete();
        }

        /* DELETE COURSE */
        $course->delete();

        return response()->json([
            'success' => true,
            'message' => 'Course deleted successfully'
        ]);

    } catch (\Exception $e) {

        return response()->json([
            'success' => false,
            'message' => 'Failed to delete course',
            'error' => $e->getMessage()
        ], 500);
    }
}
}
