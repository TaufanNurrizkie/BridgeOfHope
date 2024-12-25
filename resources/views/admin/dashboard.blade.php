@extends('layout.adminLayout') <!-- Mengacu pada layout utama yang Anda buat -->
@section('title', 'Dashboard | BridgeOfHope')

@section('content')
<section class="relative bg-gray-800 px-12 min-h-screen pb-32 ">
    <!-- Gambar Latar Belakang dengan Overlay -->
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat opacity-30" 
         style="background-image: url('header2.png'); background-size: cover;">
    </div>
    <div class="absolute inset-0 bg-gray-900 opacity-30"></div> <!-- Overlay dengan opacity yang lebih lembut -->

    <!-- Header dengan Search Bar dan Tombol Login -->
    <div class="relative z-20 flex justify-between items-center px-8 py-4">
        <!-- Search Bar -->
        <div class="flex-1 relative">
            <input type="text" placeholder="Search..." class="w-full pl-10 pr-4 py-2 rounded-lg bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-gray-500">
            <!-- Search Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path fill="white" d="M6 2h8v2H6zM4 6V4h2v2zm0 8H2V6h2zm2 2H4v-2h2zm8 0v2H6v-2zm2-2h-2v2h2v2h2v2h2v-2h-2v-2h-2v-2h-2zm0-8h2v8h-2zm0 0V4h-2v2z"/>
            </svg>
        </div>
    
        <!-- Tombol Login -->
        @if (Route::has('login'))
        <livewire:welcome.navigation />
    @endif
    </div>
    
    <!-- Konten Section -->
    <div class="relative max-w-4xl z-10 flex flex-col lg:flex-row items-start justify-between space-y-8 lg:space-y-0 mt-8">
        <!-- Bagian Kiri (Teks & Tombol) -->
        <div class="max-w-lg space-y-8">
            <h1 class="text-4xl lg:text-5xl font-bold text-white leading-snug">
                Bridge of Hope: Seeking Financial Assistance for Natural Disaster Emergencies, Social Causes, and Others
            </h1>
            <div class="flex space-x-4">
                <button class="px-6 py-3 bg-white text-indigo-600 font-semibold rounded-lg shadow hover:bg-gray-200">
                    Request Donation
                </button>
                <button class="px-6 py-3 border border-indigo-600 text-white font-semibold rounded-lg shadow hover:bg-gray-700">
                    Donate and Help
                </button>
            </div>
        </div>
    </div>

    <!-- Overlay Informasi -->
    <div class="absolute bottom-[150px] right-10 bg-gray-900 text-white p-6 shadow-lg w-[500px] opacity-80">
        <h2 class="text-2xl font-semibold mb-2">BridgeOfHope: 
            One Click, A Thousand Wishes Come True</h2>
        <p class="text-sm text-gray-400 mb-4">16 November 2024</p>
        <p class="text-base">

            BridgeOfHope adalah platform penggalangan dana yang memungkinkan individu atau organisasi untuk mendukung proyek sosial. Website ini menghubungkan donatur dengan berbagai inisiatif di bidang pendidikan, kesehatan, dan kemanusiaan, dengan tujuan menciptakan perubahan positif dan memberikan harapan bagi yang membutuhkan.
        </p>
        <a href="#" class="text-indigo-600 mt-4 inline-block hover:underline">Baca selengkapnya</a>
    </div>

    <!-- Data Section -->

        <div class="absolute  -bottom-12 mx-auto w-[75%] overflow-hidden left-1/2 transform -translate-x-1/2">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 max-w-5xl mx-auto text-center">
                <div class="bg-white border-2 border-indigo-600  p-4 rounded-md shadow">
                    <h3 class="font-medium text-gray-700">Total Donations</h3>
                    <p class="text-xl font-bold text-indigo-600">$1,230</p>
                </div>
                <div class="bg-white border-2 border-indigo-600  p-4 rounded-md shadow">
                    <h3 class="font-medium text-gray-700">Total Projects</h3>
                    <p class="text-xl font-bold text-indigo-600">5</p>
                </div>
                <div class="bg-white border-2 border-indigo-600  p-4 rounded-md shadow">
                    <h3 class="font-medium text-gray-700">Project Done</h3>
                    <p class="text-xl font-bold text-indigo-600">2</p>
                </div>
            </div>
        </div>
</section>

<div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
    <!-- Pie Chart -->
    <div class="bg-white p-4 rounded-lg shadow-md">

        {!! $pieChart->container() !!}
    </div>

    <!-- Horizontal Bar Chart -->
    <div class="bg-white p-4 rounded-lg shadow-md">

        {!! $horizontalbarChart->container() !!}
    </div>

    <!-- Line Chart -->
    <div class="bg-white p-4 rounded-lg shadow-md col-span-2">

        {!! $lineChart->container() !!}
    </div>
</div>



<!-- Script Section -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
{!! $pieChart->script() !!}
{!! $horizontalbarChart->script() !!}
{!! $lineChart->script() !!}
</script>

@endsection
