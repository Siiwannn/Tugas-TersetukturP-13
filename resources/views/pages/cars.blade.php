@extends('layouts.main')

@section('content')
<div class="container mt-5 mb-5">
    <h2 class="text-center mb-5" style="font-weight: 700; color: #333;">Daftar Mobil Sewaan</h2>

    <div class="row justify-content-center">
        @foreach($cars as $car)
        <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
            <div class="car-card">
                <img src="{{ asset('images/assets/' . $car->image ?? 'default-car.jpg') }}"
                     alt="{{ $car->name }}"
                     class="card-img-top w-100">
                <div class="card-body">
                    <div>
                        <h5 class="card-title">{{ $car->name }}</h5>
                        <p class="price">
                            Rp {{ number_format($car->price, 0, ',', '.') }}
                        </p>
                    </div>

                    {{-- Tombol dengan kelas kustom .btn-modern --}}
                    <a href="{{ route('cars.show', $car->id) }}"
                       class="btn btn-sm btn-modern">
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if ($cars->hasPages())
        <div class="pagination-wrapper">
            {{ $cars->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
