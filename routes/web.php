<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Master\VendorController;

use App\Http\Controllers\Master\ProductController;

use App\Http\Controllers\Master\HowtobuyController;

use App\Http\Controllers\Master\AboutusController;

use App\Http\Controllers\Master\EkspedisiController;

use App\Http\Controllers\Master\BankController;

use App\Http\Controllers\Master\LocationController;

use App\Http\Controllers\Transaction\StockController;

use Illuminate\Support\Facades\Validator;


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

Route::get('master/howtobuy', [HowtobuyController::class, 'index'])->name('howtobuy.index');

Route::get('master/howtobuy/create', [HowtobuyController::class, 'create'])->name('howtobuy.create');

Route::get('howtobuy/datatable', [HowtobuyController::class, 'datatable'])->name('howtobuy.datatable');

Route::post('master/howtobuy/store', [HowtobuyController::class, 'store'])->name('howtobuy.store');

Route::get('master/aboutus', [AboutusController::class, 'index'])->name('aboutus.index');
Route::get('master/aboutus/create', [AboutusController::class, 'create'])->name('aboutus.create');
Route::get('aboutus/datatable', [AboutusController::class, 'datatable'])->name('aboutus.datatable');
Route::post('master/aboutus/store', [AboutusController::class, 'store'])->name('aboutus.store');

Route::get('master/ekspedisi', [EkspedisiController::class, 'index'])->name('ekspedisi.index');
Route::get('master/ekspedisi/create', [EkspedisiController::class, 'create'])->name('ekspedisi.create');
Route::get('ekspedisi/datatable', [EkspedisiController::class, 'datatable'])->name('ekspedisi.datatable');
Route::post('master/ekspedisi/store', [EkspedisiController::class, 'store'])->name('ekspedisi.store');

Route::get('master/bank', [BankController::class, 'index'])->name('bank.index');
Route::get('master/bank/create', [BankController::class, 'create'])->name('bank.create');
Route::get('bank/datatable', [BankController::class, 'datatable'])->name('bank.datatable');
Route::post('master/bank/store', [BankController::class, 'store'])->name('bank.store');

Route::get('master/location', [LocationController::class, 'index'])->name('location.index');
Route::get('master/location/create', [LocationController::class, 'create'])->name('location.create');
Route::get('location/datatable', [LocationController::class, 'datatable'])->name('location.datatable');
Route::post('master/location/store', [LocationController::class, 'store'])->name('location.store');




//Warehouse
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('stock', [App\Http\Controllers\Transaction\StockController::class, 'index'])->name('index');
Route::get('stock/print', [App\Http\Controllers\Transaction\StockController::class, 'print'])->name('print');
Route::post('stock/update/{id}', [App\Http\Controllers\Transaction\StockController::class, 'update'])->name('stock/update');
Route::get('stock/export', [App\Http\Controllers\Transaction\StockController::class, 'stockExport'])->name('exportstock');
Route::get('search', [App\Http\Controllers\Transaction\StockController::class, 'search'])->name('search');
Route::get('search2', [App\Http\Controllers\Transaction\StockController::class, 'search'])->name('search2');
//Route::get('search3', 'StockController@search')->name('search3');