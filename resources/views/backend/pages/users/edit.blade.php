@extends('backend.layouts.default')
@section('content')
    <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
        <a class="breadcrumb-item" href="{{ '/dashboard' }}">{{ __('Dashboard') }}</a>
        <a class="breadcrumb-item" href="{{ route('user.index') }}">{{ __('Users') }}</a>
        <span class="breadcrumb-item active">{{ __('Edit User') }}</span>
    </nav>
    <div class="block block-themed block-rounded">
        <div class="block-header">
            <h3 class="block-title">Edit {{ $user->name }}</h3>
            <div class="block-options">
                <a href="{{ '/user/index' }}" type="button" class="btn btn-sm btn-alt-primary">
                    <i class=" si si-action-undo opacity-50 me-1"></i> Back To All Users
                </a>
            </div>
        </div>
    </div>
    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label for="name">User Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"
                    value="{{ $user->name }}">
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="email">User Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email"
                    value="{{ $user->email }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                    placeholder="Enter Password">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label for="password">Assign Roles</label>
                <select class="js-select2 form-select js-select2-enabled select2-hidden-accessible" id="roles"
                    name="roles[]" style="width: 100%;" data-placeholder="Choose many.." multiple
                    data-select2-id="example-select2-multiple" tabindex="-1" aria-hidden="true">
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                            {{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save User</button>
    </form>
@stop
