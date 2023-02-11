@extends('backend.layouts.default')
@section('title')
    Products & Services - Anvil Accounts
@endsection
@section('css')
    @include('backend.pages.banks.partials.styles')
@stop
@section('js')
    @include('backend.pages.banks.partials.scripts')
@stop
@section('content')
    <div class="content">
        <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
            <a class="breadcrumb-item" href="{{ '/dashboard' }}">{{ __('Dashboard') }}</a>
            <span class="breadcrumb-item active">{{ __('Products & Services') }}</span>
        </nav>
        <div class="block block-themed block-rounded">
            <div class="block-content">
                <h2 class="content-heading d-flex justify-content-between align-items-center">
                    <span>Accounts</span>
                    <a href="{{ route('productsServices.create') }}" type="button" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-plus opacity-50 me-1"></i> {{ __('Add Account') }}
                    </a>
                </h2>
                <div class="block-content block-content-full">
                    <table class="table table-sm table-borderless table-striped table-vcenter js-dataTable-buttons">
                        <thead>
                            <tr>
                                <th class="fw-bold text-center">Name</th>
                                <th class="fw-bold text-center">SKU</th>
                                <th class="fw-bold d-none d-sm-table-cell text-center">Sale Price</th>
                                <th class="fw-bold d-none d-sm-table-cell text-center">Purchase Price</th>
                                <th class="fw-bold d-none d-sm-table-cell text-center">Tax</th>
                                <th class="fw-bold d-none d-sm-table-cell text-center">Category</th>
                                <th class="fw-bold d-none d-sm-table-cell text-center">Unit</th>
                                <th class="fw-bold d-none d-sm-table-cell text-center">Quantity</th>
                                <th class="fw-bold d-none d-sm-table-cell text-center">Type</th>
                                <th class="fw-bold d-none d-sm-table-cell text-center" style="width: 15%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->sku }}</td>
                                <td>{{ $product->sale_price }}</td>
                                <td>{{ $product->purchase_price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->created_by }}</td>
                                <td>{{ $product->type }}</td>
                                <td>{{ $product->tax->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->unit->name }}</td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
