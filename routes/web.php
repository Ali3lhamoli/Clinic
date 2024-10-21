<?php

use App\Http\Controllers\Site\HomeController;
use Illuminate\Support\Facades\Route;

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

    Route::get('/', HomeController::class)->name('home');
});


Route::view('contact','web.site.pages.contact')->name('pages.contact');
Route::view('majors','web.site.pages.majors')->name('pages.majors');
Route::view('history','web.site.pages.history')->name('pages.history');
Route::view('login','web.site.pages.login')->name('pages.login');
Route::view('register','web.site.pages.register')->name('pages.register');
Route::view('doctor','web.site.pages.doctors.doctor')->name('pages.doctors.doctor');
Route::view('doctors','web.site.pages.doctors.index')->name('pages.doctors.index');