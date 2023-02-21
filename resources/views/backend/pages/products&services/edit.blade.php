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
            <span class="breadcrumb-item active">{{ __('Edit Product/Service') }}</span>
        </nav>
        <div class="block block-themed block-rounded">
            <div class="block-content">
                <h2 class="content-heading d-flex justify-content-between align-items-center">
                    <span>{{ __('Edit Product') }}</span>
                </h2>
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            <i class="fa fa-user-circle me-1 text-muted"></i>Product Information
                        </h3>
                    </div>
                    <div class="block-content">
                        <form action="{{ route('productsServices.update', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row items-push">
                                <div class="col-lg-3">
                                    <p class="text-muted">
                                        Your bank's contact information will appear in bills and their profiles. </p>
                                </div>
                                <div class="col-lg-7 offset-lg-1">
                                    <div class="form-group row">
                                        <div class="form-floating col-6 mb-4">
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder=" " value="{{ $product->name }}">
                                            <label class="form-label" for="name">Product Name*</label>
                                            <span style="color:red">
                                                @error('name')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-floating col-6 mb-4">
                                            <input type="text" class="form-control" id="sku" name="sku"
                                                placeholder=" " value="{{ $product->sku }}">
                                            <label class="form-label" for="sku">SKU</label>
                                            <span style="color:red">
                                                @error('sku')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="form-floating col-3 mb-4">
                                            <input type="text" class="form-control" id="salePrice" name="salePrice"
                                                placeholder=" " value="{{ number_format($product->salePrice, 2) }}">
                                            <label class="form-label" for="salePrice">Purchase Price
                                                ({{ $defaultCurrency }})</label>
                                            <span style="color:red">
                                                @error('salePrice')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-floating col-3 mb-4">
                                            <input type="text" class="form-control" id="purchasePrice"
                                                name="purchasePrice" placeholder=" "
                                                value="{{ number_format($product->purchasePrice, 2) }}">
                                            <label class="form-label" for="purchasePrice">Purchase Price
                                                ({{ $defaultCurrency }})</label>
                                            <span style="color:red">
                                                @error('purchasePrice')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-floating col-3 mb-4">
                                            <input type="text" class="form-control" id="quantity" name="quantity"
                                                placeholder=" " value="{{ $product->quantity }}">
                                            <label class="form-label" for="quantity">Quantity</label>
                                            <span style="color:red">
                                                @error('quantity')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-floating col-3 mb-4">
                                            <select class="form-select" id="example-select-floating" name="unit_id"
                                                aria-label="Floating label select example">
                                                <option selected value="">Select an unit</option>
                                                @foreach ($units as $unit)
                                                    <option value="{{ $unit->id }}"
                                                        {{ $unit->id == $product->unit_id ? 'selected' : '' }}>
                                                        {{ $unit->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label class="form-label" for="example-select-floating">Unit</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="form-floating col-8 mb-4">
                                            <textarea class="form-control" id="description" name="description" style="height: 100px" placeholder=" ">{{ $product->description }}</textarea>
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
                                                    <input class="form-check-input" type="radio" id="Product"
                                                        name="type" value="Product"
                                                        {{ $product->type === 'Product' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="Product">Product</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="Service"
                                                        name="type" value="Service"
                                                        {{ $product->type === 'Service' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="Service">Service</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="form-floating col-4 mb-4">
                                            <div class="input-group">
                                                <select class="form-select" id="category_id" name="category_id"
                                                    aria-label="Floating label select category_id">
                                                    <option selected value="">Select a Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-floating col-4 mb-4">
                                            <div class="input-group">
                                                <select class="form-select" id="subcategory_id" name="sub_category_id"
                                                    aria-label="Floating label select sub_category_id">
                                                    <option selected value="">Select a Subcategory</option>
                                                    @foreach ($subcategories as $subcategory)
                                                        <option value="{{ $subcategory->id }}"
                                                            {{ $subcategory->id == $product->sub_category_id ? 'selected' : '' }}>
                                                            {{ $subcategory->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-floating col-4 mb-4">
                                            <div class="input-group">
                                                <select class="js-select2 form-select" id="taxes" name="taxes[]"
                                                    data-placeholder="Select Taxes" multiple>
                                                    @foreach ($taxes as $tax)
                                                        <option value="{{ $tax->id }}"
                                                            @if (in_array($tax->id, $product->taxes->pluck('id')->toArray())) selected @endif>
                                                            {{ $tax->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-6 mb-4">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="sellThisCheckbox" name="sellThisCheckbox"
                                                    {{ $product->income_account_id ? 'checked' : '' }}>
                                                <label class="form-check-label" for="sellThisCheckbox">Sell This</label>
                                            </div>
                                            <div class="form-floating mb-4" id="sellThisSelect">
                                                <select name="income_account_id" id="income_account_id"
                                                    class="form-control">
                                                    <option value="">Select an Income Account</option>
                                                    @foreach ($incomeAccounts as $incomeAccount)
                                                        <option value="{{ $incomeAccount->id }}"
                                                            {{ $incomeAccount->id == $product->income_account_id ? 'selected' : '' }}>
                                                            {{ $incomeAccount->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label class="form-label" for="income_account_id">Income Account</label>
                                            </div>
                                            <p>Allow this product or service to be added to Invoices.</p>
                                        </div>

                                        <div class="col-6 mb-4">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="buyThisCheckbox"
                                                    name="buyThisCheckbox">
                                                <label class="form-check-label" for="buyThisCheckbox">Buy This</label>
                                            </div>
                                            <div class="form-floating mb-4" id="buyThisSelect">
                                                <select name="expense_account_id" id="expense_account_id"
                                                    class="form-control">
                                                    <option value="">Select an Income Account</option>
                                                    @foreach ($expenseAccounts as $expenseAccount)
                                                        <option value="{{ $expenseAccount->id }}"
                                                            {{ $expenseAccount->id == $product->expense_account_id ? 'selected' : '' }}>
                                                            {{ $expenseAccount->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label class="form-label" for="expense_account_id">Income Account</label>
                                            </div>
                                            <p>Allow this product or service to be added to Bills.</p>
                                        </div>
                                    </div>
                                    <hr class="my-1">
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
    </div>
@stop
