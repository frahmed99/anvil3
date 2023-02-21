@extends('backend.layouts.default')
@section('title')
    {{ $bank->accountName }} - Anvil Accounts
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
            <a class="breadcrumb-item" href="{{ '/bank/accounts/index' }}">{{ __('Banks') }}</a>
            <span class="breadcrumb-item active">{{ $bank->accountName }}</span>
        </nav>
        <h2 class="content-heading">Overview</h2>
        <div class="row g-sm">
            <div class="col-md-6 col-xl-2">
                <a class="block block-rounded block-transparent bg-gd-elegance" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-chart-area text-white-75"></i>
                            </div>
                        </div>
                        <div class="py-3 text-center">
                            <div class="fs-2 fw-bold mb-0 text-white">{{ $bank->currencyCode }} {{ $creditAmount }}</div>
                            <div class="fs-sm fw-semibold text-uppercase text-white-75">Credit Amount</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-2">
                <a class="block block-rounded block-transparent bg-gd-elegance" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-chart-area text-white-75"></i>
                            </div>
                        </div>
                        <div class="py-3 text-center">
                            <div class="fs-2 fw-bold mb-0 text-white">{{ $bank->currencyCode }} {{ $debitAmount }}</div>
                            <div class="fs-sm fw-semibold text-uppercase text-white-75">Debit Amount</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-2">
                <a class="block block-rounded block-transparent bg-gd-elegance" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-chart-area text-white-75"></i>
                            </div>
                        </div>
                        <div class="py-3 text-center">
                            <div class="fs-2 fw-bold mb-0 text-white">{{ $totalTransactions }}</div>
                            <div class="fs-sm fw-semibold text-uppercase text-white-75">Total Transactions</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-2">
                <a class="block block-rounded block-transparent bg-gd-dusk" href="be_pages_ecom_orders.html">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-arrow-right-long text-white-75"></i>
                            </div>
                        </div>
                        <div class="py-3 text-center">
                            <div class="fs-2 fw-bold mb-0 text-white">{{ $totalTransactionsThisMonth }}</div>
                            <div class="fs-sm fw-semibold text-uppercase text-white-75">Transactions This Month</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-2">
                <a class="block block-rounded block-transparent bg-gd-sea" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-arrow-left-long text-white-75"></i>
                            </div>
                        </div>
                        <div class="py-3 text-center">
                            <div class="fs-2 fw-bold mb-0 text-white">{{ $totalTransactionsThisWeek }}</div>
                            <div class="fs-sm fw-semibold text-uppercase text-white-75">Transactions This Week</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-2">
                <a class="block block-rounded block-transparent bg-gd-aqua" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-money-bills text-white-75"></i>
                            </div>
                        </div>
                        <div class="py-3 text-center">
                            <div class="fs-2 fw-bold mb-0 text-white">{{ $bank->currencyCode }} {{ $bank->balance }}</div>
                            <div class="fs-sm fw-semibold text-uppercase text-white-75">Available Balance</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- Settings -->
        <h2 class="content-heading">Account Transactions</h2>
        <div class="block block-rounded">
            <div class="block block-rounded">
                <div class="block-content block-content-full">
                    <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                    <table
                        class="table table-sm table-vcenter table-borderless table-striped table-vcenter js-dataTable-buttons">
                        <thead>
                            <tr>
                                <th class="fw-bold text-center">Date</th>
                                <th class="fw-bold text-center">Transfer Id</th>
                                <th class="fw-bold text-center">Amount</th>
                                <th class="fw-bold text-center">Type</th>
                                <th class="fw-bold text-center">Reason</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transfers as $transfer)
                                <tr>
                                    <td class="fw-bold text-center">
                                        {{ \Carbon\Carbon::parse($transfer->date)->format('d-m-Y') }}</td>
                                    <td class="fw-bold text-center">{{ $transfer->transferId }}</td>
                                    <td class="text-center">
                                        @if ($transfer->from_account_id == $bank->id)
                                            {{ $bank->currencyCode }} {{ $transfer->fromAmount }}
                                        @else
                                            {{ $bank->currencyCode }} {{ $transfer->toAmount }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($transfer->from_account_id == $bank->id)
                                            Debit
                                        @else
                                            Credit
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $transfer->reference }}</td>
                                </tr>
                            @endforeach
                            @foreach ($adjustments as $adjustment)
                                <tr>
                                    <td class="fw-bold text-center">
                                        {{ \Carbon\Carbon::parse($adjustment->created_at)->format('d-m-Y') }}</td>
                                    <td class="fw-bold text-center">{{ $adjustment->adjustmentId }}</td>
                                    <td class="text-center">{{ $bank->currencyCode }} {{ $adjustment->amount }}</td>
                                    <td class="text-center">{{ $adjustment->type }}</td>
                                    <td class="text-center">{{ $adjustment->reason }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
