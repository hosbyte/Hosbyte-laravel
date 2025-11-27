@extends('admin.layout')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">افزودن نمونه کار جدید</h1>
        <a href="{{ route('admin.portfolios.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-right me-2"></i>
            بازگشت به لیست نمونه کارها
        </a>
    </div>

    <!-- فرم باید از اینجا شروع بشه -->
    <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">عنوان پروژه <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">دسته‌بندی</label>
                            <select class="form-select @error('category') is-invalid @enderror" id="category"
                                name="category">
                                <option value="">انتخاب دسته‌بندی</option>
                                <option value="web" {{ old('category') == 'web' ? 'selected' : '' }}>توسعه وب</option>
                                <option value="mobile" {{ old('category') == 'mobile' ? 'selected' : '' }}>اپلیکیشن موبایل</option>
                                <option value="design" {{ old('category') == 'design' ? 'selected' : '' }}>طراحی</option>
                                <option value="other" {{ old('category') == 'other' ? 'selected' : '' }}>سایر</option>
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">توضیحات پروژه <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                rows="6" placeholder="شرح کامل پروژه، تکنولوژی‌های استفاده شده، چالش‌ها و راه‌حل‌ها..." required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="project_url" class="form-label">لینک پروژه (اختیاری)</label>
                                    <input type="url" class="form-control @error('project_url') is-invalid @enderror"
                                        id="project_url" name="project_url" value="{{ old('project_url') }}"
                                        placeholder="https://example.com">
                                    @error('project_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="github_url" class="form-label">لینک GitHub (اختیاری)</label>
                                    <input type="url" class="form-control @error('github_url') is-invalid @enderror"
                                        id="github_url" name="github_url" value="{{ old('github_url') }}"
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
                                id="technologies" name="technologies" value="{{ old('technologies') }}"
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
                            <label for="image" class="form-label">انتخاب تصویر <span class="text-danger">*</span></label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                name="image" accept="image/*" required>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">فرمت‌های مجاز: JPG, PNG - حداکثر سایز: 2MB</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">پیش‌نمایش تصویر</label>
                            <div id="imagePreview" class="border rounded p-3 text-center bg-light">
                                <i class="fas fa-image fa-3x text-muted mb-2"></i>
                                <p class="text-muted mb-0">پیش‌نمایش تصویر پروژه</p>
                            </div>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="featured" name="featured" value="1"
                                {{ old('featured') ? 'checked' : '' }}>
                            <label class="form-check-label" for="featured">نمایش در نمونه کارهای برتر</label>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save me-2"></i>
                                ذخیره نمونه کار
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm mt-3">
                    <div class="card-body">
                        <h6 class="card-title">نکات مهم</h6>
                        <ul class="small text-muted mb-0">
                            <li>تصویر با کیفیت بالا انتخاب کنید</li>
                            <li>توضیحات کامل و جذاب بنویسید</li>
                            <li>تکنولوژی‌های اصلی را ذکر کنید</li>
                            <li>لینک‌های مرتبط را اضافه کنید</li>
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
                if (file.size > 2 * 1024 * 1024) {
                    alert('حجم فایل باید کمتر از 2MB باشد');
                    this.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `<img src="${e.target.result}" class="img-fluid rounded" style="max-height: 200px;">`;
                }
                reader.readAsDataURL(file);
            } else {
                preview.innerHTML = `
                    <i class="fas fa-image fa-3x text-muted mb-2"></i>
                    <p class="text-muted mb-0">پیش‌نمایش تصویر پروژه</p>
                `;
            }
        });
    </script>
@endsection