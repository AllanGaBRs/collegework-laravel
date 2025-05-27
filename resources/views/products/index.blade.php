@extends('layout')

@section('content')
<style>
    .product-image {
        max-width: 200px;
        max-height: 100px;
        border-radius: 8px;
        object-fit: cover;
        transition: transform 0.3s ease;
        cursor: pointer;
    }

    .product-image:hover {
        transform: scale(1.8);
        z-index: 10;
        position: relative;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }
</style>

<div class="container mt-4">
    <h2 class="mb-4">Products</h2>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">
        Add New Product
    </a>
    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Supplier</th>
                <th>Image</th>
                <th style="width: 160px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>$ {{ number_format($product->price, 2, '.', ',') }}</td>
                <td>{{ $product->supplier->name ?? 'N/A' }}</td>
                <td>
                    @if($product->image)
                    <img src="data:image/jpeg;base64,{{ base64_encode($product->image) }}" alt="Imagem do produto" class="product-image">
                    @endif
                </td>
                <td>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No products found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection