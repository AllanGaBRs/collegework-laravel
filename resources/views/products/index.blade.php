@extends('layout')

@section('content')

<style>
  .product-image:hover {
    transform: scale(1.15);
    z-index: 10;
    position: relative;
    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    transition: transform 0.3s ease;
  }
  .product-card:hover {
    box-shadow: 0 10px 24px rgba(0,0,0,0.15);
    transition: box-shadow 0.3s ease;
  }
</style>

<div class="container py-5">

  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Products</h2>
    <a href="{{ route('products.create') }}" class="btn btn-success fw-semibold">Add New Product</a>
  </div>

  <form action="{{ route('products.index') }}" method="GET" class="d-flex gap-2 mb-4">
    <input
      type="text"
      name="search"
      class="form-control"
      placeholder="Search by product name..."
      value="{{ request('search') }}"
    >
    <button type="submit" class="btn btn-primary fw-semibold">Search</button>
    <a href="{{ route('products.index') }}" class="btn btn-secondary fw-semibold">Clear</a>
  </form>

  @if($products->isEmpty())
    <div class="text-center text-muted fs-5 mt-5">No products found.</div>
  @else
    <div class="row g-4">
      @foreach ($products as $product)
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="card h-100 shadow-sm product-card">
          @if($product->image)
            <img
              src="data:image/jpeg;base64,{{ base64_encode($product->image) }}"
              alt="{{ $product->name }}"
              class="card-img-top product-image"
              style="height: 160px; object-fit: cover; border-radius: 0.5rem;"
            >
          @endif
          <div class="card-body d-flex flex-column">
            <h5 class="card-title fw-bold text-center">{{ $product->name }}</h5>
            <p class="card-text text-success text-center fw-semibold fs-6">
              $ {{ number_format($product->price, 2, ',', '.') }}
            </p>
            <p class="card-text text-muted text-center mb-3">
              Supplier: {{ $product->supplier->name ?? 'N/A' }}
            </p>

            <div class="d-flex justify-content-center gap-2 mt-auto">
              <a href="{{ route('products.edit', $product) }}" class="btn btn-warning fw-semibold">Edit</a>
              <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger fw-semibold">Delete</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      <div class="d-flex justify-content-center mt-4">
        {{ $products->onEachSide(1)->links('pagination::bootstrap-5') }}
      </div>

    </div>
  @endif
    
</div>
@endsection
