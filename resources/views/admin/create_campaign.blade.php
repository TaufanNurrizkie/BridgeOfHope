@extends('layout.adminLayout')

@section('title', 'Create Campaign | BridgeOfHope')

@section('content')
<section class="bg-gray-100 py-16 min-h-screen">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-8">
        <h2 class="text-3xl font-bold text-indigo-700 mb-6 text-center">Create Campaign</h2>

        <form action="{{ route('list.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Title -->
            <div>
                <label for="title" class="block text-gray-700 font-semibold mb-2">Campaign Title</label>
                <input type="text" id="title" name="title" 
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-500" 
                       placeholder="Enter campaign title" required>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea id="description" name="description" rows="5" 
                          class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-500" 
                          placeholder="Enter campaign description" required></textarea>
            </div>

            <!-- Type -->
            <div>
                <label for="type" class="block text-gray-700 font-semibold mb-2">Type</label>
                <select name="type" id="type" 
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-500" required>
                    <option value="">Select type</option>
                    <option value="donation">donation</option>
                    <option value="zakat">zakat</option>
                    <option value="galang">galang</option>
                    <option value="lingkungan">lingkungan</option>
                    <option value="beasiswa">beasiswa</option>
                    <option value="bencana">bencana</option>
                    <option value="anak">anak</option>
                    <option value="medis">medis</option>
                </select>
            </div>

            <!-- Goal Amount -->
            <div>
                <label for="goal_amount" class="block text-gray-700 font-semibold mb-2">Goal Amount</label>
                <input type="number" id="goal_amount" name="goal_amount" step="0.01" min="0" 
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-500" 
                       placeholder="Enter goal amount (e.g., 10000.00)" required>
            </div>

            <!-- Start Date -->
            <div>
                <label for="start_date" class="block text-gray-700 font-semibold mb-2">Start Date</label>
                <input type="date" id="start_date" name="start_date" 
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-500" required>
            </div>

            <!-- End Date -->
            <div>
                <label for="end_date" class="block text-gray-700 font-semibold mb-2">End Date</label>
                <input type="date" id="end_date" name="end_date" 
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-500" required>
            </div>

            <!-- Photo Upload -->
            <div>
                <label for="photo" class="block text-gray-700 font-semibold mb-2">Campaign Photo</label>
                <input type="file" id="photo" name="photo" 
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-500" 
                       accept="image/*" required>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" 
                        class="bg-blue-700 hover:bg-blue-800 text-white py-3 px-6 rounded-full transition duration-300 focus:outline-none focus:ring focus:ring-blue-500">
                    Create Campaign
                </button>
            </div>
        </form>
    </div>
</section>
@endsection
