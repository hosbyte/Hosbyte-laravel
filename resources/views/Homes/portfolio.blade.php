@extends('layout')

@section('title', 'پروژه ها')

@section('content')

    <body>


        <!-- بخش هیرو -->
        <section class="portfolio-hero py-5 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mb-5">
                        <h1 class="display-4 fw-bold">نمونه کارهای من</h1>
                        <p class="lead">پروژه‌ها و نمونه کارهای انجام شده در زمینه طراحی و توسعه</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- فیلتر نمونه کارها -->
        <section class="portfolio-filter py-3 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <ul class="nav justify-content-center" id="portfolioFilter">
                            {{-- <li class="nav-item">
                                <button class="nav-link active filter-btn" data-filter="all">همه</button>
                            </li> --}}
                            <li class="nav-item">
                                <button class="nav-link filter-btn" data-filter="web">توسعه وب</button>
                            </li>
                            {{-- <li class="nav-item">
                                <button class="nav-link filter-btn" data-filter="design">طراحی</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link filter-btn" data-filter="mobile">موبایل</button>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- بخش نمونه کارها -->
        <section class="portfolio-content py-5">
            <div class="container">
                <div class="row">
                    @foreach ($portfolios as $portfolio)
                        <div class="col-lg-4 col-md-6 mb-4 portfolio-item {{ $portfolio->category }}">
                            <div class="card portfolio-card h-100 shadow">
                                <!-- تصویر -->
                                @if ($portfolio->image)
                                    <img src="{{ asset('laravel_portfolio/storage/app/public/' . $portfolio->image) }}" class="card-img-top"
                                        alt="{{ $portfolio->title }}" style="height: 200px; object-fit: cover;">
                                @else
                                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center"
                                        style="height: 200px;">
                                        <i class="fas fa-image fa-3x text-muted"></i>
                                    </div>
                                @endif

                                <div class="card-body">
                                    <h5 class="card-title">{{ $portfolio->title }}</h5>
                                    <p class="card-text">{{ Str::limit($portfolio->description, 100) }}</p>

                                    <!-- تکنولوژی‌ها -->
                                    <div class="tech-tags mb-3">
                                        @if ($portfolio->technologies)
                                            @php
                                                $techs = explode(',', $portfolio->technologies);
                                            @endphp
                                            @foreach (array_slice($techs, 0, 3) as $tech)
                                                <span class="badge bg-primary me-1 mb-1">{{ trim($tech) }}</span>
                                            @endforeach
                                            @if (count($techs) > 3)
                                                <span class="badge bg-secondary">+{{ count($techs) - 3 }}</span>
                                            @endif
                                        @endif
                                    </div>

                                    <!-- دسته‌بندی -->
                                    <div class="mb-2">
                                        @switch($portfolio->category)
                                            @case('web')
                                                <span class="badge bg-success">توسعه وب</span>
                                            @break

                                            @case('mobile')
                                                <span class="badge bg-info">اپلیکیشن موبایل</span>
                                            @break

                                            @case('design')
                                                <span class="badge bg-warning">طراحی</span>
                                            @break

                                            @default
                                                <span class="badge bg-secondary">سایر</span>
                                        @endswitch

                                        @if ($portfolio->featured)
                                            <span class="badge bg-danger">برتر</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="card-footer">
                                    @if ($portfolio->project_url)
                                        <a href="{{ $portfolio->project_url }}" target="_blank"
                                            class="btn btn-outline-primary btn-sm me-2">
                                            <i class="fas fa-external-link-alt me-1"></i>
                                            مشاهده دمو
                                        </a>
                                    @endif

                                    @if ($portfolio->github_url)
                                        <a href="{{ $portfolio->github_url }}" target="_blank"
                                            class="btn btn-outline-secondary btn-sm">
                                            <i class="fab fa-github me-1"></i>
                                            مشاهده کد
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            // فیلتر نمونه کارها
            document.addEventListener('DOMContentLoaded', function() {
                const filterButtons = document.querySelectorAll('.filter-btn');
                const portfolioItems = document.querySelectorAll('.portfolio-item');

                filterButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        // حذف کلاس active از همه دکمه‌ها
                        filterButtons.forEach(btn => btn.classList.remove('active'));
                        // اضافه کردن کلاس active به دکمه کلیک شده
                        this.classList.add('active');

                        const filterValue = this.getAttribute('data-filter');

                        portfolioItems.forEach(item => {
                            if (filterValue === 'all' || item.classList.contains(filterValue)) {
                                item.style.display = 'block';
                            } else {
                                item.style.display = 'none';
                            }
                        });
                    });
                });
            });
        </script>
    </body>
@endsection
