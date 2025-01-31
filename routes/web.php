<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

// Auth Controller
Route::get('/register', [AuthController::class, 'register_view'])->name('register.view');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'login_view'])->name('login.view');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Task Controller
Route::middleware('auth')->group(function () {

    // Get all Tasks
    Route::get('/', [TaskController::class, 'index'])->name('task.index');

    // Create a task
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('task.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('task.store');

    // Show Specific Details
    Route::get('/task/details/{id}', [TaskController::class, 'show'])->name('task.show');


    // Edit task
    Route::get('/task/{id}/edit', [TaskController::class, 'edit'])->name('task.edit');
    Route::put('/task/{id}', [TaskController::class, 'update'])->name('task.update');

    // Delete task
    Route::delete('/tasks/{id}/delete', [TaskController::class, 'destroy'])->name('task.delete');
});
