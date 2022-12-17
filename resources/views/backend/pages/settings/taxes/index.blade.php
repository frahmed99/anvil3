@extends('backend.pages.settings.index')

@section('subcontent')
    <div class="col-md-7 col-xl-12">
        <!-- Message List -->
        <div class="block block-rounded block-themed">
            <div class="block-header block-header-default">
                <div class="block-title">
                    <h3 class="block-title">Taxes</h3>
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
                                    <a type="button" href="javascript:void(0)" onclick="fetchtaxes('{{ $tax->id }}')"
                                        class=" btn btn-sm btn-alt-primary me-1 js-bs-tooltip-enabled">
                                        <i class="fa fa-fw fa-edit"></i></a>
                                    <a type="button" id="delete"
                                        class="btn btn-sm btn-alt-primary me-1 js-bs-tooltip-enabled"
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
