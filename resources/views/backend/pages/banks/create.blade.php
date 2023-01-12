@extends('backend.layouts.default')
@section('title')
    Add Bank Account - Anvil Accounts
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
            <a class="breadcrumb-item" href="{{ '/bank/index' }}">{{ __('Banks') }}</a>
            <span class="breadcrumb-item active">{{ __('Add Vendor') }}</span>
        </nav>
        <div class="block block-themed block-rounded">
            <div class="block-content">
                <h2 class="content-heading d-flex justify-content-between align-items-center">
                    <span>{{ __('Add Vendor') }}</span>
                    <a href="{{ '/bank/index' }}" type="button" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-plus opacity-50 me-1"></i> {{ __('Back To Banks List') }}
                    </a>
                </h2>
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            <i class="fa fa-user-circle me-1 text-muted"></i> Basic Information
                        </h3>
                    </div>
                    <div class="block-content">
                        <form action="{{ route('bank.store') }}" method="POST">
                            @csrf
                            <div class="row items-push">
                                <div class="col-lg-3">
                                    <p class="text-muted">
                                        Your bank's contact information will appear in bills and their profiles. </p>
                                </div>
                                <div class="col-lg-7 offset-lg-1">
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" id="accountName" name="accountName"
                                            placeholder=" " value="{{ old('accountName') }}">
                                        <label class="form-label" for="accountName">Account Name</label>
                                        <span style="color:red">
                                            @error('accountName')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" id="bankName" name="bankName"
                                            placeholder=" " value="{{ old('bankName') }}">
                                        <label class="form-label" for="bankName">Bank Name</label>
                                        <span style="color:red">
                                            @error('bankName')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" id="accountNumber" name="accountNumber"
                                            placeholder=" " value="{{ old('accountNumber') }}">
                                        <label class="form-label" for="accountNumber">Account Number</label>
                                        <span style="color:red">
                                            @error('accountNumber')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" id="openingBalance" name="openingBalance"
                                            placeholder=" " value="{{ old('openingBalance') }}">
                                        <label class="form-label" for="openingBalance">Opening Balance</label>
                                        <span style="color:red">
                                            @error('openingBalance')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" id="contact" name="contact"
                                            placeholder=" " value="{{ old('contact') }}">
                                        <label class="form-label" for="contact">Phone</label>
                                        <span style="color:red">
                                            @error('contact')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <textarea class="form-control" id="address" name="address" style="height: 200px" placeholder=" ">{{ old('address') }}</textarea>
                                        <label class="form-label" for="address">Address</label>
                                        <span style="color:red">
                                            @error('address')
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
