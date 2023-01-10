@extends('backend.layouts.default')
@section('title')
    Edit User - Anvil Accounts
@endsection

@section('css')
    @include('backend.pages.users.partials.styles')
@stop

@section('js')
    @include('backend.pages.users.partials.scripts')
@stop

@section('content')
    <div class="content">
        <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
            <a class="breadcrumb-item" href="{{ '/dashboard' }}">{{ __('Dashboard') }}</a>
            <a class="breadcrumb-item" href="{{ route('user.index') }}">{{ __('Users') }}</a>
            <span class="breadcrumb-item active">{{ __('Edit User') }}</span>
        </nav>
        <div class="block block-themed block-rounded">
            <div class="block-content">
                <h2 class="content-heading d-flex justify-content-between align-items-center">
                    <span>Edit {{ $user->name }}</span>
                    <a href="{{ '/staff/user/index' }}" type="button" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-plus opacity-50 me-1"></i> {{ __('Back To Users List') }}
                    </a>
                </h2>
                <div class="block-content block-content-full">
                    <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        <div class="block block-rounded">
                            <div class="block-content block-content-full">
                                <div class="row push">
                                    <div class="col-lg-4">
                                        <p class="text-muted">
                                            Do not share credentials of users with anyone. </p>
                                    </div>
                                    <div class="col-lg-8 col-xl-5">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ $user->name }}">
                                            <label class="form-label" for="name">Name</label>
                                            <span style="color:red">
                                                @error('name')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-floating mb-4">
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ $user->email }}">
                                            <label class="form-label" for="email">Email Address</label>
                                            <span style="color:red">
                                                @error('email')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-floating mb-4">
                                            <select class="form-select" id="roles" name="roles[]">
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->name }}"
                                                        {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label class="form-label" for="roles">Assign User A Role</label>
                                            <span style="color:red">
                                                @error('role')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-floating mb-4">
                                            <input type="password" class="form-control" id="password" name="password">
                                            <label class="form-label" for="password">Password</label>
                                            <span style="color:red">
                                                @error('password')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-floating mb-4">
                                            <input type="password" class="form-control" id="password_confirmation"
                                                name="password_confirmation">
                                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                                        </div>
                                        <div class="mb-4">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
