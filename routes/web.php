<?php

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'worker'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
        Route::get('users', [UsersController::class, 'index'])->name('users.index');
        Route::post('users/{user?}', [UsersController::class, 'save'])->name('users.save');
    });
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);
