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
    Route::get('products/{product}/show', [\App\Http\Controllers\Index\ProductsController::class, 'show'])->name('index.products.show');
    Route::post('products/{product}/show/add-comment', [\App\Http\Controllers\Admin\CommentController::class, 'addComment'])->name('addComment');
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
        });






});

require __DIR__.'/auth.php';
