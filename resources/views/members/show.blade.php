@extends('layouts.app')

@section('content')
    <div class="mt-12 max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-6">Member Details</h1>

        <div class="space-y-4">
            <div>
                <p class="text-lg font-semibold text-gray-800"><strong>Name:</strong> {{ $member->name }}</p>
            </div>
            <div>
                <p class="text-lg font-semibold text-gray-800"><strong>Address:</strong> {{ $member->address }}</p>
            </div>
            <div>
                <p class="text-lg font-semibold text-gray-800"><strong>Phone Number:</strong> {{ $member->phone_number }}</p>
            </div>
            <div>
                <p class="text-lg font-semibold text-gray-800"><strong>National ID Number:</strong> {{ $member->national_id_number }}</p>
            </div>
            <div>
                <p class="text-lg font-semibold text-gray-800"><strong>Join Date:</strong> {{ \Carbon\Carbon::parse($member->join_date)->format('F j, Y') }}</p>
            </div>
        </div>

        <!-- Daftar Buku yang Dipinjam -->
        <div class="mt-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Borrowed Books</h2>

            @if($member->books->count())
                <div class="overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="min-w-full bg-white border">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Title</th>
                                <th class="py-2 px-4 border-b">Author</th>
                                <th class="py-2 px-4 border-b">Publisher</th>
                                <th class="py-2 px-4 border-b">Published Date</th>
                                <th class="py-2 px-4 border-b">Number of Pages</th>
                                <th class="py-2 px-4 border-b">Categories</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($member->books as $book)
                                <tr class="hover:bg-gray-100">
                                    <td class="py-2 px-4 border-b">{{ $book->title }}</td>
                                    <td class="py-2 px-4 border-b">{{ $book->author }}</td>
                                    <td class="py-2 px-4 border-b">{{ $book->publisher }}</td>
                                    <td class="py-2 px-4 border-b">{{ \Carbon\Carbon::parse($book->published_date)->format('F j, Y') }}</td>
                                    <td class="py-2 px-4 border-b">{{ $book->number_of_pages }}</td>
                                    <td class="py-2 px-4 border-b">
                                        @foreach ($book->categories as $category)
                                            <span class="px-2 py-1 bg-blue-600 text-white rounded-full text-xs font-medium">{{ $category->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-gray-700">This member has not borrowed any books.</p>
            @endif
        </div>

        <div class="mt-6">
            <a href="{{ route('members.index') }}" class="inline-block text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-lg px-6 py-3 transition duration-300">Back to Members</a>
        </div>
    </div>
@stop
