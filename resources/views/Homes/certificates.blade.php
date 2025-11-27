@extends('layout')

@section('title', 'مدارک من')

@section('content')

    <body>
        <!-- بخش هیرو -->
        <section class="certificates-hero py-5 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mb-5">
                        <h1 class="display-4 fw-bold">مدارک و گواهینامه‌ها</h1>
                        <p class="lead">مدارک و گواهینامه‌های کسب شده در زمینه تخصصی</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- بخش مدارک -->
        <section class="certificates-content py-5">
            <div class="container">
                <div class="row">
                    <!-- نمونه کارت مدرک -->
                    @foreach ($certificates as $certificate)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                @if ($certificate->image)
                                    <img src="{{ asset('storage/' . $certificate->image) }}" alt="{{ $certificate->title }}"
                                        class="card-img-top">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $certificate->title }}</h5>
                                    <p class="card-text">{{ $certificate->description }}</p>
                                    <p class="text-muted">تاریخ دریافت مدرک : {{ $certificate->date }}</p>
                                    <center>
                                        <a class="btn btn-primary" href="{{ $certificate->certificate_url }}">مشاهده</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
@endsection
