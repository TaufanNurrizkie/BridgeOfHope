<?php

use App\Models\Donation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\NotificationController;

// Rute untuk Public
Route::get('/', [PublicController::class, 'index'])->name('dashboard');
Route::get('/about', function() {
    return view('public.about');
})->name('about');
Route::get('/detail/{id}', [PublicController::class, 'show'])->name('campaign.show');
Route::post('/comment/{id}/like', [PublicController::class, 'like'])->name('comment.like');
Route::get('/campaigns/urgent', [PublicController::class, 'allurgent']);
Route::get('/campaigns/{type?}', [PublicController::class, 'campaignsByType']);








// Rute untuk Admin
Route::middleware(['auth', 'admin'])->group(function () {
    //dashboard
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/list', [ListController::class, 'index'])->name('admin.list');

    //List campaign tersedia
    Route::get('/list/create', [ListController::class, 'create'])->name('list.create');
    Route::post('/list/store', [ListController::class, 'store'])->name('list.store');
    Route::get('/campaign/{id}', [ListController::class, 'show'])->name('list.show');
    Route::delete('/campaigns/{id}', [ListController::class, 'destroy'])->name('list.destroy');
    Route::patch('/campaigns/{id}/complete', [ListController::class, 'markAsComplete'])->name('list.complete');
    Route::patch('/campaigns/{id}/cancel', [ListController::class, 'markAsCancelled'])->name('list.cancel');



    //notification
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/pengajuan/{id}', [NotificationController::class, 'show'])->name('pengajuan.show');
    Route::post('/pengajuan/{id}/approve', [PengajuanController::class, 'approve'])->name('pengajuan.approve');
    Route::post('/pengajuan/{id}/reject', [PengajuanController::class, 'reject'])->name('pengajuan.reject');


    Route::get('/adminprofile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/adminprofile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/adminprofile', [ProfileController::class, 'destroy'])->name('profile.destroy');




});

// Rute untuk Semua Pengguna yang Login
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Menampilkan form pengajuan
    Route::get('/submission', [PengajuanController::class, 'index'])->name('donations.index');
    Route::post('/donations', [PengajuanController::class, 'store'])->name('donations.store');
    


    //donasi saya
    Route::get('/mydonation', [PublicController::class, 'mydonation'])->name('mydonation');
    Route::post('/donate', [PublicController::class, 'store'])->name('donate.store');
    Route::post('/donation/complete/{id}', [PublicController::class, 'processPayment'])->name('donation.complete');
    Route::post('/midtrans/callback', [PublicController::class, 'handleCallback'])->name('midtrans.callback');
    Route::post('/donation/update-status', [PublicController::class, 'updateStatus'])->name('donation.updateStatus');




});

require __DIR__.'/auth.php';
