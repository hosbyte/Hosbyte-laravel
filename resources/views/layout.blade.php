<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <!-- مسیر فایل CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- CDN ها -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://hosbyte.ir/files/bootstrap-5.3.7-dist/css/bootstrap.min.css" rel="stylesheet">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    {{-- //? navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">HOSBYTE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('home') }}">خانه</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('portfolio') }}">نمونه کارها</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('certificates') }}">مدارک</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">تماس با من</a>
                    </li>
                    {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">ورود / ثبت نام</a>
                        </li> --}}
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    {{-- //? footer --}}
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    {{-- <p>کلیه حقوق محفوظ است &copy; 2023</p> --}}
                </div>
                <div class="col-md-6 text-start">
                    <div class="social-links">
                        {{-- <a href="" class="text-white me-3"><i class="fab fa-linkedin fa-lg"></i></a> --}}
                        <a href="https://github.com/hosbyte" class="text-white me-3"><i
                                class="fab fa-github fa-lg"></i></a>
                        <a href="https://t.me/hosbyte" class="text-white me-3"><i class="fab fa-telegram fa-lg"></i></a>
                        <a href="https://instagram.com/hosbyte" class="text-white"><i
                                class="fab fa-instagram fa-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- مسیر فایل JS -->
    {{-- <script src="{{ asset('js/custom.js') }}"></script> --}}

    <!-- CDN اسکریپت‌ها -->
    <script src="https://hosbyte.ir/files/bootstrap-5.3.7-dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
</body>

</html>
