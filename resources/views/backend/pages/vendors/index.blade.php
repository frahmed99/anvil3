@extends('backend.layouts.default')
@section('title')
    Vendors - Anvil Accounts
@endsection
@section('css')
    @include('backend.pages.vendors.partials.styles')
@stop
@section('js')
    @include('backend.pages.vendors.partials.scripts')
@stop
@section('content')
    <div class="content">
        <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
            <a class="breadcrumb-item" href="{{ '/dashboard' }}">{{ __('Dashboard') }}</a>
            <span class="breadcrumb-item active">{{ __('Vendors') }}</span>
        </nav>
        <div class="block block-themed block-rounded">
            <div class="block-content">
                <h2 class="content-heading d-flex justify-content-between align-items-center">
                    <span>Vendors</span>
                    <a href="{{ route('vendor.create') }}" type="button" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-plus opacity-50 me-1"></i> {{ __('Add Vendor') }}
                    </a>
                </h2>
                <div class="block-content block-content-full">
                    <table
                        class="table table-sm table-vcenter table-sm table-borderless table-striped table-vcenter js-dataTable-buttons">
                        <thead>
                            <tr>
                                <th>Vendor ID</th>
                                <th>Name</th>
                                <th class="d-none d-sm-table-cell">Contact</th>
                                <th class="d-none d-sm-table-cell">Email</th>
                                <th class="d-none d-sm-table-cell" style="width: 15%;">Balance</th>
                                <th class="d-none d-sm-table-cell" style="width: 15%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vendors as $vendor)
                                <tr>
                                    <td class="fw-semibold">{{ $vendor->vendorId }}</td>
                                    <td class="fw-semibold">{{ $vendor->name }}</td>
                                    <td class="d-none d-sm-table-cell">{{ $vendor->contact }}</td>
                                    <td class="d-none d-sm-table-cell">{{ $vendor->email }}</td>
                                    <td class="d-none d-sm-table-cell text-center">
                                        <span class="badge bg-danger">Disabled</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a type="button" class="btn btn-sm btn-alt-success me-1 js-bs-tooltip-enabled"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Show Vendor"
                                                href="{{ route('vendor.show', $vendor->id) }}" data-bs-placement="bottom"><i
                                                    class="fa fa-fw fa-eye"></i></a>
                                            <a type="button" id="edit"
                                                class="btn btn-sm btn-alt-primary me-1 js-bs-tooltip-enabled"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit Vendor"
                                                href="{{ route('vendor.edit', $vendor->id) }}">
                                                <i class="fa fa-fw fa-edit"></i>
                                            </a>
                                            <a type="button" id="delete"
                                                class="btn btn-sm btn-alt-danger me-1 js-bs-tooltip-enabled"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete Vendor"
                                                href="{{ route('vendor.destroy', $vendor->id) }}">
                                                <i class="fa fa-fw fa-xmark"></i>
                                            </a>
                                        </div>
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
