<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\Admin\MajorController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->as('admin.')->group(function(){
    Route::middleware('auth')->group(function(){

        Route::get('/', DashboardController::class)->name('dashboard');
        Route::post('/logout', LogoutController::class)->name('auth.logout');

        Route::resource('majors',MajorController::class);
        Route::resource('users',UserController::class);


    });

    Route::controller(LoginController::class)->group(function(){
        Route::get('/login', 'show')->name('auth.login.show');
        Route::post('/login', 'authenticate')->name('auth.login');
    });
    
});