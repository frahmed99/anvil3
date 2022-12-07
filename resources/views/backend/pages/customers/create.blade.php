@extends('backend.layouts.default')

@section('js')
    <!-- jQuery (required for DataTables plugin) -->
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
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
    <div class="block-content block-content-full">
        <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
            <thead>
                <tr>
                    <th>{{ __('Customers') }}</th>
                    <th class="text-center" style="width: 15%;">{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td class="fw-semibold">{{ $customer->name }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-alt-primary me-1" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" title="Edit Customer">
                                <i class="fa fa-fw fa-pen"></i>
                            </button>
                            <a href="{{ route('customer.destroy', $customer->id) }}" type="button"
                                class="btn btn-sm btn-alt-danger me-1" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Delete Customer">
                                <i class="fa fa-fw fa-xmark"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@stop
