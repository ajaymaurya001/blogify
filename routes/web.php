<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// website basic pages route -------
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/blogs', function () {
    return view('blogs');
})->name('blogs');



Route::get('login', [AuthController::class, 'showloginform'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.store');
Route::post('logout',[AuthController::class,'logout'])->middleware('auth')->name('logout');

Route::get('user_dashboard',function(){
    return view('user.user_dashboard');
})->middleware('auth')->name('user_dashboard');


Route::get('forget', [AuthController::class, 'forget_pass'])->name('forget');

Route::resource('users', UserController::class);
