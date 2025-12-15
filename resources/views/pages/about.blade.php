@extends('layouts.main')

@push('styles')
<style>
    h1 {
        color: red;
    }
</style>
@endpush

@section('content')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<section class="about-section py-5 page-min-height" data-aos="fade-up">
    <div class="container text-center">
        <h1 class="fw-bold mb-4">Tentang Kami</h1>
        <p class="lead">
            <strong>Jasa Sewa Mobil</strong> adalah tempat terbaik untuk kamu yang ingin menyewa mobil
            dengan kualitas terbaik. Kami menyediakan berbagai macam mobil berkualitas — mulai dari sedan, SUV, hatchback,
            hingga mobil listrik — dengan harga sewa kompetitif dan model yang selalu up to date.
        </p>
        <p>
            membantu setiap pelanggan memiliki akses mobil yang aman, nyaman, dan sesuai kebutuhan tanpa harus membeli.
            Dengan pelayanan cepat dan armada berkualitas, kami siap jadi pilihan utama kamu untuk kebutuhan transportasi!
        </p>
    </div>
</section>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 800, once: true });
</script>
@endsection