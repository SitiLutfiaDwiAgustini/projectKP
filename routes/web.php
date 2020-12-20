<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Master\VendorController;

use App\Http\Controllers\Master\ProductController;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('master/vendor', [VendorController::class, 'index'])->name('vendor.index');

Route::get('master/vendor/create', [VendorController::class, 'create'])->name('vendor.create');

Route::get('vendor/datatable', [VendorController::class, 'datatable'])->name('vendor.datatable');

Route::get('master/product', [ProductController::class, 'index'])->name('product.index');

Route::get('master/product/create', [ProductController::class, 'create'])->name('product.create');

Route::get('product/datatable', [VendorController::class, 'datatable'])->name('product.datatable');

Route::post('master/product/store', [ProductController::class, 'store'])->name('product.store');

Route::post('master/vendor/store', [VendorController::class, 'store'])->name('vendor.store');