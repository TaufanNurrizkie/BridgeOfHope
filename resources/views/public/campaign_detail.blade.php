@vite('resources/css/app.css')

<div class="max-w-full mx-auto mb-5 bg-white rounded-lg shadow-lg overflow-hidden">
    <!-- Banner -->
    <div class="relative">
        <img src="{{ asset('storage/' . $campaign->banner_image) }}" alt="Campaign Image" class="w-full h-64 object-cover">
        <div class="absolute top-0 left-0 bg-transparent text-white px-4 py-2 text-sm font-semibold">
            <a href="/"><img src="{{ asset('icon/backLogo.png') }}" alt="Back Logo" class="w-6 h-6"></a>
        </div>
    </div>

    <!-- Campaign Content -->
    <div class="p-6">
        <!-- Judul -->
        <h1 class="text-2xl font-bold text-gray-800 mb-2">
            {{ $campaign->title }}
        </h1>

        <!-- Total Terkumpul dan Progress -->
        <p class="text-blue-600 text-xl font-semibold mb-1">
            Rp{{ number_format($campaign->collected_amount, 0, ',', '.') }}
        </p>
        <p class="text-gray-500 text-sm mb-2">
            Terkumpul dari Rp{{ number_format($campaign->goal_amount, 0, ',', '.') }}
        </p>

        <!-- Progress Bar -->
        <div class="bg-gray-200 h-4 rounded-full overflow-hidden mb-4">
            <div class="bg-blue-600 h-4 rounded-full" style="width: {{ min(($campaign->collected_amount / $campaign->goal_amount) * 100, 100) }}%;"></div>
        </div>

        <!-- Hari Tersisa -->
        <p class="text-gray-500 text-sm mb-4">
            <!-- Optional: You can add a countdown here if needed -->
        </p>

        <!-- Icons Section -->
        <div class="flex justify-between items-center text-gray-500 mb-4">
            <!-- Donasi -->
            <div class="flex flex-col items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path fill="currentColor" d="M9 2H5v2H3v2H1v6h2v2h2v2h2v2h2v2h2v-2h2v-2h2v-2h2v-2h2V6h-2V4h-2V2h-4v2h-2v2h-2V4H9zm0 2v2h2v2h2V6h2V4h4v2h2v6h-2v2h-2v2h-2v2h-2v2h-2v-2H9v-2H7v-2H5v-2H3V6h2V4z"/>
                </svg>
                <span class="text-blue-600 text-lg font-semibold">
                    {{ $campaign->donations_count }} Donatur
                </span>
                <span class="text-sm">Donasi</span>
            </div>

            <!-- Kabar Terbaru -->
            <div class="flex flex-col items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path fill="currentColor" d="M15 2H9v2H7v6h2V4h6zm0 8H9v2h6zm0-6h2v6h-2zM4 16h2v-2h12v2H6v4h12v-4h2v6H4z"/>
                </svg>
                <span class="text-blue-600 text-lg font-semibold">Kabar Terbaru</span>
                <span class="text-sm">Klik di sini</span>
            </div>

            <!-- Pencairan Dana -->
            <div class="flex flex-col items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path fill="currentColor" d="M17 3H7v2H5v2H3v10h2v2h2v2h10v-2h2v-2h2V7h-2V5h-2zm0 2v2h2v10h-2v2H7v-2H5V7h2V5zm-9 6h2v2h2v2h-2v-2H8zm8-2h-2v2h-2v2h2v-2h2z"/>
                </svg>
                <span class="text-blue-600 text-lg font-semibold">Pencairan Dana</span>
                <span class="text-sm">Detail</span>
            </div>
        </div>

        <!-- Informasi Penggalangan Dana -->
        <section class="mb-8">
            <h2 class="text-lg font-semibold text-gray-800 mb-8">Informasi Penggalangan Dana</h2>
            <div class="flex items-center">
                <img src="{{ asset('path/to/logo.png') }}" alt="Penggalang" class="w-12 h-12 rounded-full">
                <div class="ml-4">
                    <p class="text-gray-800 font-semibold">Penghimpun Kebaikan</p>
                    <p class="text-gray-500 text-sm">Identitas terverifikasi ✅</p>
                </div>
            </div>
        </section>

        <section class="mb-8">
            <h2 class="text-lg font-semibold text-gray-800">Deskripsi</h2>
            <div class="ml-4">
                <p class="text-gray-500 text-sm">{{ \Illuminate\Support\Str::limit($campaign->description, 200, '...') }}</p>
                <a href="#" class="text-center">Lihat selengkapnya</a>
            </div>
        </section>

    <section>
        <h2 class="text-lg font-semibold text-gray-800 my-2">Komen</h2>
        @foreach ( $komen as $item )
        <div class="mb-8">
        <div class="flex items-center mb">
            <img src="{{ asset('icon/userLogo.png') }}" alt="Penggalang" class="w-12 h-12 rounded-full">
            <div class="ml-4">
                <p class="text-gray-800 font-semibold">{{ $item->user->name }}</p>
                <p class="text-gray-500 text-sm">{{ $item->created_at->diffForHumans() }}</p>
            </div>
        </div>
        <div class="ml-[62px] mt-4 ">
            <p class="text-gray-500 text-sm mb-2">
                {{ $item->comment }}
            </p>
        </div>
        <div class="flex space-x-3 ml-[62px]">
            <div class="flex space-x-3">
                <button 
                    id="like-button-{{ $item->id }}" 
                    class="hover:text-indigo-600 flex items-center space-x-1 {{ in_array(auth()->id(), json_decode($item->liked_by_users ?? '[]', true)) ? 'text-indigo-600 pointer-events-none' : '' }}" 
                    onclick="addLike({{ $item->id }})"
                    {{ in_array(auth()->id(), json_decode($item->liked_by_users ?? '[]', true)) ? 'disabled' : '' }}
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M9 2H5v2H3v2H1v6h2v2h2v2h2v2h2v2h2v2h2v-2h2v-2h2v-2h2v-2h2v-2h2V6h-2V4h-2V2h-4v2h-2v2h-2V4H9zm0 2v2h2v2h2V6h2V4h4v2h2v6h-2v2h-2v2h-2v2h-2v2h-2v-2H9v-2H7v-2H5v-2H3V6h2V4z"/>
                    </svg>
                    <span>{{ $item->likes . " Like" }}</span>
                </button>
            </div>      
        </div>
        </div>
        @endforeach
    </section>
    </div>

    <!-- Footer -->
    <footer class="fixed bottom-0 left-0 w-full bg-white z-50">
        <div class="flex justify-between items-center py-4 px-4">
            <!-- Bagikan Button -->
            <a href="#" class="bg-blue-600 text-white px-6 py-2 mr-2 rounded-lg text-center font-semibold w-1/3">Bagikan</a>
            
            <!-- Donasi Sekarang Button -->
            <a href="#" class="bg-blue-600 text-white px-6 py-2 rounded-lg text-center font-semibold w-2/3">Donasi Sekarang</a>
        </div>
    </footer>
    
</div>

<script>
    function addLike(commentId) {
        fetch(`/comment/${commentId}/like`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => {
            if (!response.ok) throw new Error('Already liked');
            return response.json();
        })
        .then(data => {
            const likeButton = document.getElementById(`like-button-${commentId}`);
            likeButton.classList.add('text-indigo-600', 'pointer-events-none');
            likeButton.querySelector('span').textContent = `${data.likes} Like`;
        })
        .catch(error => console.error(error.message));
    }
</script>
