@extends('layout.detailLayout')
@section('title', 'About Us | BridgeOfHope')

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
            About BridgeOfHope
        </h1>
        <p class="text-lg sm:text-xl text-indigo-200 mb-8 animate__animated animate__fadeInUp animate__delay-1s">
            BridgeOfHope is a platform dedicated to connecting people who want to make a difference with impactful projects that need support. Our goal is to make giving simple, transparent, and effective, empowering communities to thrive.
        </p>

    </div>
</section>


<!-- Section: Mission & Vision -->
<section class="py-16 bg-gray-800 text-white relative">
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat opacity-30" style="background-image: url('mission-vision-bg.jpg');"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-6">
        <h2 class="text-4xl font-extrabold text-center text-indigo-300 mb-10 animate__animated animate__fadeInUp">Our Mission & Vision</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div class="animate__animated animate__fadeInUp animate__delay-1s">
                <div class="bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h3 class="text-3xl font-semibold text-indigo-400 mb-4">Vision</h3>
                    <p class="text-lg sm:text-xl leading-relaxed">
                        To create a better world through accessible, transparent, and impactful fundraising.
                    </p>
                </div>
            </div>
            <div class="animate__animated animate__fadeInUp animate__delay-2s">
                <div class="bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h3 class="text-3xl font-semibold text-indigo-400 mb-4">Mission</h3>
                    <p class="text-lg sm:text-xl leading-relaxed">
                        To link donors with social projects, ensure the security and transparency of each donation, and support initiatives that bring positive change to communities.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Section: Our Story -->
<section class="py-16 bg-gray-900 text-white relative">
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat opacity-30" style="background-image: url('our-story-bg.jpg');"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-6">
        <h2 class="text-4xl font-extrabold text-center text-indigo-300 mb-10 animate__animated animate__fadeInUp">Our Story</h2>
        <div class="flex flex-col lg:flex-row items-center gap-12">
            <div class="animate__animated animate__fadeInUp animate__delay-1s flex-1">
                <p class="text-lg sm:text-xl text-center lg:text-left leading-relaxed">
                    BridgeOfHope started with the simple idea of bridging the gap between those in need and those willing to help. Over the years, we have evolved into a trusted platform that enables meaningful contributions and supports numerous causes that align with our core values.
                </p>
            </div>
            <div class="animate__animated animate__fadeInUp animate__delay-2s flex-1">
                <img src="loveHand.png" alt="Our Story Image" class="rounded-lg shadow-xl w-full h-auto object-cover">
            </div>
        </div>
    </div>
</section>


<!-- Section: Meet Our Team -->
<section class="py-16 bg-indigo-700 text-white">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-4xl font-extrabold text-center text-white mb-10 animate__animated animate__fadeInUp">Meet Our Team</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
            <!-- Team Member 1 -->
            <div class="bg-indigo-800 p-8 rounded-lg shadow-lg hover:shadow-xl transition-transform transform hover:scale-105 animate__animated animate__fadeInUp animate__delay-1s">
                <img src="team1.jpg" alt="John Doe" class="w-full h-56 object-cover rounded-t-lg mb-4">
                <h3 class="text-2xl font-semibold mb-2">John Doe</h3>
                <p class="text-lg">Founder & CEO</p>
                <p class="mt-4">John is the visionary behind BridgeOfHope. With years of experience in the nonprofit sector, he leads the team with passion and dedication.</p>
            </div>
            <!-- Team Member 2 -->
            <div class="bg-indigo-800 p-8 rounded-lg shadow-lg hover:shadow-xl transition-transform transform hover:scale-105 animate__animated animate__fadeInUp animate__delay-2s">
                <img src="team2.jpg" alt="Jane Smith" class="w-full h-56 object-cover rounded-t-lg mb-4">
                <h3 class="text-2xl font-semibold mb-2">Jane Smith</h3>
                <p class="text-lg">Operations Manager</p>
                <p class="mt-4">Jane oversees daily operations and ensures our platform runs smoothly, always looking for ways to improve and innovate.</p>
            </div>
            <!-- Team Member 3 -->
            <div class="bg-indigo-800 p-8 rounded-lg shadow-lg hover:shadow-xl transition-transform transform hover:scale-105 animate__animated animate__fadeInUp animate__delay-3s">
                <img src="team3.jpg" alt="Mike Johnson" class="w-full h-56 object-cover rounded-t-lg mb-4">
                <h3 class="text-2xl font-semibold mb-2">Mike Johnson</h3>
                <p class="text-lg">Community Relations</p>
                <p class="mt-4">Mike builds partnerships with various communities and organizations, ensuring that we can support meaningful and impactful projects.</p>
            </div>
        </div>
    </div>
</section>

<!-- New Guide Section -->
<section class="bg-gray-800 py-24">
    <div class="text-center max-w-4xl mx-auto text-white">
        <h2 class="text-4xl sm:text-5xl font-extrabold leading-tight mb-8 text-indigo-400">
            How to Use BridgeOfHope
        </h2>
        <p class="text-lg sm:text-xl text-indigo-200 mb-8">
            BridgeOfHope allows you to easily connect with projects that need support. Follow these steps to start making a difference:
        </p>

        <!-- Step 1 -->
        <div class="bg-gray-700 rounded-lg shadow-lg p-8 mb-8">
            <h3 class="text-3xl font-semibold text-indigo-300 mb-4">Step 1: Create an Account</h3>
            <p class="text-lg sm:text-xl text-white mb-4">
                Sign up to create an account with BridgeOfHope. It's quick and easy, and once you're signed in, you'll have access to all the available projects.
            </p>
        </div>

        <!-- Step 2 -->
        <div class="bg-gray-700 rounded-lg shadow-lg p-8 mb-8">
            <h3 class="text-3xl font-semibold text-indigo-300 mb-4">Step 2: Browse Projects</h3>
            <p class="text-lg sm:text-xl text-white mb-4">
                Explore various social projects that need support. You can filter by cause, location, or donation type to find projects that resonate with you.
            </p>
        </div>

        <!-- Step 3 -->
        <div class="bg-gray-700 rounded-lg shadow-lg p-8 mb-8">
            <h3 class="text-3xl font-semibold text-indigo-300 mb-4">Step 3: Make a Donation</h3>
            <p class="text-lg sm:text-xl text-white mb-4">
                Once you've found a project you want to support, donate using one of the available payment methods. Your contribution will go directly to the project you chose.
            </p>
        </div>

        <!-- Step 4 -->
        <div class="bg-gray-700 rounded-lg shadow-lg p-8">
            <h3 class="text-3xl font-semibold text-indigo-300 mb-4">Step 4: Track Your Impact</h3>
            <p class="text-lg sm:text-xl text-white mb-4">
                After donating, you can track the progress of the project and see how your contribution is helping to make a positive change in the community.
            </p>
        </div>
    </div>
</section>

@endsection
