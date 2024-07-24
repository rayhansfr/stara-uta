<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Runner\ResultCache\ResultCache;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/alternatif/add', [AlternatifController::class, 'create'])->middleware(['auth', 'verified'])->name('alternatif.create');
Route::post('/alternatif/save', [AlternatifController::class, 'store'])->middleware(['auth', 'verified'])->name('alternatif.store');
Route::post('/alternatif/update/{id}', [AlternatifController::class, 'update'])->name('alternatif.update');
Route::get('/alternatif/edit/{id}', [AlternatifController::class, 'edit'])->middleware(['auth', 'verified'])->name('alternatif.edit');
Route::get('/alternatif/delete/{id}', [AlternatifController::class, 'delete'])->middleware(['auth', 'verified'])->name('alternatif.delete');

Route::get('/dashboard', [AlternatifController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/alternatif/calculate', [AlternatifController::class, 'calculateUtility'])->name('alternatif.calculate');
Route::get('/result', [ResultController::class, 'index'])->middleware(['auth', 'verified'])->name('result');
Route::post('/result/update/{id}', [AlternatifController::class, 'update'])->name('result.update');
Route::get('/result/delete/{id}', [AlternatifController::class, 'delete'])->name('result.delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
