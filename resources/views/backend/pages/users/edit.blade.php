@extends('backend.layouts.default')
@section('content')
    <div class="content">
        <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
            <a class="breadcrumb-item" href="{{ '/dashboard' }}">{{ __('Dashboard') }}</a>
            <a class="breadcrumb-item" href="{{ route('user.index') }}">{{ __('Users') }}</a>
            <span class="breadcrumb-item active">{{ __('Edit User') }}</span>
        </nav>
        <div class="block block-themed block-rounded">
            <div class="block-header">
                <h3 class="block-title">Edit {{ $user->name }}</h3>
            </div>
        </div>
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
                            <div class="mb-4">
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $user->name }}">
                                <span style="color:red">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-4">
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $user->email }}">
                                <span style="color:red">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-4">
                                <select class="js-select2 form-select js-select2-enabled select2-hidden-accessible"
                                    id="roles" name="roles[]" style="width: 100%;" data-placeholder="Choose many.."
                                    multiple data-select2-id="example-select2-multiple" tabindex="-1" aria-hidden="true">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}"
                                            {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                            {{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <span style="color:red">
                                    @error('role')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-4">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password">
                                <span style="color:red">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
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
    </div>
@stop
