<?php

use App\Http\Controllers\Frontend\CourseController;
use App\Http\Controllers\Frontend\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CashfreeController;



Route::get('/', [HomeController::class, 'home'])->name('home');
Route::view('/about', 'about.main')->name('about');
Route::view('/features', 'Features.main')->name('features');
Route::view('/contact', 'Contact')->name('contact');
Route::view('/verify-email', 'auth.verify-email')->name('verify.email');
Route::view('/dashboard', 'dashboard.main')->name('dashboard');

Route::get('/courses', [CourseController::class, 'index'])->name('courses');
Route::get('/view-course', [CourseController::class, 'viewCourse'])->name('view_course');
// web.php
Route::post('/enroll/free', [CourseController::class, 'enrollFree'])->name('enroll.free');

Route::post('/contact', [App\Http\Controllers\ContactController::class, 'submit'])->name('contact.submit');
Route::post('/popup-signin', [HomeController::class, 'signin'])->name('popup.signin');
Route::post('/verify-otp', [HomeController::class, 'verifyOtp'])->name('verify.otp');

Route::post('/register', [AuthController::class, 'register'])->name('register.update');
Route::post('/send-otp', [AuthController::class, 'sendOtp'])->name('send.otp');
Route::get('/verify-otp', [AuthController::class, 'verifyOtpPage'])->name('verify.otp.page');
Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('verify.otp');

Route::view('/success/payment/page', 'payment-success');
Route::view('/failure/payment/page', 'payment-fail');

Route::post('/cashfree/payments/store', [CashfreeController::class, 'payment'])->name('cashfree.payment');
Route::any('/cashfree/payments/success', [CashfreeController::class, 'success'])->name('cashfree.success');


require __DIR__ . '/admin.php';
