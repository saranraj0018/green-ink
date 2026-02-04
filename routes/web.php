<?php

use App\Http\Controllers\Frontend\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CareerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CashfreeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BookCashfreeController;
use App\Http\Controllers\EventCashfreeController;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::view('/about', 'about.main')->name('about');
Route::view('/features', 'Features.main')->name('features');
Route::view('/contact', 'Contact')->name('contact');
Route::view('/subscription', 'subscription.main')->name('subscription');
Route::view('/cart', 'cart.main')->name('cart');
Route::view('/checkout-page', 'cart.checkout.main')->name('checkout-page');
Route::view('/checkout', 'checkout.main')->name('checkout');

Route::get('/store', [BookController::class, 'store'])->name('store');
    // Event Routes
Route::get('/events', [EventController::class, 'events'])->name('events');
Route::post('/event-register', [EventController::class, 'store'])
    ->name('event.register');

    // Career Routes
Route::get('/careers', [CareerController::class, 'index'])->name('careers');
Route::post('/career/apply', [CareerController::class, 'store'])
    ->name('career.apply');
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

 // course Payment Routes
Route::post('/cashfree/payments/store', [CashfreeController::class, 'payment'])->name('cashfree.payment');
Route::any('/cashfree/payments/success', [CashfreeController::class, 'success'])->name('cashfree.success');

//Book Payment Routes
Route::post('/cashfree/payments/store',[BookCashfreeController::class,'payment'])->name('cashfree.payment');
Route::any('/cashfree/payments/success',[BookCashfreeController::class,'success'])->name('cashfree.success');

//Event Payment
Route::post('/cashfree/payments/store',[EventCashfreeController::class,'payment'])->name('cashfree.payment');
Route::any('/cashfree/payments/success',[EventCashfreeController::class,'success'])->name('cashfree.success');

require __DIR__ . '/admin.php';
