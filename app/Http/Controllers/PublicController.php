<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\comment;
use App\Models\Campaign;
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
}
