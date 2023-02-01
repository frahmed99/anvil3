@extends('backend.layouts.default')
@section('title')
    Banks - Anvil Accounts
@endsection
@section('css')
    @include('backend.pages.banks.partials.styles')
@stop
@section('js')
    @include('backend.pages.banks.partials.scripts')
@stop
@section('content')
    <div class="content">
        <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
            <a class="breadcrumb-item" href="{{ '/dashboard' }}">{{ __('Dashboard') }}</a>
            <span class="breadcrumb-item active">{{ __('Banks') }}</span>
        </nav>
        <div class="block block-themed block-rounded">
            <div class="block-content">
                <h2 class="content-heading d-flex justify-content-between align-items-center">
                    <span>Accounts</span>
                    <a href="{{ route('bank.create') }}" type="button" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-plus opacity-50 me-1"></i> {{ __('Add Account') }}
                    </a>
                </h2>
                <div class="block-content block-content-full">
                    <table class="table table-borderless table-striped table-vcenter js-dataTable-buttons">
                        <thead>
                            <tr>
                                <th class="fw-bold text-center">Account Name</th>
                                <th class="fw-bold text-center">Bank Name</th>
                                <th class="fw-bold d-none d-sm-table-cell text-center">Account Number</th>
                                <th class="fw-bold d-none d-sm-table-cell text-center">Current Balance</th>
                                <th class="fw-bold d-none d-sm-table-cell text-center" style="width: 15%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banks as $bank)
                                <tr>
                                    <td class="fw-bold text-center">{{ $bank->accountName }}</td>
                                    <td class="fw-bold text-center">{{ $bank->bankName }}</td>
                                    <td class="d-none d-sm-table-cell text-center">{{ $bank->accountNumber }}</td>
                                    <td class="d-none d-sm-table-cell text-center">{{ $bank->currencyCode }}
                                        {{ $bank->balance }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a type="button" id="show"
                                                class="btn btn-sm btn-alt-success me-1 js-bs-tooltip-enabled"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Show Bank"
                                                href="{{ route('bank.show', $bank->id) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a type="button" id="edit"
                                                class="btn btn-sm btn-alt-primary me-1 js-bs-tooltip-enabled"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit Bank"
                                                href="{{ route('bank.edit', $bank->id) }}">
                                                <i class="fa fa-fw fa-edit"></i>
                                            </a>
                                            <a type="button" id="delete"
                                                class="btn btn-sm btn-alt-danger me-1 js-bs-tooltip-enabled"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete Bank"
                                                href="{{ route('bank.destroy', $bank->id) }}">
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
