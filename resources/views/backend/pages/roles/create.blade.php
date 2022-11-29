@extends('backend.layouts.default')
@section('content')
    <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
        <a class="breadcrumb-item" href="{{ '/dashboard' }}">{{ __('Dashboard') }}</a>
        <a class="breadcrumb-item" href="{{ route('role.index') }}">{{ __('Roles') }}</a>
        <span class="breadcrumb-item active">{{ __('Add Roles') }}</span>
    </nav>
    <div class="block block-themed block-rounded">
        <div class="block-header">
            <h3 class="block-title">{{ __('Add ROLES') }}</h3>
        </div>
        <div class="block-content">
            <!-- Page Content -->
            <div class="block-content">
                <form action="{{ route('role.store') }}" method="POST">
                    @csrf
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="text-muted">
                                The most often used inputs you know and love
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-8">
                            <div class="mb-4">
                                <label class="form-label" for="{{ __('Role Name') }}">{{ __('Role Name') }}</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="{{ __('Enter New Role') }}">
                            </div>
                            @include('backend.includes.messages')
                            <div class="space-y-2">
                                <label class="form-label" for="{{ __('Permissions') }}">{{ __('Permissions') }}</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" value="1"
                                        id="checkPermissionAll">
                                    <label class="form-check-label"
                                        for="checkPermissionAll">{{ __('All') }}</label>
                                </div>
                                <hr>
                                @foreach ($permissions as $permission)
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" value="{{ $permission->name }}"
                                            id="checkPermission{{ $permission->id }}" name="permissions[]">
                                        <label class="form-check-label"
                                            for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-sm btn-success">
                                <i class="fa fa-plus opacity-50 me-1"></i> {{ __('Save Role') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@stop

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
@stop
