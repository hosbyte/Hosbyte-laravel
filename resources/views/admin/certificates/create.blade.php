@extends('admin.layout')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">افزودن مدرک جدید</h1>
        <a href="{{ route('admin.certificates.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-right me-2"></i>
            بازگشت به لیست مدارک
        </a>
    </div>

    <!-- فرم باید کل محتوا رو بپوشونه -->
    <form action="{{ route('admin.certificates.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">عنوان مدرک <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="issuer" class="form-label">مرجع صدور</label>
                            <input type="text" class="form-control @error('issuer') is-invalid @enderror" id="issuer"
                                name="issuer" value="{{ old('issuer') }}">
                            @error('issuer')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="date" class="form-label">تاریخ دریافت <span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('date') is-invalid @enderror"
                                        id="date" name="date" value="{{ old('date') }}" required>
                                    @error('date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="duration" class="form-label">مدت دوره (اختیاری)</label>
                                    <input type="text" class="form-control @error('duration') is-invalid @enderror"
                                        id="duration" name="duration" value="{{ old('duration') }}"
                                        placeholder="مثال: 40 ساعت">
                                    @error('duration')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">توضیحات</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                rows="5" placeholder="توضیحات درباره مدرک...">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="certificate_url" class="form-label">لینک مدرک (اختیاری)</label>
                            <input type="url" class="form-control @error('certificate_url') is-invalid @enderror"
                                id="certificate_url" name="certificate_url" value="{{ old('certificate_url') }}"
                                placeholder="https://example.com/certificate">
                            @error('certificate_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">تصویر مدرک</h5>

                        <div class="mb-3">
                            <label for="image" class="form-label">انتخاب تصویر <span class="text-danger">*</span></label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                name="image" accept="image/*" required>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">فرمت‌های مجاز: JPG, PNG, GIF - حداکثر سایز: 2MB</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">پیش‌نمایش تصویر</label>
                            <div id="imagePreview" class="border rounded p-3 text-center bg-light">
                                <i class="fas fa-image fa-3x text-muted mb-2"></i>
                                <p class="text-muted mb-0">پیش‌نمایش تصویر</p>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save me-2"></i>
                                ذخیره مدرک
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm mt-3">
                    <div class="card-body">
                        <h6 class="card-title">راهنمی</h6>
                        <ul class="small text-muted mb-0">
                            <li>فیلدهای ستاره‌دار обязаاری هستند</li>
                            <li>تصویر باید با کیفیت و خوانا باشد</li>
                            <li>تاریخ را به درستی وارد کنید</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </form> <!-- اینجا فرم بسته شده -->

    <script>
        // پیش‌نمایش تصویر
        document.getElementById('image').addEventListener('change', function(e) {
            const preview = document.getElementById('imagePreview');
            const file = e.target.files[0];

            if (file) {
                // بررسی سایز فایل
                if (file.size > 2 * 1024 * 1024) {
                    alert('حجم فایل باید کمتر از 2MB باشد');
                    this.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML =
                        `<img src="${e.target.result}" class="img-fluid rounded" style="max-height: 200px;">`;
                }
                reader.readAsDataURL(file);
            } else {
                preview.innerHTML = `
                <i class="fas fa-image fa-3x text-muted mb-2"></i>
                <p class="text-muted mb-0">پیش‌نمایش تصویر</p>
            `;
            }
        });
    </script>
@endsection
