<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasterData\HobiController;
use App\Http\Controllers\MasterData\PendidikanController;
use App\Http\Controllers\MasterData\SkillController;
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

Route::get('/', [DashboardController::class, 'landingPage'])->middleware('guest')->name('index');
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/authLogin', [LoginController::class, 'authLogin'])->name('authLogin');
Route::post('/registerAccount', [LoginController::class, 'registerAccount'])->name('registerAccount');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role'])->group(function () {
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('', [DashboardController::class, 'index'])->name('index');
    });

    Route::prefix('master-data')->name('master-data.')->group(function () {
        Route::prefix('pendidikan')->name('pendidikan.')->group(function () {
            Route::get('', [PendidikanController::class, 'index'])->name('index');
        });

        Route::prefix('kemampuan')->name('kemampuan.')->group(function () {
            Route::get('', [SkillController::class, 'index'])->name('index');
            Route::post('/getDataById', [SkillController::class, 'getDataById'])->name('getDataById');
            Route::post('/saveOrUpdate', [SkillController::class, 'saveOrUpdate'])->name('saveOrUpdate');
            Route::post('/delete', [SkillController::class, 'delete'])->name('delete');
        });

        Route::prefix('hobi')->name('hobi.')->group(function () {
            Route::get('', [HobiController::class, 'index'])->name('index');
            Route::post('/getDataById', [HobiController::class, 'getDataById'])->name('getDataById');
            Route::post('/saveOrUpdate', [HobiController::class, 'saveOrUpdate'])->name('saveOrUpdate');
            Route::post('/delete', [HobiController::class, 'delete'])->name('delete');
        });
    });
});