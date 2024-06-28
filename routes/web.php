<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Project\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard.index')
    ->middleware('auth');

Route::get('/dashboard/tasks', [DashboardController::class, 'tasks'])
    ->name('dashboard.tasks')
    ->middleware('auth');


Route::get('/dashboard/projects', [DashboardController::class, 'projects'])
    ->name('dashboard.projects')
    ->middleware('auth');

Route::prefix('auth')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('auth');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/register', [AuthController::class, 'store'])->name('auth.register');

});

