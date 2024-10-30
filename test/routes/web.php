<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;

Route::get('/', [BoardController::class, 'index'])->name('boards.index');
Route::get('/new', [BoardController::class, 'create'])->name('boards.create');

Route::resource('boards', BoardController::class);
