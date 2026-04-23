<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TwoFactorController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1');

    // 2FA challenge (sits between login and auth — user is not yet authenticated)
    Route::get('/2fa/challenge', [TwoFactorController::class, 'showChallenge'])->name('two-factor.challenge');
    Route::post('/2fa/challenge', [TwoFactorController::class, 'verifyChallenge'])->name('two-factor.verify');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // 2FA management (requires auth)
    Route::get('/2fa/setup', [TwoFactorController::class, 'showSetup'])->name('two-factor.setup');
    Route::post('/2fa/enable', [TwoFactorController::class, 'enable'])->name('two-factor.enable');
    Route::post('/2fa/disable', [TwoFactorController::class, 'disable'])->name('two-factor.disable');
});
