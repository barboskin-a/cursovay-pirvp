<?php

use Illuminate\Support\Facades\Route;

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('/map', function () {
    return view('map');
})->name('map');

Route::get('/catalog', function () {
    return view('catalog');
})->name('catalog');

Route::get('/resources', function () {
    return view('resources');
})->name('resources');

Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');

Route::get('/account', function () {
    return view('account');
})->name('account');

Route::get('/designer-product', function () {
    return view('designer-product');
})->name('designer-product');

Route::get('/error-403', function () {
    return view('error-403');
})->name('error-403');

Route::get('/error-404', function () {
    return view('error-404');
})->name('error-404');

Route::get('/error-500', function () {
    return view('error-500');
})->name('error-500');

Route::get('/favourites', function () {
    return view('favourites');
})->name('favourites');

Route::get('/favourites-empty', function () {
    return view('favourites-empty');
})->name('favourites-empty');

//login

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [\App\Http\Controllers\UserController::class, 'login'])->name('login');

Route::get('/order', function () {
    return view('order');
})->name('order');

//registraion

Route::get('/registration', function () {
    return view('registration');
})->name('registration');

Route::post('/registration', [\App\Http\Controllers\UserController::class, 'registration'])->name('registration');

Route::post('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');