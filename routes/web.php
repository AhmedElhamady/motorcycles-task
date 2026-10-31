<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\MotorcycleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\RequestController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        Route::middleware(['auth', 'active'])->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        });
        require __DIR__ . '/auth.php';

        Route::prefix('dashboard')->middleware(['auth', 'active'])->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
            Route::middleware('can:manage-users')->group(function () {
                Route::patch('/users/{user}/toggle-active', [UserController::class, 'toggleActive'])->name('users.toggle-active');
                Route::resource('/users', UserController::class)->except(['show', 'destroy']);
            });
            Route::resource('/categories', CategoryController::class)->middleware('can:manage-categories');
            Route::resource('/services', ServiceController::class)->middleware('can:manage-services');
            Route::resource('/brands', BrandController::class);
            Route::resource('/motorcycles', MotorcycleController::class);
            Route::resource('/enquiries', EnquiryController::class)->only(['index', 'show', 'destroy']);
        });

        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::post('/enquery', [RequestController::class, 'store'])->name('enquery.store');
    }
);
