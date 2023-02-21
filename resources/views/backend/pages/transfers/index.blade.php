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
                    <table
                        class="table table-sm table-vcenter table-borderless table-striped table-vcenter js-dataTable-buttons"
                        id="myTable">
                        <div class="col-xl-7 mb-4">
                            <input type="text"
                                class="js-flatpickr form-control js-flatpickr-enabled flatpickr-input active"
                                id="example-flatpickr-range" name="example-flatpickr-range" placeholder="Select Date Range"
                                data-mode="range" data-min-date="today" readonly="readonly">
                        </div>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Transfer ID</th>
                                <th class="text-center fw-bold d-none d-sm-table-cell">From Account</th>
                                <th class="text-center fw-bold d-none d-sm-table-cell"></th>
                                <th class="text-center fw-bold d-none d-sm-table-cell">To Account</th>
                                <th class="text-center fw-bold d-none d-sm-table-cell">Amount Sent</th>
                                <th class="text-center fw-bold d-none d-sm-table-cell">Amount Recieved</th>
                                <th class="text-center fw-bold d-none d-sm-table-cell" style="width: 15%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transfers as $transfer)
                                <tr>
                                    <td class="fw-semibold">{{ \Carbon\Carbon::parse($transfer->date)->format('d-m-Y') }}
                                    </td>
                                    <td>{{ $transfer->transferId }}</td>
                                    <td class="text-center fw-semibold"> {{ $transfer->fromAccount->accountName }}</td>
                                    <td class="text-center"><button type="button" class="btn btn-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
                                                </path>
                                            </svg>
                                        </button></td>
                                    <td class="text-center fw-semibold">{{ $transfer->toAccount->accountName }}</td>
                                    <td class="text-center">{{ $transfer->fromAccount->currencyCode }}
                                        {{ $transfer->fromAmount }}</td>
                                    <td class="text-center">{{ $transfer->toAccount->currencyCode }}
                                        {{ $transfer->toAmount }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a type="button" id="edit"
                                                class="btn btn-sm btn-alt-primary me-1 js-bs-tooltip-enabled"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit Transfer"
                                                href="{{ route('transfer.edit', $transfer->id) }}">
                                                <i class="fa fa-fw fa-edit"></i>
                                            </a>
                                            <a type="button" id="reversal"
                                                class="btn btn-sm btn-alt-success me-1 js-bs-tooltip-enabled"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Reverse Transfer"href="{{ route('transfer.reversal', $transfer->id) }}">
                                                <i class="fa-solid fa-arrows-turn-to-dots"></i> <a type="button"
                                                    id="delete"
                                                    class="btn btn-sm btn-alt-danger me-1 js-bs-tooltip-enabled"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="Delete Transfer"
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
