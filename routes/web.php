<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/my-page', function () {
    return view('my-page');
});
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about.main');
})->name('about');

Route::get('/Courses', function () {
    return view('courses.main');
})->name('Courses');

Route::get('/Features', function () {
    return view('Features.main');
})->name('Features');

Route::get('/Contact', function () {
    return view('Contact');
})->name('Contact');
Route::get('/Carrier', function () {
    return view('Carrier');
})->name('Carrier');
Route::get('/Store', function () {
    return view('Store');
})->name('Store');
Route::get('/Blogs', function () {
    return view('Blogs');
})->name('Blogs');
Route::get('/Contactus', function () {
    return view('Contactus');
})->name('ContactUs');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'submit'])
    ->name('contact.submit');

Route::get('/Events', function () {
    return view('Events');
})->name('Career');
Route::get('/Career', function () {
    return view('Career');
})->name('Events');
Route::get('/WebDevelopment', function () {
    return view('WebDevelopment');
})->name('WebDevelopment');

Route::get('/DataScience', function () {
    return view('DataScience');
})->name('DataScience');

Route::get('/Business', function () {
    return view('Business');
})->name('Business');

Route::get('/Design', function () {
    return view('Design');
})->name('Design');

Route::get('/Design', function () {
    return view('Design');
})->name('Design');

Route::get('/homesection', function () {
    return view('homesection');
})->name('homesection');


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


