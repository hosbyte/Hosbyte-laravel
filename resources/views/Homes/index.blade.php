@extends('layout')

@section('title', 'hosbyte')

@section('content')

    <body>
        {{-- //?معرفی --}}
        <section class="hero-section">
            <div class="container">
                <div class="row align-items-center min-vh-100">
                    <div class="col-lg-6">
                        <h1 class="display-4 fw-bold mb-4">سلام، من <span class="text-primary">حسین سلیمانی</span> هستم</h1>
                        <p class="lead mb-4">
                            توسعه‌دهنده بک‌اند با تخصص در Laravel و PHP.
                            عاشق حل مسائل پیچیده و ساخت اپلیکیشن‌های وب .
                            تجربه کار با MySQL , معماری MVC و سیستم‌های مدرن توسعه نرم‌افزار.
                        </p>
                        <div class="d-flex gap-3">
                            <a href="{{ route('portfolio') }}" class="btn btn-primary btn-lg">نمونه کارهای من</a>
                            <a href="{{ route('contact') }}" class="btn btn-outline-primary btn-lg">تماس با من</a>
                        </div>
                    </div>
                    <div class="col-lg-6 text-center">
                        <img src="{{ asset('images/profile.jpg') }}" alt="عکس پروفایل" class="profile-img rounded-circle">
                    </div>
                </div>
            </div>
        </section>

        {{-- //? مهارت ها --}}
        <section class="skills-section py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-5">مهارت‌های من</h2>

                {{-- //? کارت ها --}}
                <div class="row mb-5">
                    <div class="col-md-4 mb-4">
                        <div class="skill-card text-center p-4 bg-white rounded shadow">
                            <i class="fas fa-server fa-3x text-primary mb-3"></i>
                            <h4>توسعه بک‌اند</h4>
                            <p>توسعه سمت سرور با PHP و Laravel، مدیریت پایگاه داده</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="skill-card text-center p-4 bg-white rounded shadow">
                            <i class="fas fa-database fa-3x text-primary mb-3"></i>
                            <h4>پایگاه داده</h4>
                            <p>طراحی و بهینه‌سازی پایگاه داده MySQL، نوشتن کوئری‌ </p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="skill-card text-center p-4 bg-white rounded shadow">
                            <i class="fab fa-laravel fa-3x text-primary mb-3"></i>
                            <h4>فریمورک Laravel</h4>
                            <p>توسعه اپلیکیشن‌های تحت وب با فریمورک مدرن و قدرتمند لاراول</p>
                        </div>
                    </div>
                </div>

                {{-- //? ردیف دوم --}}
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="skill-card text-center p-4 bg-white rounded shadow">
                            <i class="fas fa-code fa-3x text-primary mb-3"></i>
                            <h4>توسعه فرانت‌اند</h4>
                            <p>طراحی رابط کاربری با HTML, CSS, JavaScript و Bootstrap</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="skill-card text-center p-4 bg-white rounded shadow">
                            <i class="fas fa-shield-alt fa-3x text-primary mb-3"></i>
                            <h4>امنیت وب</h4>
                            <p>پیاده‌سازی مکانیزم‌های امنیتی و محافظت از اپلیکیشن‌های تحت وب</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="skill-card text-center p-4 bg-white rounded shadow">
                            <i class="fas fa-tools fa-3x text-primary mb-3"></i>
                            <h4>ابزارهای توسعه</h4>
                            <p>کار با Git , Github و ابزارهای مدرن توسعه نرم‌افزار</p>
                        </div>
                    </div>
                </div>

                {{-- //? نوار پیشرفت --}}
                <div class="skills-progress-section">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="skills-progress-card bg-white p-5 rounded shadow">
                                <h3 class="text-center mb-4">سطح مهارت‌های فنی</h3>
                                <p class="text-center text-muted mb-5">میزان تسلط من بر تکنولوژی‌های مختلف</p>

                                <div class="skills-container">
                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">Laravel</span>
                                            <span class="skill-percentage">60%</span>
                                        </div>
                                        <div class="progress-bar">
                                            <div class="progress-fill" data-width="60"></div>
                                        </div>
                                    </div>

                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">PHP</span>
                                            <span class="skill-percentage">75%</span>
                                        </div>
                                        <div class="progress-bar">
                                            <div class="progress-fill" data-width="75"></div>
                                        </div>
                                    </div>

                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">JAVASCRIPT</span>
                                            <span class="skill-percentage">50%</span>
                                        </div>
                                        <div class="progress-bar">
                                            <div class="progress-fill" data-width="50"></div>
                                        </div>
                                    </div>

                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">HTML & CSS</span>
                                            <span class="skill-percentage">60%</span>
                                        </div>
                                        <div class="progress-bar">
                                            <div class="progress-fill" data-width="60"></div>
                                        </div>
                                    </div>

                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">MYSQL</span>
                                            <span class="skill-percentage">65%</span>
                                        </div>
                                        <div class="progress-bar">
                                            <div class="progress-fill" data-width="65"></div>
                                        </div>
                                    </div>

                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">JQUERY</span>
                                            <span class="skill-percentage">30%</span>
                                        </div>
                                        <div class="progress-bar">
                                            <div class="progress-fill" data-width="30"></div>
                                        </div>
                                    </div>

                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">BOOTSTRAP</span>
                                            <span class="skill-percentage">50%</span>
                                        </div>
                                        <div class="progress-bar">
                                            <div class="progress-fill" data-width="50"></div>
                                        </div>
                                    </div>

                                    {{-- <div class="skill-item">
                                    <div class="skill-header">
                                        <span class="skill-name">PHOTOSHOP</span>
                                        <span class="skill-percentage">20%</span>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress-fill" data-width="20"></div>
                                    </div>
                                </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        {{-- //? انیمیشن نوارهای پیشرفت --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const progressFills = document.querySelectorAll('.progress-fill');

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const progressFill = entry.target;
                            const width = progressFill.getAttribute('data-width');
                            progressFill.style.width = width + '%';
                            observer.unobserve(progressFill);
                        }
                    });
                }, {
                    threshold: 0.5
                });

                progressFills.forEach(fill => {
                    observer.observe(fill);
                });
            });
        </script>
    </body>

@endsection
