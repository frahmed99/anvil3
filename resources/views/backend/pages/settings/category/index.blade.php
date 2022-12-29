@extends('backend.pages.settings.index')

@section('subcontent')
    <div class="col-md-7 col-xl-12">
        <!-- Message List -->
        <div class="block block-rounded block-themed">
            <div class="block-header block-header-default">
                <div class="block-title">
                    <h3 class="block-title">Categories</h3>
                </div>
            </div>
            <div class="block-content">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full DataTable" id="DataTable">
                    <thead>
                        <tr>
                            <th>Category Name</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Category Type</th>
                            <th style="width: 15%;" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="fw-semibold"></td>
                            <td class="d-none d-sm-table-cell"></td>
                            <td class="text-center">
                                <a type="button" href="javascript:void(0)"
                                    class=" btn btn-sm btn-alt-primary me-1 js-bs-tooltip-enabled">
                                    <i class="fa fa-fw fa-edit"></i></a>
                                <a type="button" id="delete"
                                    class="btn btn-sm btn-alt-primary me-1 js-bs-tooltip-enabled" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="" href="">
                                    <i class="fa fa-fw fa-times"></i>
                                </a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Message List -->
    </div>
@endsection
