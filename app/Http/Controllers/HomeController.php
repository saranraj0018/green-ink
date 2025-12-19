<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        if ($request->has('sign_in_submit')) {
            try {
                if($request->email){
                    $validator = Validator::make($request->all(), [
                        'email' => 'required|email|unique:users,email',
                    ]);
                }else if($request->mobile_number){
                    $validator = Validator::make($request->all(), [
                        'mobile_number' => 'required|digits_between:10,15|unique:users,mobile_number',
                    ]);
                }

                if ($validator->fails()) {
                    return redirect()->route('home')
                        ->withErrors($validator) // send errors
                        ->withInput(); // keep input values
                }

                if (!Auth::guard('users')->attempt([
                    'email' => $request['email'],
                 ], $request->get('remember'))) {
                    return redirect()->route('home')->withErrors(['password' => 'Either Email/Password is incorrect'])
                        ->withInput($request->only('email'));
                }

                return redirect()->route('home')
                    ->with('success', 'Sign In successfully!');
            } catch (\Exception $e) {
                return redirect()->route('home')
                    ->with('error', 'Failed to Sign In' . $e->getMessage())
                    ->withInput();
            }
        }

        if ($request->has('register_submit')) {
            try {
                // Validate form inputs
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|unique:users,email',
                    'mobile_number' => 'required|digits_between:10,15|unique:users,mobile_number',
                ]);

                if ($validator->fails()) {
                    return redirect()->route('home')
                        ->withErrors($validator) // send errors
                        ->withInput(); // keep input values
                }

                // Create user
                $user = new User();
                $user->name          = $request->name;
                $user->email         = $request->email;
                $user->mobile_number = $request->mobile_number;
                $user->save();

                return redirect()->route('home')
                    ->with('success', 'Account created successfully!');
            } catch (\Exception $e) {
                return redirect()->route('home')
                    ->with('error', 'Failed to create account: ' . $e->getMessage())
                    ->withInput();
            }
        }

        $this->data['course'] = Course::with('get_category')->get();

        return view('home.main')->with($this->data);
    }

     public function index()
    {
        $this->data['categories'] = [
            [
                'title' => 'Development',
                'courses' => '150+ Courses',
                'image' => 'assets/Group 585.png'
            ],
            [
                'title' => 'Business',
                'courses' => '120+ Courses',
                'image' => 'assets/business.png'
            ],
            [
                'title' => 'UI/UX Design',
                'courses' => '90+ Courses',
                'image' => 'assets/design.png'
            ],
        ];

     //  return view('home.main', $this->data);

    }

    public function signin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'nullable|email|exists:users,email',
            'phone' => 'nullable|digits:10|exists:users,phone',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Find user
        $user = User::where('email', $request->email)
            ->orWhere('phone', $request->phone)
            ->first();

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found.',
            ], 404);
        }

        // Generate OTP (6 digits)
        $otp = rand(100000, 999999);
        $user->otp = Hash::make($otp); // save hashed OTP
        $user->otp_created_at = now();
        $user->save();

        // Here: send OTP via email or SMS
        // Mail::to($user->email)->send(new SendOtpMail($otp));

        return response()->json([
            'status' => 'success',
            'message' => 'OTP sent successfully.',
        ]);
    }

    // Step 2: Verify OTP
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required_without:phone|exists:users,email',
            'phone' => 'required_without:email|exists:users,phone',
            'otp' => 'required|digits:6',
        ]);

        $user = User::where('email', $request->email)
            ->orWhere('phone', $request->phone)
            ->first();

        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'User not found'], 404);
        }

        // Check OTP
        if (!Hash::check($request->otp, $user->otp)) {
            return response()->json(['status' => 'error', 'message' => 'Invalid OTP'], 422);
        }

        // Login user
        Auth::login($user);

        // Clear OTP
        $user->otp = null;
        $user->otp_created_at = null;
        $user->save();

        return response()->json(['status' => 'success', 'message' => 'Logged in successfully']);
    }

}
