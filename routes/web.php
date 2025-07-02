<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'actionLogin'])->name('action-login');
Route::get('register', [AuthController::class, 'pageRegister'])->name('register');

Route::middleware(['auth:web'])->group(function(){
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::prefix('settings')->group(function(){
        Route::get('', [SettingController::class, 'index'])->name('settings');
    });

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
