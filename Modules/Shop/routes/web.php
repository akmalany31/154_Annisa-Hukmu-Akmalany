<?php

use Illuminate\Support\Facades\Route;
use Modules\Shop\App\Http\Controllers\ShopController;
use Modules\Shop\App\Http\Controllers\ProductController;
use Modules\Shop\App\Http\Controllers\CartController;
use Modules\Shop\App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/category/{categorySlug}', [ProductController::class, 'category'])->name('products.category');

Route::middleware(['auth'])->group(function () {
    Route::get('orders/checkout', [OrderController::class, 'checkout'])->name('orders.checkout');
    Route::post('orders/shipping-fee', [OrderController::class, 'shippingFee'])->name('orders.shipping_fee');
    Route::post('orders/choose-package', [OrderController::class, 'choosePackage'])->name('orders.choose_package');

    Route::get('/carts', [CartController::class, 'index'])->name('carts.index');
    Route::get('/carts/{id}/remove', [CartController::class, 'destroy'])->name('carts.destroy');
    Route::post('/carts', [CartController::class, 'store'])->name('carts.store');
    Route::put('/carts', [CartController::class, 'update'])->name('carts.update');
});
Route::get('/{categorySlug}/{productSlug}', [ProductController::class, 'show'])->name('products.show');

Route::group([], function () {
    Route::resource('shop', ShopController::class)->names('shop');
});
