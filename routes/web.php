<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Project\ProjectController;
use App\Http\Controllers\SettingsController;
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

// Settings routes
Route::prefix('settings')->middleware('auth')->group(function () {
    Route::get('/', [SettingsController::class, 'index'])->name('settings.index');
    Route::put('/profile', [SettingsController::class, 'updateProfile'])->name('settings.profile.update');
    Route::put('/password', [SettingsController::class, 'updatePassword'])->name('settings.password.update');
    Route::put('/preferences', [SettingsController::class, 'updatePreferences'])->name('settings.preferences.update');
    Route::delete('/account', [SettingsController::class, 'deleteAccount'])->name('settings.account.delete');
});

// Tasks routes
Route::prefix('tasks')->middleware('auth')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});

// Projects routes
Route::prefix('projects')->middleware('auth')->group(function () {
    Route::get('/', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
});

