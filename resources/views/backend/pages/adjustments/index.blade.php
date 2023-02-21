@extends('backend.layouts.default')
@section('title')
    Adjustments - Anvil Accounts
@endsection
@section('css')
    @include('backend.pages.adjustments.partials.styles')
@stop
@section('js')
    @include('backend.pages.adjustments.partials.scripts')
@stop

@section('content')
    <div class="content">
        <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
            <a class="breadcrumb-item" href="{{ '/dashboard' }}">{{ __('Dashboard') }}</a>
            <span class="breadcrumb-item active">{{ __('Adjustments') }}</span>
        </nav>
        <div class="block block-themed block-rounded">
            <div class="block-content">
                <h2 class="content-heading d-flex justify-content-between align-items-center">
                    <span>Accounts</span>
                    <a href="{{ route('adjustment.create') }}" type="button" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-plus opacity-50 me-1"></i> {{ __('Add Adjustment') }}
                    </a>
                </h2>
                <div class="block-content block-content-full">
                    <table
                        class="table table-sm table-vcenter table-borderless table-striped table-vcenter js-dataTable-buttons">
                        <thead>
                            <tr>
                                <th class="fw-bold text-center">Date</th>
                                <th class="fw-bold text-center">Adjustment ID</th>
                                <th class="fw-bold text-center">Bank Name</th>
                                <th class="fw-bold d-none d-sm-table-cell text-center">Type</th>
                                <th class="fw-bold d-none d-sm-table-cell text-center">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($adjustments as $adjustment)
                                <tr>
                                    <td class="fw-semibold text-center">
                                        {{ \Carbon\Carbon::parse($adjustment->date)->format('d-m-Y') }}
                                    </td>
                                    <td class="text-center fw-semibold">{{ $adjustment->adjustmentId }}</td>
                                    <td class="text-center fw-semibold">
                                        {{ $banks->where('id', $adjustment->bank_id)->first()->accountName }}</td>
                                    <td class="text-center">
                                        <span
                                            class="badge
                                                @if ($adjustment->type === 'Debit') bg-success
                                                @elseif ($adjustment->type === 'Credit')
                                                bg-danger @endif">
                                            {{ $adjustment->type }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        {{ $banks->where('id', $adjustment->bank_id)->first()->currencyCode }}
                                        {{ $adjustment->amount }}
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
