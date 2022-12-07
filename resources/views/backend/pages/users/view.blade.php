@extends('backend.layouts.default')

@section('content')
    <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
        <a class="breadcrumb-item" href="{{ '/dashboard' }}">{{ __('Dashboard') }}</a>
        <a class="breadcrumb-item" href="{{ route('user.index') }}">{{ __('Users') }}</a>
    </nav>
    <div class="block block-themed block-rounded">
        <div class="block-header">
            <h3 class="block-title">{{ __('Users') }}</h3>
            <div class="block-options">
                <button type="button" class="btn btn-sm btn-alt-primary" onclick="Codebase.block('open', '#cb-add-user');">
                    <i class="fa fa-plus opacity-50 me-1"></i>{{ __('Add User+') }}
                </button>
            </div>
        </div>
    </div>
    <div id="cb-add-user" class="block block-rounded bg-body-light animated fadeIn d-none">
        <div class="block-header">
            <h3 class="block-title">{{ __('Add A New User') }}</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="close">
                    <i class="si si-close"></i>
                </button>
            </div>
        </div>
        <div class="block-content block-content-full">
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="row g-sm items-push">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="name"
                                name="name" placeholder="{{ __('Name') }}">
                        </div>
                        <span style="color:red">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="{{ __('Email') }}">
                        </div>
                        <span style="color:red">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="row g-sm items-push">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="{{ __('Password') }}">
                        </div>
                        <span style="color:red">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" placeholder="{{ __('Confirm Password') }}">
                        </div>
                    </div>
                </div>
                <div class="row g-sm items-push">
                    <div class="col-md-6">
                        <select class="form-select" id="role" name="role">
                            <option value="">Please select Role</option>
                            <option value="Admin">Admin</option>
                            <option value="HR">HR</option>
                            <option value="Accountant">Accountant</option>
                        </select>
                        <span style="color:red">
                            @error('role')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-alt-success w-100">
                            <i class="fa fa-plus opacity-50 me-1"></i> {{ __('Add User') }}
                        </button>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-alt-warning w-100" data-toggle="block-option"
                            data-action="close">
                            <i class="fa fa-plus opacity-50 me-1"></i> {{ __('Cancel') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="block-content">
        <!-- Page Content -->
        <div class="row">
            @foreach ($allData as $key => $user)
                <div class="col-md-6 col-xl-3">
                    <a class="block block-rounded block-link-pop bg-info text-center" href="javascript:void(0)">
                        <div class="block-content block-content-full bg-black-5">
                            <div class="fw-semibold text-white mb-1">{{ $user->name }}</div>
                            <div class="fs-sm text-white-75">{{ __('Role') }}</div>
                        </div>
                        <div class="block-content block-content-full block-content-sm">
                            <span class="fw-semibold fs-sm text-info-light">{{ $user->email }}</span>
                        </div>
                        <div class="block-content block-content-full">
                            <button type="button" class="btn btn-sm btn-alt-primary me-1 js-bs-tooltip-enabled"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Edit User">
                                <i class="fa fa-fw fa-pen"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-alt-danger me-1 js-bs-tooltip-enabled"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Remove User">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@stop

@section('js')
    {{-- Script For Add Block --}}
    @if (count($errors) > 0)
        <script type="text/javascript">
            $(document).ready(function() {
                Codebase.block('open', '#cb-add-user');
            });
        </script>
    @endif
@stop
