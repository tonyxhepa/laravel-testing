<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return 'About page';
});

Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('products/create', [ProductController::class, 'create'])->middleware('admin')->name('products.create');
Route::post('products', [ProductController::class, 'store'])->middleware('admin')->name('products.store');
Route::get('products/{product:id}/edit', [ProductController::class, 'edit'])->middleware('admin')->name('products.edit');
Route::put('products/{product:id}', [ProductController::class, 'update'])->middleware('admin')->name('products.update');
Route::delete('products/{product:id}', [ProductController::class, 'destroy'])->middleware('admin')->name('products.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
