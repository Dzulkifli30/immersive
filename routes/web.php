<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\UsahaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    } else {
        return redirect()->route('landing.home');
    }
})->name('welcome');

Route::get('home', [DashboardController::class, 'index'])->name('landing.home');
Route::get('faq', [DashboardController::class, 'faq'])->name('landing.faq');
Route::get('gallery', [DashboardController::class, 'gallery'])->name('landing.gallery');
Route::get('news', [DashboardController::class, 'news'])->name('landing.news');
Route::get('news/{id}', [DashboardController::class, 'shownews'])->name('show.news');
Route::get('faq/search', [DashboardController::class, 'searchfaq'])->name('search.faq');
Route::get('news/kategori/{id}', [DashboardController::class, 'kategorinews'])->name('kategori.news');

Route::view('about', 'about')->name('landing.about');
Route::view('shownews', 'shownews')->name('landing.shownews');
Route::view('product', 'product')->name('landing.product');
// Route::view('gallery', 'gallery')->name('landing.gallery');
Route::view('test', 'tes')->name('tes');

Route::view('unverified', 'unverified')->name('unverified');

Route::view('biodata', 'biodata')
    ->middleware('auth')
    ->name('biodata');

Route::middleware(['auth', 'verified', 'customer'])->group(function () {
    Route::resource('pemesanan', PemesananController::class);
    Route::put('pemesanan/gambar/{id}/tambah', [PemesananController::class, 'updategambar'])->name('pemesanan.tambahgambar');
    Route::delete('pemesanan/gambar/{id}/hapus', [PemesananController::class, 'hapusgambar'])->name('pemesanan.hapusgambar');
    Route::view('dashboard', 'customer.dashboard')->name('dashboard');
    // Route::view('product-user', 'customer.productuser')->name('user.product');
});

Route::middleware('auth')->group(function () {
    Route::view('unverified', 'unverified')->name('unverified');
    Route::resource('biodata', BiodataController::class);
    Route::put('biodata/gambar/tambah/{id}', [BiodataController::class, 'updategambar'])->name('biodata.updategambar');
    Route::delete('biodata/gambar/hapus/{id}', [BiodataController::class, 'hapusgambar'])->name('biodata.hapusgambar');
    Route::post('biodata/changepassword', [BiodataController::class, 'changePassword'])->name('biodata.changepassword');
});

Route::view('dashadmin', 'admin.dashadmin')
    ->middleware(['auth', 'verified', 'admin'])
    ->name('admin.dashboard');

Route::middleware(['auth', 'verified', 'superadmin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::view('dashsuper', 'superadmin.dashsuper')->name('super.dashboard');
    Route::post('users/verified/{id}', [UserController::class, 'verified'])->name('users.verified');
});

Route::middleware(['auth', 'verified', 'admin.superadmin'])->group(function () {
    Route::resource('header', HeaderController::class);
    Route::resource('features', FeaturesController::class);
    Route::resource('testimoni', TestimoniController::class);
    Route::resource('berita', BeritaController::class);
    Route::resource('price', PriceController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('usaha', UsahaController::class);
    Route::resource('kategori', KategoriBeritaController::class);
    Route::resource('gallerys', GalleryController::class);
    Route::put('gallerys/gambar/{id}/tambah', [GalleryController::class, 'updategambar'])->name('gallerys.tambahgambar');
    Route::delete('gallerys/gambar/{id}/hapus', [GalleryController::class, 'hapusgambar'])->name('gallerys.hapusgambar');
    Route::get('pesanan-user', [AdminController::class, 'pesanan'])->name('admin.pesanan');
    Route::get('pesanan-user/{id}', [AdminController::class, 'pesananedit'])->name('admin.pesananedit');
    Route::put('pesanan-user/status/{id}', [AdminController::class, 'pesananstatus'])->name('admin.pesananstatus');
    Route::put('pesanan-user/gambar/{id}/tambah', [AdminController::class, 'updategambar'])->name('admin.tambahgambar');
    Route::delete('pesanan-user/gambar/{id}/hapus', [AdminController::class, 'hapusgambar'])->name('admin.hapusgambar');
    Route::delete('pesanan-user/{id}/hapus', [AdminController::class, 'hapuspemesanan'])->name('admin.hapuspemesanan');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
