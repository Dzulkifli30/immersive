<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\UserController;

Route::get('/', [DashboardController::class, 'index'])->name('landing.home');
Route::get('faq', [DashboardController::class, 'faq'])->name('landing.faq');
Route::get('news', [DashboardController::class, 'news'])->name('landing.news');
Route::get('news/{id}', [DashboardController::class, 'shownews'])->name('show.news');
Route::get('faq/search', [DashboardController::class, 'searchfaq'])->name('search.faq');
Route::get('news/search', [DashboardController::class, 'searchnews'])->name('search.news');

Route::view('about', 'about')->name('landing.about');
Route::view('shownews', 'shownews')->name('landing.shownews');
Route::view('product', 'product')->name('landing.product');
Route::view('gallery', 'gallery')->name('landing.gallery');

Route::view('dashboard', 'customer.dashboard')
    ->middleware(['auth', 'verified', 'customer'])
    ->name('dashboard');

Route::view('product-user', 'customer.productuser')
    ->middleware(['auth', 'verified', 'customer'])
    ->name('user.product');

Route::view('dashadmin', 'admin.dashadmin')
    ->middleware(['auth', 'verified', 'admin'])
    ->name('admin.dashboard');

Route::middleware(['auth', 'verified', 'superadmin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::view('dashsuper', 'superadmin.dashsuper')->name('super.dashboard');
});

Route::middleware(['auth', 'verified', 'admin.superadmin'])->group(function () {
    Route::resource('header', HeaderController::class);
    Route::resource('features', FeaturesController::class);
    Route::resource('testimoni', TestimoniController::class);
    Route::resource('berita', BeritaController::class);
    Route::resource('price', PriceController::class);
    Route::resource('faqs', FaqController::class);
    Route::view('project', 'admin.project')->name('admin.project');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
