@extends('layout.publicLayout')

@section('title', $pengajuan->title . ' | BridgeOfHope')

@section('content')
<section class="py-16 bg-gray-100">
    <div class="max-w-4xl mx-auto px-6 bg-white rounded-lg shadow-lg p-8">
        <h1 class="text-3xl font-bold text-indigo-700 mb-6">{{ $pengajuan->title }}</h1>

        <!-- Project Image -->
        @if ($pengajuan->image)
            <div class="mb-6">
                <img src="{{ asset('storage/' . $pengajuan->image) }}" alt="{{ $pengajuan->title }}" class="rounded-lg shadow-md w-full">
            </div>
        @endif

        <!-- Description -->
        <p class="text-gray-600 leading-relaxed mb-6">{{ $pengajuan->description }}</p>

        <!-- Target Amount and Deadline -->
        <div class="mb-6">
            <p class="text-lg font-semibold text-gray-700">
                Target Amount: <span class="text-indigo-600">Rp{{ number_format($pengajuan->target_amount, 0, ',', '.') }}</span>
            </p>
            <p class="text-lg font-semibold text-gray-700">
                Deadline: <span class="text-indigo-600">{{ \Carbon\Carbon::parse($pengajuan->deadline)->format('d M Y') }}</span>
            </p>
        </div>

        <!-- Progress -->
        <div class="mb-6">
            <p class="text-sm font-medium text-gray-700 mb-2">Progress:</p>
            <div class="relative pt-1">
                <div class="overflow-hidden h-3 text-xs flex rounded bg-indigo-200">
                    <!-- Calculate progress dynamically -->
                    <div style="width: {{ min(($pengajuan->collected_amount / $pengajuan->target_amount) * 100, 100) }}%" 
                         class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-indigo-600">
                    </div>
                </div>
                <p class="text-sm text-gray-600 mt-2">
                    Rp{{ number_format($pengajuan->collected_amount, 0, ',', '.') }} / Rp{{ number_format($pengajuan->target_amount, 0, ',', '.') }}
                </p>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex space-x-4 mt-8">
            <a href="{{ route('notifications.index') }}" 
               class="bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 rounded-lg transition duration-300">
                Kembali
            </a>
            <a href="#" 
               class="bg-indigo-700 hover:bg-indigo-800 text-white py-2 px-4 rounded-lg transition duration-300">
                Donasi Sekarang
            </a>
        </div>
    </div>
</section>
@endsection
