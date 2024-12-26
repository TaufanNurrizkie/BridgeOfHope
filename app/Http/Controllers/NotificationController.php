<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;

class NotificationController extends Controller
{
    public function index()
    {
        // Ambil semua pengajuan baru (dengan status 'pending')
        $notifications = Pengajuan::where('status', 'pending')->latest()->get();

        // Tampilkan ke view
        return view('admin.notif', compact('notifications'));
    }

    public function show($id)
{
    // Ambil pengajuan berdasarkan ID
    $pengajuan = Pengajuan::findOrFail($id);

    // Tampilkan ke view
    return view('admin.notif-show', compact('pengajuan'));
}

}

