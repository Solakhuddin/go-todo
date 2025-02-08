<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', [AuthenticatedSessionController::class, 'create'])
->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [
  TodoController::class, 'show'
])->middleware(['auth', 'verified'])->name('home');
Route::get('/upcoming', [
  TodoController::class, 'show'
])->middleware(['auth', 'verified'])->name('upcoming');
Route::get('/done', [
  TodoController::class, 'show'
])->middleware(['auth', 'verified'])->name('done');
Route::get('/Personal', [
  TodoController::class, 'show'
])->middleware(['auth', 'verified'])->name('Personal');
Route::get('/Kerjaan', [
  TodoController::class, 'show'
])->middleware(['auth', 'verified'])->name('Kerjaan');
Route::get('/Liburan', [
  TodoController::class, 'show'
])->middleware(['auth', 'verified'])->name('Liburan');
Route::post('/simpan', [
  TodoController::class, 'simpan'
])->middleware(['auth', 'verified'])->name('simpan');
Route::post('/store', [
  TodoController::class, 'store'
])->middleware(['auth', 'verified'])->name('store');
Route::post('/todos-action', [
  TodoController::class, 'todoHandler'
])->middleware(['auth', 'verified'])->name('todos-action');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
