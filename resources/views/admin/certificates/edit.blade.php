@extends('admin.layout')

@section('title', 'ویرایش مدرک - پنل مدیریت')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">ویرایش مدرک</h1>
        <div>
            <a href="{{ route('admin.certificates.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-right me-2"></i>
                بازگشت به لیست
            </a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.certificates.update', $certificate->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">عنوان مدرک <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" value="{{ old('title', $certificate->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="issuer" class="form-label">مرجع صدور</label>
                            <input type="text" class="form-control @error('issuer') is-invalid @enderror" id="issuer"
                                name="issuer" value="{{ old('issuer', $certificate->issuer) }}">
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
                                        id="date" name="date" value="{{ old('date', $certificate->date) }}"
                                        required>
                                    @error('date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="duration" class="form-label">مدت دوره</label>
                                    <input type="text" class="form-control @error('duration') is-invalid @enderror"
                                        id="duration" name="duration" value="{{ old('duration', $certificate->duration) }}"
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
                                rows="5">{{ old('description', $certificate->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="certificate_url" class="form-label">لینک مدرک</label>
                            <input type="url" class="form-control @error('certificate_url') is-invalid @enderror"
                                id="certificate_url" name="certificate_url"
                                value="{{ old('certificate_url', $certificate->certificate_url) }}"
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
                        <label for="image" class="form-label">تغییر تصویر</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                            name="image" accept="image/*">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">اگر می‌خواهید تصویر را تغییر دهید، فایل جدید انتخاب کنید</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">تصویر فعلی</label>
                        <div id="imagePreview" class="border rounded p-3 text-center bg-light">
                            @if ($certificate->image)
                                <img src="{{ asset('storage/' . $certificate->image) }}" class="img-fluid rounded"
                                    style="max-height: 200px;">
                                <p class="mt-2 text-muted small">تصویر فعلی</p>
                            @else
                                <i class="fas fa-image fa-3x text-muted mb-2"></i>
                                <p class="text-muted mb-0">تصویری موجود نیست</p>
                            @endif
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-save me-2"></i>
                            بروزرسانی مدرک
                        </button>
                    </div>
                    </form>

                    <!-- حذف مدرک -->
                    <div class="mt-4 pt-3 border-top">
                        <button type="button" class="btn btn-outline-danger w-100" data-bs-toggle="modal"
                            data-bs-target="#deleteModal">
                            <i class="fas fa-trash me-2"></i>
                            حذف این مدرک
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal حذف -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تأیید حذف</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>آیا از حذف مدرک "<strong>{{ $certificate->title }}</strong>" مطمئن هستید؟</p>
                    <p class="text-muted small">این عمل قابل بازگشت نیست و تصویر مرتبط نیز حذف خواهد شد.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">انصراف</button>
                    <form action="{{ route('admin.certificates.destroy', $certificate->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash me-1"></i>
                            حذف مدرک
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@section('scripts')
    <script>
        // پیش‌نمایش تصویر جدید
        document.getElementById('image').addEventListener('change', function(e) {
            const preview = document.getElementById('imagePreview');
            const file = e.target.files[0];

            if (file) {
                if (file.size > 2 * 1024 * 1024) {
                    alert('حجم فایل باید کمتر از 2MB باشد');
                    this.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `
                <img src="${e.target.result}" class="img-fluid rounded" style="max-height: 200px;">
                <p class="mt-2 text-success small">تصویر جدید</p>
            `;
                }
                reader.readAsDataURL(file);
            } else {
                // برگشت به تصویر قبلی
                preview.innerHTML = `
            @if ($certificate->image)
                <img src="{{ asset('storage/' . $certificate->image) }}" 
                     class="img-fluid rounded" style="max-height: 200px;">
                <p class="mt-2 text-muted small">تصویر فعلی</p>
            @else
                <i class="fas fa-image fa-3x text-muted mb-2"></i>
                <p class="text-muted mb-0">تصویری موجود نیست</p>
            @endif
        `;
            }
        });
    </script>
@endsection
@endsection