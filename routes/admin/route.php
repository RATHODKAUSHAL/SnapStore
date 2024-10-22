<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminUsersController;
use Illuminate\Support\Facades\Route;

Route::get("admin/dashboard", [AdminDashboardController::class, 'index'])->name('admin.dashboard');

Route::resource('admin/category', AdminCategoryController::class);
Route::get('find-category', [AdminCategoryController::class, 'findcategory'])->name('find.category');

Route::resource('admin/users',  AdminUsersController::class);

Route::resource('admin/product', AdminProductController::class);
