@extends('layout.publicLayout')
@section('title', 'About Us | BridgeOfHope')

@section('content')

<section class="relative bg-gray-900 px-4 sm:px-12 py-24 min-h-screen flex items-center justify-center">
    <!-- Back Button -->


    <!-- Background Image with Parallax -->
    <div class="absolute inset-0 bg-cover bg-center bg-fixed" 
         style="background-image: url('{{ asset('header2.png') }}');"></div>
    <div class="absolute inset-0 bg-black opacity-70"></div> <!-- Darker Overlay for better text visibility -->
    <a href="{{ url()->previous() }}" 
        class="absolute top-4 left-4  text-white hover:text-indigo-600 py-2 px-4 rounded-full text-sm shadow-lg transition-all duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24"><path fill="currentColor" d="M20 11v2H8v2H6v-2H4v-2h2V9h2v2zM10 7H8v2h2zm0 0h2V5h-2zm0 10H8v-2h2zm0 0h2v2h-2z"/></svg>
     </a>   
    <!-- Content Container -->
    <div class="relative z-10 text-center max-w-4xl mx-auto text-white">

        <!-- Logo with size adjustments -->
        <img src="{{ asset('BridgeOfHopeLogo.png') }}" alt="BridgeOfHope Logo" class="mx-auto mb-6 w-32 sm:w-40 md:w-48">
        <h1 class="text-5xl sm:text-6xl font-extrabold leading-tight mb-4 animate__animated animate__fadeInUp">
            BridgeOfHope
        </h1>
        <p class="text-lg sm:text-xl text-indigo-200 mb-8 animate__animated animate__fadeInUp animate__delay-1s">
            Empowering Dreams Through Donations
        </p>
        <a href="#form-section" 
           class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white py-3 px-6 rounded-full text-lg transition-all duration-300 animate__animated animate__fadeInUp animate__delay-2s">
            Submit a Donation Project
        </a>
    </div>
</section>

<section class="my-6">
    <h2 class="text-xl font-semibold mb-4 text-center">
        Campaign Urgent
    </h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
        @foreach($urgent as $data)
        <!-- Card Start -->
        <a href="{{ route('campaign.show', $data->id) }}" class="block bg-white p-4 rounded-lg relative transition-transform transform hover:scale-105" 
           style="box-shadow: 15px 10px 15px -3px rgba(79, 70, 229, 0.7);">
            <!-- Banner Image -->
            <img src="{{ asset('storage/' . $data->banner_image) }}" alt="Project Image" class="w-full h-36 object-cover rounded-md">

            <!-- Countdown Badge -->
            <div class="absolute top-2 left-2 bg-blue-100 text-blue-700 text-xs font-semibold py-1 px-2 rounded-md">
                {{ $data->remainingDays > 0 ? $data->remainingDays . ' Hari Lagi' : 'Berakhir' }}
            </div>

            <!-- Pengirim -->
            <div class="flex items-center mt-3">
                <p class="text-gray-600 text-sm">{{ $data->sender }}</p>
            </div>

            <!-- Project Title -->
            <h3 class="mt-2 text-lg font-semibold text-indigo-600">
                {{ $data->title }}
            </h3>

            <!-- Deskripsi -->
            <p class="text-gray-600 text-sm mt-1 line-clamp-2">{{ $data->description }}</p>

            <!-- Indikator Terkumpul -->
            <div class="mt-4">
                <p class="text-gray-600 text-sm">Terkumpul</p>
                <p class="text-blue-600 font-semibold">Rp{{ number_format($data->collected_amount, 0, ',', '.') }}</p>
                
                <!-- Progress Bar -->
                @if ($data->goal_amount > 0)
                <div class="bg-gray-200 h-2 rounded-full mt-1">
                    <div class="bg-blue-600 h-2 rounded-full" 
                         style="width: {{ min(($data->collected_amount / $data->goal_amount) * 100, 100) }}%;"></div>
                </div>
                @else
                <div class="bg-gray-400 h-2 rounded-full mt-1"></div>
                @endif
            </div>
        </a>
        <!-- Card End -->
        @endforeach
    </div>
</section>

@endsection
