<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\LoginController;


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('login', [LoginController::class, 'showLoginForm'])->name('user.login.form');
Route::post('login', [LoginController::class, 'login'])->name('user.login');

Route::post('logout', [LoginController::class, 'logout'])->name('user.logout');

Route::middleware('auth')->group(function () {
    Route::get('/user/dashboard', fn() => view('user.dashboard'))->name('user.dashboard');
});
