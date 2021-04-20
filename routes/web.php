<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('customer', [CustomerController::class, 'index'])->name('customer.index');
Route::resource('customer', CustomerController::class);
Route::resource('product', ProductController::class);

Route::resource('order', OrderController::class);
Route::get('order', [OrderController::class, 'index'])->name('order.index');

Route::get('/{id}', [OrderController::class, 'create'])->name('orders');
Route::get('/{product_price}', [OrderController::class, 'create']);
