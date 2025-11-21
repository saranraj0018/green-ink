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
    return view('about');
})->name('about');

Route::get('/Courses', function () {
    return view('Courses');
})->name('Courses');

Route::get('/Features', function () {
    return view('Features');
})->name('Features');

Route::get('/Contact', function () {
    return view('Contact');
})->name('Contact');

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





use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');




