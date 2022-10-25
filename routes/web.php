<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseAPI;
use App\Http\Controllers\TransactionAPI;
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

    return view('Dashboard');})
    ->middleware('auth');

route::get('/dashboard',function(){ 
    return view('Dashboard'); })
    ->name('dashboard')
    ->middleware('auth');

Route::match( ['get','post'], '/register', [AuthController::class,'register'])
->name('register')->middleware('guest');

Route::match( ['get','post'], '/login' ,[AuthController::class,'login'])
->name('login')->middleware('guest');

Route::get('/logout', [AuthController::class, 'logout'])
->name('logout')->middleware('auth');

Route::get('/products/list', [ProductController::class,'list'])
->name('products.list');

Route::resource('products', ProductController::class)
->middleware('auth');

Route::get('/categories/list', [CategoryController::class,'list'])
->name('categories.list');

Route::resource('categories', CategoryController::class)->except('index')
->middleware('auth');

Route::get('/customers/list', [CustomerController::class,'list'])
->name('customers.list');

Route::resource('customers', CustomerController::class)->except('index')
->middleware('auth');

Route::get('/suppliers/list', [SupplierController::class,'list'])
->name('suppliers.list');

Route::resource('suppliers', SupplierController::class)->except('index')
->middleware('auth');

Route::resource('purchase', PurchaseController::class)->middleware('auth');

Route::resource('transactions', TransactionController::class)->middleware('auth');

Route::apiResource('purchasecart', PurchaseAPI::class)->middleware('api');

Route::apiResource('transactioncart', TransactionAPI::class)->middleware('api');




