<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\InventoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'cat'], function(){
    Route::post('/store', [CategoryController::class , 'store'] );
    Route::get('/index', [CategoryController::class , 'index'] );
    Route::get('/show/{id}', [CategoryController::class , 'show'] );
    Route::put('/update/{id}', [CategoryController::class , 'update'] );
    Route::delete('/destory/{id}', [CategoryController::class , 'destroy'] );
    
});

Route::group(['prefix' => 'supp'], function(){
    Route::post('/store', [SupplierController::class , 'store'] );
    Route::get('/index', [SupplierController::class , 'index'] );
});

Route::group(['prefix' => 'prod'], function(){
    Route::post('/store', [ProductController::class , 'store'] );
    Route::get('/index', [ProductController::class , 'index'] );
});

Route::group(['prefix' => 'cust'], function(){
    Route::post('/store', [CustomerController::class , 'store'] );
    Route::get('/index', [CustomerController::class , 'index'] );
});

Route::group(['prefix' => 'order'], function(){
    Route::post('/store', [OrderController::class , 'store'] );
    Route::get('/index', [OrderController::class , 'index'] );
});

Route::group(['prefix' => 'odD'], function(){
    Route::post('/store', [OrderDetailController::class , 'store'] );
    Route::get('/index', [OrderDetailController::class , 'index'] );
});

Route::group(['prefix' => 'inv'], function(){
    Route::post('/store', [InventoryController::class , 'store'] );
    Route::get('/index', [InventoryController::class , 'index'] );
});