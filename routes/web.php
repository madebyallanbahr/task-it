<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Project\ProjectController;
use App\Http\Controllers\Task\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('login'));
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard.index')
        ->middleware('auth');

    Route::get('/tasks', [TaskController::class, 'index'])
        ->name('dashboard.tasks')
        ->middleware('auth');

    Route::get('/tasks/create', [TaskController::class, 'create'])
    ->name('tasks.create')
    ->middleware('auth');

    Route::post('/tasks/create', [TaskController::class, 'store'])
        ->name('tasks.store')
        ->middleware('auth');

    Route::delete('/tasks/delete/{id}', [TaskController::class, 'destroy'])
        ->name('tasks.destroy')
        ->middleware('auth');

    Route::get('/projects', [ProjectController::class, 'index'])
        ->name('dashboard.projects')
        ->middleware('auth');

    Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])
        ->name('projects.destroy')
        ->middleware('auth');
});


Route::prefix('auth')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/register', [AuthController::class, 'store'])->name('auth.register');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

});

