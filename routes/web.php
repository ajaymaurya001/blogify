<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Public Routes: Routes accessible without authentication
|--------------------------------------------------------------------------
*/

Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::view('/blogs', 'blogs')->name('blogs');

Route::get('/forget', [AuthController::class, 'forget_pass'])->name('forget');

/*
|--------------------------------------------------------------------------
| Resource controller Routes: User
|--------------------------------------------------------------------------
*/
Route::resource('users', UserController::class);


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::middleware(RedirectIfAuthenticated::class)->group(function () {
    Route::get('/login', [AuthController::class, 'showloginform'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


/*
|--------------------------------------------------------------------------
| User and Admin dashboard Routes
|--------------------------------------------------------------------------
*/
// User-only routes
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user_dashboard', fn () => view('user.user_dashboard'))
        ->name('user_dashboard');
});

// Admin-only routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin_dashboard', fn () => view('admin.admin_dashboard'))
        ->name('admin_dashboard');
});
