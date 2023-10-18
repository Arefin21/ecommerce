<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\CartController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Middleware\OnlyAdmin;


Route::get('/',[HomeController::class,'index']);
Route::get('/check-out',[CartController::class,'get']);
Route::get('/cart/add/{id}',[CartController::class,'add']);
Route::get('/cart/add_with_ajax/{id}',[CartController::class,'add_with_ajax']);
Route::get('/cart/remove/{id}',[CartController::class,'remove']);



Route::prefix('admin')->middleware(['auth',OnlyAdmin::class])->group(function () {
    // Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
        
    // Route::resource('/categories', CategoryController::class);
    require __DIR__.'/web/admin.php';
    });




require __DIR__.'/auth.php';
