@extends('layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product & Supplier Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5 text-center">
        <h1 class="mb-4">Trabalho do Pelegrin</h1>
        <p class="lead mb-5">Bem vindo</p>

        <div class="d-flex justify-content-center gap-4">
            <a href="{{ route('products.index') }}" class="btn btn-success btn-lg">
                Products
            </a>
            <a href="{{ route('suppliers.index') }}" class="btn btn-primary btn-lg">
                Suppliers
            </a>
            <a href="{{ route('students') }}" class="btn btn-success btn-lg">
                Students
            </a>
        </div>
    </div>

</body>
</html>
@endsection