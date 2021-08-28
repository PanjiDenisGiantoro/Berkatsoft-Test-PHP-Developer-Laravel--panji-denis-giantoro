<?php

use App\Http\Controllers\FakturController;
use App\Http\Controllers\GoodsStocksController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\GoodsController;
use App\Http\Controllers\lapMasuk;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PengeluaranKotorrController;
use App\Http\Controllers\DashboarController;
use App\Http\Controllers\CustomerController;
    use App\Http\Controllers\Task1Controller;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\SalesController;


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

Route::group([ "middleware" => ['auth:sanctum', 'verified'] ], function() {


    //task
    Route::get('/task1',[Task1Controller::class,'index'])->name('task1.index');
    Route::get('/task1/answer',[Task1Controller::class,'answer'])->name('taks1.answer');
    Route::post('/task1/cek',[Task1Controller::class,'cek'])->name('task1.cek');

//produk
    Route::get('/product',[ProductController::class,'index'])->name('produk.index');
    Route::get('/list/product',[ProductController::class,'list'])->name('produk.list');
    Route::post('/product/store',[ProductController::class,'store'])->name('produk.store');
    Route::post('/product/update',[ProductController::class,'update'])->name('produk.update');
    Route::get('/produk/list-produk', [ProductController::class, "getListProduk"])->name('produk.getlistproduk');
    Route::get('/produk/delete/{id}', [ProductController::class, "destroy"])->name('produk.destroy');
    Route::get('/produk/edit/{id}', [ProductController::class, "edit"])->name('produk.edit');

//customer
    Route::get('/customer',[CustomerController::class,'index'])->name('customer.index');
    Route::get('/list/customer',[CustomerController::class,'list'])->name('customer.list');
    Route::post('/customer/store',[CustomerController::class,'store'])->name('customer.store');
    Route::post('/customer/update',[CustomerController::class,'update'])->name('customer.update');
    Route::get('/customer/list-customer', [CustomerController::class, "getListCustomer"])->name('customer.getlistcustomer');
    Route::get('/customer/delete/{id}', [CustomerController::class, "destroy"])->name('customer.destroy');
    Route::get('/customer/edit/{id}', [CustomerController::class, "edit"])->name('customer.edit');


//order
    Route::get('/order',[SalesController::class,'index'])->name('order.index');
    Route::get('/order/view',[SalesController::class,'view'])->name('order.view');
    Route::get('getService',[SalesController::class, 'getService'])->name('getService');
    Route::post('/sales/store',[SalesController::class,'store'])->name('order.store');
    Route::get('/master-details', [SalesController::class, "getlist"])->name('order.master_details');
    Route::get('/master-details/{id}', [SalesController::class, "getMasterDetailsSingleData"])->name('order.master_single_details');


});
