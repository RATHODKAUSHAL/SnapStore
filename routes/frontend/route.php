<?php

use App\Http\Controllers\frontend\FrontendHomeController;
use App\Http\Controllers\frontend\FrontendLoginController;
use App\Http\Controllers\frontend\FrontendProductsContoller;
use App\Http\Controllers\frontend\FrontendSignInController;
use App\Http\Controllers\frontend\FronendCartController;
use App\Http\Controllers\frontend\FrontendOrderController;
use App\Http\Controllers\frontend\FrontendStripeController;
use Illuminate\Support\Facades\Route;


Route::get('login', [FrontendLoginController::class, 'login'])->name('auth.login');
Route::post('login-submit', [FrontendLoginController::class, 'loginSubmit'])->name('auth.login-submit');
Route::get('logout', [FrontendLoginController::class,'logout'])->name('auth.logout');

Route::resource('signin', FrontendSignInController::class);

Route::middleware(['admin'])->group(function() {
    Route::get('/',[FrontendHomeController::class, 'index'])->name('dashboard');
    Route::resource('products', FrontendProductsContoller::class );
    Route::resource('cart', FronendCartController::class);
    Route::resource('orders', FrontendOrderController::class);
    Route::post('/session', [FrontendStripeController::class, 'session'])->name('stripe.session');
}); 