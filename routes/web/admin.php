<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Middleware\OnlyAdmin;



Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
Route::resource('/categories', CategoryController::class);
Route::resource('/products', ProductController::class);


?>