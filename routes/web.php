<?php

use Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\RolesController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\PermissionController;
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

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware([
    'auth',
    'prevent-back-history',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.pages.dashboard.dashboard');
    })->name('dashboard');
    //User Management
    Route::prefix('user')->group(function () {
        Route::get('/index', [UserController::class, 'index'])->name('user.index');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/update/{id}', [UserController::class, 'updateUsers'])->name('user.update');
        Route::get('/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });
    //Profile Management
    Route::prefix('profile')->group(function () {
        Route::get('/index', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('/create', [ProfileController::class, 'create'])->name('profile.create');
        Route::post('/store', [ProfileController::class, 'store'])->name('profile.store');
        Route::get('/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/destroy/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    //Roles Management
    Route::prefix('role')->group(function () {
        Route::get('/index', [RolesController::class, 'index'])->name('role.index');
        Route::get('/create', [RolesController::class, 'create'])->name('role.create');
        Route::post('/store', [RolesController::class, 'store'])->name('role.store');
        Route::get('/edit/{id}', [RolesController::class, 'edit'])->name('role.edit');
        Route::post('/update/{id}', [RolesController::class, 'update'])->name('role.update');
        Route::get('/destroy/{id}', [RolesController::class, 'destroy'])->name('role.destroy');
    });

    //Permission Management
    Route::prefix('permission')->group(function () {
        Route::get('/index', [PermissionController::class, 'index'])->name('permission.index');
        Route::get('/create', [PermissionController::class, 'create'])->name('permission.create');
        Route::post('/store', [PermissionController::class, 'store'])->name('permission.store');
        Route::get('/edit/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
        Route::post('/update/{id}', [PermissionController::class, 'update'])->name('permission.update');
        Route::get('/destroy/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');
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
