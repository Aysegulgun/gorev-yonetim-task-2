<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Ana sayfa route'ları
Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/store', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

// Eski tasks route'unu kaldırdık
// Route::resource('tasks', TaskController::class);
