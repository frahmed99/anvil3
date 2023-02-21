@extends('backend.pages.settings.index')

@section('title')
    Category - Anvil Accounts
@endsection

@section('js')
    @include('backend.pages.settings.category.partials.scripts')
@stop

@section('subcontent')
    <div class="col-md-7 col-xl-12">
        @include('backend.pages.settings.subcategory.partials.addModal')
        @include('backend.pages.settings.subcategory.partials.editModal')
        <div class="block block-rounded block-themed">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('SUBCATEGORY') }}</h3>
                <div class="block-options">
                    <button href="" type="button" class="btn btn-sm btn-alt-primary" data-bs-toggle="modal"
                        data-bs-target="#addModal">
                        <i class="fa fa-plus opacity-50 me-1"></i>{{ __('Add A Subcategory') }}
                    </button>
                </div>
            </div>
            <div class="block-content">
                <table class="table table-bordered table-striped table-vcenter" id="DataTable">
                    <thead>
                        <tr>
                            <th>SubCategory Name</th>
                            <th>Category</th>
                            <th style="width: 15%;" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    @foreach ($subcategories as $subcategory)
                        <tbody>
                            <tr>
                                <td class="fw-semibold">{{ $subcategory->name }}</td>
                                <td></td>
                                <td class="text-center">
                                    <button type="button" class=" btn btn-sm btn-alt-primary me-1 js-bs-tooltip-enabled"
                                        href="" data-bs-toggle="modal" data-bs-target="#editModal">
                                        <i class="fa fa-fw fa-edit"></i></button>
                                    <button type="button" class="btn btn-sm btn-alt-danger me-1 js-bs-tooltip-enabled"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom">
                                        <i class="fa fa-fw fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
                <div class="col-sm-12 col-md-7">
                </div>
            </div>
        </div>
    </div>
@endsection
