<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InquiryController as AdminInquiryController;
use App\Http\Controllers\Admin\OpeningController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/services', [SiteController::class, 'services'])->name('services');
Route::get('/services/{service}', [SiteController::class, 'service'])->name('services.show');
Route::get('/projects', [SiteController::class, 'projects'])->name('projects');
Route::get('/projects/{project}', [SiteController::class, 'project'])->name('projects.show');
Route::get('/media', [SiteController::class, 'media'])->name('media');
Route::get('/media/{article}', [SiteController::class, 'article'])->name('media.show');
Route::get('/careers', [SiteController::class, 'careers'])->name('careers');
Route::post('/careers', [ApplicationController::class, 'store'])->middleware('throttle:8,1')->name('careers.apply');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
Route::post('/contact', [InquiryController::class, 'store'])->middleware('throttle:8,1')->name('contact.store');
Route::get('/privacy', fn () => app(SiteController::class)->legal('privacy'))->name('privacy');
Route::get('/terms', fn () => app(SiteController::class)->legal('terms'))->name('terms');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->middleware('throttle:6,1');
});

Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::resource('projects', ProjectController::class)->except(['show']);
    Route::resource('articles', ArticleController::class)->except(['show']);
    Route::resource('openings', OpeningController::class)->except(['show']);
    Route::get('/inquiries', [AdminInquiryController::class, 'index'])->name('inquiries.index');
    Route::delete('/inquiries/{inquiry}', [AdminInquiryController::class, 'destroy'])->name('inquiries.destroy');
    Route::get('/applications', [AdminInquiryController::class, 'applications'])->name('applications.index');
    Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
});
