<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\admins\ProductController;
use App\Http\Controllers\TipsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.home');

});
Route::get('/products', [ProductController::class, 'index'])->name('products.index');


Route::get('/about-us', function () {
    return view('frontend.aboutUs.index');

});
Route::get('/tips-skincare', [TipsController::class, 'skincare'])->name('tips-skincare');

Route::get('/register', [AuthController::class, 'showRegisterLoginForm'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Route
Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');


//Category
Route::get('/admin/category', [CategoriesController::class, 'index'])->name('admin.category');           // Read
Route::get('/admin/category/create', [CategoriesController::class, 'create'])->name('admin.category.create'); // Create form
Route::post('/admin/category/store', [CategoriesController::class, 'store'])->name('admin.category.store');   // Store new
// Edit
Route::get('/admin/category/edit/{id}', [CategoriesController::class, 'edit'])->name('admin.category.edit');

// Update
Route::put('/admin/category/update/{id}', [CategoriesController::class, 'update'])->name('admin.category.update');

Route::delete('/admin/category/delete/{id}', [CategoriesController::class, 'destroy'])->name('admin.category.delete');


//Product
// Admin Route
Route::get('/admin/product', [ProductController::class, 'index'])->name('admin.product');           // Read
Route::get('/admin/product/create', [ProductController::class, 'create'])->name('admin.product.create'); // Create form
Route::post('/admin/product/store', [ProductController::class, 'store'])->name('admin.product.store');   // Store new
// Edit
Route::get('/admin/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');

// Update
Route::put('/admin/product/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');

Route::delete('/admin/product/delete/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');
