<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Task routes
Route::resource('tasks', TaskController::class);

// User routes
Route::resource('users', UserController::class);
