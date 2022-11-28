@extends('backend.layouts.default')
@section('content')
    <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
        <a class="breadcrumb-item" href="{{ '/dashboard' }}">Dashboard</a>
        <span class="breadcrumb-item active">Users</span>
    </nav>
    <div class="block block-themed block-rounded">
        <div class="block-header">
            <h3 class="block-title">Users</h3>
            <div class="block-options">
                <button type="button" class="btn btn-sm btn-alt-primary">
                    <i class="fa fa-plus opacity-50 me-1"></i> Add User
                </button>
            </div>
        </div>
        <div class="block-content">
            <!-- Page Content -->
            <div class="row">
                <!-- Row #3 -->
                @foreach ($allData as $key => $user)
                    <div class="col-md-6 col-xl-3">
                        <div class="block block-rounded text-center">
                            <div class="block-content block-content-full block-content-sm">
                                <div class="fw-semibold">{{ $user->name }}</div>
                            </div>
                            <div class="block-content block-content-full bg-body-light">
                                <img class="img-avatar img-avatar-thumb" src="/media/avatars/avatar10.jpg" alt="">
                            </div>
                            <div class="block-content block-content-full">
                                <button type="button" class="btn btn-sm btn-alt-primary me-1" data-bs-toggle="tooltip"
                                    title="Edit">
                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-alt-primary me-1" data-bs-toggle="tooltip"
                                    title="Profile">
                                    <i class="fa fa-fw fa-user"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- END Row #3 -->
            </div>
        </div>
    </div>
@stop
