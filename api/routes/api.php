<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::as('api:')->group(static function (): void {
    Route::middleware(['auth:sanctum'])->group(static function (): void {
        Route::get('user', App\Http\Controllers\Api\Auth\UserController::class)->name('user');

        Route::prefix('users')->as('users:')->group(static function (): void {
            Route::get('/', App\Http\Controllers\Api\Users\IndexController::class)->name('index')->middleware([
                'permission:users.list',
            ]);
        });
    });
});
