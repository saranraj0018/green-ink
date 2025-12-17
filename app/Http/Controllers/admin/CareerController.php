<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Career;
use App\Models\CareerApplication;
use Illuminate\Support\Facades\Auth;

class CareerController extends Controller
{

    public function view()
    {
        $careers = Career::with('admin')->paginate(10);
        return view('admin.career.view', compact('careers'));
    }

    /**
     * Create / Update
     */
    public function save(Request $request)
    {
        $rules = [
            'title'       => 'required|string|max:255',
            'department'  => 'required|string|max:255',
            'description' => 'required|string',
            'mode'        => 'required|string|max:255',
            'experience'  => 'required|string|max:255',
            'skills'      => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'status'      => 'required|boolean',
        ];

        $request->validate($rules);

        if (!empty($request->career_id)) {
            $career  = Career::find($request->career_id);
            $message = 'Career updated successfully';
        } else {
            $career  = new Career();
            $message = 'Career created successfully';
        }


        $career->title       = $request->title;
        $career->department  = $request->department;
        $career->description = $request->description;
        $career->mode        = $request->mode;
        $career->experience  = $request->experience;
        $career->skills      = $request->skills;
        $career->location    = $request->location;
        $career->status      = $request->status;
        $career->admin_id    = Auth::guard('admin')->id();

        $career->save();

        return response()->json([
            'success' => true,
            'message' => $message,
            'career'  => $career
        ]);
    }

    /**
     * Delete (Event destroy structure same)
     */
    public function destroy(Request $request)
    {
        if (!$request->id) {
            return response()->json([
                'success' => false,
                'message' => 'Career ID is required'
            ], 400);
        }

        $career = Career::find($request->id);

        if (!$career) {
            return response()->json([
                'success' => false,
                'message' => 'Career not found'
            ], 404);
        }

        $career->delete();

        return response()->json([
            'success' => true,
            'message' => 'Career deleted successfully'
        ]);
    }

    public function index()
    {
        $applications = CareerApplication::latest()->paginate(10);

        return view('admin.career.applications', compact('applications'));
    }
}
