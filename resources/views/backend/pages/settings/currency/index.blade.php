@extends('backend.pages.settings.index')

@section('title')
    Currencies - Anvil Accounts
@endsection

@section('css')
    @include('backend.pages.settings.currency.partials.styles')
@stop

@section('js')
    @include('backend.pages.settings.currency.partials.scripts')
@stop

@include('backend.pages.settings.currency.partials.addModal')

@section('subcontent')
    <div class="block-header block-header-default">
        <h3 class="block-title">{{ __('Currency') }}</h3>
        <div class="block-options">
            <button href="" type="button" class="btn btn-sm btn-alt-primary" data-bs-toggle="modal"
                data-bs-target="#addModal">
                <i class="fa fa-plus opacity-50 me-1"></i>{{ __('Add Currency') }}
            </button>
        </div>
    </div>
    <div class="block-content">
        <table class="table table-bordered table-striped table-vcenter">
            <thead>
                <tr>
                    <th class="text-center">Currency Name</th>
                    <th class="text-center">Currency Symbol</th>
                    <th class="text-center">Currency Code</th>
                    <th style="width: 15%;" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="fw-semibold"></td>
                    <td></td>
                    <td></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a type="button" id="edit" class="btn btn-sm btn-alt-primary me-1 js-bs-tooltip-enabled"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit Transfer" href="">
                                <i class="fa fa-fw fa-edit"></i>
                            </a>
                            <a type="button" id="delete" class="btn btn-sm btn-alt-danger me-1 js-bs-tooltip-enabled"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete Transfer" href="">
                                <i class="fa fa-fw fa-xmark"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div>
        </div>
    </div>
@endsection
