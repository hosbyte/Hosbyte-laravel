<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت - پورتفولیو</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar {
            background: #2c3e50;
            min-height: 100vh;
            color: white;
        }

        .sidebar .nav-link {
            color: #ecf0f1;
            padding: 15px 20px;
            border-bottom: 1px solid #34495e;
        }

        .sidebar .nav-link:hover {
            background: #34495e;
            color: #3498db;
        }

        .sidebar .nav-link.active {
            background: #3498db;
            color: white;
        }

        .main-content {
            background: #ecf0f1;
        }

        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .action-btn {
            margin: 2px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- نوار کناری -->
            <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky pt-3">
                    <h4 class="text-center mb-4">پنل مدیریت</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <i class="fas fa-tachometer-alt me-2"></i>
                                پیشخوان
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.certificates.index') }}">
                                <i class="fas fa-certificate me-2"></i>
                                مدیریت مدارک
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.portfolios.index') }}">
                                <i class="fas fa-briefcase me-2"></i>
                                مدیریت نمونه کارها
                            </a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link text-start w-100">
                                    <i class="fas fa-sign-out-alt me-2"></i>
                                    خروج
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- محتوای اصلی -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                <!-- نوار بالایی -->
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">پیشخوان مدیریت</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <span class="text-muted">خوش آمدید!</span>
                    </div>
                </div>

                <!-- کارت‌های آمار -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="stat-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="text-muted">مدارک</h5>
                                    <h2>{{ $certificatesCount }}</h2>
                                </div>
                                <i class="fas fa-certificate fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="stat-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="text-muted">نمونه کارها</h5>
                                    <h2>{{ $portfoliosCount }}</h2>
                                </div>
                                <i class="fas fa-briefcase fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- اقدامات سریع -->
                <div class="row">
                    <div class="col-12">
                        <div class="stat-card">
                            <h4 class="mb-4">اقدامات سریع</h4>
                            <div class="d-flex flex-wrap gap-3">
                                <a href="{{ route('admin.certificates.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus me-2"></i>
                                    افزودن مدرک جدید
                                </a>
                                <a href="{{ route('admin.portfolios.create') }}" class="btn btn-success">
                                    <i class="fas fa-plus me-2"></i>
                                    افزودن نمونه کار جدید
                                </a>
                                <a href="{{ route('certificates') }}" target="_blank" class="btn btn-outline-secondary">
                                    <i class="fas fa-external-link-alt me-2"></i>
                                    مشاهده سایت
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
