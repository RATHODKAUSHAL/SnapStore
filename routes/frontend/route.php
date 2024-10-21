<?php

use App\Http\Controllers\frontend\FrontendHomeController;
use App\Http\Controllers\frontend\FrontendLoginController;
use App\Http\Controllers\frontend\FrontendSignInController;
use Illuminate\Support\Facades\Route;


Route::get('login', [FrontendLoginController::class, 'login'])->name('auth.login');
Route::post('login-submit', [FrontendLoginController::class, 'loginSubmit'])->name('auth.login-submit');
Route::get('logout', [FrontendLoginController::class,'logout'])->name('auth.logout');

Route::resource('signin', FrontendSignInController::class);

Route::middleware(['admin'])->group(function() {
    Route::get('/',[FrontendHomeController::class, 'index'])->name('dashboard');

}); 