@extends('layouts.app')

@section('content')
    <div class="mt-12">
        <h1
            class="mb-4 text-xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-3xl dark:text-white">
            Books Data</h1>

        <!-- Filter Form -->
        <form action="{{ route('books.index') }}" method="GET" class="mb-6 flex space-x-4">
            <!-- Member Filter -->
            <div>
                <label for="member_id" class="block text-gray-700 font-medium">Filter by Member</label>
                <select name="member_id" id="member_id"
                    class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Members</option>
                    @foreach ($members as $member)
                        <option value="{{ $member->id }}" {{ request('member_id') == $member->id ? 'selected' : '' }}>
                            {{ $member->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Category Filter -->
            <div>
                <label for="category_id" class="block text-gray-700 font-medium">Filter by Category</label>
                <select name="category_id" id="category_id"
                    class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Filter Button -->
            <div class="flex items-end">
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300">
                    Filter
                </button>
            </div>
        </form>

        <div class="my-4">
            <a href="{{ route('books.create') }}"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                Add new book
            </a>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Title</th>
                        <th scope="col" class="px-6 py-3">Author</th>
                        <th scope="col" class="px-6 py-3">Publisher</th>
                        <th scope="col" class="px-6 py-3">Published Date</th>
                        <th scope="col" class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $book->title }}
                            </td>
                            <td class="px-6 py-4">{{ $book->author }}</td>
                            <td class="px-6 py-4">{{ $book->publisher }}</td>
                            <td class="px-6 py-4">{{ $book->published_date }}</td>
                            <td class="px-6 py-4 flex space-x-4">
                                <a href="{{ route('books.show', $book->id) }}"
                                    class="text-blue-600 hover:text-blue-800 font-medium dark:text-blue-500 dark:hover:text-blue-400 hover:underline transition duration-300">Show</a>
                                <a href="{{ route('books.edit', $book->id) }}"
                                    class="text-yellow-600 hover:text-yellow-800 font-medium dark:yellow-blue-500 dark:hover:text-yellow-400 hover:underline transition duration-300">Edit</a>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this book?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-600 hover:text-red-800 font-medium dark:text-red-500 dark:hover:text-red-400 hover:underline transition duration-300">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-gray-500">
                                No books found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
