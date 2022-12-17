@extends('backend.layouts.default')
@section('title')
    Taxes - Anvil Accounts
@endsection

@section('css')
@stop

@section('js')
@stop
@section('content')
    <div class="content">
        <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
            <a class="breadcrumb-item" href="{{ '/dashboard' }}">Dashboard</a>
            <span class="breadcrumb-item active">Taxes</span>
        </nav>
        <div class="row">
            <div class="col-md-5 col-xl-3">
                <!-- Collapsible Inbox Navigation -->
                <div class="js-inbox-nav d-none d-md-block">
                    <div class="block block-rounded block-themed">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Navigation</h3>
                            <div class="block-options">
                                <div class="dropdown">
                                    <button type="button" class="btn-block-option" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-fw fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="fa fa-fw fa-flask opacity-50 me-1"></i> Filter
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="fa fa-fw fa-cogs opacity-50 me-1"></i> Manage
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-content p-3">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center justify-content-between active"
                                        href="{{ route('tax.index') }}">
                                        <span><i class="fa fa-fw fa-inbox opacity-50 me-1"></i>Taxes</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <hr class="my-1">
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center justify-content-between"
                                        href="javascript:void(0)">
                                        <span><i class="fa fa-fw fa-star opacity-50 me-1"></i>Category</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <hr class="my-1">
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center justify-content-between"
                                        href="javascript:void(0)">
                                        <span><i class="fa fa-fw fa-paper-plane opacity-50 me-1"></i>Unit</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <hr class="my-1">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- END Collapsible Inbox Navigation -->
            </div>
            <div class="col-md-7 col-xl-9">
                <!-- SubContent -->
                @yield('subcontent')
                <!-- END SubContent -->
            </div>
        </div>
    </div>
@stop
