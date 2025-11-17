<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\admin\OrderController;


// Admin Dashboard (only for admin)
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/brands', [AdminController::class, 'brands'])->name('admin.brands');
    Route::get('/admin/brands/add', [AdminController::class, 'addBrands'])->name('admin.brandAdd');
    Route::post('/admin/brands/store', [AdminController::class, 'storeBrands'])->name('admin.brandStore');

    Route::get('/brands/{id}/edit', [AdminController::class, 'edit'])->name('brands.edit');
    Route::post('/brands/{id}', [AdminController::class, 'update'])->name('brands.update');
    Route::delete('/brands/{id}/delete', [AdminController::class, 'delete'])->name('brands.delete');

//category Routes
    Route::get('/admin/categories', [AdminController::class, 'categories'])->name('admin.categories');
    Route::get('/admin/category/add',[AdminController::class, 'category_add'])->name('admin.categoryAdd');
    Route::post('/admin/category/store',[AdminController::class, 'category_store'])->name('admin.categoryStore');

    Route::get('/category/{id}/edit', [AdminController::class, 'category_edit'])->name('category.edit');
    Route::post('/category/{id}', [AdminController::class, 'category_update'])->name('category.update');
    Route::delete('/category/{id}/delete', [AdminController::class, 'category_delete'])->name('category.delete');

  // সব products দেখার জন্য
    Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');

    // Add Product form দেখানোর জন্য
    Route::get('/admin/products/add', [AdminController::class, 'products_add'])->name('admin.products.add');

    // Product save করার জন্য (POST)
    Route::post('/admin/products/store', [AdminController::class, 'products_store'])->name('admin.products.store');

    Route::get('/admin/products/view/{id}', [AdminController::class, 'viewProduct'])->name('admin.products.view');
    Route::get('/admin/products/edit/{id}', [AdminController::class, 'editProduct'])->name('admin.products.edit');
    Route::put('/admin/products/update/{id}', [AdminController::class, 'updateProduct'])->name('admin.products.update');
    Route::delete('/admin/products/delete/{id}', [AdminController::class, 'deleteProduct'])->name('admin.products.delete');

    // Orders Routes
    Route::get('/admin/orders',[OrderController::class,'index'])->name('admin.orders.index');
   Route::get('/admin/orders/{id}/details', [OrderController::class,'orderDetails'])->name('admin.orders.details');
    




Route::post('/admin/orders/update-status/{id}', [OrderController::class, 'updateStatus'])
      ->name('admin.orders.updateStatus');




});






// User Dashboard (only for normal user)
Route::middleware(['auth', 'user'])->group(function () {

    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');





});

