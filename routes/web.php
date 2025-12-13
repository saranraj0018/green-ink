<?php

use App\Http\Controllers\Frontend\CourseController;
use App\Http\Controllers\Frontend\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about', function () {
    return view('about.main');
})->name('about');


Route::get('/courses', [CourseController::class, 'index'])->name('courses');
Route::get('/view-course', [CourseController::class, 'viewCourse'])->name('view_course');
// web.php
Route::post('/enroll/free', [CourseController::class, 'enrollFree'])->name('enroll.free')->middleware('auth');

Route::get('/features', function () {
    return view('Features.main');
})->name('Features');

Route::get('/contact', function () {
    return view('Contact');
})->name('contact');

Route::post('/contact', [App\Http\Controllers\ContactController::class, 'submit'])
    ->name('contact.submit');
Route::post('/popup-signin', [HomeController::class, 'signin'])->name('popup.signin');
Route::post('/verify-otp', [HomeController::class, 'verifyOtp'])->name('verify.otp');


Route::get('/register', [RegisterController::class, 'index'])->name('register');

//use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OtpController;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/send-otp', [AuthController::class, 'sendOtp'])->name('send.otp');
Route::get('/verify-otp', [AuthController::class, 'verifyOtpPage'])->name('verify.otp.page');
Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('verify.otp');

// web.php

Route::get('/verify-email', function () {
    return view('auth.verify-email');
})->name('verify.email');

Route::post('/verify-otp', [OtpController::class, 'verify'])->name('verify.otp');


Route::get('/sidebar', function () {
    return view('sidebar.main');
})->name('sidebar');


Route::get('/dashboard', function () {
    return view('dashboard.main');
})->name('dashboard');

require __DIR__ . '/admin.php';
