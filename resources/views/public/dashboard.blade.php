@extends('layout.publicLayout') <!-- Mengacu pada layout utama yang Anda buat -->
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

<!-- Welcome Section -->
<div class="container mx-auto p-6">
    <section class="my-6">
        <div class="bg-indigo-50 p-6 rounded-md shadow">
            <h2 class="text-xl font-semibold">Welcome back</h2>
            <div class="grid grid-cols-2 sm:grid-cols-5 gap-2 py-10">
                <!-- Card 1 -->
                <div class="flex flex-col items-center space-y-3">
                    <img src="icon/donationLogo.png" alt="Donasi" class="w-20 h-20 object-contain">
                    <p class="text-gray-700 font-semibold">Donasi</p>
                </div>
            
                <!-- Card 2 -->
                <div class="flex flex-col items-center space-y-3">
                    <img src="icon/zakatLogo.png" alt="Zakat" class="w-20 h-20 object-contain">
                    <p class="text-gray-700 font-semibold">Zakat</p>
                </div>
            
                <!-- Card 3 -->
                <div class="flex flex-col items-center space-y-3">
                    <img src="icon/fundLogo.png" alt="fund Dana" class="w-20 h-20 object-contain">
                    <p class="text-gray-700 font-semibold">Galang Dana</p>
                </div>
            
                <!-- Card 4 -->
                <div class="flex flex-col items-center space-y-3">
                    <img src="icon/lingkunganLogo.png" alt="Program Lingkungan" class="w-20 h-20 object-contain">
                    <p class="text-gray-700 font-semibold">Program Lingkungan</p>
                </div>
            
                <!-- Card 5 -->
                <div class="flex flex-col items-center space-y-3">
                    <img src="icon/beasiswaLogo.png" alt="beasiswa" class="w-20 h-20 object-contain">
                    <p class="text-gray-700 font-semibold">beasiswa</p>
                </div>
            
                <!-- Card 6 dengan Label "BARU" -->
                <div class="relative flex flex-col items-center space-y-3">
                    <img src="icon/emergencyLogo.png" alt="Darurat" class="w-20 h-20 object-contain">
                    <p class="text-gray-700 font-semibold">Darurat</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Highlight Projects -->
    <section class="my-6">
        <h2 class="text-xl font-semibold mb-4">Darurat</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card Start -->
            <div class="bg-white p-4 rounded-lg relative" style="box-shadow: 15px 10px 15px -3px rgba(79, 70, 229, 0.7);">
                <!-- Banner Image -->
                <img src="header.png" alt="Project Image" class="w-full h-36 object-cover rounded-md">
                
                <!-- Countdown Badge -->
                <div class="absolute top-2 left-2 bg-blue-100 text-blue-700 text-xs font-semibold py-1 px-2 rounded-md">
                    14 hari lagi
                </div>
                
                <!-- Pengirim -->
                <div class="flex items-center mt-3">
                    <p class="text-gray-600 text-sm">Salam Setara p</p>
                    
                </div>
                
                <!-- Project Title -->
                <h3 class="mt-2 text-lg font-semibold text-indigo-600">
                    Solidaritas Bantu Korban Letusan Gunung Lewotobi
                </h3>
                
                <!-- Deskripsi -->
                <p class="text-gray-600 text-sm mt-1">Bantu Warga Bangkit dan Bertahan</p>
                
                <!-- Indikator Terkumpul -->
                <div class="mt-4">
                    <p class="text-gray-600 text-sm">Terkumpul</p>
                    <p class="text-blue-600 font-semibold text-lg">Rp171.930.694</p>
                    
                    <!-- Progress Bar -->
                    <div class="w-full bg-gray-200 h-2 rounded-full mt-2">
                        <div class="bg-blue-600 h-2 rounded-full" style="width: 60%;"></div>
                    </div>
                </div>
            </div>
            <!-- Card End -->
        </div>
    </section>


    <section class="my-8">
        <h2 class="text-xl font-semibold mb-6">Pilih Kategori Favoritmu</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <!-- Kategori 1 -->
            <div class="flex flex-col items-center bg-white p-4 rounded-xl  transition duration-200">
                <img src="icon/DisasterLogo.png" alt="Bencana Alam" class="w-16 h-16 mb-3">
                <p class="text-gray-700 font-medium">Bencana Alam</p>
            </div>
    
            <!-- Kategori 2 -->
            <div class="flex flex-col items-center bg-white p-4 rounded-xl  transition duration-200">
                <img src="icon/babyLogo.png" alt="Balita & Anak Sakit" class="w-16 h-16 mb-3">
                <p class="text-gray-700 font-medium text-center">Balita & Anak Sakit</p>
            </div>
    
            <!-- Kategori 3 -->
            <div class="flex flex-col items-center bg-white p-4 rounded-xl  transition duration-200">
                <img src="icon/medicineLogo.png" alt="Bantuan Medis & Kesehatan" class="w-16 h-16 mb-3">
                <p class="text-gray-700 font-medium text-center">Bantuan Medis & Kesehatan</p>
            </div>
    
            <!-- Kategori 4 -->
            <div class="flex flex-col items-center bg-white p-4 rounded-xl  transition duration-200">
                <img src="icon/otherLogo.png" alt="Lainnya" class="w-16 h-16 mb-3">
                <p class="text-gray-700 font-medium">Lainnya</p>
            </div>
        </div>
    </section>

    <section class="my-8">
        <!-- Heading -->
        <h2 class="text-xl font-semibold mb-4">Rekomendasi</h2>
        <div class="space-y-6">
            <!-- Card 1 -->
            <div class="bg-white p-4 rounded-lg shadow-md flex flex-col sm:flex-row">
                <!-- Image -->
                <img src="banjir.png" alt="Banjir" class="w-full sm:w-52 h-32 object-cover rounded-md mb-4 sm:mb-0">
                
                <!-- Content -->
                <div class="flex flex-col justify-between flex-1 sm:ml-4">
                    <h3 class="text-lg font-semibold text-indigo-700">Solidaritas Bantu Korban Banjir Bandang Ternate!</h3>
                    <div class="text-gray-600 text-sm mt-1">Jagesbersama 
                        <img src="verified.png" alt="Verified" class="inline-block w-4 h-4 ml-1">
                    </div>
                    
                    <!-- Terkumpul dan Hari Tersisa -->
                    <div class="mt-4">
                        <p class="text-gray-600 text-sm">Terkumpul</p>
                        <p class="text-blue-600 font-semibold">Rp168.753.797</p>
                        
                        <!-- Progress Bar -->
                        <div class="w-full bg-gray-200 h-2 rounded-full mt-2">
                            <div class="bg-blue-600 h-2 rounded-full" style="width: 60%;"></div>
                        </div>
                        
                        <div class="flex justify-between text-gray-500 text-sm mt-2">
                            <span>Terkumpul</span>
                            <span>45 Hari</span>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Card 2 -->
            <div class="bg-white p-4 rounded-lg shadow-md flex flex-col sm:flex-row">
                <img src="masjid.png" alt="Masjid" class="w-full sm:w-52 h-32 object-cover rounded-md mb-4 sm:mb-0">
                
                <div class="flex flex-col justify-between flex-1 sm:ml-4">
                    <h3 class="text-lg font-semibold text-indigo-700">5 Tahun Tanpa Masjid, 164 Warga Ibadah di Lapangan</h3>
                    <div class="text-gray-600 text-sm mt-1">Masjid Nusantara 
                        <img src="verified.png" alt="Verified" class="inline-block w-4 h-4 ml-1">
                    </div>
    
                    <div class="mt-4">
                        <p class="text-gray-600 text-sm">Terkumpul</p>
                        <p class="text-blue-600 font-semibold">Rp1.262.158.139</p>
                        <div class="w-full bg-gray-200 h-2 rounded-full mt-2">
                            <div class="bg-blue-600 h-2 rounded-full" style="width: 80%;"></div>
                        </div>
                        
                        <div class="flex justify-between text-gray-500 text-sm mt-2">
                            <span>Terkumpul</span>
                            <span>135 Hari</span>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Card 3 -->
            <div class="bg-white p-4 rounded-lg shadow-md flex flex-col sm:flex-row">
                <img src="kebakaran.png" alt="Kebakaran" class="w-full sm:w-52 h-32 object-cover rounded-md mb-4 sm:mb-0">
                
                <div class="flex flex-col justify-between flex-1 sm:ml-4">
                    <h3 class="text-lg font-semibold text-indigo-700">URGENT! Asap Tebal Kebakaran Hutan Kepung Kalbar!</h3>
                    <div class="text-gray-600 text-sm mt-1">BAZNAS Hub 
                        <img src="verified.png" alt="Verified" class="inline-block w-4 h-4 ml-1">
                    </div>
                    
                    <div class="mt-4">
                        <p class="text-gray-600 text-sm">Terkumpul</p>
                        <p class="text-blue-600 font-semibold">Rp536.729.513</p>
                        <div class="w-full bg-gray-200 h-2 rounded-full mt-2">
                            <div class="bg-blue-600 h-2 rounded-full" style="width: 75%;"></div>
                        </div>
                        
                        <div class="flex justify-between text-gray-500 text-sm mt-2">
                            <span>Terkumpul</span>
                            <span>45 Hari</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Button Lihat Semua -->
        <div class="text-center mt-6">
            <button class="bg-white text-indigo-500 px-6 py-2 rounded-full hover:border-indigo-500 hover:border-2 transition duration-200 flex items-center justify-center space-x-2">
                <span>Lihat semua</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M8 5v2h2V5zm4 4V7h-2v2zm2 2V9h-2v2zm0 2h2v-2h-2zm-2 2v-2h2v2zm0 0h-2v2h2zm-4 4v-2h2v2z"></path>
                </svg>
            </button>
        </div>        
    </section>   
