@extends('backend.layouts.default')
@section('title')
    Roles - Anvil Accounts
@endsection
@section('js')
    @include('backend.pages.roles.partials.scripts')
@stop
@section('content')
    <div class="content">
        <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
            <a class="breadcrumb-item" href="{{ '/dashboard' }}">{{ __('Dashboard') }}</a>
            <span class="breadcrumb-item active">{{ __('Roles') }}</span>
        </nav>
        <div class="block block-themed block-rounded">
            <div class="block-content">
                <h2 class="content-heading d-flex justify-content-between align-items-center">
                    <span>{{ __('Roles') }}</span>
                    <a href="{{ route('role.create') }}" type="button" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-plus opacity-50 me-1"></i> {{ __('Add Roles') }}
                    </a>
                </h2>
                <div class="block-content block-content-full">
                    <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                    <table class="table table-bordered table-vcenter">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 15%;">Role</th>
                                <th>Permissions</th>
                                <th class="text-center" style="width: 10%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td class="fw-semibold" class="text-center">{{ $role->name }}</td>
                                    <td class="fw-semibold">
                                        @foreach ($role->permissions as $perm)
                                            <span class="badge bg-primary">
                                                {{ $perm->name }}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route('role.edit', $role->id) }}" type="button"
                                                class="btn btn-sm btn-alt-primary me-1 js-bs-tooltip-enabled"
                                                data-bs-toggle="tooltip" aria-label="Edit Role">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <a href="{{ route('role.destroy', $role->id) }}" type="button" id="delete"
                                                class="btn btn-sm btn-alt-danger me-1 js-bs-tooltip-enabled"
                                                data-bs-toggle="tooltip" aria-label="Delete Role">
                                                <i class="fa fa-times"></i>
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
