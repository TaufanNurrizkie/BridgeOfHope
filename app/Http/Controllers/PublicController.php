<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\comment;
use App\Models\Campaign;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()  {
    // Ambil data rekomendasi dari tabel campaigns
    $campaigns = Campaign::orderBy('created_at', 'desc')->take(3)->get();
    $totalDonations = Campaign::sum('collected_amount'); // Kolom `total_donations` pada tabel `campaigns`
    $totalProjects = Campaign::count();
    $projectsDone = Campaign::where('status', 'done')->count(); // Misalnya status proyek selesai
    $today = Carbon::now();
    $urgent = Campaign::whereDate('end_date', '<=', $today->addDays(7))->get();
    $comments = Comment::with('user') // Mengambil data user yang terkait
        ->orderBy('created_at', 'desc')
        ->get();



    return view('public.dashboard', compact('campaigns', 'comments', 'urgent','totalDonations', 'totalProjects','projectsDone'));
    }

    public function show($id)
{
    // Ambil campaign berdasarkan ID
    $campaign = Campaign::withCount(['donations as donations_count' => function ($query) {
        $query->selectRaw('COUNT(DISTINCT user_id)');
    }])->findOrFail($id);
    $komen = Comment::all();

    

    return view('public.campaign_detail', compact('campaign','komen'));
}



public function like($id, Request $request)
{
    $comment = Comment::findOrFail($id);

    // Memastikan pengguna tidak bisa like lebih dari sekali (gunakan session atau user ID)
    $userId = $request->user()->id; // Atau gunakan session ID jika tidak ada autentikasi
    $likedUsers = $comment->liked_by_users ? json_decode($comment->liked_by_users, true) : [];

    if (in_array($userId, $likedUsers)) {
        return response()->json(['message' => 'Already liked'], 400);
    }

    // Tambahkan user ID ke array liked_by_users
    $likedUsers[] = $userId;

    // Update jumlah likes dan liked_by_users
    $comment->update([
        'likes' => $comment->likes + 1,
        'liked_by_users' => json_encode($likedUsers),
    ]);

    return response()->json(['likes' => $comment->likes]);
}

}
