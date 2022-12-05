@extends('backend.layouts.default')
@section('content')
    <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
        <a class="breadcrumb-item" href="{{ '/dashboard' }}">Dashboard</a>
        <span class="breadcrumb-item active">Users</span>
    </nav>
    <div class="block block-themed block-rounded">
        <div class="block-header">
            <h3 class="block-title">Users</h3>
            @role('SuperAdmin' | 'Admin')
                <div class="block-options">
                    <button type="button" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-plus opacity-50 me-1"></i> Add User
                    </button>
                </div>
            @endrole
        </div>
        <div class="block-content">
            <!-- Page Content -->
            <div class="row">
                @foreach ($allData as $key => $user)
                    <div class="col-md-6 col-xl-4">
                        <a class="block block-rounded block-link-shadow js-appear-enabled animated flipInX"
                            href="javascript:void(0)">
                            <div class="block-content block-content-full d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="fw-semibold mb-1">{{ $user->name }}</div>
                                    <div class="fs-sm text-muted">{{ $user->email }}</div>
                                    <div class="fs-sm text-muted">Role</div>
                                </div>
                                @role('superadmin|admin')
                                    <div>
                                        <button type="button" class="btn btn-sm btn-alt-primary me-1" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="Edit User">
                                            <i class="fa fa-fw fa-user-pen"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-alt-danger me-1" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="Delete User"
                                            href="{{ route('user.destroy', $user->id) }}">
                                            <i class="fa fa-fw fa-user-xmark"></i>
                                        </button>
                                    </div>
                                @endrole
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
