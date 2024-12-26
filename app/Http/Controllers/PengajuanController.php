<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index()  {
        return view('public.pengajuan');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'target_amount' => 'required|numeric|min:0',
            'deadline' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('campaign_images', 'public');
        }

        // Insert data into the database
        Pengajuan::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'target_amount' => $validated['target_amount'],
            'deadline' => $validated['deadline'],
            'image_path' => $imagePath,
            'status' => 'pending', // Default status
        ]);

        // Redirect back with a success message
        return redirect()->route('donations.index')->with('success', 'Pengajuan Berhasil dikirim');
    }

    public function approve($id)
{
    // Cari pengajuan berdasarkan ID
    $pengajuan = Pengajuan::findOrFail($id);

    // Ubah status menjadi "approve"
    $pengajuan->status = 'approved';
    $pengajuan->save();

    // Redirect ke halaman sebelumnya dengan pesan sukses
    return redirect()->route('notifications.index')->with('success', 'Pengajuan berhasil disetujui.');
}

public function reject($id)
{
    // Cari pengajuan berdasarkan ID
    $pengajuan = Pengajuan::findOrFail($id);

    // Ubah status menjadi "reject"
    $pengajuan->status = 'rejected';
    $pengajuan->save();

    // Redirect ke halaman sebelumnya dengan pesan sukses
    return redirect()->route('notifications.index')->with('success', 'Pengajuan berhasil ditolak.');
}


}