</div>

<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Doa-doa #OrangBaik</h2>
            <a href="#" class="text-indigo-500 hover:underline">Lihat semua</a>
        </div>
        <div class="flex space-x-4 overflow-x-scroll">
            <!-- Card Doa -->
            <div class="flex-none bg-white shadow-lg rounded-lg p-4 w-72">
                <div class="flex items-center mb-2">
                    <img src="user-icon.png" alt="User Icon" class="w-10 h-10 rounded-full mr-3">
                    <div>
                        <h3 class="text-gray-700 font-semibold">Anonim</h3>
                        <p class="text-sm text-gray-500">14 jam lalu</p>
                    </div>
                </div>
                <p class="text-gray-600 mb-4">
                    Yang terbaik untuk keluarga ibu Suni. Semoga kedamaian yang... <a href="#" class="text-indigo-500 hover:underline">Lihat selengkapnya</a>
                </p>
                <div class="flex items-center justify-between">
                    <button class="flex items-center space-x-2 text-gray-500 hover:text-red-500">
                        <i class="fas fa-heart"></i>
                        <span>Aamiin</span>
                    </button>
                </div>
            </div>
            <!-- Tambahkan lebih banyak card sesuai kebutuhan -->
            <div class="flex-none bg-white shadow-lg rounded-lg p-4 w-72">
                <div class="flex items-center mb-2">
                    <img src="user-icon.png" alt="User Icon" class="w-10 h-10 rounded-full mr-3">
                    <div>
                        <h3 class="text-gray-700 font-semibold">Anonim</h3>
                        <p class="text-sm text-gray-500">14 jam lalu</p>
                    </div>
                </div>
                <p class="text-gray-600 mb-4">
                    Semoga lekas sembuh... <a href="#" class="text-indigo-500 hover:underline">Lihat selengkapnya</a>
                </p>
                <div class="flex items-center justify-between">
                    <button class="flex items-center space-x-2 text-gray-500 hover:text-red-500">
                        <i class="fas fa-heart"></i>
                        <span>Aamiin</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="p-8 bg-gray-800 text-white">
    <h2 class="text-3xl font-bold mb-4">Frequently Asked Question (FAQ)</h2>
    <p class="mb-8 text-indigo-300">Pertanyaan yang sering muncul</p>
    <div class="flex">
        <!-- Sidebar Pertanyaan -->
        <div class="w-1/3 bg-gray-800 rounded-l-lg p-4">
            <ul class="space-y-4">
                <li class="bg-indigo-700 p-3 rounded-md hover:bg-indigo-600">
                    <button class="text-left w-full text-lg font-semibold text-indigo-200 focus:outline-none">Apa itu BridgeOfHope?</button>
                </li>
                <li class="p-3 hover:bg-indigo-700 rounded-md">
                    <button class="text-left w-full text-lg font-semibold text-indigo-200 focus:outline-none">Bagaimana cara berdonasi?</button>
                </li>
                <li class="p-3 hover:bg-indigo-700 rounded-md">
                    <button class="text-left w-full text-lg font-semibold text-indigo-200 focus:outline-none">Apakah donasi saya aman?</button>
                </li>
                <li class="p-3 hover:bg-indigo-700 rounded-md">
                    <button class="text-left w-full text-lg font-semibold text-indigo-200 focus:outline-none">Bisakah saya membuat proyek penggalangan dana?</button>
                </li>
                <li class="p-3 hover:bg-indigo-700 rounded-md">
                    <button class="text-left w-full text-lg font-semibold text-indigo-200 focus:outline-none">Apa metode pembayaran yang tersedia?</button>
                </li>
            </ul>
        </div>

        <!-- Konten Jawaban -->
        <div class="w-2/3 bg-gray-800 rounded-r-lg p-6">
            <h3 class="text-xl font-bold mb-2">Apa itu BridgeOfHope?</h3>
            <p class="text-indigo-100">
                BridgeOfHope adalah platform penggalangan dana yang bertujuan untuk menghubungkan donatur dengan proyek-proyek sosial di berbagai bidang, seperti pendidikan, kesehatan, dan kesejahteraan masyarakat. Platform ini menyediakan cara mudah dan aman bagi pengguna untuk memberikan donasi dan melacak perkembangan proyek yang mereka dukung.
            </p>
        </div>
    </div>
</section>

@endsection