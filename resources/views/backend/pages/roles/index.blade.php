@extends('backend.layouts.default')
@section('js')
    @include('backend.pages.roles.partials.scripts')
@stop
@section('content')
    <div class="content">
        <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
            <a class="breadcrumb-item" href="{{ '/dashboard' }}">Dashboard</a>
            <span class="breadcrumb-item active">Roles</span>
        </nav>
        <div class="block block-themed block-rounded">
            <div class="block-header">
                <h3 class="block-title">Roles</h3>
                <div class="block-options">
                    <a href="{{ route('role.create') }}" type="button" class="btn btn-alt-primary btn-primary">
                        <i class="fa fa-plus opacity-50 me-1"></i>Add Role
                    </a>
                </div>
            </div>
        </div>
        <div class="block block-rounded">
            <div class="block-content block-content-full">
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
                                            class="btn btn-sm btn-secondary js-bs-tooltip-enabled btn-info"
                                            data-bs-toggle="tooltip" aria-label="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('role.destroy', $role->id) }}" type="button"
                                            class="btn btn-sm btn-secondary js-bs-tooltip-enabled btn-danger"
                                            data-bs-toggle="tooltip" aria-label="Delete">
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
@stop
