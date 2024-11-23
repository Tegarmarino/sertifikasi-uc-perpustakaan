@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg mt-12">
        <h2 class="text-3xl font-bold text-center mb-6">Book Details</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Book Information -->
            <div>
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Book Information</h3>
                <ul class="list-none space-y-2">
                    <li>
                        <span class="font-medium text-gray-700">Title:</span> {{ $book->title }}
                    </li>
                    <li>
                        <span class="font-medium text-gray-700">Author:</span> {{ $book->author }}
                    </li>
                    <li>
                        <span class="font-medium text-gray-700">Publisher:</span> {{ $book->publisher }}
                    </li>
                    <li>
                        <span class="font-medium text-gray-700">Published Date:</span> {{ $book->published_date }}
                    </li>
                    <li>
                        <span class="font-medium text-gray-700">Number of Pages:</span> {{ $book->number_of_pages }}
                    </li>
                </ul>
            </div>

            <!-- Member Information -->
            <div>
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Member Information</h3>
                <ul class="list-none space-y-2">
                    @if ($book->member)
                        <li>
                            <span class="font-medium text-gray-700">Borrowed By:</span> {{ $book->member->name }}
                        </li>
                        <li>
                            <span class="font-medium text-gray-700">National ID:</span> {{ $book->member->national_id_number }}
                        </li>
                        <li>
                            <span class="font-medium text-gray-700">Phone:</span> {{ $book->member->phone_number }}
                        </li>
                        <li>
                            <span class="font-medium text-gray-700">Address:</span> {{ $book->member->address }}
                        </li>
                    @else
                        <li>
                            <span class="font-medium text-gray-700">Borrowed By:</span> Tidak ada yang meminjam
                        </li>
                    @endif
                </ul>
            </div>
        </div>

        <!-- Categories Section -->
        <div class="mt-8">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Categories</h3>
            <div class="flex flex-wrap gap-2">
                @foreach ($book->categories as $category)
                    <span
                        class="px-4 py-2 bg-slate-600 text-white rounded-full text-sm font-medium hover:bg-slate-700 transition duration-300">
                        {{ $category->name }}
                    </span>
                @endforeach
            </div>
        </div>

        <!-- Actions -->
        <div class="mt-6">
            <a href="{{ route('books.index') }}" class="inline-block text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-lg px-6 py-3 transition duration-300">Back to Books</a>
        </div>
    </div>
@stop
