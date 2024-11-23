@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg mt-12">
        <h2 class="text-2xl font-semibold text-center mb-6">Category Details</h2>

        <div class="mb-6">
            <h3 class="text-xl font-medium">Category Name:</h3>
            <p class="text-gray-700">{{ $category->name }}</p>
        </div>

        <div class="mb-6">
            <h3 class="text-xl font-medium">Books in this Category:</h3>
            @if($category->books->count())
                <ul class="list-disc list-inside">
                    @foreach($category->books as $book)
                        <li>{{ $book->title }} by {{ $book->author }}</li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-700">No books found in this category.</p>
            @endif
        </div>

        <!-- Actions -->
        <div class="mt-6">
            <a href="{{ route('book_categories.index') }}" class="inline-block text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-lg px-6 py-3 transition duration-300">Back to Categories</a>
        </div>
    </div>
@stop
