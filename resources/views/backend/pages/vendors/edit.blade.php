@extends('backend.layouts.default')
@section('title')
    Edit Vendor - Anvil Accounts
@endsection
@section('css')
    @include('backend.pages.vendors.partials.styles')
@stop
@section('js')
    @include('backend.pages.vendors.partials.scripts')
@stop

@section('content')
    <div class="content">
        <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
            <a class="breadcrumb-item" href="{{ '/dashboard' }}">{{ __('Dashboard') }}</a>
            <a class="breadcrumb-item" href="{{ '/vendor/index' }}">{{ __('Vendors') }}</a>
            <span class="breadcrumb-item active">{{ __('Add Vendor') }}</span>
        </nav>
        <div class="block block-themed block-rounded">
            <div class="block-content">
                <h2 class="content-heading d-flex justify-content-between align-items-center">
                    <span>{{ __('Add Vendor') }}</span>
                    <a href="{{ '/vendor/index' }}" type="button" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-plus opacity-50 me-1"></i> {{ __('Back To Vendors List') }}
                    </a>
                </h2>
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            <i class="fa fa-user-circle me-1 text-muted"></i> Basic Information
                        </h3>
                    </div>
                    <div class="block-content">
                        <form action="{{ route('vendor.update', $vendor->id) }}" method="POST">
                            @csrf
                            <div class="row items-push">
                                <div class="col-lg-3">
                                    <p class="text-muted">
                                        Your client's contact information will appear in invoices and their profiles.</p>
                                </div>
                                <div class="col-lg-7 offset-lg-1">
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder=" " value="{{ $vendor->name }}">
                                        <label class="form-label" for="name">Name*</label>
                                        <span style="color:red">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" id="company" name="company"
                                            placeholder=" " value="{{ $vendor->company }}">
                                        <label class="form-label" for="company">Company</label>
                                        <span style="color:red">
                                            @error('company')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" id="contact" name="contact"
                                            placeholder=" " value="{{ $vendor->contact }}">
                                        <label class="form-label" for="contact">Phone Number</label>
                                        <span style="color:red">
                                            @error('contact')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder=" " value="{{ $vendor->email }}">
                                        <label class="form-label" for="email">Email</label>
                                        <span style="color:red">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" id="taxId" name="taxId"
                                            placeholder=" " value="{{ $vendor->taxId }}">
                                        <label class="form-label" for="taxId">Tax Number*</label>
                                        <span style="color:red">
                                            @error('taxId')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <textarea class="form-control" id="billingAddress" name="billingAddress" style="height: 200px" placeholder=" ">{{ $vendor->billingAddress }}</textarea>
                                        <label class="form-label" for="billingAddress">Billing Address</label>
                                        <span style="color:red">
                                            @error('billingAddress')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="ShippingBillingSwitch"
                                                name="ShippingBillingSwitch">
                                            <label class="form-check-label" for="ShippingBillingSwitch">Shipping Address
                                                Same As Billing Address</label>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <textarea class="form-control" id="shippingAddress" name="shippingAddress" style="height: 200px" placeholder=" " ">{{ $vendor->shippingAddress }}</textarea>
                                        <label class="form-label" for="shippingAddress">Shipping Address</label>
                                        <span style="color:red">
                                            @error('shippingAddress')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="mb-4">
                                        <button type="submit" class="btn btn-alt-primary">Save</button>
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
