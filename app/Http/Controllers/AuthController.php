<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'mobile_number' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'validation_error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $user = User::where('mobile_number', $request->mobile_number)->first();

        if ($user) {
            return response()->json([
                'status' => 'user_exists',
                'message' => 'Mobile number already exists. Please login.',
            ], 409);
        }

        // Send OTP here (mock)
        session([
            'register_data' => $request->only('name', 'email', 'mobile_number'),
            'register_otp' => rand(100000, 999999),
        ]);

        return response()->json([
            'status' => 'otp_sent',
        ]);
    }


    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'nullable|email',
            'phone' => 'nullable',
        ]);

        if (!$request->email && !$request->phone) {
            return back()->with('error', 'Please provide email or phone.');
        }

        $otp = rand(100000, 999999);

        // Save data & OTP in session
        Session::put('otp', $otp);
        Session::put('contact', $request->email ?? $request->phone);

        // Send Email OTP
        if ($request->email) {
            Mail::raw("Your verification code is: $otp", function ($message) use ($request) {
                $message->to($request->email)->subject('GreenInk Login OTP');
            });
        }

        return redirect()->route('verify.otp.page')->with('success', 'OTP sent successfully.');
    }

    public function verifyOtpPage()
    {
        return view('auth.verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required|numeric']);

        if ($request->otp == Session::get('otp')) {
            Session::put('user_logged_in', true);
            return redirect('/dashboard')->with('success', 'Login successful');
        }

        return back()->with('error', 'Invalid OTP, please try again.');
    }
}
