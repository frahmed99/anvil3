@extends('backend.layouts.default')
@section('content')
    <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
        <a class="breadcrumb-item" href="{{ '/dashboard' }}">Dashboard</a>
        <span class="breadcrumb-item active">Permissions</span>
    </nav>
    <div class="block block-themed block-rounded">
        <div class="block-header">
            <h3 class="block-title">Permissions</h3>
            <div class="block-options">
                <button type="button" class="btn btn-sm btn-alt-primary"
                    onclick="Codebase.block('open', '#cb-add-permission');">
                    <i class="fa fa-plus opacity-50 me-1"></i> Add Permission
                </button>
            </div>
        </div>
    </div>
    <div id="cb-add-permission" class="block block-rounded bg-body-light animated fadeIn d-none">
        <div class="block-header">
            <h3 class="block-title">{{ __('Add New Permission') }}</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="close">
                    <i class="si si-close"></i>
                </button>
            </div>
        </div>
        <div class="block-content block-content-full">
            <form action="{{ route('permission.store') }}" method="POST">
                @csrf
                <div class="row g-sm items-push">
                    <div class="col-md-9">
                        <div class="input-group">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" placeholder="New Permission">
                        </div>
                        <span style="color:red">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-alt-success w-100">
                            <i class="far fa-square-plus opacity-50 me-1"></i>{{ __('Create') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="block-content block-content-full">
        <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
        <table class="table table-sm table-vcenter table-borderless table-vcenter table-hover">
            <thead>
                <tr>
                    <th>Permissions</th>
                    <th class="text-center" style="width: 15%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td class="fw-semibold">{{ $permission->name }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-alt-primary me-1" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" title="Edit Permission">
                                <i class="fa fa-fw fa-pen"></i>
                            </button>
                            <a href="{{ route('permission.destroy', $permission->id) }}" type="button"
                                class="btn btn-sm btn-alt-danger me-1" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Delete Permission">
                                <i class="fa fa-fw fa-xmark"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
