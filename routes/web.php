<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Project\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('login'));
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard.index')
        ->middleware('auth');

    Route::get('/tasks', [DashboardController::class, 'tasks'])
        ->name('dashboard.tasks')
        ->middleware('auth');


    Route::get('/projects', [DashboardController::class, 'projects'])
        ->name('dashboard.projects')
        ->middleware('auth');
});


Route::prefix('auth')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/register', [AuthController::class, 'store'])->name('auth.register');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

});

