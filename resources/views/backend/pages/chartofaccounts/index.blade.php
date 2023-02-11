@extends('backend.layouts.default')
@section('title')
    Chart Of Accounts - Anvil Accounts
@endsection
@section('css')
    @include('backend.pages.chartofaccounts.partials.styles')
@stop
@section('js')
    @include('backend.pages.chartofaccounts.partials.scripts')
@stop
@section('content')
    <div class="content">
        <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
            <a class="breadcrumb-item" href="{{ '/dashboard' }}">{{ __('Dashboard') }}</a>
            <span class="breadcrumb-item active">{{ __('Chart Of Accounts') }}</span>
        </nav>
        <div class="block block-themed block-rounded">
            <div class="block-content">
                <h2 class="content-heading d-flex justify-content-between align-items-center">
                    <span class="fw-semibold">Chart Of Accounts</span>
                    <button type="button" class="btn btn-sm btn-alt-primary" data-bs-toggle="modal"
                        data-bs-target="#addChartOfAccounts">
                        <i class="fa fa-plus opacity-50 me-1"></i> {{ __('Add A New Account') }}
                    </button>
                </h2>
            </div>
        </div>
        @include('backend.pages.chartofaccounts.partials.addModal')
        <div class="col-lg-12">
            <!-- Block Tabs Alternative Style -->
            <div class="block block-rounded overflow-hidden">
                <ul class="nav nav-tabs nav-tabs-block justify-content-center" role="tablist">
                    @foreach ($types as $type)
                        <li class="nav-item" role="presentation">
                            <a class="nav-link @if ($loop->first) active @endif" data-bs-toggle="tab"
                                href="#tab{{ $type->id }}" role="tab" aria-controls="btabswo-static-home"
                                aria-selected="false" tabindex="-1">{{ $type->name }}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach ($types as $type)
                        <div id="tab{{ $type->id }}" class="tab-pane @if ($loop->first) active @endif">
                            <table class="js-table-sections table table-hover" id="tab{{ $type->id }}">
                                @foreach ($subtypes as $subtype)
                                    @if ($subtype->chart_of_accounts_types_id == $type->id)
                                        <tbody class="js-table-sections-header">
                                            <tr>
                                                <td class="text-center">
                                                    <i class="fa fa-angle-right"></i>
                                                </td>
                                                <td class="fw-bold text-primary">{{ $subtype->name }}</td>
                                                <td>
                                                    {{ $subtype->description }}
                                                </td>
                                                <td></td>
                                            </tr>
                                        <tbody>
                                            @foreach ($accounts as $account)
                                                @if ($account->chart_of_accounts_subtypes_id == $subtype->id)
                                                    <tr>
                                                        <td>{{ $account->code }}</td>
                                                        <td class="fw-bold link-fx text-earth">{{ $account->name }}
                                                        </td>
                                                        <td class="fw-normal">{{ $account->description }}</td>
                                                        <td style="width: 10%;">
                                                            <a type="button" href="javascript:void(0)"
                                                                onclick="fetchChartOfAccounts('{{ $account->id }}')"
                                                                class=" btn btn-sm btn-alt-primary me-1 js-bs-tooltip-enabled"
                                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title="Edit Account">
                                                                <i class="fa fa-fw fa-edit"></i>
                                                            </a>
                                                            <a type="button" id="delete"
                                                                class="btn btn-sm btn-alt-danger me-1 js-bs-tooltip-enabled"
                                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title="Delete Account"
                                                                href="{{ route('chartofaccounts.destroy', $account->id) }}">
                                                                <i class="fa fa-fw fa-xmark"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- END Block Tabs Alternative Style -->
        </div>
        @include('backend.pages.chartofaccounts.partials.editModal')
    </div>
@stop
