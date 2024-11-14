<?php

use App\Http\Controllers\Api\ApiCategoryController;
use App\Http\Controllers\Api\ApiProductController;
use App\Http\Controllers\Api\ApiSellerAuthController;
use App\Http\Controllers\ApiTestingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//This is my API testing project for crud
Route::get('customer', [ApiTestingController::class, 'index']);
Route::post('customer', [ApiTestingController::class, 'store']);
Route::get('customer/{id}', [ApiTestingController::class, 'create']);
Route::get('customer/{id}/edit', [ApiTestingController::class, 'edit']);
Route::put('customer/{id}/edit', [ApiTestingController::class, 'update']);
Route::delete('customer/{id}/delete', [ApiTestingController::class, 'destroy']);


// API for SnapStore 
// Route::apiResource('product', [ApiProductController::class]);
Route::get('product', [ApiProductController::class, 'index']);
Route::post('product', [ApiProductController::class, 'store']);
Route::get('product/{id}/edit', [ApiProductController::class, 'edit']);
Route::put('product/{id}/edit', [ApiProductController::class, 'update']);

Route::get('category', [ApiCategoryController::class, 'index']);


// Public routes, no token required
Route::post("register", [ApiSellerAuthController::class, 'register']);
Route::post('login', [ApiSellerAuthController::class, 'login']);


Route::middleware('seller')->group(function () {
    // Route::post('logout', [ApiSellerAuthController::class, 'logout']);
    Route::get('register', [ApiSellerAuthController::class, 'index']);
    // Route::get('register', [ApiSellerAuthController::class, 'index']);
    
});
