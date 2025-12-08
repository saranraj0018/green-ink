<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OtpController extends Controller
{
    public function verify(Request $request)
    {
        $otp = implode('', $request->otp);

        if ($otp == session('otp_code')) {
            return redirect()->route('dashboard')->with('success', 'Email verified!');
        }

        return back()->withErrors(['otp' => 'Invalid OTP, please try again.']);
    }
}
