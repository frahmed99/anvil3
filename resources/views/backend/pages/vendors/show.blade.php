@extends('backend.layouts.default')
@section('title')
    {{ $vendor->name }} - Anvil Accounts
@endsection
@section('css')
    @include('backend.pages.vendors.partials.styles')
@stop
@section('js')
    @include('backend.pages.vendors.partials.scripts')
@stop
@section('content')
    <div class="content">
        <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
            <a class="breadcrumb-item" href="{{ '/dashboard' }}">{{ __('Dashboard') }}</a>
            <a class="breadcrumb-item" href="{{ '/vendor/index' }}">{{ __('Vendors') }}</a>
            <span class="breadcrumb-item active">{{ $vendor->name }}</span>
        </nav>
        <h2 class="content-heading">Overview</h2>
        <div class="row g-sm">
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded block-bordered block-link-pop text-center" href="javascript:void(0)">
                    <div class="block-content">
                        <p class="fs-1">
                            <strong>$499</strong>
                        </p>
                        <p class="fw-medium">
                            Balance
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded block-bordered block-link-pop text-center" href="javascript:void(0)">
                    <div class="block-content">
                        <p class="fs-1 text-elegance">
                            <strong>$200</strong>
                        </p>
                        <p class="fw-medium">
                            Overdue
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded block-bordered block-link-pop text-center" href="javascript:void(0)">
                    <div class="block-content">
                        <p class="fs-1 text-pulse">
                            <strong>3</strong>
                        </p>
                        <p class="fw-medium">
                            Number Of Bills
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded block-bordered block-link-pop text-center" href="javascript:void(0)">
                    <div class="block-content">
                        <p class="fs-1 text-flat">
                            <strong>98.25</strong>
                        </p>
                        <p class="fw-medium">
                            Total Sum Of Bills
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded block-bordered block-link-pop text-center" href="javascript:void(0)">
                    <div class="block-content">
                        <p class="fs-1 text-corporate">
                            <strong>12.63</strong>
                        </p>
                        <p class="fw-medium">
                            Average Sales </p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded block-bordered block-link-pop text-center" href="javascript:void(0)">
                    <div class="block-content">
                        <p class="fs-1 text-earth">
                            <strong>8</strong>
                        </p>
                        <p class="fw-medium">
                            Date Of Creation
                        </p>
                    </div>
                </a>
            </div>
        </div>
        <h2 class="content-heading">Addresses</h2>
        <div class="row">
            <!-- Vendor Information -->
            <div class="col-md-4">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Vendor Information</h3>
                    </div>
                    <div class="block-content">
                        <div class="fs-lg mb-1">{{ $vendor->name }}</div>
                        <address>
                            <br>
                            <br>
                            <br><br>
                            <i class="fa fa-phone me-1"></i>{{ $vendor->contact }}<br>
                            <i class="far fa-envelope me-1"></i> <a href="javascript:void(0)">{{ $vendor->email }}</a>
                        </address>
                    </div>
                </div>
            </div>
            <!-- END Billing Address -->
            <!-- Billing Address -->
            <div class="col-md-4">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Billing Address</h3>
                    </div>
                    <div class="block-content">
                        <div class="fs-lg mb-1">{{ $vendor->company }}</div>
                        <address>
                            {{ $vendor->billingAddress }}
                            <br>
                            <i class="fa fa-phone me-1"></i> Gaines Wolfe Co<br>
                        </address>
                    </div>
                </div>
            </div>
            <!-- END Billing Address -->

            <!-- Shipping Address -->
            <div class="col-md-4">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Shipping Address</h3>
                    </div>
                    <div class="block-content">
                        <div class="fs-lg mb-1">{{ $vendor->company }}</div>
                        <address>
                            {{ $vendor->shippingAddress }}
                            <br>
                            <i class="fa fa-phone me-1"></i> Cline and Ortiz Trading<br>
                        </address>
                    </div>
                </div>
            </div>
            <!-- END Shipping Address -->
        </div>
        <!-- Settings -->
        <h2 class="content-heading">Accounts</h2>
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    <i class="fa fa-pencil-alt fa-fw me-1 text-muted"></i> Bills
                </h3>
            </div>
            <div class="block block-rounded">
                <div class="block-content block-content-full">
                    <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                    <table
                        class="table table-sm table-vcenter table-bordered table-striped table-vcenter js-dataTable-buttons">
                        <thead>
                            <tr>
                                <th>Quotation ID</th>
                                <th>Issue Date</th>
                                <th class="d-none d-sm-table-cell">Amount</th>
                                <th class="d-none d-sm-table-cell text-center">Status</th>
                                <th class="text-center" style="width: 100px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-semibold"></td>
                                <td class="fw-semibold"></td>
                                <td class="d-none d-sm-table-cell"></td>
                                <td class="d-none d-sm-table-cell text-center">
                                    <span class="badge bg-danger">Disabled</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a type="button" class="btn btn-sm btn-alt-primary me-1 js-bs-tooltip-enabled show"
                                            href="" data-bs-placement="bottom"><i
                                                class="fa fas fa-exchange-alt"></i></a>
                                        <a type="button" class="btn btn-sm btn-alt-primary me-1 js-bs-tooltip-enabled show"
                                            href="" data-bs-placement="bottom"><i class="fa fas fa-copy"></i></a>
                                        <a type="button"
                                            class="btn btn-sm btn-alt-primary me-1 js-bs-tooltip-enabled show"
                                            href="" data-bs-placement="bottom"><i class="fa fa-fw fa-eye"></i></a>
                                        <a type="button" id="edit"
                                            class="btn btn-sm btn-alt-primary me-1 js-bs-tooltip-enabled"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit Vendor"
                                            href="">
                                            <i class="fa fa-fw fa-edit"></i>
                                        </a>
                                        <a type="button"
                                            class="btn btn-sm btn-alt-primary me-1 js-bs-tooltip-enabled show"
                                            href="" data-bs-placement="bottom"><i class="fa fas fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
