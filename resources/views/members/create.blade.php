@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-center mb-6">Create New Member</h2>

        <!-- Form untuk menambah member -->
        <form action="{{ route('members.store') }}" method="POST">
            @csrf

            <!-- Nama Member -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="mt-1 block w-full px-4 py-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter member name" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- National ID Number -->
            <div class="mb-4">
                <label for="national_id_number" class="block text-gray-700 font-medium">National ID Number</label>
                <input type="number" name="national_id_number" id="national_id_number" value="{{ old('national_id_number') }}"
                    class="mt-1 block w-full px-4 py-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter national ID number" required>
                @error('national_id_number')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Phone Number -->
            <div class="mb-4">
                <label for="phone_number" class="block text-gray-700 font-medium">Phone Number</label>
                <input type="number" name="phone_number" id="phone_number" value="{{ old('phone_number') }}"
                    class="mt-1 block w-full px-4 py-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter phone number" required>
                @error('phone_number')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Address -->
            <div class="mb-4">
                <label for="address" class="block text-gray-700 font-medium">Address</label>
                <textarea name="address" id="address" rows="4" class="mt-1 block w-full px-4 py-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter address" required>{{ old('address') }}</textarea>
                @error('address')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Join Date -->
            <div class="mb-4">
                <label for="join_date" class="block text-gray-700 font-medium">Join Date</label>
                <input type="date" name="join_date" id="join_date" value="{{ old('join_date') }}"
                    class="mt-1 block w-full px-4 py-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                @error('join_date')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="mt-6 flex justify-end">
                <button type="submit"
                    class="px-6 py-2 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition duration-300">
                    Create Member
                </button>
            </div>
        </form>
    </div>
@stop
