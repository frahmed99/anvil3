@extends('backend.layouts.default')
@section('js')
    @include('backend.pages.roles.partials.scripts')
@stop

@section('content')
    <div class="content">
        <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
            <a class="breadcrumb-item" href="{{ '/dashboard' }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ '/role/index' }}">Roles</a>
            <span class="breadcrumb-item active">Add Role</span>
        </nav>
        <div class="block block-themed block-rounded">
            <div class="block-header">
                <h3 class="block-title">Roles</h3>
                <div class="block-options">
                    <a href="{{ '/staff/role/index' }}" type="button" class="btn btn-sm btn-alt-primary">
                        <i class=" si si-action-undo opacity-50 me-1"></i> Back To All Roles
                    </a>
                </div>
            </div>
        </div>
        <div class="block block-rounded">
            <div class="block-content block-content-full">
                <form action="{{ route('role.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Role Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Enter a Role Name">
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
                        <table class="table table-bordered table-vcenter">
                            <thead>
                                <tr>
                                    <th style="width: 250px;">
                                        <div class="form-check form-switch">
                                            <input type="checkbox" class="form-check-input" id="checkPermissionAll"
                                                value="1">
                                            <label class="form-check-label" for="checkPermissionAll">All</label>
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
                                                    onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
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
                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Role</button>
                </form>

                <!-- data table end -->

            </div>
        </div>
    </div>
@stop
