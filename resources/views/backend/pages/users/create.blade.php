@extends('backend.layouts.default')

@section('css')
    <style>
        .form-check-label {
            text-transform: capitalize;
        }
    </style>
@stop

@section('js')
    <script>
        Codebase.helpersOnLoad(['jq-select2']);
    </script>
@stop


@section('content')
    <div>
        <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
            <a class="breadcrumb-item" href="{{ '/dashboard' }}">{{ __('Dashboard') }}</a>
            <a class="breadcrumb-item" href="{{ route('user.index') }}">{{ __('Users') }}</a>
            <span class="breadcrumb-item active">{{ __('Add User') }}</span>
        </nav>
    </div>
    <div class="block block-themed block-rounded">
        <div class="block-header">
            <h3 class="block-title">New User</h3>
            <div class="block-options">
                <a href="{{ '/user/index' }}" type="button" class="btn btn-sm btn-alt-primary">
                    <i class=" si si-action-undo opacity-50 me-1"></i> Back To All Users
                </a>
            </div>
        </div>
    </div>
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="block block-rounded">
            <div class="block-content block-content-full">
                <div class="row push">
                    <div class="col-lg-4">
                        <p class="text-muted">
                            Do not share credentials of users with anyone. </p>
                    </div>
                    <div class="col-lg-8 col-xl-5">
                        <div class="mb-4">
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Full Name">
                        </div>
                        <div class="mb-4">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="mb-4">
                            <select class="js-select2 form-select js-select2-enabled select2-hidden-accessible"
                                id="roles" name="roles[]" style="width: 100%;" data-placeholder="Choose many.." multiple
                                data-select2-id="example-select2-multiple" tabindex="-1" aria-hidden="true">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                        </div>
                        <div class="mb-4">
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" placeholder="Confirm Password">
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
