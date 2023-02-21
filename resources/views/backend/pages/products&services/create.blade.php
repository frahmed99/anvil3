@extends('backend.layouts.default')
@section('title')
    Add Product Or Service - Anvil Accounts
@endsection
@section('css')
    @include('backend.pages.products&services.partials.styles')
@stop
@section('js')
    @include('backend.pages.products&services.partials.scripts')
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
                    <span>{{ __('Add Product') }}</span>
                </h2>
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            <i class="fa fa-user-circle me-1 text-muted"></i>Product Information
                        </h3>
                    </div>
                    <div class="block-content">
                        @include('backend.pages.products&services.partials.addCategoryModal')
                        @include('backend.pages.products&services.partials.addSubCategoryModal')
                        @include('backend.pages.products&services.partials.addTaxModal')
                        <form role="form" action="{{ route('productsServices.store') }}" method="post" id="productFomr">
                            @csrf
                            <div class="row items-push">
                                <div class="col-lg-3">
                                    <p class="text-muted">
                                        Your bank's contact information will appear in bills and their profiles. </p>
                                </div>
                                <div class="col-lg-7 offset-lg-1">
                                    <div class="form-group row">
                                        <div class="form-floating col-6 mb-4">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="name" name="name" placeholder=" " value="{{ old('name') }}">
                                            <label class="form-label" for="name">Product Name*</label>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-floating col-6 mb-4">
                                            <input type="text" class="form-control @error('sku') is-invalid @enderror"
                                                id="sku" name="sku" placeholder=" " value="{{ old('sku') }}">
                                            <label class="form-label" for="sku">SKU</label>
                                            @error('sku')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="form-floating col-3 mb-4">
                                            <input type="text"
                                                class="form-control @error('salePrice') is-invalid @enderror" id="salePrice"
                                                name="salePrice" placeholder=" " value="{{ old('salePrice') }}">
                                            <label class="form-label" for="salePrice">Sale Price
                                                ({{ $defaultCurrency }})</label>
                                            @error('salePrice')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-floating col-3 mb-4">
                                            <input type="text"
                                                class="form-control @error('purchasePrice') is-invalid @enderror"
                                                id="purchasePrice" name="purchasePrice" placeholder=" "
                                                value="{{ old('purchasePrice') }}">
                                            <label class="form-label" for="purchasePrice">Purchase Price
                                                ({{ $defaultCurrency }})</label>
                                            @error('purchasePrice')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-floating col-3 mb-4">
                                            <input type="text"
                                                class="form-control @error('quantity') is-invalid @enderror" id="quantity"
                                                name="quantity" placeholder=" " value="{{ old('quantity') }}">
                                            <label class="form-label" for="quantity">Quantity</label>
                                            @error('quantity')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-floating col-3 mb-4">
                                            <select class="form-select" id="unit_id" name="unit_id"
                                                aria-label="Floating label select example">
                                                <option selected value="">Select an unit</option>
                                                @foreach ($units as $unit)
                                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                @endforeach
                                            </select>
                                            <label class="form-label" for="unit_id">Unit</label>
                                            @error('unit_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="form-floating col-8 mb-4">
                                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                                style="height: 100px" placeholder=" ">{{ old('description') }}</textarea>
                                            <label class="form-label" for="description">Description</label>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
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
                                        <div class="form-floating col-4 mb-4">
                                            <div class="input-group">
                                                <select class="form-select" id="category_id" name="category_id"
                                                    aria-label="Floating label select category_id">
                                                    <option selected="">Select a Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#addCategoryModal">Add</button>
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-floating col-4 mb-4">
                                            <div class="input-group">
                                                <select class="form-select" id="subcategory_id" name="subcategory_id"
                                                    aria-label="Floating label select subcategory_id">
                                                    <option selected="">Select a Sub-Category</option>
                                                    @foreach ($subcategories as $subcategory)
                                                        <option value="{{ $subcategory->id }}"
                                                            data-category="{{ $subcategory->category_id }}">
                                                            {{ $subcategory->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#addSubCategoryModal">Add</button>
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-floating col-4 mb-4">
                                            <div class="input-group">
                                                <select class="js-select2 form-select" id="taxes" name="taxes[]"
                                                    data-placeholder="Select Taxes" multiple>
                                                    @foreach ($taxes as $tax)
                                                        <option value="{{ $tax->id }}">{{ $tax->name }}</option>
                                                    @endforeach
                                                </select>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#addTaxModal">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-6 mb-4">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="sellThisCheckbox" name="sellThisCheckbox">
                                                <label class="form-check-label" for="sellThisCheckbox">Sell This</label>
                                            </div>
                                            <div class="form-floating mb-4" id="sellThisSelect">
                                                <select name="income_account_id" id="income_account_id"
                                                    class="form-control @error('name') is-invalid @enderror">
                                                    <option value="">Select an Income Account</option>
                                                    @foreach ($incomeAccounts as $account)
                                                        <option value="{{ $account->id }}">{{ $account->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label class="form-label" for="income_account_id">Income Account</label>
                                            </div>
                                            <p>Allow this product or service to be added to Invoices.</p>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-6 mb-4">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="buyThisCheckbox"
                                                    name="buyThisCheckbox">
                                                <label class="form-check-label" for="buyThisCheckbox">Buy This</label>
                                            </div>
                                            <div class="form-floating mb-4" id="buyThisSelect">
                                                <select name="expense_account_id" id="expense_account_id"
                                                    class="form-control @error('name') is-invalid @enderror">
                                                    <option value="">Select an Expense Account</option>
                                                    @foreach ($expenseAccounts as $account)
                                                        <option value="{{ $account->id }}">{{ $account->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label class="form-label" for="expense_account_id">Expense Account</label>
                                            </div>
                                            <p>Allow this product or service to be added to Bills.</p>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-right mb-4">
                                        <a href="{{ '/productsServices/index' }}" type="button"
                                            class="btn btn-alt-danger">{{ __('Cancel') }}
                                        </a>
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
