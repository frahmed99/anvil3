@extends('backend.layouts.default')

@section('js')
    <script>
        $(document).ready(function() {
            $("#checkall").click(function() {
                $('input:checkbox').not(this).prop('checked', this.checked);
            });
            $(".ischeck").click(function() {
                var ischeck = $(this).data('id');
                $('.isscheck_' + ischeck).prop('checked', this.checked);
            });
        });
    </script>
@stop

@section('content')
    <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
        <a class="breadcrumb-item" href="{{ '/dashboard' }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ '/role/index' }}">Roles</a>
        <span class="breadcrumb-item active">Add Role</span>
    </nav>
    <div class="block block-themed block-rounded">
        <div class="block-header">
            <h3 class="block-title">Roles</h3>
            <div class="block-options">
                <a href="{{ '/role/index' }}" type="button" class="btn btn-sm btn-alt-primary">
                    <i class=" si si-action-undo opacity-50 me-1"></i> Back To All Roles
                </a>
            </div>
        </div>
    </div>
    <div class="block-content block-content-full">
        <div class="block block-rounded">
            <div class="row g-sm items-push">
                @include('backend.includes.messages')
                <form action="{{ route('role.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control " id="name" name="name" placeholder="Role Name">
                    </div>
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Permissions</h3>
                    </div>
                    <div class="form-group">
                        <div class="space-y-2">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkall" value="1">
                                <label class="form-check-label" for="checkall">All</label>
                            </div>
                            @foreach ($permissions as $permission)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="permissions[]"
                                        id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                    <label class="form-check-label"
                                        for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
