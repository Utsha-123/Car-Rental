@extends('layouts.layout')

@section('content')

<body class="bg-gray-100">
    <div class="flex justify-center">
        <div class="w-full max-w-4xl">
            <div class="bg-white shadow-md rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                    <h2 class="text-2xl font-semibold text-gray-800">Products</h2>
                    <a href="{{ route('product.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 no-underline">Add</a>
                </div>
                <div class="p-6">
                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-300 px-4 py-2">#</th>
                                <th class="border border-gray-300 px-4 py-2">Name</th>
                                <th class="border border-gray-300 px-4 py-2">Price</th>
                                <th class="border border-gray-300 px-4 py-2">Categories</th>
                                <th class="border border-gray-300 px-4 py-2">Image</th>
                                <th class="border border-gray-300 px-4 py-2">Discount</th>
                                <th class="border border-gray-300 px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $datas)
                       
                           
                            <tr class="hover:bg-gray-100">
                                <td class="border border-gray-300 px-4 py-2 text-center">{{ $loop->iteration }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $datas->name }}</td>
                                <td class="border border-gray-300 px-4 py-2">${{ $datas->price }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $datas->category->name ?? 'Uncategorized' }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-center">
                               
                                    <?php
                                       $decodedImages = json_decode($datas->product_image, true);
                                      
                                    ?>
                                    @if(!empty($decodedImages) && is_array($decodedImages))
                                   
                                        @foreach ($decodedImages as $image)
                                        
                                            <img src="{{ asset('products/'.$image) }}" alt="Product Image" width="100" class="border border-gray-300 img-thumbnail mb-2">
                                        @endforeach
                                   @else
                                   <span class="text-gray-500">No images available</span>
                                   @endif
                                
                                
                                </td>
                                <td class="border border-gray-300 px-4 py-2">${{ $datas->discounted_price }}</td>
                                <td class="border border-gray-300 px-4 py-2 flex space-x-2">
                                    <a href="{{ route('product.edit', $datas->id ) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 no-underline">Edit</a>
                                    <form action="{{ route('product.delete', $datas->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @if ($products->isEmpty())
                            <tr>
                                <td colspan="7" class="border border-gray-300 px-4 py-2 text-center text-gray-500">No products found.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection
