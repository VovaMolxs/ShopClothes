<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
/*
Route::get('/', function () {
    return view('index');
});*/
Route::controller(\App\Http\Controllers\Index\IndexController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('basket', [\App\Http\Controllers\BasketController::class, 'index'])->name('basket');
    Route::post('basket/clear', [\App\Http\Controllers\BasketController::class, 'clear'])->name('basket.clear');
    Route::post('basket/plus/{id}', [\App\Http\Controllers\BasketController::class, 'plus'])->name('basket.plus');
    Route::post('basket/minus/{id}', [\App\Http\Controllers\BasketController::class, 'minus'])->name('basket.minus');
    Route::post('add-basket', [\App\Http\Controllers\BasketController::class, 'add'])->name('add-basket');
    Route::post('basket/remove/{id}', [\App\Http\Controllers\BasketController::class, 'remove'])->name('basket.remove');
    Route::get('products/', [\App\Http\Controllers\Index\IndexController::class, 'products'])->name('catalog');
    Route::get('products/{slug}', [\App\Http\Controllers\Index\IndexController::class, 'products'])->name('catalog');
    Route::get('products/{product}/show', [\App\Http\Controllers\Index\ProductsController::class, 'show'])->name('index.products.show');
    Route::post('products/{product}/show/add-comment', [\App\Http\Controllers\Index\CommentController::class, 'addComment'])->name('addComment');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


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
        });






});

require __DIR__.'/auth.php';
