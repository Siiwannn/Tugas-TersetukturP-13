<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WanCars</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/jpg">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.5-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/car.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css?v=2') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    @stack('styles')

    <style>
        body {
            overflow-x: hidden;
        }
        main {
            min-height: 80vh;
            display: block;
        }

        footer {
            opacity: 0;
            transition: opacity 0.6s ease;
        }

        .navbar.scrolled {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }
    </style>
</head>
<body>
    @include('partial.header')
    <main>
        @yield('content')
    </main>    
    @include('partial.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('bootstrap-5.3.5-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Navbar scroll behavior
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            navbar.classList.toggle('scrolled', window.scrollY > 50);
        });

        // Inisialisasi AOS
        AOS.init({
            duration: 800,
            once: true
        });
        document.addEventListener("DOMContentLoaded", () => {
            const footer = document.querySelector("footer");

            if (footer) {
                footer.style.opacity = 0;

                // Tampilkan footer setelah animasi konten selesai
                setTimeout(() => {
                    footer.style.opacity = 1;
                }, 800); // sesuai durasi AOS
            }
        });
    </script>

    {{-- 🔹 Stack Script tambahan dari tiap halaman --}}
    @stack('scripts')
</body>
</html>