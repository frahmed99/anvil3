@extends('backend.layouts.default')
@section('title')
    Taxes - Anvil Accounts
@endsection

@section('content')
    <div class="content">
        <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
            <a class="breadcrumb-item" href="{{ '/dashboard' }}">Dashboard</a>
            <span class="breadcrumb-item active">Settings</span>
        </nav>
        <div class="row">
            <div class="col-md-5 col-xl-3">
                <div class="js-inbox-nav d-none d-md-block">
                    <div class="block block-rounded block-themed">
                        <div class="block-content p-3">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center justify-content-between {{ request()->is('settings/tax/*') ? ' active' : '' }}"
                                        href="{{ route('tax.index') }}">
                                        <span><i class="fa fa-fw fa-inbox opacity-50 me-1"></i>Taxes</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <hr class="my-1">
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link{{ request()->is('settings/category/*') ? ' active' : '' }} d-flex align-items-center justify-content-between"
                                        href="{{ route('category.index') }}">
                                        <span><i class="fa fa-fw fa-star opacity-50 me-1"></i>Category</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <hr class="my-1">
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link{{ request()->is('settings/unit/*') ? ' active' : '' }} d-flex align-items-center justify-content-between"
                                        href="{{ route('unit.index') }}">
                                        <span><i class="fa fa-fw fa-paper-plane opacity-50 me-1"></i>Unit</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <hr class="my-1">
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link{{ request()->is('setting/general-settings/*') ? ' active' : '' }} d-flex align-items-center justify-content-between"
                                        href="{{ route('general.index') }}">
                                        <span><i class="fa fa-fw fa-paper-plane opacity-50 me-1"></i>Company Settings</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <hr class="my-1">
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link{{ request()->is('setting/currency/*') ? ' active' : '' }} d-flex align-items-center justify-content-between"
                                        href="{{ route('currency.index') }}">
                                        <span><i class="fa fa-fw fa-paper-plane opacity-50 me-1"></i>Currency
                                            Settings</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <hr class="my-1">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-xl-9">
                <!-- SubContent -->
                @yield('subcontent')
                <!-- END SubContent -->
            </div>
        </div>

    </div>
@stop
