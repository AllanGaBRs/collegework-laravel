@extends('layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Product</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Product Name:</label>
            <input
                type="text"
                name="name"
                id="name"
                class="form-control"
                value="{{ old('name', $product->name) }}"
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
                value="{{ old('price', $product->price) }}"
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
                    {{ old('supplier_id', $product->supplier_id) == $supplier->id ? 'selected' : '' }}>
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
            @if ($product->image)
            <div style="margin-bottom: 15px;">
                <label style="display: block; font-weight: bold; margin-bottom: 5px;">Current Image:</label>
                <img src="data:image/jpeg;base64,{{ base64_encode($product->image) }}" alt="Current Product Image" style="max-width: 200px; border-radius: 6px; margin-bottom: 10px;">
            </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary me-2">Update</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
    </form>
</div>
@endsection