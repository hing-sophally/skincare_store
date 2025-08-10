<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\admins\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FrontendProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SkincareTipController;
use App\Http\Controllers\TipsController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = Product::all();
    $categories = Category::all();
    return view('frontend.home',compact('products','categories'));

});






Route::get('/products', [FrontendProductController::class, 'index'])->name('products.index');
Route::get('/shop/filter/{categoryId}', [ShopController::class, 'filterByCategory']);



Route::get('/about-us', function () {
    return view('frontend.aboutUs.index');

});
Route::get('/tips-skincare', [TipsController::class, 'skincare'])->name('tips-skincare');

Route::get('/register', [AuthController::class, 'showRegisterLoginForm'])->name('login');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return Auth::user();
});
Route::middleware('auth:sanctum')->get('/logout', [AuthController::class, 'logout']);
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



//Role

// List all roles
Route::get('/admin/roles', [RoleController::class, 'index'])->name('admin.roles.index');

// Show create form
Route::get('/admin/roles/create', [RoleController::class, 'create'])->name('admin.roles.create');

// Store new role
Route::post('/admin/roles', [RoleController::class, 'store'])->name('admin.roles.store');

// Show a specific role (optional if you use show page)
Route::get('/admin/roles/{role}', [RoleController::class, 'show'])->name('admin.roles.show');

// Show edit form
Route::get('/admin/roles/{role}/edit', [RoleController::class, 'edit'])->name('admin.roles.edit');

// Update role
Route::put('/admin/roles/{role}', [RoleController::class, 'update'])->name('admin.roles.update');

// Delete role
Route::delete('/admin/roles/{role}', [RoleController::class, 'destroy'])->name('admin.roles.destroy');



Route::resource('admin/discounts', \App\Http\Controllers\admins\DiscountController::class);



//Checkout
Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout');
Route::get('/payment/success', function () {
    return view('frontend.payment-success');
})->name('payment.success');




// List all tips
Route::get('/admin/skincare-tip', [SkincareTipController::class, 'index'])->name('admin.skincaretips.index');

// Show form to create a new tip
Route::get('/admin/skincare-tip/create', [SkincareTipController::class, 'create'])->name('admin.skincaretips.create');

// Store the new tip
Route::post('/admin/skincare-tip', [SkincareTipController::class, 'store'])->name('admin.skincaretips.store');

// Show a single tip (optional)
Route::get('/admin/skincare-tip/{id}', [SkincareTipController::class, 'show'])->name('admin.skincaretips.show');

// Show form to edit a tip
Route::get('/admin/skincare-tip/{id}/edit', [SkincareTipController::class, 'edit'])->name('admin.skincaretips.edit');

// Update the tip
Route::put('/admin/skincare-tip/{id}', [SkincareTipController::class, 'update'])->name('admin.skincaretips.update');

// Delete the tip
Route::delete('/admin/skincare-tip/{id}', [SkincareTipController::class, 'destroy'])->name('admin.skincaretips.destroy');




