<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class AdminController extends Controller
{
    public function index()
    {
        // Pie Chart
        // Pie Chart
        $pieChart = (new LarapexChart)->pieChart()
            ->setTitle('Donation Categories')
            ->setSubtitle('Distribution of Donations')
            ->addData([100,50,25]) // Add the collected_amount data
            ->setLabels(['donasi', 'zakat', 'beasiswa']) // Add the type as labels
            ->setColors(['#6366F1', '#2DD4BF', '#F472B6']); // Customize the colors as needed

        // Bar Chart
        $horizontalbarChart = (new LarapexChart)->horizontalbarChart()
            ->setTitle('Monthly Donations')
            ->addData('Donations', [120, 150, 180, 90, 200]) // Add a name for the data series
            ->setLabels(['January', 'February', 'March', 'April', 'May'])
            ->setColors(['#6366F1']);

        // Line Chart
        $lineChart = (new LarapexChart)->lineChart()
            ->setTitle('Donation Trends')
            ->addData('Donation Amount', [100, 200, 150, 300, 250]) // Add a name for the data series
            ->setLabels(['January', 'February', 'March', 'April', 'May'])
            ->setColors(['#6366F1']);

        return view('admin.dashboard', compact('pieChart', 'horizontalbarChart', 'lineChart'));
    }


}
