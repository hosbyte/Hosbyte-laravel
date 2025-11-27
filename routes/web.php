<?php

use App\Http\Controllers\CertificateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return redirect('/Homes');
// });
// ? صفحه اصلی
Route::get('/' , [HomeController::class , 'index'])->name('home');

//? صفحات عمومی
Route::get('/certificates' , [CertificateController::class , 'index'])->name('certificates');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');

// صفحه تماس (بدون کنترلر - مستقیماً ویو رو برگردون)
Route::get('/contact', function () {
    return view('Homes.contactme');  // به پوشه Homes اشاره کن
})->name('contact');

Route::middleware(['auth'])->prefix('admin')->group(function() {
    Route::get('/dashboard' , [AdminController::class , 'dashboard'])->name('admin.dashboard');

    // ? certificate route
    Route::get('/admin/certificates' , [CertificateController::class , 'adminindex'])->name('admin.certificates.index');
    Route::get('/admin/certificates/create' , [CertificateController::class , 'create'])->name('admin.certificates.create');
    Route::post('/admin/certificates', [CertificateController::class, 'store'])->name('admin.certificates.store');
    Route::get('/admin/certificates/{id}/edit' , [CertificateController::class , 'edit'])->name('admin.certificates.edit');
    Route::put('/admin/certificates/{id}' , [CertificateController::class , 'update'])->name('admin.certificates.update');
    Route::delete('/admin/certificates/{id}' , [CertificateController::class , 'destroy'])->name('admin.certificates.destroy');

    // ? portfolio route
    Route::get('/admin/portfolios', [PortfolioController::class, 'adminindex'])->name('admin.portfolios.index');
    Route::get('/admin/portfolios/create', [PortfolioController::class, 'create'])->name('admin.portfolios.create');
    Route::post('/admin/portfolios', [PortfolioController::class, 'store'])->name('admin.portfolios.store');
    Route::get('/admin/portfolios/{id}/edit', [PortfolioController::class, 'edit'])->name('admin.portfolios.edit');
    Route::put('/admin/portfolios/{id}', [PortfolioController::class, 'update'])->name('admin.portfolios.update');
    Route::delete('/admin/portfolios/{id}', [PortfolioController::class, 'destroy'])->name('admin.portfolios.destroy');
});

Route::get('/Login' , [LoginController::class , 'showLoginForm'])->name('Login');
Route::post('/Login' , [LoginController::class , 'Login']);

Route::get('/dashboard', function () {
    return redirect('/admin/dashboard');
});

require __DIR__.'/auth.php';
