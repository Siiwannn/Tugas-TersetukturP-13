@extends('layouts.main')

@push('styles')
<style>
    h1 {
        color: red;
    }

    .btn{
        background: #c52929;
        color: white;
        padding: 10px 25px;
        border-radius: 25px;
        border: none;
        font-weight: bold;
        cursor: pointer;

    }
    .btn:hover{
        opacity: 1,2;
        background: black;
    }
</style>
@endpush

@section('content')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<section class="contact-section py-5" data-aos="fade-up">
    <div class="container">
        <h1 class="text-center fw-bold mb-4">Hubungi Kami</h1>
       
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('send.feedback') }}" method="POST" class="p-4 shadow rounded bg-light">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Rijwan Maulana " required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="test@example.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Pesan / Feedback</label>
                        <textarea name="message" id="message" rows="5" class="form-control" placeholder="Tulis pesan contoh: Mobil Bagus" required></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-dark px-4 py-2 rounded-pill">Kirim Pesan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 800, once: true });
</script>
@endsection