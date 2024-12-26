@extends('layout.publicLayout')

@section('title', 'Submit Donation | BridgeOfHope')

@section('content')
<!-- Section: Hero -->
<section class="relative bg-gray-900 px-4 sm:px-12 py-24 min-h-screen flex items-center justify-center">
    <!-- Background Image with Parallax -->
    <div class="absolute inset-0 bg-cover bg-center bg-fixed" 
         style="background-image: url('header2.png');"></div>
    <div class="absolute inset-0 bg-black opacity-70"></div> <!-- Darker Overlay for better text visibility -->

    <!-- Content Container -->
    <div class="relative z-10 text-center max-w-4xl mx-auto text-white">
        <!-- Logo with size adjustments -->
        <img src="BridgeOfHopeLogo.png" alt="BridgeOfHope Logo" class="mx-auto mb-6 w-32 sm:w-40 md:w-48">
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

<!-- Form Section -->
<section id="form-section" class="bg-indigo-100 py-16">
    <div class="max-w-4xl mx-auto p-8 bg-white shadow-lg rounded-lg">

        @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
        <p class="font-bold">Berhasil!</p>
        <p>{{ session('success') }}</p>
    </div>
@endif


        <h2 class="text-3xl font-bold text-indigo-700 mb-6 text-center">Submit a Donation Project</h2>
        <p class="text-gray-600 mb-10 text-center">Your submission helps us build a better future. Fill out the form below to get started.</p>

        <!-- Form -->
        <form action="{{ route('donations.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <!-- Project Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Project Title</label>
                <input type="text" id="title" name="title" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter the title of your project" required>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" rows="5" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Provide details about your project" required></textarea>
            </div>

            <!-- Target Amount -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="target_amount" class="block text-sm font-medium text-gray-700">Target Amount (USD)</label>
                    <input type="number" id="target_amount" name="target_amount" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="E.g., 1000" required>
                </div>

                <!-- Deadline -->
                <div>
                    <label for="deadline" class="block text-sm font-medium text-gray-700">Deadline</label>
                    <input type="date" id="deadline" name="deadline" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
            </div>

            <!-- Image Upload -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Upload Project Image</label>
                <input type="file" id="image" name="image" class="mt-1 block w-full text-gray-500 border border-gray-300 rounded-lg p-2" accept="image/*">
            </div>

            <!-- Progress Bar Placeholder -->
            <div class="relative pt-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">Progress</label>
                <div class="overflow-hidden h-3 text-xs flex rounded bg-indigo-200">
                    <div style="width:30%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-indigo-600"></div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="bg-indigo-700 hover:bg-indigo-800 text-white py-3 px-6 rounded-lg text-lg transition duration-300 ease-in-out focus:ring-4 focus:ring-indigo-500 focus:ring-offset-2">
                    Submit Project
                </button>
            </div>
        </form>
    </div>
</section>
@endsection
