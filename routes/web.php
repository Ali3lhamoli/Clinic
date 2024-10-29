<?php

use App\Http\Controllers\Site\Auth\LoginController;
use App\Http\Controllers\Site\Auth\LogoutController;
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
    Route::get('/doctors/doctor', OneDoctorController::class)->name('doctors.doctor');


    Route::get('/register', [RegisterController::class,'show'])->name('register.show');
    Route::post('/register', [RegisterController::class,'register'])->name('register.store');
    Route::get('/login', [LoginController::class,'show'])->name('login.show');
    Route::post('/login', [LoginController::class,'authenticate'])->name('login.authenticate');
});


Route::view('contact','web.site.pages.contact')->name('pages.contact');
Route::view('majofrs','web.site.pages.majors')->name('pages.majors');
Route::view('history','web.site.pages.history')->name('pages.history');
Route::view('loggin','web.site.pages.login')->name('pages.login');
Route::view('rregister','web.site.pages.register')->name('pages.register');
Route::view('doctor','web.site.pages.doctors.doctor')->name('pages.doctors.doctor');
Route::view('dodctors','web.site.pages.doctors.index')->name('pages.doctors.index');