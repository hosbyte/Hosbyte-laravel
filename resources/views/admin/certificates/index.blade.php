@extends('admin.layout')

@section('title', 'مدیریت مدارک - پنل مدیریت') --}}

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">مدیریت مدارک</h1>
        <a href="{{ route('admin.certificates.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>
            افزودن مدرک جدید
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            @if ($certificates->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th width="60">#</th>
                                <th width="100">تصویر</th>
                                <th>عنوان مدرک</th>
                                <th>مرجع صدور</th>
                                <th>تاریخ دریافت</th>
                                <th>وضعیت</th>
                                <th width="150">تاریخ ایجاد</th>
                                <th width="140">عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($certificates as $certificate)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{-- @if ($certificate->image)
                                            <img src="{{ asset('storage/' . $certificate->image) }}"
                                                alt="{{ $certificate->title }}" class="rounded" width="50"
                                                height="50" style="object-fit: cover;">
                                        @else
                                            <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                                style="width: 50px; height: 50px;">
                                                <i class="fas fa-certificate text-muted"></i>
                                            </div>
                                        @endif --}}
                                        @if ($certificate->image)
                                            <img src="{{ asset('storage/' . $certificate->image) }}"
                                                alt="{{ $certificate->title }}" class="rounded" width="50"
                                                height="50" style="object-fit: cover;">
                                        @else
                                            <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                                style="width: 50px; height: 50px;">
                                                <i class="fas fa-certificate text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ $certificate->title }}</strong>
                                        @if ($certificate->duration)
                                            <br>
                                            <small class="text-muted">{{ $certificate->duration }}</small>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($certificate->issuer)
                                            <span class="badge bg-info">{{ $certificate->issuer }}</span>
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </td>
                                    <td>
                                        <small class="text-muted">
                                            {{ \Morilog\Jalali\Jalalian::fromCarbon($certificate->created_at)->format('Y/m/d') }}
                                        </small>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">
                                            <i class="fas fa-check me-1"></i>
                                            فعال
                                        </span>
                                    </td>
                                    <td>
                                        <small class="text-muted">
                                            {{ \Morilog\Jalali\Jalalian::fromCarbon($certificate->created_at)->format('Y/m/d') }}
                                        </small>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('admin.certificates.edit', $certificate->id) }}"
                                                class="btn btn-outline-warning" title="ویرایش">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('certificates') }}#certificate-{{ $certificate->id }}"
                                                target="_blank" class="btn btn-outline-info" title="مشاهده در سایت">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <button type="button" class="btn btn-outline-danger" title="حذف"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal{{ $certificate->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>

                                        <!-- Modal حذف -->
                                        <div class="modal fade" id="deleteModal{{ $certificate->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">تأیید حذف</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>آیا از حذف مدرک "<strong>{{ $certificate->title }}</strong>"
                                                            مطمئن هستید؟</p>
                                                        <p class="text-muted small">این عمل قابل بازگشت نیست.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">انصراف</button>
                                                        <form
                                                            action="{{ route('admin.certificates.destroy', $certificate->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="fas fa-trash me-1"></i>
                                                                حذف
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- صفحه‌بندی -->
                @if ($certificates->hasPages())
                    <div class="d-flex justify-content-center mt-4">
                        {{ $certificates->links() }}
                    </div>
                @endif
            @else
                <div class="text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-certificate fa-4x text-muted"></i>
                    </div>
                    <h4 class="text-muted">هنوز مدرکی اضافه نکرده‌اید</h4>
                    <p class="text-muted mb-4">می‌توانید اولین مدرک خود را اضافه کنید</p>
                    <a href="{{ route('admin.certificates.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>
                        افزودن مدرک جدید
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- آمار سریع -->
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4>{{ $certificates->count() }}</h4>
                            <p class="mb-0">کل مدارک</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-certificate fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4>{{ $certificates->where('issuer', '!=', null)->count() }}</h4>
                            <p class="mb-0">مدارک دارای مرجع</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-university fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4>{{ $certificates->where('certificate_url', '!=', null)->count() }}</h4>
                            <p class="mb-0">مدارک دارای لینک</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-link fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
