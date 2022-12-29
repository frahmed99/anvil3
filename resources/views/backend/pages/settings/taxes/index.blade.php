@extends('backend.pages.settings.index')

@section('title')
    Taxes - Anvil Accounts
@endsection

@section('css')
    @include('backend.pages.settings.taxes.partials.styles')
@stop
@section('js')
    @include('backend.pages.settings.taxes.partials.scripts')
@stop

@section('subcontent')
    <div class="col-md-7 col-xl-12">
        <!-- Message List -->
        <div class="block block-rounded block-themed">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('Taxes') }}</h3>
                <div class="block-options">
                    <button href="" type="button" class="btn btn-sm btn-alt-primary"
                        onclick="Codebase.block('open', '#cb-add-tax');">
                        <i class="fa fa-plus opacity-50 me-1"></i>{{ __('Add Tax') }}
                    </button>
                </div>
            </div>
            <div id="cb-add-tax" class="block block-rounded bg-body-light animated fadeIn d-none">
                <div class="block-header">
                    <h3 class="block-title">New Tax</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="close">
                            <i class="far fa-circle-xmark"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <form action="{{ route('tax.store') }}" method="POST">
                        @csrf
                        <div class="row g-sm items-push">
                            <div class="col-md-5">
                                <div class="input-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" placeholder="Tax Name">
                                </div>
                                <span style="color:red">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <input type="text" class="form-control @error('rate') is-invalid @enderror"
                                        id="rate" name="rate" placeholder="Tax Rate %">
                                </div>
                                <span style="color:red">
                                    @error('rate')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-alt-success w-100">
                                    <i class="opacity-50 fa fa-plus me-1"></i> Add Tax
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="cb-edit-tax" class="block block-rounded bg-body-light animated fadeIn d-none">
                <div class="block-header">
                    <h3 class="block-title">Edit Tax</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="close">
                            <i class="far fa-circle-xmark"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <form action="" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="row g-sm items-push">
                            <div class="col-md-5">
                                <div class="input-group">
                                    <input type="text" class="form-control @error('editname') is-invalid @enderror"
                                        id="name" name="name" placeholder="Tax Name" value="">
                                </div>
                                <span style="color:red">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <input type="text" class="form-control @error('editrate') is-invalid @enderror"
                                        id="rate" name="rate" placeholder="Tax Rate %" value="">
                                </div>
                                <span style="color:red">
                                    @error('rate')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-alt-success w-100">
                                    <i class="opacity-50 fa fa-plus me-1"></i> Add Tax
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="block-content">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full DataTable" id="DataTable">
                    <thead>
                        <tr>
                            <th>Tax Name</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Tax Rate %</th>
                            <th style="width: 15%;" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($taxes as $tax)
                            <tr>
                                <td class="fw-semibold">{{ $tax->name }}</td>
                                <td class="d-none d-sm-table-cell">{{ $tax->rate }}</td>
                                <td class="text-center">
                                    <a type="button" href="javascript:void(0)"
                                        class=" btn btn-sm btn-alt-primary me-1 js-bs-tooltip-enabled" href=""
                                        onclick="Codebase.block('open', '#cb-edit-tax');">
                                        <i class="fa fa-fw fa-edit"></i></a>
                                    <a type="button" id="delete"
                                        class="btn btn-sm btn-alt-danger me-1 js-bs-tooltip-enabled"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                        href="{{ route('tax.destroy', $tax->id) }}">
                                        <i class="fa fa-fw fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Message List -->
    </div>
@endsection
