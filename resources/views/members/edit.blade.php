@extends('layouts.app')

@section('content')
    <div class="mt-12">
        <h1
            class="mb-4 text-xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-3xl dark:text-white">
            Edit Member
        </h1>

        <!-- Form untuk update member -->
        <form action="{{ route('members.update', $member->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Menambahkan metode PUT untuk update -->

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $member->name) }}"
                    class="form-input mt-1 block w-full" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="national_id_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">National
                    ID Number</label>
                <input type="text" name="national_id_number" id="national_id_number"
                    value="{{ old('national_id_number', $member->national_id_number) }}"
                    class="form-input mt-1 block w-full" required maxlength="16">
                @error('national_id_number')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="phone_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone
                    Number</label>
                <input type="text" name="phone_number" id="phone_number"
                    value="{{ old('phone_number', $member->phone_number) }}" class="form-input mt-1 block w-full" required
                    maxlength="12">
                @error('phone_number')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address</label>
                <textarea name="address" id="address" rows="3" class="form-textarea mt-1 block w-full" required>{{ old('address', $member->address) }}</textarea>
                @error('address')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="join_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Join Date</label>
                <input type="date" name="join_date" id="join_date" value="{{ old('join_date', $member->join_date) }}"
                    class="form-input mt-1 block w-full" required>
                @error('join_date')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="px-5 py-2.5 bg-green-700 text-white font-medium rounded-lg hover:bg-green-800 focus:outline-none">
                Update Member
            </button>
        </form>
    </div>
@stop
