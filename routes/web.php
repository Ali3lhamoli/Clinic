<?php

use App\Http\Controllers\Site\Auth\LoginController;
use App\Http\Controllers\Site\Auth\LogoutController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\DoctorController;
use App\Http\Controllers\Site\MajorController;
use App\Http\Controllers\Site\OneDoctorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::as('site.')->group(function(){

    Route::middleware('auth')->group(function(){
        Route::post('/logout', LogoutController::class)->name('logout');

    });
    Route::get('/', HomeController::class)->name('home');
    Route::get('/majors', MajorController::class)->name('majors');
    Route::get('/doctors', DoctorController::class)->name('doctors');

    Route::controller(OneDoctorController::class)->group(function(){
        Route::get('/doctors/doctor', 'show')->name('doctors.doctor');
        Route::post('/doctors/doctor', 'store')->name('doctors.doctor.store');
    });

    Route::controller(ContactController::class)->group(function(){
        Route::get('/contact', 'index')->name('contact');
        Route::post('/contact', 'store')->name('contact.store');
    });


    Route::controller(LoginController::class)->group(function(){
        Route::get('/login', 'show')->name('login.show');
        Route::post('/login', 'authenticate')->name('login.authenticate');
    });
    
    Route::controller(RegisterController::class)->group(function(){
        Route::get('/register', 'show')->name('register.show');
        Route::post('/register', 'register')->name('register.store');

    });
});
