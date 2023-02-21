@extends('backend.layouts.default')
@section('title')
    Edit Role - Anvil Accounts
@endsection
@section('js')
    @include('backend.pages.roles.partials.scripts')
@stop

@section('content')
    <div class="content">
        <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
            <a class="breadcrumb-item" href="{{ '/dashboard' }}">{{ __('Dashboard') }}</a>
            <a class="breadcrumb-item" href="{{ '/staff/role/index' }}">{{ __('Roles') }}</a>
            <span class="breadcrumb-item active">{{ __('Edit Role') }}</span>
        </nav>
        <div class="block block-themed block-rounded">
            <div class="block-content">
                <h2 class="content-heading d-flex justify-content-between align-items-center">
                    <span>Edit {{ $role->name }}</span>
                </h2>
                <div class="block-content block-content-full">
                    <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                    <form action="{{ route('role.update', $role->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Role Name</label>
                            <input type="text" class="form-control" value="{{ $role->name }}" id="name"
                                name="name" placeholder="Enter a Role Name">
                            <span style="color:red">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Permissions</h3>
                                <div class="block-options">
                                </div>
                            </div>
                            <table class="table table-sm table-vcenter table-bordered table-vcenter">
                                <thead>
                                    <tr>
                                        <th style="width: 250px;">
                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" id="checkall"
                                                    name="checkall" value="1">
                                                <label class="form-check-label" for="checkall">All</label>
                                            </div>
                                        </th>
                                        <th>Permissions</th>
                                    </tr>
                                </thead>
                                @php $i = 1; @endphp
                                @foreach ($permission_groups as $group)
                                    <tbody>
                                        <tr>
                                            <th class="text-center" scope="">
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="{{ $i }}Management" value="{{ $group->name }}"
                                                        onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)"
                                                        {{ App\Models\Permissions::roleHasPermissions($role, $permissions) ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="checkPermission">{{ $group->name }}</label>
                                                </div>
                                            </th>
                                            <td>
                                                <div class="row">
                                                    <div class="role-{{ $i }}-management-checkbox">
                                                        @php
                                                            $permissions = App\Models\Permissions::getpermissionsByGroupName($group->name);
                                                            $j = 1;
                                                        @endphp
                                                        @foreach ($permissions as $permission)
                                                            <div class="col-lg-8 col-xl-4">
                                                                <div class="form-check form-switch">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        name="permissions[]"
                                                                        {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}
                                                                        id="checkPermission{{ $permission->id }}"
                                                                        value="{{ $permission->name }}">
                                                                    <label class="form-check-label"
                                                                        for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                                                    @php  $j++; @endphp
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @php  $i++; @endphp
                                @endforeach
                            </table>
                        </div>
                        <div class="text-right mb-4">
                            <a href="{{ '/staff/role/index' }}" type="button"
                                class="btn btn-alt-danger">{{ __('Cancel') }}
                            </a>
                            <span></span>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
