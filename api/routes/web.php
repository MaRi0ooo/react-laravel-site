<?php

use App\Http\Controllers\OrderProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

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

Route::get('/', function () {
    return view('welcome');
});


/* PRODUCT */
Route::get('product', [ProductController::class, 'indexView'])->name('product');
Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('product', [ProductController::class, 'storeView'])->name('product.store');
Route::get('product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('product/{id}', [ProductController::class, 'updateView'])->name('product.update');
Route::delete('product/{id}', [ProductController::class, 'destroyView'])->name('product.destroy');

/* CATEGORY */
Route::get('category', [CategoryController::class, 'indexView'])->name('category');
Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('category', [CategoryController::class, 'storeView'])->name('category.store');
Route::get('category/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::get('category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('category/{id}', [CategoryController::class, 'updateView'])->name('category.update');
Route::delete('category/{id}', [CategoryController::class, 'destroyView'])->name('category.destroy');

/* ORDER */
Route::get('order', [OrderController::class, 'indexView'])->name('order');
Route::get('order/create', [OrderController::class, 'create'])->name('order.create');
Route::post('order', [OrderController::class, 'storeView'])->name('order.store');
Route::get('order/{id}', [OrderController::class, 'show'])->name('order.show');
Route::get('order/{id}/edit', [OrderController::class, 'edit'])->name('order.edit');
Route::put('order/{id}', [OrderController::class, 'updateView'])->name('order.update');
Route::delete('order/{id}', [OrderController::class, 'destroyView'])->name('order.destroy');

/* ORDER PRODUCT */
Route::get('order-product', [OrderProductController::class, 'indexView'])->name('order-product');
Route::get('order-product/create', [OrderProductController::class, 'create'])->name('order-product.create');
Route::post('order-product', [OrderProductController::class, 'storeView'])->name('order-product.store');
Route::get('order-product/{id}', [OrderProductController::class, 'show'])->name('order-product.show');
Route::get('order-product/{id}/edit', [OrderProductController::class, 'edit'])->name('order-product.edit');
Route::put('order-product/{id}', [OrderProductController::class, 'updateView'])->name('order-product.update');
Route::delete('order-product/{id}', [OrderProductController::class, 'destroyView'])->name('order-product.destroy');