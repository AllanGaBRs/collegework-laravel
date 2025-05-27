@extends('layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Supplier</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Supplier Name:</label>
            <input type="text" name="name" id="name" 
                class="form-control" 
                value="{{ old('name', $supplier->name) }}" 
                required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" id="email" 
                class="form-control" 
                value="{{ old('email', $supplier->email) }}" 
                required>
        </div>

        <div class="mb-3">
            <label for="cnpj" class="form-label">CNPJ:</label>
            <input type="text" name="cnpj" id="cnpj" 
                class="form-control" 
                value="{{ old('cnpj', $supplier->cnpj) }}" 
                required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone:</label>
            <input type="text" name="phone" id="phone" 
                class="form-control" 
                value="{{ old('phone', $supplier->phone) }}" 
                required>
        </div>

        <button type="submit" class="btn btn-primary me-2">Update</button>
        <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Back to Suppliers</a>
    </form>
</div>
@endsection
