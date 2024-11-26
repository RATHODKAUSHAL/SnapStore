<?php

use App\Http\Controllers\Admin\AdminCardController;
use App\Http\Controllers\Admin\AdminCardHeadingController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\admin\AdminOrdersController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminSellerController;
use App\Http\Controllers\Admin\AdminUsersController;
use Illuminate\Support\Facades\Route;

Route::get("admin/dashboard", [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::resource('admin/category', AdminCategoryController::class);
Route::get('find-5', [AdminCategoryController::class, 'findcategory'])->name('find.category');
Route::post('/categories/update-order', [AdminCategoryController::class, 'updateOrder'])->name('categories.updateOrder');

Route::resource('admin/users',  AdminUsersController::class);
Route::resource('admin/product', AdminProductController::class);
Route::resource('admin/order', AdminOrdersController::class);
Route::resource('admin/heading', AdminCardHeadingController::class);
Route::resource('admin/seller', AdminSellerController::class);
Route::resource('admin/card', AdminCardController::class);