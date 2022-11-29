<?php

use Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\RolesController;
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
    'prevent-back-history',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.pages.dashboard.dashboard');
    })->name('dashboard');
    //User Management
    Route::prefix('user')->group(function(){
        Route::get('/index', [UserController::class, 'index'])->name('user.index');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });
    //Profile Management

    //Roles Management
    Route::prefix('role')->group(function(){
        Route::get('/index', [RolesController::class, 'index'])->name('role.index');
        Route::get('/create', [RolesController::class, 'create'])->name('role.create');
        Route::post('/store', [RolesController::class, 'store'])->name('role.store');
        Route::get('/edit/{id}', [RolesController::class, 'edit'])->name('role.edit');
        Route::post('/update/{id}', [RolesController::class, 'update'])->name('role.update');
        Route::get('/destroy/{id}', [RolesController::class, 'destroy'])->name('role.destroy');
    });
});
