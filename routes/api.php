<?php

use App\Http\Controllers\MeController;
use App\Http\Controllers\TokenController;
use Illuminate\Support\Facades\Route;

Route::post('/sanctum/token', TokenController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('me', MeController::class);

    Route::prefix('user-holidays')->group(function() {
        Route::get('', [\App\Http\Controllers\UserHolidayController::class, 'index'])->name('user-holidays.index');
        Route::get('/days-requested', [\App\Http\Controllers\UserHolidayController::class, 'daysRequested'])->name('user-holidays.requested');
        Route::get('/{userHoliday}', [\App\Http\Controllers\UserHolidayController::class, 'show'])->name('user-holidays.show');
        Route::post('', [\App\Http\Controllers\UserHolidayController::class, 'store'])->name('user-holidays.store');
        Route::patch('/{userHoliday}', [\App\Http\Controllers\UserHolidayController::class, 'update'])->name('user-holidays.update');
        Route::delete('/{userHoliday}', [\App\Http\Controllers\UserHolidayController::class, 'destroy'])->name('user-holidays.delete');
    });

    Route::prefix('admin')->middleware('admin')->group(function() {
        Route::prefix('user-holidays')->group(function() {
            Route::patch('/approve/{userHoliday}', [\App\Http\Controllers\Admin\UserHolidayController::class, 'approve']);
            Route::patch('/reject/{userHoliday}', [\App\Http\Controllers\Admin\UserHolidayController::class, 'reject']);
        });

        Route::prefix('bank-holidays')->group(function () {
            Route::get('', [\App\Http\Controllers\Admin\BankHolidayController::class, 'index'])->name('bank-holidays.index');
        });
    });
});
