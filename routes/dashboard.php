<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MajorController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\LogoutController;


Route::prefix('admin')->as('admin.')->group(function(){
    Route::middleware(['auth', 'dashbourd'])->group(function(){

        Route::get('/', DashboardController::class)->name('dashboard');
        Route::post('/logout', LogoutController::class)->name('auth.logout');

        Route::resource('majors',MajorController::class);
        Route::resource('users',UserController::class);

        Route::controller(ContactController::class)->group(function(){
            Route::get('/contacts', 'index')->name('contacts.index');
            Route::delete('/contacts/{contact}', 'destroy')->name('contacts.destroy');
        });

        Route::controller(BookingController::class)->group(function(){
            Route::get('/bookings', 'index')->name('bookings.index');
            Route::delete('/bookings/{booking}', 'destroy')->name('bookings.destroy');
        });


    });

    Route::controller(LoginController::class)->group(function(){
        Route::get('/login', 'show')->name('auth.login.show');
        Route::post('/login', 'authenticate')->name('auth.login');
    });
    
});