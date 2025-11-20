<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CheckoutController;



Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/', [HomeController::class, 'homeCategory']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Shop Route
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/product/{product_slug}', [ShopController::class, 'product_details'])->name('product.details');

//Wishlist Route
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
Route::get('/wishlist/add/{product_id}', [WishlistController::class, 'store'])->name('wishlist.add');
Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'destroy'])->name('wishlist.remove');
Route::post('/wishlist/move-to-cart/{product_id}', [WishlistController::class, 'moveToCart'])->name('wishlist.moveToCart');

//cart Route
Route::get('/cart',[CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add',[CartController::class,'add_to_cart'])->name('cart.add');
Route::put('/cart/increase-Quantity/{rowId}',[CartController::class,'increase_cart_quantity'])->name('cart.qty.increase');
Route::put('/cart/decrease-Quantity/{rowId}',[CartController::class,'decrease_cart_quantity'])->name('cart.qty.decrease');
Route::delete('/cart/remove/{rowId}', [CartController::class, 'removeItem'])->name('cart.remove');
Route::delete('/cart/clear/', [CartController::class, 'empty_cart'])->name('cart.empty');

//Coupons Resource Routes
Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('coupons', CouponController::class);
});

//coupon Apply Route
Route::post('/cart/apply-coupon', [CartController::class, 'applyCoupon'])->name('cart.applyCoupon');
Route::delete('/cart/remove-coupon', [CartController::class, 'removeCoupon'])->name('cart.removeCoupon');

//Shipping Checkout Routes
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/order-confirmation/{order_id}', [CheckoutController::class, 'confirmation'])->name('order.confirmation');


// user order routes
Route::middleware(['auth', 'user'])->group(function () {

    Route::get('/user/dashboard', [UserController::class, 'userDashboard'])->name('user.dashboard');
    Route::get('/my-orders', [UserController::class, 'index'])->name('user.orders');
    Route::get('/my-orders/{order}', [UserController::class, 'show'])->name('user.orders.show');
    Route::put('my-orders/{order}/cancel', [UserController::class,'cancelOrder'])->name('user.orders.cancel');

});

  
    Route::get('/contact',[ContactController::class,'contact'])->name('contact.page');
    Route::post('/contact/submit/',[ContactController::class, 'store'])->name('contact.submit');







require __DIR__.'/auth.php';
require __DIR__.'/admin.php';




