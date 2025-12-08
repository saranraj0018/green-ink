<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
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
