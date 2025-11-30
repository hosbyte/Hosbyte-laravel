@extends('admin.layout')

@section('title', 'مدیریت نمونه کارها - پنل مدیریت')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">مدیریت نمونه کارها</h1>
        <a href="{{ route('admin.portfolios.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>
            افزودن نمونه کار جدید
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
            @if ($portfolios->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th width="60">#</th>
                                <th width="100">تصویر</th>
                                <th>عنوان پروژه</th>
                                <th>دسته‌بندی</th>
                                <th>تکنولوژی‌ها</th>
                                <th>وضعیت</th>
                                <th width="150">تاریخ ایجاد</th>
                                <th width="140">عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($portfolios as $portfolio)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if ($portfolio->image)
                                            <img src="{{ asset('laravel_portfolio/storage/app/public/' . $portfolio->image) }}"
                                                alt="{{ $portfolio->title }}" class="rounded" width="50" height="50"
                                                style="object-fit: cover;">
                                        @else
                                            <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                                style="width: 50px; height: 50px;">
                                                <i class="fas fa-briefcase text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ $portfolio->title }}</strong>
                                        @if ($portfolio->featured)
                                            <span class="badge bg-warning text-dark ms-1"
                                                title="نمایش در نمونه کارهای برتر">
                                                <i class="fas fa-star"></i>
                                            </span>
                                        @endif
                                        @if ($portfolio->project_url)
                                            <br>
                                            <small>
                                                <a href="{{ $portfolio->project_url }}" target="_blank"
                                                    class="text-decoration-none">
                                                    <i class="fas fa-external-link-alt me-1"></i>
                                                    مشاهده پروژه
                                                </a>
                                            </small>
                                        @endif
                                    </td>
                                    <td>
                                        @switch($portfolio->category)
                                            @case('web')
                                                <span class="badge bg-primary">توسعه وب</span>
                                            @break

                                            @case('mobile')
                                                <span class="badge bg-success">اپلیکیشن موبایل</span>
                                            @break

                                            @case('design')
                                                <span class="badge bg-info">طراحی</span>
                                            @break

                                            @default
                                                <span class="badge bg-secondary">سایر</span>
                                        @endswitch
                                    </td>
                                    <td>
                                        @if ($portfolio->technologies)
                                            @php
                                                $techs = explode(',', $portfolio->technologies);
                                            @endphp
                                            @foreach (array_slice($techs, 0, 2) as $tech)
                                                <span
                                                    class="badge bg-light text-dark border small">{{ trim($tech) }}</span>
                                            @endforeach
                                            @if (count($techs) > 2)
                                                <span
                                                    class="badge bg-light text-dark border small">+{{ count($techs) - 2 }}</span>
                                            @endif
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-success">
                                            <i class="fas fa-check me-1"></i>
                                            فعال
                                        </span>
                                    </td>
                                    <td>
                                        <small class="text-muted">
                                            {{ \Morilog\Jalali\Jalalian::fromCarbon($portfolio->created_at)->format('Y/m/d') }}
                                        </small>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('admin.portfolios.edit', $portfolio->id) }}"
                                                class="btn btn-outline-warning" title="ویرایش">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('portfolio') }}#portfolio-{{ $portfolio->id }}"
                                                target="_blank" class="btn btn-outline-info" title="مشاهده در سایت">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <button type="button" class="btn btn-outline-danger" title="حذف"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal{{ $portfolio->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>

                                        <!-- Modal حذف -->
                                        <div class="modal fade" id="deleteModal{{ $portfolio->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">تأیید حذف</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>آیا از حذف نمونه کار "<strong>{{ $portfolio->title }}</strong>"
                                                            مطمئن هستید؟</p>
                                                        <p class="text-muted small">این عمل قابل بازگشت نیست.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">انصراف</button>
                                                        <form
                                                            action="{{ route('admin.portfolios.destroy', $portfolio->id) }}"
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
                @if ($portfolios->hasPages())
                    <div class="d-flex justify-content-center mt-4">
                        {{ $portfolios->links() }}
                    </div>
                @endif
            @else
                <div class="text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-briefcase fa-4x text-muted"></i>
                    </div>
                    <h4 class="text-muted">هنوز نمونه کاری اضافه نکرده‌اید</h4>
                    <p class="text-muted mb-4">می‌توانید اولین نمونه کار خود را اضافه کنید</p>
                    <a href="{{ route('admin.portfolios.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>
                        افزودن نمونه کار جدید
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- آمار سریع -->
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4>{{ $portfolios->count() }}</h4>
                            <p class="mb-0">کل نمونه کارها</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-briefcase fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4>{{ $portfolios->where('featured', true)->count() }}</h4>
                            <p class="mb-0">نمونه کارهای برتر</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-star fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4>{{ $portfolios->where('category', 'web')->count() }}</h4>
                            <p class="mb-0">پروژه‌های وب</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-globe fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4>{{ $portfolios->where('category', 'mobile')->count() }}</h4>
                            <p class="mb-0">اپلیکیشن‌ها</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-mobile-alt fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
