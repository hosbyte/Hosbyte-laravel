@extends('admin.layout')

@section('title', 'ویرایش نمونه کار - پنل مدیریت')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">ویرایش نمونه کار</h1>
        <div>
            <a href="{{ route('admin.portfolios.index') }}" class="btn btn-secondary">
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
                    <form action="{{ route('admin.portfolios.update', $portfolio->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">عنوان پروژه <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" value="{{ old('title', $portfolio->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">دسته‌بندی</label>
                            <select class="form-select @error('category') is-invalid @enderror" id="category"
                                name="category">
                                <option value="">انتخاب دسته‌بندی</option>
                                <option value="web"
                                    {{ old('category', $portfolio->category) == 'web' ? 'selected' : '' }}>توسعه وب</option>
                                <option value="mobile"
                                    {{ old('category', $portfolio->category) == 'mobile' ? 'selected' : '' }}>اپلیکیشن
                                    موبایل</option>
                                <option value="design"
                                    {{ old('category', $portfolio->category) == 'design' ? 'selected' : '' }}>طراحی</option>
                                <option value="other"
                                    {{ old('category', $portfolio->category) == 'other' ? 'selected' : '' }}>سایر</option>
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">توضیحات پروژه <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                rows="6" required>{{ old('description', $portfolio->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="project_url" class="form-label">لینک پروژه</label>
                                    <input type="url" class="form-control @error('project_url') is-invalid @enderror"
                                        id="project_url" name="project_url"
                                        value="{{ old('project_url', $portfolio->project_url) }}"
                                        placeholder="https://example.com">
                                    @error('project_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="github_url" class="form-label">لینک GitHub</label>
                                    <input type="url" class="form-control @error('github_url') is-invalid @enderror"
                                        id="github_url" name="github_url"
                                        value="{{ old('github_url', $portfolio->github_url) }}"
                                        placeholder="https://github.com/username/project">
                                    @error('github_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="technologies" class="form-label">تکنولوژی‌های استفاده شده</label>
                            <input type="text" class="form-control @error('technologies') is-invalid @enderror"
                                id="technologies" name="technologies"
                                value="{{ old('technologies', $portfolio->technologies) }}"
                                placeholder="مثال: Laravel, React, MySQL, ...">
                            @error('technologies')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">تکنولوژی‌ها را با کاما جدا کنید</div>
                        </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">تصویر پروژه</h5>

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
                            @if ($portfolio->image)
                                <img src="{{ asset('storage/' . $portfolio->image) }}" class="img-fluid rounded"
                                    style="max-height: 200px;">
                                <p class="mt-2 text-muted small">تصویر فعلی</p>
                            @else
                                <i class="fas fa-image fa-3x text-muted mb-2"></i>
                                <p class="text-muted mb-0">تصویری موجود نیست</p>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="featured" name="featured" value="1"
                            {{ old('featured', $portfolio->featured) ? 'checked' : '' }}>
                        <label class="form-check-label" for="featured">نمایش در نمونه کارهای برتر</label>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-save me-2"></i>
                            بروزرسانی نمونه کار
                        </button>
                    </div>
                    </form>

                    <!-- حذف نمونه کار -->
                    <div class="mt-4 pt-3 border-top">
                        <button type="button" class="btn btn-outline-danger w-100" data-bs-toggle="modal"
                            data-bs-target="#deleteModal">
                            <i class="fas fa-trash me-2"></i>
                            حذف این نمونه کار
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
                    <p>آیا از حذف نمونه کار "<strong>{{ $portfolio->title }}</strong>" مطمئن هستید؟</p>
                    <p class="text-muted small">این عمل قابل بازگشت نیست و تصویر مرتبط نیز حذف خواهد شد.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">انصراف</button>
                    <form action="{{ route('admin.portfolios.destroy', $portfolio->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash me-1"></i>
                            حذف نمونه کار
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
            @if ($portfolio->image)
                <img src="{{ asset('storage/' . $portfolio->image) }}" 
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