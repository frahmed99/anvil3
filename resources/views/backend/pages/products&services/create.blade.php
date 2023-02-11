@extends('backend.layouts.default')
@section('title')
    Add Product Or Service - Anvil Accounts
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
            <a class="breadcrumb-item" href="{{ '/productsServices/index' }}">{{ __('Products & Services') }}</a>
            <span class="breadcrumb-item active">{{ __('Add Product/Service') }}</span>
        </nav>
        <div class="block block-themed block-rounded">
            <div class="block-content">
                <h2 class="content-heading d-flex justify-content-between align-items-center">
                    <span>{{ __('Add Bank') }}</span>
                </h2>
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            <i class="fa fa-user-circle me-1 text-muted"></i>Product Information
                        </h3>
                    </div>
                    <div class="block-content">
                        <form role="form" action="{{ route('productsServices.store') }}" method="post">
                            @csrf
                            <div class="row items-push">
                                <div class="col-lg-3">
                                    <p class="text-muted">
                                        Your bank's contact information will appear in bills and their profiles. </p>
                                </div>
                                <div class="col-lg-7 offset-lg-1">
                                    <div class="form-group row">
                                        <div class="form-floating col-6 mb-4">
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder=" " value="{{ old('name') }}">
                                            <label class="form-label" for="name">Product Name*</label>
                                            <span style="color:red">
                                                @error('name')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-floating col-6 mb-4">
                                            <input type="text" class="form-control" id="sku" name="sku"
                                                placeholder=" " value="{{ old('sku') }}">
                                            <label class="form-label" for="sku">SKU</label>
                                            <span style="color:red">
                                                @error('sku')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="form-floating col-4 mb-4">
                                            <input type="text" class="form-control" id="salePrice" name="salePrice"
                                                placeholder=" " value="{{ old('salePrice') }}">
                                            <label class="form-label" for="salePrice">Sale Price</label>
                                            <span style="color:red">
                                                @error('salePrice')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-floating col-4 mb-4">
                                            <input type="text" class="form-control" id="purchasePrice"
                                                name="purchasePrice" placeholder=" " value="{{ old('purchasePrice') }}">
                                            <label class="form-label" for="purchasePrice">Purchase Price</label>
                                            <span style="color:red">
                                                @error('purchasePrice')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-floating col-4 mb-4">
                                            <input type="text" class="form-control" id="quantity" name="quantity"
                                                placeholder=" " value="{{ old('quantity') }}">
                                            <label class="form-label" for="quantity">Quantity</label>
                                            <span style="color:red">
                                                @error('quantity')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="form-floating col-8 mb-4">
                                            <textarea class="form-control" id="description" name="description" style="height: 100px" placeholder=" ">{{ old('description') }}</textarea>
                                            <label class="form-label" for="description">Description</label>
                                            <span style="color:red">
                                                @error('description')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-4 mb-4">
                                            <label class="form-label">Type</label>
                                            <div class="space-x-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="product"
                                                        name="type" value="product" checked="">
                                                    <label class="form-check-label" for="product">Product</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="service"
                                                        name="type" value="service">
                                                    <label class="form-check-label" for="service">Service</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-4 mb-4">
                                            <label for="tax_id">Tax</label>
                                            <select class="js-select2 form-select" id="tax_id" name="tax_id"
                                                style="width: 100%;" data-placeholder="Choose one or many.." multiple>
                                                <option></option>
                                                <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                @foreach ($taxes as $tax)
                                                    <option value="{{ $tax->id }}">{{ $tax->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-4 mb-4">
                                            <label for="unit_id">Unit</label>
                                            <select class="js-select2 form-select" id="unit_id" name="unit_id"
                                                style="width: 100%;" data-placeholder="Choose one..">
                                                <option></option>
                                                @foreach ($units as $unit)
                                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-4 mb-4">
                                            <label for="category_id">Category</label>
                                            <select class="js-select2 form-select" id="category_id" name="category_id"
                                                style="width: 100%;" data-placeholder="Choose one..">
                                                <option></option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-6 mb-4">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="sellthis-checkbox" name="sellthis-checkbox" checked="">
                                                <label class="form-check-label" for="sellthis-checkbox">Sell This</label>
                                            </div>
                                            <select class="js-select2 form-select" id="incomeAccount"
                                                name="incomeAccount" style="width: 100%;"
                                                data-placeholder="Choose one..">
                                                <option></option>
                                                <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                <option value="1">HTML</option>
                                                <option value="2">CSS</option>
                                                <option value="3">JavaScript</option>
                                                <option value="4">PHP</option>
                                                <option value="5">MySQL</option>
                                                <option value="6">Ruby</option>
                                                <option value="7">Angular</option>
                                                <option value="8">React</option>
                                                <option value="9">Vue.js</option>
                                            </select>
                                        </div>
                                        <div class="col-6 mb-4">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="buythis-checkbox" name="buythis-checkbox" checked="">
                                                <label class="form-check-label" for="buythis-checkbox">Buy This</label>
                                            </div>
                                            <select class="js-select2 form-select" id="expenseAccount"
                                                name="expenseAccount" style="width: 100%;"
                                                data-placeholder="Choose one..">
                                                <option></option>
                                                <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                <option value="1">HTML</option>
                                                <option value="2">CSS</option>
                                                <option value="3">JavaScript</option>
                                                <option value="4">PHP</option>
                                                <option value="5">MySQL</option>
                                                <option value="6">Ruby</option>
                                                <option value="7">Angular</option>
                                                <option value="8">React</option>
                                                <option value="9">Vue.js</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-right mb-4">
                                        <a href="{{ '/productsServices/index' }}" type="button"
                                            class="btn btn-alt-danger">{{ __('Cancel') }}
                                        </a>
                                        <span></span>
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @stop
