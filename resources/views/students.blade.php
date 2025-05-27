@extends('layout')

@section('content')
<style>
    .student-photo {
        border-radius: 50%;
        transition: transform 0.3s ease;
        cursor: pointer;
    }

    .student-photo:hover {
        transform: scale(1.2);
        z-index: 10;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
        border-radius: 50%;
    }
</style>

<div class="container mt-4">
    <h2 class="mb-4">Students List</h2>

    <div class="row g-3">
        <div class="col-6 col-md-4 col-lg-3 text-center">
            <div class="border rounded p-3 shadow-sm">
                <img src="{{ asset('assets/allan.jpg') }}" alt="Allan Gabriel" class="img-thumbnail student-photo" style="width: 150px;">
                <h6>Allan Gabriel</h6>
                <small class="text-muted">RA: 252256-1</small>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3 text-center">
            <div class="border rounded p-3 shadow-sm">
                <img src="{{ asset('assets/ingrid.jpg') }}" alt="Ingrid Bearari" class="img-thumbnail student-photo" style="width: 160px;">
                <h6>Ingrid Bearari</h6>
                <small class="text-muted">RA: —</small>
                <br><br>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3 text-center">
            <div class="border rounded p-3 shadow-sm">
                <img src="https://via.placeholder.com/100" alt="João Souza" class="rounded-circle mb-2 student-photo" style="width: 100px;">
                <h6>João Souza</h6>
                <small class="text-muted">RA: —</small>
            </div>
        </div>
    </div>
</div>
@endsection