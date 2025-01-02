<!-- resources/views/layout.blade.php -->
@vite('resources/css/app.css')
@php
$notificationCount = App\Models\Pengajuan::where('status', 'pending')
                                         ->count();

@endphp

<body class="bg-gray-100 font-sans">


    <div class="">
        
        <!-- Content -->
        <main class="">
            
            @yield('content')
        </main>

        <!-- Footer -->
        <div class="container mx-auto px-4 py-12 z-9999">
            <div class="bg-white shadow-md rounded-lg flex flex-wrap md:flex-nowrap p-8">
                <!-- Contact Information -->
                <div class="w-full md:w-1/2">
                    <div class="w-10 h-1 bg-[#FF5D56] mb-2 "></div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Hubungi Kami</h2>
                    <p class="text-gray-600 mb-6">Hubungi kami melalui formulir di samping, atau melalui kontak di bawah</p>
        
                    <div class="space-y-4">
                        <!-- Address -->
                        <div class="flex items-start">
                            <div class="text-red-500 mr-4">
                                <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Alamat</h3>
                                <p class="text-red-500">Jl. Sunan Kalijaga No.2, Sumber, Kec. Sumber, Kabupaten Cirebon, Jawa Barat 45611</p>
                            </div>
                        </div>
        
                        <!-- Phone -->
                        <div class="flex items-start">
                            <div class="text-red-500 mr-4">
                                <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M6.62 10.79a15.91 15.91 0 006.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.26 1.12.31 2.33.48 3.57.48.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.24.17 2.45.48 3.57.1.35.01.74-.26 1.02l-2.2 2.2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Phone</h3>
                                <p class="text-red-500">(0231) 321677 / 0231 321792 atau</p>
                            </div>
                        </div>
        
                        <!-- Email -->
                        <div class="flex items-start">
                            <div class="text-red-500 mr-4">
                                <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 4c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm0 14c-2.67 0-5.2-1.06-7.07-2.93C6.93 15.86 8.93 14.5 12 14.5s5.07 1.36 7.07 3.57C17.2 18.94 14.67 20 12 20z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Email</h3>
                                <p class="text-red-500">pmtkc@cirebonkab.go.id</p>
                            </div>
                        </div>
                    </div>
                </div>
        
                <!-- Map Section -->
                <div class="w-full md:w-1/2 mt-8 md:mt-0 md:ml-8">
                    <iframe class="w-full h-64 rounded-md" src="https://maps.google.com/maps?q=Jl.%20Sunan%20Kalijaga%20No.2,%20Sumber,%20Kec.%20Sumber,%20Kabupaten%20Cirebon,%20Jawa%20Barat&output=embed" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        
        
        <footer class="fixed bottom-0 left-0 w-full  bg-[#1A1A1D] z-50">
            <div class="flex justify-between items-center py-2 relative">
                <a href="/admin" class="flex flex-col items-center flex-1 text-gray-400 hover:text-indigo-600">
                    <svg class="w-6 h-6 mb-1" fill="currentColor" viewBox="0 0 24 24">
                        <!-- SVG for Home -->
                        <path fill="currentColor" d="M14 2h-4v2H8v2H6v2H4v2H2v2h2v10h7v-6h2v6h7V12h2v-2h-2V8h-2V6h-2V4h-2zm0 2v2h2v2h2v2h2v2h-2v8h-3v-6H9v6H6v-8H4v-2h2V8h2V6h2V4z"/>
                    </svg>
                    <span class="text-sm">Home</span>
                </a>
                <a href="/list" class="flex flex-col items-center flex-1 text-gray-400 hover:text-indigo-600">
                    <svg class="w-6 h-6 mb-1" fill="currentColor" viewBox="0 0 24 24">
                        <!-- SVG for Search -->
                        <path fill="currentColor" d="M13 1h-2v2H9v2H7v2H5v2H3v2H1v2h2v2h2v2h2v2h2v2h2v2h2v-2h2v-2h2v-2h2v-2h2v-2h2v-2h-2V9h-2V7h-2V5h-2V3h-2zm0 2v2h2v2h2v2h2v2h2v2h-2v2h-2v2h-2v2h-2v2h-2v-2H9v-2H7v-2H5v-2H3v-2h2V9h2V7h2V5h2V3zm0 4h-2v6h2zm0 8h-2v2h2z"/>
                    </svg>
                    <span class="text-sm">Donation</span>
                </a>
        
                <!-- Middle Icon -->
                <div class="absolute top-[-30px] left-1/2 transform -translate-x-1/2">
                    <a href="#" class="flex items-center justify-center bg-indigo-600 rounded-full border-8 border-[#1A1A1D] p-2 ">
                        <img src="{{ asset('BridgeOfHopeLogo.png') }}" alt="Logo" class="w-[50px] h-[50px] rounded-full  object-cover">

                    </a>
                </div>
        
                <a href="{{ route('notifications.index') }}" class="relative flex flex-col items-center flex-1 text-gray-400 hover:text-indigo-600">
                    <div class="relative">
                        <svg class="w-6 h-6 mb-1" fill="currentColor" viewBox="0 0 24 24">
                            <!-- SVG for Pengajuan -->
                            <path fill="currentColor" d="M14 4V2h-4v2H5v2h14V4zm5 12H5v-4H3v6h5v4h2v-4h4v2h-4v2h6v-4h5v-6h-2V6h-2v8h2zM5 6v8h2V6z"/>
                        </svg>
                
                        <!-- Badge Notification -->
                        @if($notificationCount > 0)
                        <span class="absolute top-0 right-0 left-4 bottom-3 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-red-600 rounded-full">
                            {{ $notificationCount }}
                        </span>
                        @endif
                    </div>
                    <span class="text-sm">Notif</span>
                </a>
                
                
                
                
                
                <a href="/adminprofile" wire:navigate class="flex flex-col items-center flex-1 text-gray-400 hover:text-indigo-600">
                    <svg class="w-6 h-6 mb-1" fill="currentColor" viewBox="0 0 24 24">
                        <!-- SVG for Profile -->
                        <path fill="currentColor" d="M15 2H9v2H7v6h2V4h6zm0 8H9v2h6zm0-6h2v6h-2zM4 16h2v-2h12v2H6v4h12v-4h2v6H4z"/></svg>
                    <span class="text-sm">Profile</span>
                </a>
            </div>
        </footer>
        
        
        
        
        <!-- Tambahkan jQuery dan jQuery UI dari CDN -->

        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        
        <script>
            $(function() {
                $('#yearPicker').datepicker({
                    changeYear: true,
                    showButtonPanel: true,
                    dateFormat: 'yy', // Format hanya tahun
                    onClose: function(dateText, inst) {
                        var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                        $(this).datepicker('setDate', new Date(year, 1));
                    }
                });
            });
        </script>
    </div>
</body>
</html>
