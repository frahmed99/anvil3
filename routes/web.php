<?php

use Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\RolesController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\Auth\ForgotPasswordController;


//Frontend routes

Route::get('/', function () {
    return view('frontend.pages.home');
})->name('home');

Route::get('/blog', function () {
    return view('frontend.pages.blog');
})->name('blog');

Route::get('/contact', function () {
    return view('frontend.pages.contact');
})->name('contact');

Route::get('/policy', function () {
    return view('frontend.pages.policy');
})->name('policy');

Route::get('/pricing', function () {
    return view('frontend.pages.pricing');
})->name('pricing');

Route::get('/terms', function () {
    return view('frontend.pages.terms');
})->name('terms');

Route::get('/services', function () {
    return view('frontend.pages.services');
})->name('services');

//Password Reset Routes

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

//Backend routes


Route::middleware([
    'auth',
    'prevent-back-history',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.pages.dashboard.dashboard');
    })->name('dashboard');

    Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');

    //User Management
    Route::prefix('staff/user')->group(function () {
        Route::get('/index', [UserController::class, 'index'])->name('user.index');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });
    //Profile Management
    Route::prefix('staff/profile')->group(function () {
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/update', [ProfileController::class, 'update'])->name('profile.update');
    });
    //Roles Management
    Route::prefix('staff/role')->group(function () {
        Route::get('/index', [RolesController::class, 'index'])->name('role.index');
        Route::get('/create', [RolesController::class, 'create'])->name('role.create');
        Route::post('/store', [RolesController::class, 'store'])->name('role.store');
        Route::get('/edit/{id}', [RolesController::class, 'edit'])->name('role.edit');
        Route::post('/update/{id}', [RolesController::class, 'update'])->name('role.update');
        Route::get('/destroy/{id}', [RolesController::class, 'destroy'])->name('role.destroy');
    });

    //Customer Management
    Route::prefix('customer')->group(function () {
        Route::get('/index', [CustomerController::class, 'index'])->name('customer.index');
        Route::get('/create', [CustomerController::class, 'create'])->name('customer.create');
        Route::post('/store', [CustomerController::class, 'store'])->name('customer.store');
        Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
        Route::post('/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
        Route::get('/destroy/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
    });

    //Vendor Management
    Route::prefix('vendor')->group(function () {
        Route::get('/index', [VendorController::class, 'index'])->name('vendor.index');
        Route::get('/create', [VendorController::class, 'create'])->name('vendor.create');
        Route::post('/store', [VendorController::class, 'store'])->name('vendor.store');
        Route::get('/edit/{id}', [VendorController::class, 'edit'])->name('vendor.edit');
        Route::post('/update/{id}', [VendorController::class, 'update'])->name('vendor.update');
        Route::get('/destroy/{id}', [VendorController::class, 'destroy'])->name('vendor.destroy');
    });
});
