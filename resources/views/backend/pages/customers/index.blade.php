@extends('backend.layouts.default')
@section('title')
    Customers - Anvil Accounts
@endsection
@section('css')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
@stop

@section('js')
    <!-- jQuery (required for DataTables plugin) -->
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>
    <!-- Page JS Code -->
    @vite(['/resources/js/pages/datatables.js'])
@stop

@section('content')
    <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
        <a class="breadcrumb-item" href="{{ '/dashboard' }}">Dashboard</a>
        <span class="breadcrumb-item active">Customers</span>
    </nav>
    <div class="block block-themed block-rounded">
        <div class="block-header">
            <h3 class="block-title">Customers</h3>
            <div class="block-options">
                <button type="button" class="btn btn-sm btn-alt-primary">
                    <i class="fa fa-plus opacity-50 me-1"></i> Add Customer
                </button>
            </div>
        </div>
    </div>
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                Manage <small>Customers</small>
            </h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-vcenter js-dataTable-responsive dataTable no-footer dtr-inline">
                <thead>
                    <tr>
                        <th>Customer ID</th>
                        <th>Name</th>
                        <th class="d-none d-sm-table-cell">Phone</th>
                        <th class="d-none d-sm-table-cell">Email</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Balance</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($allData as $key => $customer) --}}
                    <tr>
                        <td class="fw-semibold"><a href="">Cust-101010101</td>
                        <td class="fw-semibold">Joseph Thomas</td>
                        <td class="d-none d-sm-table-cell">+26096123562</td>
                        <td class="d-none d-sm-table-cell">frahmed99@gmail.com</td>
                        <td class="d-none d-sm-table-cell text-center">
                            <span class="badge bg-danger">Disabled</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a type="button" class="btn btn-sm btn-alt-primary me-1 js-bs-tooltip-enabled show"
                                    href="" data-bs-placement="bottom"><i class="fa fa-fw fa-eye"></i></a>
                                <a type="button" id="edit"
                                    class="btn btn-sm btn-alt-primary me-1 js-bs-tooltip-enabled" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Edit Customer" href="">
                                    <i class="fa fa-fw fa-edit"></i>
                                </a>
                                <a type="button" id="delete"
                                    class="btn btn-sm btn-alt-danger me-1 js-bs-tooltip-enabled" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Edit Customer" href="">
                                    <i class="fa fa-fw fa-xmark"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    {{-- @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
@stop
