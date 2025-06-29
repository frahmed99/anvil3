@extends('backend.layouts.default')
@section('title')
    Users - Anvil Accounts
@endsection
@section('js')
    @include('backend.pages.users.partials.scripts')
@stop
@section('content')
    <div class="content">
        <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
            <a class="breadcrumb-item" href="{{ '/dashboard' }}">{{ __('Dashboard') }}</a>
            <a class="breadcrumb-item" href="{{ route('user.index') }}">{{ __('Users') }}</a>
        </nav>
        <div class="block block-themed block-rounded">
            <div class="block-content">
                <h2 class="content-heading d-flex justify-content-between align-items-center">
                    <span>{{ __('Users') }}</span>
                    <a href="{{ route('user.create') }}" type="button" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-plus opacity-50 me-1"></i> {{ __('Add User') }}
                    </a>
                </h2>
                <div class="block-content block-content-full">
                    <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                    <table class="table table-sm table-vcenter table-vcenter">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 100px;"></th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="d-none d-sm-table-cell" style="width: 20%;">Roles</th>
                                <th class="text-center" style="width: 200px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="text-center">
                                        <img class="img-avatar img-avatar-thumb"
                                            src="{{ !empty($user->profile_photo_path) ? url('media/upload/user_images/' . $user->profile_photo_path) : url('media/avatars/avatar0.jpg') }}"
                                            alt="">
                                    </td>
                                    <td class="text-center">{{ $user->name }}</td>
                                    <td class="text-center">{{ $user->email }}</td>
                                    <td class="d-none d-sm-table-cell">
                                        @foreach ($user->roles as $role)
                                            <span class="badge bg-success">
                                                {{ $role->name }}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a type="button" class="btn btn-sm btn-alt-primary me-1 js-bs-tooltip-enabled"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit User"
                                                href="{{ route('user.edit', $user->id) }}">
                                                <i class="fa fa-fw fa-edit"></i>
                                            </a>
                                            <a type="button" class="btn btn-sm btn-alt-danger me-1 js-bs-tooltip-enabled"
                                                id="delete" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Delete User" href="{{ route('user.destroy', $user->id) }}">
                                                <i class="fa fa-fw fa-times"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
