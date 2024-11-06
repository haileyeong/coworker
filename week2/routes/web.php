<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;

///*
//|--------------------------------------------------------------------------
//| Web Routes
//|--------------------------------------------------------------------------
//|
//| Here is where you can register web routes for your application. These
//| routes are loaded by the RouteServiceProvider and all of them will
//| be assigned to the "web" middleware group. Make something great!
//|

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/board-list', [BoardController::class, 'index'])->name('boards.index');
Route::get('/board', [BoardController::class, 'board'])->name('boards.board');
Route::get('/boards/{id}', [BoardController::class, 'show'])->name('boards.show');

Route::get('/custom-board', [CustomController::class, 'board'])->name('custom.board');
Route::get('/custom-board/{id}', [CustomController::class, 'show'])->name('custom.show');

Route::get('/custom-update/{id}', [CustomController::class, 'edit'])->name('custom.edit');
Route::post('/custom-update/{id}', [CustomController::class, 'update'])->name('custom.update');

Route::get('/custom-new', [CustomController::class, 'create'])->name('custom.new');
Route::post('/custom-new', [CustomController::class, 'store'])->name('custom.store');
Route::delete('/custom-board/{id}', [CustomController::class, 'destroy'])->name('custom.destroy');

Route::resource('boards', BoardController::class);
