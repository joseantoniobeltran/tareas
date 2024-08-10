<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('tarea', TareaController::class);
Route::put('tarea/{id}/restore', [TareaController::class, 'restore'])->name('tarea.restore');
Route::delete('tarea/{id}/forceDelete', [TareaController::class, 'forceDelete'])->name('tarea.forceDelete');
Route::get('tarea/{id}', [TareaController::class, 'show'])->name('tarea.show');

});

require __DIR__.'/auth.php';
