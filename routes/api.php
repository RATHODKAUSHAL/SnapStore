<?php

use App\Http\Controllers\ApiTestingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('customer', [ApiTestingController::class, 'index']);
Route::post('customer', [ApiTestingController::class, 'store']);
Route::get('customer/{id}', [ApiTestingController::class, 'create']);
Route::get('customer/{id}/edit', [ApiTestingController::class, 'edit']);
Route::put('customer/{id}/edit', [ApiTestingController::class, 'update']);
Route::delete('customer/{id}/delete', [ApiTestingController::class, 'destroy']);
