<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Soft Corner')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .header-text {
            font-size: 2.5rem;
            text-transform: uppercase;
            font-family: "Segoe UI Black";
            text-align: center;
        }

        .navbar {
            position: fixed;
            top: 3%;
            left: 50%;
            transform: translateX(-50%);
            width: 90%;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 23px 10px;
            box-shadow: none;
            transition: padding 0.3s ease, top 0.3s ease; /* Sederhanakan transisi */
            border-radius: 10px;
            z-index: 1000;
        }

        .navbar.scrolled {
            top: 0;
            width: 100%;
            left: 0;
            transform: none;
            padding: 20px 0;
            border-radius: 2px;
            background-color: rgba(255, 255, 255, 1);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .carousel-item img {
            margin: 0;
            padding: 0;
            height: 100vh;
            max-height: 100vh;
            object-fit: cover;
        }

        .carousel-caption {
            position: absolute;
            top: 55%;
            left: 5%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0);
            padding: 10px;
            border-radius: 10px;
            text-align: left;
            font-family: "Segoe UI Black", Times, serif;
            font-size: 2.5rem;
        }

        footer {
            margin-top: 20px;
            position: relative;
            z-index: 1;
        }

        /* Mengubah warna tombol Edit */
         .btn-edit {
        background-color: #f8dd46; /* Hijau */
        border: none;
        }

        /* Mengubah warna tombol Delete */
        .btn-delete {
        background-color: #d3382d; /* Merah */
        border: none;
        }

        .carousel-caption h2 {
        font-size: 2.7rem;
        color: rgb(247, 246, 237);
        }

        .carousel-caption p {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 1rem;
        }

        .full-height-img {
        object-fit: cover; /* Memastikan gambar mengisi kolom */
        width: 100%;
        height: 100%; /* Menjaga agar tinggi gambar penuh */
        }

        /* Default styling untuk intro_wave */
        .intro_wave {
        bottom: 60px; /* Atur sesuai kebutuhan */
        display: block; /* Pastikan tampil sebagai elemen blok */
        width: 100vw; /* Lebar 100% dari viewport */
        height: 100px; /* Tinggi default */
        position: relative; /* Tidak menutupi elemen lain */
        z-index: 0; /* Wave berada di belakang konten */
        margin: 0; /* Hindari celah yang tidak diinginkan */
        }

        /* Penyesuaian untuk desktop */
        @media (min-width: 992px) {
        .intro_wave {
        height: 70px; /* Lebih pendek untuk desktop */
        }
        }

        /* Styling path SVG */
        .intro_wave_path {
        fill: rgb(255, 255, 255); /* Warna wave */
        }

        /* Styling footer */
        footer {
        margin-top: 20px; /* Jarak yang lebih baik */
        position: relative;
        z-index: 1; /* Pastikan footer berada di atas wave */
        }

        html {
            scroll-behavior: smooth; /* Smooth scrolling native */
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Soft Corner</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('books.index') }}">All Books</a> <!-- Ganti dari "Book List" -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">Book Categories</a> <!-- Ganti dari "Categories" -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('loans.index') }}">Loan Records</a> <!-- Ganti dari "Loans" -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Carousel -->
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="2000">
                <img src="{{ asset('images/image5.jpg') }}" class="d-block w-100" alt="Gambar Latar">
                <div class="carousel-caption text-white text-start">
                    <h2>Welcome, Librarian</h2>
                    <p>A cozy space where stories come to life and librarians make a difference.</p>
                </div>
            </div>
        </div>
    </div>

    <svg class="intro_wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 329.6" preserveAspectRatio="none">
        <g>
            <path class="intro_wave_path" d="M0,329.6V64.3l48-16c48-16,144-48,240-37.3c96,10.3,192,64.3,288,74.6c96,10.7,192-21.3,288-48 
            c96-26.3,192-48.3,288-32c96,15.7,192,69.7,240,96l48,26.7V329.6H0z"></path>
        </g>
    </svg>

    <!-- Content Container -->
    <div class="container">
        <!-- Header Section -->
        <div class="text-center mb-4">
            <h1 class="header-text" style="@yield('headerStyle')">
                @yield ('header', 'Library Workstation')
            </h1>
        </div>
        

        <!-- Main Content -->
        @yield('content')
    </div>

    <footer class="text-center">
        <p>&copy; 2024 Soft Corner</p>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Navbar Scroll Effect -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var navbar = document.querySelector(".navbar");
            var lastScrollY = 0;
            var ticking = false;

            window.addEventListener("scroll", function () {
                if (!ticking) {
                    window.requestAnimationFrame(function () {
                        if (window.scrollY > 100) {
                            navbar.classList.add("scrolled");
                        } else {
                            navbar.classList.remove("scrolled");
                        }
                        ticking = false;
                    });
                    ticking = true;
                }
            });
        });
    </script>
</body>
</html>