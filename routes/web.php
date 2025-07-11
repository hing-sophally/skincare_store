<?php

use App\Http\Controllers\ProductController;
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
