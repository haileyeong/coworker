<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('boards', BoardController::class);

Route::get('/board-list', [BoardController::class, 'index'])->name('boards.index');
Route::get('/board', [BoardController::class, 'board'])->name('boards.board');
Route::get('/boards/{id}', [BoardController::class, 'show'])->name('boards.show');
