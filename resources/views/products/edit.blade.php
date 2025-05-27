@extends('layout')

@section('content')
    <h2>Edit Product</h2>

    @if ($errors->any())
        <div style="background-color: #f8d7da; color: #842029; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" style="max-width: 400px;">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label for="name" style="display: block; font-weight: bold; margin-bottom: 5px;">Product Name:</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                value="{{ old('name', $product->name) }}" 
                required
                style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"
            >
        </div>

        <div style="margin-bottom: 15px;">
            <label for="price" style="display: block; font-weight: bold; margin-bottom: 5px;">Price:</label>
            <input 
                type="number" 
                step="0.01" 
                name="price" 
                id="price" 
                value="{{ old('price', $product->price) }}" 
                required
                style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"
            >
        </div>

        <div style="margin-bottom: 20px;">
            <label for="supplier_id" style="display: block; font-weight: bold; margin-bottom: 5px;">Supplier:</label>
            <select 
                name="supplier_id" 
                id="supplier_id" 
                required
                style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"
            >
                <option value="">Select Supplier</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ old('supplier_id', $product->supplier_id) == $supplier->id ? 'selected' : '' }}>
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Exibe a imagem atual, se existir --}}
        @if ($product->image)
        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Current Image:</label>
            <img src="data:image/jpeg;base64,{{ base64_encode($product->image) }}" alt="Current Product Image" style="max-width: 200px; border-radius: 6px; margin-bottom: 10px;">
        </div>
        @endif

        <div style="margin-bottom: 20px;">
            <label for="image" style="display: block; font-weight: bold; margin-bottom: 5px;">Upload New Image:</label>
            <input 
                type="file" 
                name="image" 
                id="image" 
                accept="image/*"
                style="width: 100%;"
            >
        </div>

        <button type="submit" style="background-color: #007bff; color: white; padding: 10px 20px; border:none; border-radius: 4px; cursor: pointer;">
            Update
        </button>

        <a href="{{ route('products.index') }}" style="margin-left: 15px; color: #555; text-decoration: underline;">
            Back to Products
        </a>
    </form>
@endsection
