<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\Index\IndexController::class)->group(function () {
    Route::get('/', 'index')->name('index');

    Route::get('login/{provider}', [\App\Http\Controllers\LoginController::class, 'redirectToProvider']);
    Route::get('{provider}/callback', [\App\Http\Controllers\LoginController::class, 'handleProviderCallback']);
    Route::get('/home', function() {
        return 'User is logged in';
    });
    Route::get('basket', [\App\Http\Controllers\BasketController::class, 'index'])->name('basket');
    Route::post('basket/clear', [\App\Http\Controllers\BasketController::class, 'clear'])->name('basket.clear');
    Route::post('basket-plus', [\App\Http\Controllers\BasketController::class, 'plus'])->name('basket-plus');
    Route::post('basket-minus', [\App\Http\Controllers\BasketController::class, 'minus'])->name('basket-minus');
    Route::post('add-basket', [\App\Http\Controllers\BasketController::class, 'add'])->name('add-basket');
    Route::post('basket-remove', [\App\Http\Controllers\BasketController::class, 'remove'])->name('basket-remove');
    Route::get('checkout', [\App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout');
    Route::post('addOrder', [\App\Http\Controllers\CheckoutController::class, 'addOrder'])->name('addOrder');
    Route::get('checkout_success', [\App\Http\Controllers\CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('products/', [\App\Http\Controllers\Index\IndexController::class, 'products'])->name('catalog');
    Route::get('products/{slug}', [\App\Http\Controllers\Index\IndexController::class, 'products'])->name('catalog.slug');
    Route::get('products/{product}/show', [\App\Http\Controllers\Index\ProductsController::class, 'show'])->name('index.products.show');
    Route::post('products/{product}/add-basket', [\App\Http\Controllers\BasketController::class, 'add'])->name('add-basket');
    Route::post('products/{product}/show/add-comment', [\App\Http\Controllers\Index\CommentController::class, 'addComment'])->name('addComment');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function() {
    Route::match(['GET', 'POST'], '/payments/callback', [\App\Http\Controllers\PaymentController::class, 'callback'])->name('payment.callback');
    Route::post('/payments/create', [\App\Http\Controllers\PaymentController::class, 'create'])->name('payment.create');
    Route::get('/payments', [\App\Http\Controllers\PaymentController::class, 'index'])->name('payment.index');
});


Route::middleware('auth')->group(function() {
    Route::middleware('auth')->prefix('user')->group(function() {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    });



   Route::middleware('admin')->prefix('admin')->group(function() {
       Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.index');
       Route::resource('categories', \App\Http\Controllers\Admin\CategoriesController::class);
       Route::resource('products', \App\Http\Controllers\Admin\ProductsController::class);
       Route::resource('reviews', \App\Http\Controllers\Admin\ReviewsController::class);
       Route::resource('orders', \App\Http\Controllers\Admin\OrderController::class);
       Route::get('transaction', [\App\Http\Controllers\Admin\TransactionController::class, 'index'])->name('transaction.index');
        });






});

require __DIR__.'/auth.php';
