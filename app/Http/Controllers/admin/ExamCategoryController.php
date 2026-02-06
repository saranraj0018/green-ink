<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ExamCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamCategoryController extends Controller
{
    public function view()
    {
        $categories = ExamCategory::paginate(10);
        return view('admin.examcategory.view', compact('categories'));
    }

     public function save(Request $request)
    {
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|boolean',
        ];

        if (empty($request->id)) {
            $rules['icon'] = 'required|image|mimes:png,jpg,jpeg';
        } elseif ($request->hasFile('icon')) {
            $rules['icon'] = 'image|mimes:png,jpg,jpeg';
        }

        $request->validate($rules);

        $category = $request->id
            ? ExamCategory::find($request->id)
            : new ExamCategory();

        $category->title = $request->title;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->admin_id = Auth::guard('admin')->id();

        if ($request->hasFile('icon')) {
            $img = time().'_'.$request->icon->getClientOriginalName();
            $request->icon->storeAs('exam_categories', $img, 'public');
            $category->icon = 'exam_categories/'.$img;
        }

        $category->save();

        return response()->json([
            'success' => true,
            'message' => $request->id
                ? 'Exam category updated'
                : 'Exam category created',
        ]);
    }

    public function delete(Request $request)
    {
        ExamCategory::findOrFail($request->id)->delete();
        return response()->json(['success' => true]);
    }
}
