<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
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
