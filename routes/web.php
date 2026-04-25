<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Pindahkan ke luar middleware agar bisa diakses langsung
// Product Page
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/product/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
Route::delete('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

// Biarkan yang lain di dalam auth jika memang diperlukan nanti
Route::middleware('auth')->group(function () {
    // Rute lain...
});

Route::get('/', [ProductController::class, 'index']);
Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');
Route::get('/about', function () {
    return "Halaman About";
})->name('about');