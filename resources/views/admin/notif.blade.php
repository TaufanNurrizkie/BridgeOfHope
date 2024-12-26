@extends('layout.adminLayout')

@section('title', 'Notifications | BridgeOfHope')

@section('content')
<section class="py-16 bg-gray-100">
    <div class="max-w-4xl mx-auto px-6">
        <h1 class="text-3xl font-bold text-indigo-700 mb-6">Notifikasi Pengajuan Baru</h1>

        @if ($notifications->isEmpty())
            <div class="bg-white p-6 rounded-lg shadow text-center">
                <p class="text-gray-500">Tidak ada pengajuan baru saat ini.</p>
            </div>
        @else
            <div class="space-y-4">
                @foreach ($notifications as $notification)
                    <div class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                        <div class="flex items-center justify-between">
                            <h2 class="text-lg font-semibold text-indigo-700">
                                {{ $notification->title }}
                            </h2>
                            <span class="text-sm text-gray-500">
                                {{ $notification->created_at->diffForHumans() }}
                            </span>
                        </div>
                        <p class="text-gray-600 mt-2">{{ Str::limit($notification->description, 100) }}</p>
                        <div class="mt-4 flex justify-between items-center">
                            <a href="{{ route('pengajuan.show', $notification->id) }}" 
                                class="text-indigo-600 hover:underline">
                                Lihat Detail
                             </a>
                             
                            <span class="text-gray-500 text-sm">
                                Target: Rp{{ number_format($notification->target_amount, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection
