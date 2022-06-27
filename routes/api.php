<?php

use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\CategoriesController;
use App\Http\Controllers\API\AuthController;

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

Route::group(['middleware' => 'auth:api', 'prefix'=>'v1'], function ($router) {
// untuk tabel products 
Route::get('product', [ProductController::class, 'index']);
Route::get('product/{id}', [ProductController::class, 'show']);
Route::post('product', [ProductController::class, 'store']);
Route::put('product/{id}', [ProductController::class, 'update']);
Route::delete('product/{id}', [ProductController::class, 'destroy']);

Route::get('producR', [ProductController::class, 'indexRelasi']);

// untuk tabel Categories tanpa penggunaan resource
Route::get('categories', [CategoriesController::class, 'index']);
Route::get('categories/{id}', [CategoriesController::class, 'show']);
Route::post('categories', [CategoriesController::class, 'store']);
Route::put('categories/{id}', [CategoriesController::class, 'update']);
Route::delete('categories/{id}', [CategoriesController::class, 'destroy']);
//tes relasi antar tabel
Route::get('categoriR', [CategoriesController::class, 'indexRelasi']);

});

Route::group(['middleware' => 'api'], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);

    Route::get('password',function(){
        return bcrypt('satrio123');
    });
});
