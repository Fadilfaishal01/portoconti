<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::get('/auth/redirect', [LoginController::class, 'redirectGoogle'])->name('loginGoogle');
Route::get('/auth/facebook/redirect', [LoginController::class, 'redirectFacebook'])->name('redirectFacebook');
Route::post('/authLogin', [LoginController::class, 'authLogin'])->name('authLogin');
Route::get('/auth/callback', [LoginController::class, 'authCallbackGoogle']);
Route::get('/auth/facebook/callback', [LoginController::class, 'authCallbackFacebook']);
Route::post('/registerAccount', [LoginController::class, 'registerAccount'])->name('registerAccount');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role'])->group(function () {
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('', [AkunController::class, 'profile'])->name('index');
        Route::post('updateProfile', [AkunController::class, 'updateProfile'])->name('updateProfile');
    });

    Route::prefix('ubah-kata-sandi')->name('ubah-kata-sandi.')->group(function () {
        Route::get('', [AkunController::class, 'ubahKataSandi'])->name('index');
        Route::post('updateKataSandi', [AkunController::class, 'updateKataSandi'])->name('updateKataSandi');
    });

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('', [DashboardController::class, 'index'])->name('index');
    });
});