<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProfileController;

// Rute untuk Public
Route::get('/', [PublicController::class, 'index'])->name('dashboard');
Route::get('/about', function() {
    return view('public.about');
})->name('about');

// Rute untuk Admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

// Rute untuk Semua Pengguna yang Login
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        // Menampilkan form pengajuan
    Route::get('/submission', [PengajuanController::class, 'index'])->name('donations.index');
    // Menyimpan pengajuan
    Route::post('/donations', [PengajuanController::class, 'store'])->name('donations.store');
});

require __DIR__.'/auth.php';
