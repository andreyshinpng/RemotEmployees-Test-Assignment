<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('products/index', [ProductController::class, 'index']);
Route::post('products/allByCategories', [ProductController::class, 'allByCategories']);
Route::post('products/store', [ProductController::class, 'store']);
Route::post('products/update', [ProductController::class, 'update']);
Route::post('products/delete', [ProductController::class, 'destroy']);

Route::get('categories/index', [CategoryController::class, 'index']);
Route::post('categories/store', [CategoryController::class, 'store']);
Route::post('categories/update', [CategoryController::class, 'update']);
Route::post('categories/destroy', [CategoryController::class, 'destroy']);
