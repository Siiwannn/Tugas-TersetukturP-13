@extends('layouts.main')

@section('content')
<div class="container my-5 py-3 car-detail">
    <div class="detail-card-bg">
        <div class="row align-items-center">
            <div class="col-md-5 mb-3 mb-md-0" data-aos="fade-right">
                <img src="{{ asset('images/assets/' . ($car->image ?? 'default-car.jpg')) }}"
                     alt="{{ $car->name }}">
            </div>

            <div class="col-md-7" data-aos="fade-left">
                <h2 class="fw-bold display-6 mb-3">{{ $car->name }}</h2>
                <p class="text-muted mb-2">
                    Merk: <strong>{{ $car->brand }}</strong> |
                    Model: <strong>{{ $car->model }}</strong> |
                    Tahun: <strong>{{ $car->year }}</strong> |
                    Warna: <strong>{{ $car->color }}</strong>
                </p>

                <h3 class="fw-bold text-danger mb-4">
                    Rp {{ number_format($car->price, 0, ',', '.') }}
                </h3>

                <p class="lead mb-4">{{ $car->description }}</p>

                <a href="{{ route('cars.index') }}" class="btn btn-back-modern mt-4">
                    <i class="bi bi-box-arrow-left"></i> Kembali 
                </a>
            </div>
        </div>
    </div>
</div>

{{-- AOS Animation --}}
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true
    });
</script>
@endsection