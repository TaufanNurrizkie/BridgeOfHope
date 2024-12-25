@extends('layout.adminLayout')

@section('title', 'Submit Donation | BridgeOfHope')

@section('content')
<!-- Section: Hero -->
<section class="relative bg-gray-900 px-4 sm:px-12 py-24 min-h-screen flex items-center justify-center">
    <div class="absolute inset-0 bg-cover bg-center bg-fixed" 
         style="background-image: url('header2.png');"></div>
    <div class="absolute inset-0 bg-black opacity-70"></div> <!-- Overlay -->

    <div class="relative z-10 text-center max-w-4xl mx-auto text-white transform -translate-y-1/3">
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
    <div class="max-w-7xl mx-auto p-8 bg-white shadow-lg rounded-lg overflow-x-auto">
        <h2 class="text-3xl font-bold text-indigo-700 mb-6 text-center">Campaign</h2>
        <div class="flex justify-end mb-4">
            <a href="{{ route('list.create') }}" 
               class="bg-blue-700 text-white w-[140px] text-center rounded p-2 transition duration-300 hover:bg-blue-800 focus:ring focus:ring-blue-500 focus:outline-none ">
                Create Campaign
            </a>
        </div>
        
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Existing Campaigns</h2>
        <table class="w-full table-auto border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100 text-sm">
                    <th class="border border-gray-300 px-4 py-2 text-left">No</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Title</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Description</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Type</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Banner</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Goal Amount</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Collected Amount</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Start Date</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">End Date</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Created By</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($campaigns as $index => $campaign)
                    <tr class="border-b text-sm">
                        <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $campaign->title }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $campaign->description }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $campaign->type }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            @if ($campaign->banner_image)
                                <img src="{{ asset('storage/' . $campaign->banner_image) }}" alt="Banner" class="w-16 h-16 object-cover">
                            @else
                                No Image
                            @endif
                        </td>
                        
                        <td class="border border-gray-300 px-4 py-2">{{ number_format($campaign->goal_amount, 2) }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ number_format($campaign->collected_amount, 2) }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $campaign->start_date }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $campaign->end_date }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $campaign->creator->name ?? 'N/A' }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $campaign->status }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <a href="#" class="text-blue-600 hover:underline">Edit</a> |
                            <a href="#" class="text-red-600 hover:underline">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="11" class="text-center py-4 text-gray-500">No campaigns available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection
