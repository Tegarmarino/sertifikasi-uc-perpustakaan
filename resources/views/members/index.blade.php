@extends('layouts.app')

@section('content')
    <div class="mt-12">
        <h1
            class="mb-4 text-xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-3xl dark:text-white">
            Members Data</h1>

        <div class="my-4">
            <a href="{{ route('members.create') }}"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                Add new member
            </a>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Address
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Phone
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($members as $member)
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
                            <td class="px-6 py-4 flex space-x-4">
                                <a href="{{ route('members.show', $member->id) }}"
                                    class="text-blue-600 hover:text-blue-800 font-medium dark:text-blue-500 dark:hover:text-blue-400 hover:underline transition duration-300">Show</a>
                                <a href="{{ route('members.edit', $member->id) }}"
                                    class="text-yellow-600 hover:text-yellow-800 font-medium dark:yellow-blue-500 dark:hover:text-yellow-400 hover:underline transition duration-300">Edit</a>

                                <form action="{{ route('members.destroy', $member->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 font-medium dark:text-red-500 dark:hover:text-red-400 hover:underline transition duration-300">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
