<?php

use Auth\LoginController;
use App\Http\Livewire\Tax\TaxIndex;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\RolesController;
use App\Http\Controllers\Settings\TaxController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\Settings\UnitController;
use App\Http\Controllers\Settings\CategoryController;
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
    //Auth Routes
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
        Route::get('/show/{id}', [CustomerController::class, 'show'])->name('customer.show');
        Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
        Route::post('/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
        Route::get('/destroy/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
    });

    //Vendor Management
    Route::prefix('vendor')->group(function () {
        Route::get('/index', [VendorController::class, 'index'])->name('vendor.index');
        Route::get('/create', [VendorController::class, 'create'])->name('vendor.create');
        Route::post('/store', [VendorController::class, 'store'])->name('vendor.store');
        Route::get('/show/{id}', [VendorController::class, 'show'])->name('vendor.show');
        Route::get('/edit/{id}', [VendorController::class, 'edit'])->name('vendor.edit');
        Route::post('/update/{id}', [VendorController::class, 'update'])->name('vendor.update');
        Route::get('/destroy/{id}', [VendorController::class, 'destroy'])->name('vendor.destroy');
    });

    //Tax Management Using Livewire
    Route::prefix('settings/tax')->group(function () {
        Route::get('/index', [TaxController::class, 'index'])->name('tax.index');
    });
    //Category Management Using Livewire
    Route::prefix('settings/category')->group(function () {
        Route::get('/index', [CategoryController::class, 'index'])->name('category.index');
    });
    //Unit Management Using Livewire
    Route::prefix('settings/unit')->group(function () {
        Route::get('/index', [UnitController::class, 'index'])->name('unit.index');
    });
    //Currency Management
    Route::prefix('setting/currency')->group(function () {
        Route::get('/index', [CurrencyController::class, 'index'])->name('currency.index');
        Route::get('/create', [CurrencyController::class, 'create'])->name('currency.create');
        Route::post('/store', [CurrencyController::class, 'store'])->name('currency.store');
        Route::get('/show/{id}', [CurrencyController::class, 'show'])->name('currency.show');
        Route::get('/edit/{id}', [CurrencyController::class, 'edit'])->name('currency.edit');
        Route::post('/update/{id}', [CurrencyController::class, 'update'])->name('currency.update');
        Route::get('/destroy/{id}', [CurrencyController::class, 'destroy'])->name('currency.destroy');
        Route::get('/autocomplete', [CurrencyController::class, 'autocomplete'])->name('currency.autocomplete');
    });
    //Company Management
    Route::prefix('setting/company')->group(function () {
        Route::get('/index', [CompanyController::class, 'index'])->name('company.index');
        Route::get('/create', [CompanyController::class, 'create'])->name('company.create');
        Route::post('/store', [CompanyController::class, 'store'])->name('company.store');
        Route::get('/show/{id}', [CompanyController::class, 'show'])->name('company.show');
        Route::get('/edit/{id}', [CompanyController::class, 'edit'])->name('company.edit');
        Route::post('/update/{id}', [CompanyController::class, 'update'])->name('company.update');
    });
    //Bank Management
    Route::prefix('bank/accounts')->group(function () {
        Route::get('/index', [BankController::class, 'index'])->name('bank.index');
        Route::get('/create', [BankController::class, 'create'])->name('bank.create');
        Route::post('/store', [BankController::class, 'store'])->name('bank.store');
        Route::get('/show/{id}', [BankController::class, 'show'])->name('bank.show');
        Route::get('/edit/{id}', [BankController::class, 'edit'])->name('bank.edit');
        Route::post('/update/{id}', [BankController::class, 'update'])->name('bank.update');
        Route::get('/destroy/{id}', [BankController::class, 'destroy'])->name('bank.destroy');
    });
    Route::prefix('bank/transfers')->group(function () {
        Route::get('/index', [TransferController::class, 'index'])->name('transfer.index');
        Route::get('/create', [TransferController::class, 'create'])->name('transfer.create');
        Route::post('/store', [TransferController::class, 'store'])->name('transfer.store');
        Route::get('/show/{id}', [TransferController::class, 'show'])->name('transfer.show');
        Route::get('/edit/{id}', [TransferController::class, 'edit'])->name('transfer.edit');
        Route::post('/update/{id}', [TransferController::class, 'update'])->name('transfer.update');
        Route::get('/reversal/{id}', [TransferController::class, 'reversal'])->name('transfer.reversal');
        Route::get('/destroy/{id}', [TransferController::class, 'destroy'])->name('transfer.destroy');
        Route::get('/reversal/{id}', [TransferController::class, 'reversal'])->name('transfer.reversal');
    });
    Route::prefix('income/quotations')->group(function () {
        Route::get('/index', [QuotationController::class, 'index'])->name('quotation.index');
        Route::get('/create', [QuotationController::class, 'create'])->name('quotation.create');
        Route::post('/store', [QuotationController::class, 'store'])->name('quotation.store');
        Route::get('/show/{id}', [QuotationController::class, 'show'])->name('quotation.show');
        Route::get('/edit/{id}', [QuotationController::class, 'edit'])->name('quotation.edit');
        Route::post('/update/{id}', [QuotationController::class, 'update'])->name('quotation.update');
        Route::get('/destroy/{id}', [QuotationController::class, 'destroy'])->name('quotation.destroy');
    });
});
