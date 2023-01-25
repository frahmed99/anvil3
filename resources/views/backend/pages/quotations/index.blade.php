@extends('backend.layouts.default')
@section('title')
    Quotations - Anvil Accounts
@endsection
@section('css')
    @include('backend.pages.quotations.partials.styles')
@stop
@section('js')
    @include('backend.pages.quotations.partials.scripts')
@stop
@section('content')
    <div class="content">
        <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
            <a class="breadcrumb-item" href="{{ '/dashboard' }}">{{ __('Dashboard') }}</a>
            <span class="breadcrumb-item active">{{ __('Quotations') }}</span>
        </nav>
        <div class="block block-themed block-rounded">
            <div class="block-content">
                <h2 class="content-heading d-flex justify-content-between align-items-center">
                    <span>Quotations</span>
                    <a href="{{ route('quotation.create') }}" type="button" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-plus opacity-50 me-1"></i> {{ __('Add Quotation') }}
                    </a>
                </h2>
                <div class="block-content block-content-full">
                    <table class="table table-borderless table-striped table-vcenter js-dataTable-buttons">
                        <thead>
                            <tr>
                                <th class="text-center fw-bold d-none d-sm-table-cell">Quotation</th>
                                <th class="text-center fw-bold d-none d-sm-table-cell">Valid Till</th>
                                <th class="text-center fw-bold d-none d-sm-table-cell">Customer</th>
                                <th class="text-center fw-bold d-none d-sm-table-cell">Subtotal</th>
                                <th class="text-center fw-bold d-none d-sm-table-cell">Status</th>
                                <th class="text-center fw-bold d-none d-sm-table-cell" style="width: 15%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center fw-semibold">QUO 0001</td>
                                <td class="text-center fw-semibold">12/12/11</td>
                                <td class="text-center fw-semibold">Jack Horner</td>
                                <td class="text-center">ZMW 200.00</td>
                                <td class="text-center">Pending</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-alt-success dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="visually-hidden">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" style="">
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="far fa-fw fa-bell me-1"></i> View
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="far fa-fw fa-envelope me-1"></i> Download
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="fa fa-fw fa-pencil-alt me-1"></i> Edit
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="far fa-fw fa-bell me-1"></i> Send
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="far fa-fw fa-envelope me-1"></i> Delete
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="fa fa-fw fa-pencil-alt me-1"></i> Create Invoice
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="far fa-fw fa-bell me-1"></i> Duplicate
                                            </a>
                                        </div>
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
