<?php

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminSaleController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminStatisticController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SellerProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/products', [ProductController::class, 'index'])->name('product');
Route::get('/products/{id}', [ProductController::class, 'detail'])->name("product.detail");
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::middleware(['auth', 'admin'])->group(function () {
    // Routes accessible only to admin
    Route::get('/admin', [AdminController::class, 'index'])->name("admin.home.index");
    Route::get('/admin/categories', [AdminCategoryController::class, 'index'])->name("admin.category.index");
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.user.index');
    Route::get('/admin/sales', [AdminSaleController::class, 'index'])->name('admin.sale.index');
    Route::get('/admin/statistics', [AdminStatisticController::class, 'index'])->name('admin.statistic.index');
});

Route::middleware(['auth', 'seller'])->group(function () {
    // Routes accessible only to sellers
    Route::get('/seller', [SellerController::class, 'index'])->name("seller.home.index");
    Route::get('/seller/products', [SellerProductController::class, 'index'])->name("seller.product.index");

    // Aksi CRUD pada model Product
    Route::post('/seller/products/store', [SellerProductController::class, 'store'])->name("seller.product.store");
    Route::delete('/seller/products/{id}/delete', [SellerProductController::class, 'delete'])->name("seller.product.delete");
    Route::get('/seller/products/{id}/edit', [SellerProductController::class, 'edit'])->name("seller.product.edit");
    Route::put('/seller/products/{id}/update', [SellerProductController::class, 'update'])->name("seller.product.update");
});

Route::middleware(['auth', 'customer'])->group(function () {
    // Routes accessible only to customers
});
