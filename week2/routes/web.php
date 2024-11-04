<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\CustomController;

Route::get('/', [BoardController::class, 'index'])->name('boards.index');
Route::get('/board', [BoardController::class, 'board'])->name('boards.board');
Route::get('/boards/{id}', [BoardController::class, 'show'])->name('boards.show');

Route::get('/custom-board', [CustomController::class, 'board'])->name('custom.board');
Route::get('/custom-board/{id}', [CustomController::class, 'show'])->name('custom.show');
Route::get('/custom-new', [CustomController::class, 'create'])->name('custom.new');
Route::post('/custom-new', [CustomController::class, 'store'])->name('custom.store');
Route::delete('/custom-board/{id}', [CustomController::class, 'destroy'])->name('custom.destroy');

Route::resource('boards', BoardController::class);

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
