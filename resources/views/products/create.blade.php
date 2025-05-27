@extends('layout')

@section('content')
<h2>Create Product</h2>

@if ($errors->any())
<div style="background-color: #f8d7da; color: #842029; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
    <ul style="margin: 0; padding-left: 20px;">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('products.store') }}" enctype="multipart/form-data" method="POST" style="max-width: 400px;">
    @csrf

    <div style="margin-bottom: 15px;">
        <label for="name" style="display: block; font-weight: bold; margin-bottom: 5px;">Product Name:</label>
        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name') }}"
            required
            style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label for="price" style="display: block; font-weight: bold; margin-bottom: 5px;">Price:</label>
        <input
            type="number"
            name="price"
            id="price"
            step="0.01"
            value="{{ old('price') }}"
            required
            style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
    </div>

    <div style="margin-bottom: 20px;">
        <label for="supplier_id" style="display: block; font-weight: bold; margin-bottom: 5px;">Supplier:</label>
        <select
            name="supplier_id"
            id="supplier_id"
            required
            style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            <option value="">-- Select Supplier --</option>
            @foreach ($suppliers as $supplier)
            <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                {{ $supplier->name }}
            </option>
            @endforeach
        </select>

        <div style="margin-bottom: 20px;">
            <label for="image" style="display: block; font-weight: bold; margin-bottom: 5px;">Product Image:</label>
            <input
                type="file"
                name="image"
                id="image"
                accept="image/*"
                style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
    </div>

    <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border:none; border-radius: 4px; cursor: pointer;">
        Create
    </button>

    <a href="{{ route('products.index') }}" style="margin-left: 15px; color: #555; text-decoration: underline;">
        Back to Products
    </a>
</form>
@endsection