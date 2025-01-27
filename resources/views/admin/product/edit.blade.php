@extends('layouts.layout')

@section('content')
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2>Edit Product</h2>
                        <a href="{{ route('product') }}" class="btn btn-secondary">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required class="form-control @error('name') is-invalid @enderror" placeholder="Enter name">
                                @error('name')
                                <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" rows="3" class="form-control" placeholder="Enter description">{{ old('description', $product->description) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" id="slug" name="slug" value="{{ old('slug', $product->slug) }}" required class="form-control @error('slug') is-invalid @enderror" placeholder="Enter slug ">
                                @error('slug')
                                <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" id="price" name="price" value="{{ old('price', $product->price) }}" required class="form-control @error('price') is-invalid @enderror" placeholder="Enter price ">
                                @error('price')
                                <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="categories" class="form-label">Category <span class="text-danger">*</span></label>
                                <select id="categories" name="categories" class="form-control @error('categories') is-invalid @enderror">
                                    <option value="">Select Category </option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('categories', $product->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('categories'))
                                    <span style="color:red;">{{ $errors->first('categories') }}</span>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="product_image" class="form-label">Images</label>
                                <input type="file" id="product_image" name="product_image[]" class="form-control @error('image.*') is-invalid @enderror" multiple>
                               
                                <p>Current Images:</p>
                               
                                @error('image.*')
                                <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="text" id="stock" name="stock" value="{{ old('stock', $product->stock) }}" required class="form-control @error('stock') is-invalid @enderror" placeholder="Enter stock ">
                                @error('stock')
                                <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="discount" class="form-label">Discount</label>
                                <input type="text" id="discount" name="discount" value="{{ old('discount', $product->discounted_price) }}" required class="form-control @error('discount') is-invalid @enderror" placeholder="Enter discount ">
                                @error('discount')
                                <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
