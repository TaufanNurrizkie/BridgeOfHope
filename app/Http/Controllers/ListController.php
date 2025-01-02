<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campaigns = Campaign::all();

        return view('admin.list', compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create_campaign');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string',
            'goal_amount' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk file foto
        ]);
    
        // Handle the photo upload
        $bannerImagePath = null;
        if ($request->hasFile('photo')) {
            $bannerImagePath = $request->file('photo')->store('campaign_photos', 'public');
        }
    
        // Simpan campaign
        Campaign::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'type' => $validated['type'],
            'banner_image' => $bannerImagePath, // Simpan path foto ke database
            'goal_amount' => $validated['goal_amount'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'created_by' => auth()->id(),
            'status' => 'Pending',
        ]);
    
        return redirect()->route('admin.list')->with('success', 'Campaign created successfully.');
    }

    public function show($id)
    {
        // Ambil pengajuan berdasarkan ID
        $campaign = Campaign::findOrFail($id);
    
        // Tampilkan ke view
        return view('admin.list-show', compact('campaign'));
    }
    
    
    public function markAsComplete($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->status = 'completed'; // Pastikan sesuai dengan nilai status Anda
        $campaign->save();
    
        return redirect()->back()->with('success', 'Campaign marked as complete.');
    }
    
    public function markAsCancelled($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->status = 'cancelled'; // Pastikan sesuai dengan nilai status Anda
        $campaign->save();
    
        return redirect()->back()->with('success', 'Campaign marked as cancelled.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $campaign = Campaign::findOrFail($id);
    
        // Jika ada file banner, hapus dari storage
        if ($campaign->banner_image) {
            Storage::delete($campaign->banner_image);
        }
    
        $campaign->delete();
    
        return redirect()->route('admin.list')->with('success', 'Campaign deleted successfully.');
    }
    
    
}
