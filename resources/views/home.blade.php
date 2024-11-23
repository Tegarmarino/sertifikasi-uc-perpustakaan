@extends('layouts.app')

@section('content')
    <div class="mt-12">
        <h1
            class="mb-4 text-xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-3xl dark:text-white text-leading">
            Borrowing Data
        </h1>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Borrower
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Address
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Phone
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Books Borrowed
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($members as $member)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $member->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $member->address }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $member->phone_number }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($member->books->count())
                                    <ul class="list-disc list-inside">
                                        @foreach ($member->books as $book)
                                            <li>{{ $book->title }} by {{ $book->author }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="text-gray-500">No books borrowed</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center">No borrowing data available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
