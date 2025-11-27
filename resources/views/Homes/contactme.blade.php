@extends('layout')

@section('title', 'تماس با من')

@section('content')

    <body>
        <!-- بخش هیرو -->
        <section class="contact-hero py-5 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mb-5">
                        <h1 class="display-4 fw-bold">تماس با من</h1>
                        <p class="lead">برای همکاری یا دریافت اطلاعات بیشتر از طریق راه‌های زیر با من در ارتباط باشید</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- بخش اطلاعات تماس و شبکه‌های اجتماعی -->
        <section class="contact-content py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <!-- کارت شبکه‌های اجتماعی -->
                        <div class="social-card bg-white p-5 rounded shadow mb-5">
                            <h3 class="text-center mb-4">شبکه‌های اجتماعی</h3>
                            <p class="text-center mb-4">می‌توانید از طریق شبکه‌های اجتماعی زیر با من در ارتباط باشید</p>

                            <div class="row justify-content-center">
                                <!-- گیتهاب -->
                                <div class="col-md-3 col-6 mb-4">
                                    <a href="https://github.com/hosbyte" target="_blank"
                                        class="social-link text-decoration-none">
                                        <div class="social-item text-center p-4 rounded">
                                            <i class="fab fa-github fa-3x mb-3"></i>
                                            <h5>GitHub</h5>
                                            <p class="small text-muted">پروژه‌های من</p>
                                        </div>
                                    </a>
                                </div>

                                <!-- تلگرام -->
                                <div class="col-md-3 col-6 mb-4">
                                    <a href="https://t.me/hosbyte" target="_blank" class="social-link text-decoration-none">
                                        <div class="social-item text-center p-4 rounded">
                                            <i class="fab fa-telegram fa-3x mb-3"></i>
                                            <h5>Telegram</h5>
                                            <p class="small text-muted">پیام مستقیم</p>
                                        </div>
                                    </a>
                                </div>

                                <!-- اینستاگرام -->
                                <div class="col-md-3 col-6 mb-4">
                                    <a href="https://instagram.com/hosbyte" target="_blank"
                                        class="social-link text-decoration-none">
                                        <div class="social-item text-center p-4 rounded">
                                            <i class="fab fa-instagram fa-3x mb-3"></i>
                                            <h5>Instagram</h5>
                                            <p class="small text-muted">پیام مستقیم</p>
                                        </div>
                                    </a>
                                </div>

                                <!-- ایمیل -->
                                <div class="col-md-3 col-6 mb-4">
                                    <a href="mailto:hosbyte@gmail.com" class="social-link text-decoration-none">
                                        <div class="social-item text-center p-4 rounded">
                                            <i class="fas fa-envelope fa-3x mb-3"></i>
                                            <h5>Email</h5>
                                            <p class="small text-muted">ارسال ایمیل</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="contact-info bg-light p-5 rounded">
                            <h3 class="text-center mb-4">اطلاعات تماس</h3>
                            <div class="row justify-content-center"> <!-- justify-content-center برای وسط چین شدن -->
                                <div class="col-md-6 mb-4">
                                    <div class="contact-item d-flex align-items-center p-3 bg-white rounded shadow-sm">
                                        <i class="fas fa-map-marker-alt text-primary fa-2x me-3"></i>
                                        <div>
                                            <h5 class="mb-1">آدرس</h5>
                                            <p class="mb-0 text-muted">اصفهان، ایران</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- دکمه‌های سریع اقدام -->
                            <div class="quick-actions text-center mt-4">
                                <h4 class="mb-3">ارتباط سریع</h4>
                                <div class="d-flex flex-wrap justify-content-center gap-3">
                                    <a href="https://t.me/hosbyte" target="_blank" class="btn btn-primary">
                                        <i class="fab fa-telegram me-2"></i>
                                        پیام در تلگرام
                                    </a>
                                    <a href="https://instagram.com/hosbyte" target="_blank" class="btn btn-danger">
                                        <i class="fab fa-instagram me-2"></i>
                                        پیام در اینستاگرام
                                    </a>
                                    <a href="mailto:mailto:hosbyte@gmail.com" class="btn btn-success">
                                        <i class="fas fa-envelope me-2"></i>
                                        ارسال ایمیل
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
@endsection
