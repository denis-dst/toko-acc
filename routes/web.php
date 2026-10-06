<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes (Digital Showroom & E-Katalog)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::get('/katalog', [ProductController::class, 'index'])->name('products.index');
Route::get('/kategori/{slug}', [ProductController::class, 'category'])->name('products.category');
Route::get('/katalog/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/portofolio', [PortfolioController::class, 'index'])->name('portfolios.index');
Route::get('/portofolio/{slug}', [PortfolioController::class, 'show'])->name('portfolios.show');

Route::get('/tentang-kami', [PageController::class, 'about'])->name('about');
Route::get('/lokasi', [PageController::class, 'location'])->name('location');
Route::get('/kontak', [PageController::class, 'contact'])->name('contact');
Route::get('/testimoni', [PageController::class, 'testimonials'])->name('testimonials');

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

/*
|--------------------------------------------------------------------------
| Protected Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [AdminDashboardController::class, 'index']);

    // Categories
    Route::resource('categories', AdminCategoryController::class)->except(['show']);

    // Products & Product Gallery
    Route::resource('products', AdminProductController::class)->except(['show']);
    Route::delete('/products/images/{image}', [AdminProductController::class, 'deleteImage'])->name('products.images.delete');
    Route::post('/products/images/{image}/primary', [AdminProductController::class, 'setPrimaryImage'])->name('products.images.primary');

    // Portfolios
    Route::resource('portfolios', AdminPortfolioController::class)->except(['show']);
    Route::delete('/portfolios/images/{image}', [AdminPortfolioController::class, 'deleteImage'])->name('portfolios.images.delete');

    // Testimonials
    Route::resource('testimonials', AdminTestimonialController::class)->except(['show']);

    // Settings
    Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [AdminSettingController::class, 'update'])->name('settings.update');
});
