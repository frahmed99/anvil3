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
                        <a class="block block-rounded block-link-pop text-center" href="javascript:void(0)">
                            <div class="block-content block-content-full bg-image"
                                style="background-image: url('/media/photos/photo30.jpg');">
                                <img class="img-avatar img-avatar-thumb" src="/media/avatars/avatar2.jpg"
                                    alt="">
                            </div>
                            <div class="block-content block-content-full">
                                <div class="fw-semibold mb-1">{{ $user->name }}</div>
                                <div class="fs-sm text-muted">Role</div>
                            </div>
                        </a>
                    </div>
                @endforeach
                <!-- END Row #3 -->
            </div>
        </div>
    </div>
@stop
