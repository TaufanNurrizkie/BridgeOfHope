<?php
use App\Models\Donation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\NotificationController;

// Rute untuk Public
Route::get('/', [PublicController::class, 'index'])->name('dashboard');
Route::get('/about', function() {
    return view('public.about');
})->name('about');
Route::get('/detail/{id}', [PublicController::class, 'show'])->name('campaign.show');
Route::post('/comment/{id}/like', [PublicController::class, 'like'])->name('comment.like');
Route::get('/all-campaign', [PublicController::class, 'allcampaign'])->name('all-campaign');


// Rute untuk Admin
Route::middleware(['auth', 'admin'])->group(function () {
    //dashboard
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/list', [ListController::class, 'index'])->name('admin.list');

    //List campaign tersedia
    Route::get('/list/create', [ListController::class, 'create'])->name('list.create');
    Route::post('/list/store', [ListController::class, 'store'])->name('list.store');

    //notification
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/pengajuan/{id}', [NotificationController::class, 'show'])->name('pengajuan.show');
    Route::post('/pengajuan/{id}/approve', [PengajuanController::class, 'approve'])->name('pengajuan.approve');
    Route::post('/pengajuan/{id}/reject', [PengajuanController::class, 'reject'])->name('pengajuan.reject');




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
    Route::post('/campaign/{campaign}/donation', [DonationController::class, 'store'])->name('donation.store');

});

require __DIR__.'/auth.php';
