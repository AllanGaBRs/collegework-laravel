@extends('layout')

@section('content')

<h2 class="mb-4">Create Product</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Product Name:</label>
        <input 
            type="text" 
            name="name" 
            id="name" 
            class="form-control"
            value="{{ old('name') }}" 
            required>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price:</label>
        <input 
            type="number" 
            name="price" 
            id="price" 
            step="0.01"
            class="form-control"
            value="{{ old('price') }}" 
            required>
    </div>

    <div class="mb-3">
        <label for="supplier_id" class="form-label">Supplier:</label>
        <select 
            name="supplier_id" 
            id="supplier_id" 
            class="form-select" 
            required>
            <option value="">-- Select Supplier --</option>
            @foreach ($suppliers as $supplier)
                <option 
                    value="{{ $supplier->id }}" 
                    {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                    {{ $supplier->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label for="image" class="form-label">Product Image:</label>
        <input 
            type="file" 
            name="image" 
            id="image" 
            class="form-control"
            accept="image/*">
    </div>

    <button type="submit" class="btn btn-success me-2">Create</button>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
</form>

@endsection
