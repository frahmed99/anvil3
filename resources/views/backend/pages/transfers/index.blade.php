@extends('backend.layouts.default')
@section('title')
    Transfers - Anvil Accounts
@endsection
@section('css')
    @include('backend.pages.transfers.partials.styles')
@stop
@section('js')
    @include('backend.pages.transfers.partials.scripts')
@stop
@section('content')
    <div class="content">
        <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
            <a class="breadcrumb-item" href="{{ '/dashboard' }}">{{ __('Dashboard') }}</a>
            <span class="breadcrumb-item active">{{ __('Transfers') }}</span>
        </nav>
        <div class="block block-themed block-rounded">
            <div class="block-content">
                <h2 class="content-heading d-flex justify-content-between align-items-center">
                    <span>Transfers</span>
                    <a href="{{ route('transfer.create') }}" type="button" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-plus opacity-50 me-1"></i> {{ __('Add Transfer') }}
                    </a>
                </h2>
                <div class="block-content block-content-full">
                    <table class="table table-borderless table-striped table-vcenter js-dataTable-buttons">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>From Account</th>
                                <th class="d-none d-sm-table-cell">To Account</th>
                                <th class="d-none d-sm-table-cell">Amount</th>
                                <th class="d-none d-sm-table-cell" style="width: 15%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transfers as $transfer)
                                <tr>
                                    <td class="fw-semibold">{{ $transfer->date }}</td>
                                    <td class="fw-semibold">{{ $transfer->fromAccount }}</td>
                                    <td class="d-none d-sm-table-cell">{{ $transfer->toAccount }}</td>
                                    <td class="d-none d-sm-table-cell">ZMK 5689.33</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a type="button" id="edit"
                                                class="btn btn-sm btn-alt-primary me-1 js-bs-tooltip-enabled"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit Transfer"
                                                href="{{ route('transfer.edit', $transfer->id) }}">
                                                <i class="fa fa-fw fa-edit"></i>
                                            </a>
                                            <a type="button" id="delete"
                                                class="btn btn-sm btn-alt-danger me-1 js-bs-tooltip-enabled"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete Transfer"
                                                href="{{ route('transfer.destroy', $transfer->id) }}">
                                                <i class="fa fa-fw fa-xmark"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
