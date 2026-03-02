<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;

// Halaman utama langsung menampilkan About
Route::get('/', [AboutController::class, 'index']);

// Rute About ini sekarang BEBAS diakses siapa saja (Publik)
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Halaman yang butuh login (Dashboard & Profile)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';