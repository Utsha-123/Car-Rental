@extends('layouts.layout')

@section('content')
<body class="bg-gray-100">
<div class="container mx-auto">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2>Add Categories</h2>
                        <a href="{{ url('categories') }}" class="btn btn-secondary">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categories.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" id="slug"  name="slug" value="{{ old('slug') }}" required class="form-control @error('slug') is-invalid @enderror" placeholder="Enter slug ">
                            @error('slug')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror
                            </div>
                            

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required class="form-control @error('name') is-invalid @enderror" placeholder="Enter name">
                            @error('name')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" rows="3" class="form-control" placeholder="Enter description">{{ old('description') }}</textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
</body>
@endsection
