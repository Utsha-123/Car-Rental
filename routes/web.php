<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoriesController;

// Route::get('/', [TestController::class,'index']);

// Route::get('/store-session', [TestController::class,'StoreSession']);
// Route::get('/delete-session', [TestController::class,'DeleteSession']);



Route::get('/about-us', [UserController::class, 'aboutus'])->name('about-us');
Route::get('/deals', [UserController::class, 'deals'])->name('deals');
Route::get('/choose-us', [UserController::class, 'chooseus'])->name('choose-us');
Route::get('/testimonials', [UserController::class, 'testimonials'])->name('testimonials');


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'handleLogin']);
Route::get('/registration', [AuthController::class, 'registration'])->name('registration');
Route::post('/registration', [AuthController::class, 'handleRegistration']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/homepage', [AuthController::class, 'homepage'])->name('homepage');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware(['auth','is-admin:admin'])->name('dashboard');

// homepage     
Route::get('/', [UserController::class, 'welcome'])->name('welcome');


// Categories
Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
Route::get('/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoriesController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}/update', [CategoriesController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}/delete', [CategoriesController::class, 'delete'])->name('categories.delete');

// Products
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{id}/update', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{id}/delete', [ProductController::class, 'delete'])->name('product.delete');
Route::get('/available-cars', [ProductController::class, 'availableCars'])->name('available.cars');

Route::middleware(['auth'])->group(function () {
    Route::get('/booknow/{vehicle_id}', [BookingController::class, 'create'])->name('book.vehicle');
    Route::post('/booknow', [BookingController::class, 'store'])->name('booking.store');
    Route::post('/booking/calculate-price', [BookingController::class, 'calculatePrice'])->name('booking.calculatePrice');

});


