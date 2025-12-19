<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\Dashboard;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\Authenticate;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\Admin\EventController;

Route::prefix('admin')->group(function () {

    Route::middleware(['guest'])->as('admin.')->group(function () {
        Route::view('/login', 'admin.auth.login')->name('login');
        Route::view('/register', 'admin.auth.register')->name('register');

        Route::controller(Authenticate::class)->group(function () {
            Route::post('/authenticate', 'adminAuthenticate')->name('authenticate');
            Route::post('/register/update', 'registerUpdate')->name('register.update');
        });
    });

    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [Dashboard::class, 'index'])->name('admin.dashboard');
        Route::get('/logout', [Authenticate::class, 'logout'])->name('admin.logout');
        Route::post('/user_logout', [Authenticate::class, 'user_logout'])->name('admin.user_logout');

        Route::prefix('category')->controller(CategoryController::class)->group(function () {
            Route::get('/list', 'view')->name('view.category');
            Route::post('/save', 'save')->name('save.category');
            Route::post('/delete', 'destroy')->name('delete.category');
        });

        Route::prefix('event')->controller(EventController::class)->group(function () {
            Route::get('/list', 'view')->name('view.event');
            Route::post('/save', 'save')->name('save.event');
            Route::post('/delete', 'destroy')->name('delete.event');
            Route::get('/registrations', 'index')->name('event.registrations');
        });

        Route::prefix('career')->controller(CareerController::class)->group(function () {
            Route::get('/list', 'view')->name('view.career');
            Route::post('/save', 'save')->name('save.career');
            Route::post('/delete', 'destroy')->name('delete.career');
            Route::get('/applications', 'index')->name('career.applications');
        });

        Route::get('/course-list', [CourseController::class, 'index'])->name('course_list');
        Route::post('/course-save', [CourseController::class, 'courseSave'])->name('course_save');
        Route::post('/course-delete', [CourseController::class, 'courseDelete'])->name('course_delete');

    });

});
