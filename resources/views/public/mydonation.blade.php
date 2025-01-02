@extends('layout.publicLayout')

@section('title', 'Donasi Saya | BridgeOfHope')

@section('content')
<section class="py-16 bg-gray-100">
    <div class="max-w-6xl mx-auto px-6">
        <h1 class="text-3xl font-bold text-indigo-700 mb-6">Donasi Saya</h1>

        @if($pendingDonations->isEmpty())
            <p class="text-gray-600">Tidak ada donasi yang berstatus <span class="font-semibold text-red-500">Pending</span>.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($pendingDonations as $donation)
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <img src="{{ asset('storage/' . $donation->campaign->banner_image) }}" alt="Project Image" class="w-full h-36 object-cover rounded-md">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $donation->campaign->title }}</h2>
                        <p class="text-gray-600 mb-4">Jumlah: <span class="font-bold text-indigo-600">Rp{{ number_format($donation->amount, 0, ',', '.') }}</span></p>
                        <p class="text-gray-600">Status: <span class="font-semibold text-yellow-500 capitalize">{{ $donation->payment_status }}</span></p>
                        <p class="text-gray-500 text-sm mt-2">Tanggal: {{ $donation->created_at->format('d M Y') }}</p>

                        <!-- Tombol Bayar -->
                        <button 
                        onclick="startPayment('{{ route('donation.complete', $donation->id) }}')" 
                        class="mt-4 inline-block bg-indigo-600 hover:bg-indigo-700 text-white text-center py-2 px-4 rounded-lg transition duration-300">
                        Bayar
                    </button>
                         
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

<script>
    function startPayment(url) {
        fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.snap_token) {
                snap.pay(data.snap_token, {
                    onSuccess: function(result) {
                        console.log('Pembayaran berhasil:', result);
    
                        // Kirim permintaan untuk memperbarui status
                        fetch('{{ route('donation.updateStatus') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                transaction_id: result.order_id // Gunakan order_id
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.message) {
                                alert('Pembayaran berhasil dan status diperbarui.');
                                location.reload(); // Muat ulang halaman
                            } else {
                                alert('Pembayaran berhasil tetapi gagal memperbarui status.');
                            }
                        })
                        .catch(error => {
                            console.error('Kesalahan saat memperbarui status:', error);
                            alert('Pembayaran berhasil tetapi terjadi kesalahan saat memperbarui status.');
                        });
                    },
                    onPending: function(result) {
                        console.log('Pembayaran pending:', result);
                        alert('Pembayaran sedang diproses.');
                    },
                    onError: function(result) {
                        console.error('Pembayaran gagal:', result);
                        alert('Pembayaran gagal.');
                    },
                    onClose: function() {
                        alert('Anda menutup proses pembayaran.');
                    }
                });
            } else {
                alert('Gagal memulai pembayaran.');
            }
        })
        .catch(error => {
            console.error('Kesalahan saat memulai pembayaran:', error);
            alert('Kesalahan saat memulai pembayaran. Silakan coba lagi.');
        });
    }
    </script>
    


@endsection
