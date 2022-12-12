@extends('backend.layouts.default')
@section('js')
    @include('backend.pages.users.partials.scripts')
@stop
@section('content')
    <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
        <a class="breadcrumb-item" href="{{ '/dashboard' }}">{{ __('Dashboard') }}</a>
        <a class="breadcrumb-item" href="{{ route('user.index') }}">{{ __('Users') }}</a>
    </nav>
    <div class="block block-themed block-rounded">
        <div class="block-header">
            <h3 class="block-title">{{ __('Users') }}</h3>
            <div class="block-options">
                <a href="{{ route('user.create') }}" type="button" class="btn btn-sm btn-alt-primary">
                    <i class="fa fa-plus opacity-50 me-1"></i>{{ __('Add User') }}
                </a>
            </div>
        </div>
    </div>
    <div class="block block-rounded">
        <div class="block-content">
            <div class="row">
                <!-- User Row-->
                @foreach ($users as $user)
                    <div class="col-md-6 col-xl-3">
                        <div class="block block-rounded text-center">
                            <div class="block-content block-content-full block-content-sm">
                                <div class="fw-semibold">{{ $user->name }}</div>
                            </div>
                            <div class="fs-sm fw-semibold">{{ $user->email }}</div>
                            <div class="block-content block-content-full bg-image"
                                style="background-image: url({{ asset('media/photos/photo34.jpg') }})">
                                <img class="img-avatar img-avatar-thumb"
                                    src="{{ !empty($user->profile_photo_path) ? url('media/upload/user_images/' . $user->profile_photo_path) : url('media/avatars/avatar0.jpg') }}"
                                    alt="">
                            </div>
                            <div class="block-content block-content-full">
                                <a type="button" class="btn btn-sm btn-alt-primary me-1 js-bs-tooltip-enabled"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit User"
                                    href="{{ route('user.edit', $user->id) }}">
                                    <i class="fa fa-fw fa-edit"></i>
                                </a>
                                <a type="button" class="btn btn-sm btn-alt-danger me-1 js-bs-tooltip-enabled"
                                    id="delete" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete User"
                                    href="{{ route('user.destroy', $user->id) }}">
                                    <i class="fa fa-fw fa-times"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- END User Row -->
        </div>
    </div>
@stop
