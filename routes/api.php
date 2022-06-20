<?php

use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\CategoriesController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// untuk tabel customer 
Route::get('v1/customer', [CustomerController::class, 'index']);
Route::get('v1/customer/{id}', [CustomerController::class, 'show']);
Route::post('v1/customer', [CustomerController::class, 'store']);
Route::put('v1/customer/{id}', [CustomerController::class, 'update']);
Route::delete('v1/customer/{id}', [CustomerController::class, 'destroy']);

Route::get('v1/customerR', [CustomerController::class, 'indexRelasi']);


// untuk tabel products 
Route::get('v1/product', [ProductController::class, 'index']);
Route::get('v1/product/{id}', [ProductController::class, 'show']);
Route::post('v1/product', [ProductController::class, 'store']);
Route::put('v1/product/{id}', [ProductController::class, 'update']);
Route::delete('v1/product/{id}', [ProductController::class, 'destroy']);

Route::get('v1/producR', [ProductController::class, 'indexRelasi']);

// untuk tabel Categories tanpa penggunaan resource
Route::get('v1/categories', [CategoriesController::class, 'index']);
Route::get('v1/categories/{id}', [CategoriesController::class, 'show']);
Route::post('v1/categories', [CategoriesController::class, 'store']);
Route::put('v1/categories/{id}', [CategoriesController::class, 'update']);
Route::delete('v1/categories/{id}', [CategoriesController::class, 'destroy']);
//tes relasi antar tabel
Route::get('v1/categoriR', [CategoriesController::class, 'indexRelasi']);