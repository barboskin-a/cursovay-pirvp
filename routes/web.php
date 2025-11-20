<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\AdminController;

//
//Route::get('/', function () {
//    return view('index', ['products' => Product::all()]);
//})->name('index');

//ПУТЬ С ПАГИНАЦИЕЙ
Route::get('/', [IndexController::class, 'index']) -> name('index');



Route::get('/map', function () {
    return view('map');
})->name('map');

Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog');

Route::get('/product_card/{id}', [CatalogController::class, 'product_card'])->name('product_card');

Route::post('/add_to_favourites/{id}', [CatalogController::class, 'add_to_favourites'])->name('add_to_favourites');

Route::get('/resources', function () {
    return view('resources');
})->name('resources');

Route::get('/about_us', function () {
    return view('about_us');
})->name('about_us');

Route::get('/account', function () {
    return view('account');
})->name('account');

Route::get('/designer_product', function () {
    return view('designer_product');
})->name('designer_product');

Route::get('/error_403', function () {
    return view('error_403');
})->name('error_403');

Route::get('/error_404', function () {
    return view('error_404');
})->name('error_404');

Route::get('/error_500', function () {
    return view('error_500');
})->name('error_500');

//ИЗБРАННОЕ
Route::get('/favourites', [\App\Http\Controllers\CatalogController::class, 'view_favourites'])->name('favourites');

Route::get('/order', function () {
    return view('order');
})->name('order');

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

Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('index');
    Route::resource('/users', AdminController::class);
});


//личный кабинет update
// Показ формы редактирования профиля
//Route::middleware('auth')->get('/account/edit', [UserController::class, 'edit'])
//    ->name('account.edit');

// Сохранение изменений профиля
Route::middleware('auth')->put('/account/edit', [\App\Http\Controllers\AccountController::class, 'update'])
    ->name('account.update');

//admin

Route::get('/admin_panel', function () {
    return view('admin_panel');
})->name('admin_panel');



Route::middleware('auth')->group(function () {
    Route::get('/account/delete', [\App\Http\Controllers\UserController::class, 'showDelete'])
        ->name('account.delete.form');

    Route::delete('/account/delete', [\App\Http\Controllers\UserController::class, 'destroy'])
        ->name('account.delete');
});

//АДМИН

Route::middleware('admin')->group(function () {
    Route::get('/catalog_admin', [\App\Http\Controllers\AdminController::class, 'index'])
        ->name('catalog_admin');

//    Route::delete('/account/delete', [\App\Http\Controllers\UserController::class, 'destroy'])
//        ->name('account.delete');
});