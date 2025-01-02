@extends('layout.adminLayout')

@section('title', $campaign->title . ' | BridgeOfHope')

@section('content')
<section class="py-16 bg-gray-100">
    <div class="max-w-4xl mx-auto px-6 bg-white rounded-lg shadow-lg p-8">
        
        <!-- Project Image -->
        @if ($campaign->banner_image)
        <div class="mb-6">
            <img src="{{ asset('storage/' . $campaign->banner_image) }}" 
            alt="{{ $campaign->title }}" 
            class="rounded-lg shadow-md max-w-xl mx-auto h-auto">
        </div>
        @endif
        <h1 class="text-3xl font-bold text-indigo-700 mb-3">{{ $campaign->title }}</h1>
        <td class="border border-gray-300 px-4 py-2 text-center ">
            @if ($campaign->status === 'cancelled')
                <span class="px-2 py-1 text-white bg-red-600 rounded">Cancelled</span>
            @elseif ($campaign->status === 'completed')
                <span class="px-2 py-1 text-white bg-green-600 rounded">Completed</span>
            @elseif ($campaign->status === 'active')
                <span class="px-2 py-1 text-white bg-blue-600 rounded">Active</span>
            @else
                <span class="px-2 py-1 text-white bg-gray-600 rounded">Unknown</span>
            @endif
        </td>
        

        <!-- Description -->
        <p class="text-gray-600 leading-relaxed my-3">{{ $campaign->description }}</p>

        <!-- Target Amount and Deadline -->
        <div class="mb-6">
            <p class="text-lg font-semibold text-gray-700">
                Target Amount: <span class="text-indigo-600">Rp{{ number_format($campaign->goal_amount, 0, ',', '.') }}</span>
            </p>
            <p class="text-lg font-semibold text-gray-700">
                Deadline: <span class="text-indigo-600">{{ \Carbon\Carbon::parse($campaign->end_date)->format('d M Y') }}</span>
            </p>
        </div>

        <!-- Progress -->
        <div class="mb-6">
            <p class="text-sm font-medium text-gray-700 mb-2">Progress:</p>
            <div class="relative pt-1">
                <div class="overflow-hidden h-3 text-xs flex rounded bg-indigo-200">
                    <!-- Calculate progress dynamically -->
                    <div style="width: {{ min(($campaign->collected_amount / $campaign->goal_amount) * 100, 100) }}%" 
                         class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-indigo-600">
                    </div>
                </div>
                <p class="text-sm text-gray-600 mt-2">
                    Rp{{ number_format($campaign->collected_amount, 0, ',', '.') }} / Rp{{ number_format($campaign->goal_amount, 0, ',', '.') }}
                </p>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex space-x-4 mt-8">
            <a href="{{ route('admin.list') }}" 
               class="bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 rounded-lg transition duration-300">
                Kembali
            </a>
        
            <form action="{{ route('list.complete', $campaign->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('PATCH')
                <button type="submit" 
                        class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg transition duration-300">
                    Complete
                </button>
            </form>
        
            <form action="{{ route('list.cancel', $campaign->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('PATCH')
                <button type="submit" 
                        class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-lg transition duration-300">
                    Cancel
                </button>
            </form>
        </div>
        
        
    </div>
</section>
@endsection
