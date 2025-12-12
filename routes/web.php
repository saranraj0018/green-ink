<?php

use App\Http\Controllers\Frontend\CourseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.main');
})->name('home');

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

// Route::get('/courses/all-courses', function () {
//     return view('all-courses.main');
// })->name('/courses/all-courses');



Route::post('/contact', [App\Http\Controllers\ContactController::class, 'submit'])
    ->name('contact.submit');

//Route::get('/', [MentorController::class, 'index'])->name('home');


//Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');


Route::get('/register', function () {
    return view('auth.register');
})->name('register');



//use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/send-otp', [AuthController::class, 'sendOtp'])->name('send.otp');
Route::get('/verify-otp', [AuthController::class, 'verifyOtpPage'])->name('verify.otp.page');
Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('verify.otp');

// web.php
Route::post('/register', [AuthController::class, 'register'])->name('register');


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
