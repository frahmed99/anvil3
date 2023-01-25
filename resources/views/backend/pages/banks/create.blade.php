@extends('backend.layouts.default')
@section('title')
    Add Accounts - Anvil Accounts
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
            <a class="breadcrumb-item" href="{{ '/bank/accounts/index' }}">{{ __('Banks') }}</a>
            <span class="breadcrumb-item active">{{ __('Add Vendor') }}</span>
        </nav>
        <div class="block block-themed block-rounded">
            <div class="block-content">
                <h2 class="content-heading d-flex justify-content-between align-items-center">
                    <span>{{ __('Add Bank') }}</span>
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
                                        <label class="form-label" for="accountName">Account Name*</label>
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
                                    <div class="form-group row">
                                        <div class="form-floating col-2 mb-4">
                                            <select class="form-select" id="currencyCode" name="currencyCode"
                                                aria-label="Currency Code">
                                                @foreach ($codes as $code => $value)
                                                    <option {{ $code == 'ZMW' ? 'selected' : '' }}>{{ $code }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label class="form-label" for="currencyCode">Currency</label>
                                        </div>
                                        <div class="form-floating col-10 mb-4">
                                            <input type="text" class="form-control" id="balance" name="balance"
                                                placeholder=" " value="{{ old('balance') }}">
                                            <label class="form-label" for="balance">Opening Balance</label>
                                            <span style="color:red">
                                                @error('balance')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
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
                                    <div class="text-right mb-4">
                                        <a href="{{ '/bank/accounts/index' }}" type="button"
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
