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
                    <span>Products And Services</span>
                    <a href="{{ route('productsServices.create') }}" type="button" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-plus opacity-50 me-1"></i> {{ __('Add Product/Service') }}
                    </a>
                </h2>
                <div class="block-content block-content-full">
                    <table class="table table-borderless table-striped table-vcenter table-sm">
                        <thead>
                            <tr>
                                <th class="text-center fw-bold">Name</th>
                                <th class="text-center fw-bold">SKU</th>
                                <th class="text-center fw-bold">Sale Price</th>
                                <th class="text-center fw-bold">Purchase Price</th>
                                <th class="text-center fw-bold">Tax</th>
                                <th class="text-center fw-bold">Category</th>
                                <th class="text-center fw-bold">SubCategory</th>
                                <th class="text-center fw-bold">Quantity</th>
                                <th class="text-center fw-bold" style="width: 5%;">Type</th>
                                <th class="text-center fw-bold" style="width: 10%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="fw-semibold">{{ $product->name }}</td>
                                    <td class="text-center">{{ $product->sku }}</td>
                                    <td class="text-center">{{ $defaultCurrency }}
                                        {{ number_format($product->purchasePrice, 2) }}</td>
                                    <td class="text-center">{{ $defaultCurrency }}
                                        {{ number_format($product->salePrice, 2) }}</td>
                                    <td class="text-center">
                                        @foreach ($product->taxes as $tax)
                                            {{ $tax->name }}
                                            @if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="text-center">{{ $product->category ? $product->category->name : '-' }}</td>
                                    <td class="text-center">{{ $product->subCategory ? $product->subCategory->name : '-' }}
                                    </td>
                                    <td class="text-center">{{ $product->quantity }}</td>
                                    <td class="text-center">
                                        @if ($product->type == 'Product')
                                            <span class="badge bg-success">{{ $product->type }}</span>
                                        @else
                                            <span class="badge bg-primary">{{ $product->type }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a type="button" id="edit"
                                                class="btn btn-sm btn-alt-primary me-1 js-bs-tooltip-enabled"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit Bank"
                                                href="{{ route('productsServices.edit', $product->id) }}">
                                                <i class="fa fa-fw fa-edit"></i>
                                            </a>
                                            <a type="button" id="delete"
                                                class="btn btn-sm btn-alt-danger me-1 js-bs-tooltip-enabled"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete Bank"
                                                href="{{ route('productsServices.destroy', $product->id) }}">
                                                <i class="fa fa-fw fa-xmark"></i>
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
