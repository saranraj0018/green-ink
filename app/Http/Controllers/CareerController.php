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
            'name'      => 'required|string|max:255',
            'email'     => 'required|email',
            'phone'     => 'required',
            'experience'=> 'required',
            'resume'    => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

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

        $resumePath = $request->file('resume')
            ->store('resumes', 'public');

        CareerApplication::create([
            'career_id' => $request->career_id,
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'experience'=> $request->experience,
            'resume'    => $resumePath,
        ]);

        return response()->json([
            'success' => true,
            'message' => ' Application submitted successfully'
        ]);
    }
}
