@extends('layouts.main')

@push('styles')
<style>
    @media screen and (max-width: 768px) {
        .hero-movus .col-md-6 {
            margin-left: 0 !important;
            text-align: left;
        }
        .hero-title {
            font-size: 1.5rem;
        }
        .hero-subtitle {
            font-size: 1rem;
        }
        .btn-daftar-big {
            padding: 10px 20px;
            font-size: 1rem;
        }
        .review-section h2 {
            font-size: 1.5rem;
        }
        .review-text {
            font-size: 0.9rem;
        }
        .reviewer-info {
            flex-direction: column;
            text-align: center;
        }
        .reviewer-avatar {
            margin-bottom: 10px;
            margin-right: 0 !important;
        }
    }
</style>
@endpush

@section('content')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

{{-- ========================= --}}
{{-- HERO SECTION --}}
{{-- ========================= --}}
<section class="hero-movus" data-aos="fade-up">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-md-6" style="margin-left:-60px;" data-aos="fade-right" data-aos-delay="200">
                <h1 class="hero-title fw-bold mb-3">
                    Sewa Jadi Punya Hanya Kami yang Bisa!
                </h1>

                <p class="hero-subtitle mb-4">
                    Cara baru untuk memiliki mobil dengan cepat dan anti ribet.
                </p>

                <a href="/register" class="btn btn-danger btn-daftar-big">
                    DAFTAR
                </a>
            </div>

        </div>
    </div>
</section>

{{-- ========================= --}}
{{-- REVIEW SECTION --}}
{{-- ========================= --}}
<section class="review-section py-5" data-aos="fade-up">

    <div class="container text-center">
        <h2 class="fw-bold mb-5" style="color: #2c3e50;">
            Kata Mereka yang Sudah Bergabung dengan wancars
        </h2>

         <div id="reviewCarousel" class="carousel slide" data-bs-ride="carousel">
             <div class="carousel-inner review-card-bg">
                 <div class="quote-icon-bg"><i class="bi bi-quote"></i></div>

                 <div class="carousel-item active">
                     <div class="review-stars mb-3">
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                     </div>
                     <p class="review-text">
                         "Tau wancars dari media sosial. Prosesnya cepat dibantu sales juga."
                     </p>
                     <div class="reviewer-info d-flex align-items-center">
                         <div class="reviewer-avatar me-3">
                             <i class="bi bi-person-circle"></i>
                         </div>
                         <div>
                             <h6 class="reviewer-name mb-0">Endang Suhendar</h6>
                             <span class="reviewer-role">Driver Online</span>
                         </div>
                     </div>
                 </div>

                 <div class="carousel-item">
                     <div class="review-stars mb-3">
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                     </div>
                     <p class="review-text">
                         "Awalnya ragu, tapi ternyata beneran mudah."
                     </p>
                     <div class="reviewer-info d-flex align-items-center">
                         <div class="reviewer-avatar me-3">
                             <i class="bi bi-person-circle"></i>
                         </div>
                         <div class="reviewer-name">
                             <h6 class="reviewer-name mb-0">Putra Santoso</h6>
                             <span class="reviewer-role">Wiraswasta</span>
                         </div>
                     </div>
                 </div>

                 <div class="carousel-item">
                     <div class="review-stars mb-3">
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                     </div>
                     <p class="review-text">
                         "Solusi terbaik buat yang butuh mobil tapi budget DP minim."
                     </p>
                     <div class="reviewer-info d-flex align-items-center">
                         <div class="reviewer-avatar me-3">
                             <i class="bi bi-person-circle"></i>
                         </div>
                         <div>
                             <h6 class="reviewer-name mb-0">Ari Wijaya</h6>
                             <span class="reviewer-role">Karyawan Swasta</span>
                         </div>
                     </div>
                 </div>

             </div>

             <button class="carousel-control-prev" type="button" data-bs-target="#reviewCarousel" data-bs-slide="prev">
                 <i class="bi bi-chevron-left"></i>
                 <span class="visually-hidden">Previous</span>
             </button>
             <button class="carousel-control-next" type="button" data-bs-target="#reviewCarousel" data-bs-slide="next">
                 <i class="bi bi-chevron-right"></i>
                 <span class="visually-hidden">Next</span>
             </button>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="/cars" class="btn btn-danger fw-bold btn-daftar-big">
                LIHAT MOBIL
            </a>
        </div>
    </div>

</section>

{{-- FLOATING WHATSAPP BUTTON --}}
<a href="https://wa.me/6281234567890" class="wa-float" target="_blank">
    <i class="bi bi-whatsapp"></i>
</a>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init();
</script>

@endsection