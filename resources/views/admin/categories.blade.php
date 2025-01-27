@extends('layouts.layout')

@section('content')
<body class="bg-gray-100">
   
        <div class="flex justify-center">
            <div class="w-full max-w-4xl">
                <div class="bg-white shadow-md rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                        <h2 class="text-2xl font-semibold text-gray-800">Categories</h2>
                        <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 no-underline">Add</a>
                    </div>
                    <div class="p-6">
                        <table class="table-auto w-full border-collapse border border-gray-300">
                            <thead class="bg-gray-100">
                                <tr class="bg-gray-200">
                                    <th class="border border-gray-300 px-4 py-2">#</th>
                                    <th class="border border-gray-300 px-4 py-2">Name</th>
                                    <th class="border border-gray-300 px-4 py-2">Description</th>
                                    <th class="border border-gray-300 px-4 py-2">Slug</th>
                                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $datas)
                                <tr class="hover:bg-gray-100">
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $loop->iteration }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $datas->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $datas->description ?? 'N/A' }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $datas->slug }}</td>
                                    <td class="border border-gray-300 px-4 py-2 flex space-x-2">
                                        <div class="mt-1">
                                            <a href="{{ route('categories.edit', $datas->id ) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 no-underline">Edit</a>
                                        </div>
                                        <form action="{{ route('categories.delete', $datas->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @if ($data->isEmpty())
                                <tr>
                                    <td colspan="5" class="border border-gray-300 px-4 py-2 text-center text-gray-500">No categories found.</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
    </div>
    </div>
</body>
@endsection