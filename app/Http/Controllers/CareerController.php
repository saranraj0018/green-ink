<?php

namespace App\Http\Controllers;
use App\Models\Career;
use App\Models\CareerApplication;
use Illuminate\Http\Request;

class CareerController extends Controller
{
   public function index()
    {
        $careers = Career::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('careers.main', compact('careers'));
    }

     public function store(Request $request)
{
    $request->validate([
        'career_id' => 'required|exists:careers,id',

        // Personal
        'name'   => 'required|string|max:255',
        'email'  => 'required|email|max:255',
        'phone'  => 'required|max:50',
        'address'=> 'nullable|string|max:255',

        // Position
        'position_applied' => 'nullable|string|max:255',

        // Professional
        'years_experience'     => 'nullable|string|max:50',
        'previous_work'       => 'nullable|string|max:255',
        'key_responsibilities'=> 'nullable|string',
        'expertise'            => 'nullable|string|max:255',
        'extra_skills'         => 'nullable|string|max:255',

        // Education
        'highest_qualification'=> 'nullable|string|max:255',
        'degree_details'       => 'nullable|string|max:255',
        'other_certifications' => 'nullable|string|max:255',

        // Availability
        'joining_availability' => 'nullable|string|max:255',
        'working_mode'         => 'nullable|string|max:100',

        // Additional
        'preferred_exams' => 'nullable|string|max:255',
        'other_details'   => 'nullable|string',

        // Files
        'resume'       => 'required|file|mimes:pdf,doc,docx|max:2048',
        'achievements' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',

        // Optional arrays
        'roles'  => 'nullable|array',
        'skills' => 'nullable|array',
    ]);

    /* 🔁 DUPLICATE CHECK */
    $exists = CareerApplication::where('career_id', $request->career_id)
        ->where(function ($q) use ($request) {
            $q->where('email', $request->email)
              ->orWhere('phone', $request->phone);
        })
        ->exists();

    if ($exists) {
        return response()->json([
            'success' => false,
            'message' => '⚠️ You have already applied for this position.'
        ], 409);
    }

    /* 📎 FILE UPLOADS */
    $resumePath = $request->file('resume')
        ->store('resumes', 'public');

    $achievementPath = null;
    if ($request->hasFile('achievements')) {
        $achievementPath = $request->file('achievements')
            ->store('achievements', 'public');
    }

    /* 💾 SAVE DATA */
    CareerApplication::create([
        'career_id' => $request->career_id,

        // Personal
        'name'    => $request->name,
        'email'   => $request->email,
        'phone'   => $request->phone,
        'address' => $request->address,

        // Position
        'position_applied' => $request->position_applied,

        // Professional
        'years_experience'      => $request->years_experience,
        'previous_work'        => $request->previous_work,
        'key_responsibilities' => $request->key_responsibilities,
        'expertise'            => $request->expertise,
        'extra_skills'         => $request->extra_skills,

        // Education
        'highest_qualification' => $request->highest_qualification,
        'degree_details'        => $request->degree_details,
        'other_certifications'  => $request->other_certifications,

        // Availability
        'joining_availability' => $request->joining_availability,
        'working_mode'         => $request->working_mode,

        // Additional
        'preferred_exams' => $request->preferred_exams,
        'other_details'   => $request->other_details,

        // Optional JSON
        'roles'  => $request->roles ? json_encode($request->roles) : null,
        'skills' => $request->skills ? json_encode($request->skills) : null,

        // Files
        'resume'       => $resumePath,
        'achievements' => $achievementPath,
    ]);

    return response()->json([
        'success' => true,
        'message' => '✅ Application submitted successfully'
    ]);
}

}
