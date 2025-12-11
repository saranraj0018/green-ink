<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\Authenticate;


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
    });
    
});
