<?php

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
Route::get('products/all', [ProductController::class, 'all']);
Route::post('products/store', [ProductController::class, 'store']);
Route::post('products/update', [ProductController::class, 'update']);
Route::post('products/delete', [ProductController::class, 'destroy']);


Route::get('products/get_by_category', [ProductController::class, 'getByCategory']);
