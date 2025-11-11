<?php


use App\Http\Controllers\CartController;
use App\Http\Controllers\WishController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProfileController;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Shop Route
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/product/{product_slug}', [ShopController::class, 'product_details'])->name('product.details');

//cart Route
Route::get('/cart',[CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add',[CartController::class,'add_to_cart'])->name('cart.add');
Route::put('/cart/increase-Quantity/{rowId}',[CartController::class,'increase_cart_quantity'])->name('cart.qty.increase');
Route::put('/cart/decrease-Quantity/{rowId}',[CartController::class,'decrease_cart_quantity'])->name('cart.qty.decrease');
Route::delete('/cart/remove/{rowId}', [CartController::class, 'removeItem'])->name('cart.remove');
Route::delete('/cart/clear/', [CartController::class, 'empty_cart'])->name('cart.empty');

Route::get('/wishlist', [WishController::class, 'wish_index'])->name('wishlist');


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';




