<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class AdminController extends Controller
{
    public function index()
    {
        $totalDonations = Campaign::sum('collected_amount'); // Kolom `total_donations` pada tabel `campaigns`
        $totalProjects = Campaign::count();
        $projectsDone = Campaign::where('status', 'completed')->count(); // Misalnya status proyek selesai
        // Pie Chart
    // Query untuk menghitung jumlah campaign berdasarkan type
    $campaignData = Campaign::select('type', DB::raw('COUNT(*) as count'))
        ->groupBy('type')
        ->get();

    // Ambil labels dan data
    $labels = $campaignData->pluck('type')->toArray();
    $data = $campaignData->pluck('count')->toArray();

    // Buat pie chart
    $pieChart = (new LarapexChart)->pieChart()
        ->setTitle('Donation Categories')
        ->setSubtitle('Distribution of Donations')
        ->addData($data) // Data jumlah campaign per type
        ->setLabels($labels) // Labels dari type
        ->setColors([ '#008FFB', '#00E396', '#feb019', '#ff455f', '#775dd0', '#80effe',
        '#0077B5', '#ff6384', '#c9cbcf', '#0057ff', '00a9f4', '#2ccdc9', '#5e72e4']); // Warna bisa disesuaikan


        // Bar Chart
// Query untuk mengambil jumlah collected_amount per bulan
$monthlyDonations = Donation::select(
    DB::raw('MONTH(created_at) as month'),
    DB::raw('SUM(amount) as total')
)
->groupBy('month')
->orderBy('month')
->get();


// Inisialisasi label bulan dan data dengan nilai default
$allMonths = [
    'January', 'February', 'March', 'April', 'May', 'June', 
    'July', 'August', 'September', 'October', 'November', 'December'
];
$monthlyData = array_fill(0, 12, 0); // Isi awal semua bulan dengan nilai 0

// Masukkan data dari query ke dalam array bulanan
foreach ($monthlyDonations as $donation) {
    $monthIndex = $donation->month - 1; // Index bulan (0-based)
    $monthlyData[$monthIndex] = $donation->total;
}

// Horizontal Bar Chart
$horizontalbarChart = (new LarapexChart)->horizontalBarChart()
    ->setTitle('Monthly Donations')
    ->addData('Donations', $monthlyData) // Data jumlah collected_amount
    ->setLabels($allMonths) // Label bulan
    ->setColors([ '#008FFB', '#00E396', '#feb019', '#ff455f', '#775dd0', '#80effe',
    '#0077B5', '#ff6384', '#c9cbcf', '#0057ff', '00a9f4', '#2ccdc9', '#5e72e4']);

// Line Chart
$lineChart = (new LarapexChart)->lineChart()
    ->setTitle('Donation Trends')
    ->addData('Donation Amount', $monthlyData) // Data jumlah collected_amount
    ->setLabels($allMonths) // Label bulan
    ->setColors(['#6366F1']);

        return view('admin.dashboard', compact('pieChart', 'horizontalbarChart', 'lineChart','totalDonations','totalProjects','projectsDone'));
    }


}
