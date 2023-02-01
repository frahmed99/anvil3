@extends('backend.layouts.default')
@section('title')
    Add Transfer Account - Anvil Accounts
@endsection
@section('css')
    @include('backend.pages.adjustments.partials.styles')
@stop
@section('js')
    @include('backend.pages.adjustments.partials.scripts')
@stop

@section('content')
    <div class="content">
        <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
            <a class="breadcrumb-item" href="{{ '/dashboard' }}">{{ __('Dashboard') }}</a>
            <a class="breadcrumb-item" href="{{ '/bank/adjustment/index' }}">{{ __('Transfers') }}</a>
            <span class="breadcrumb-item active">{{ __('Add Adjustment') }}</span>
        </nav>
        <div class="block block-themed block-rounded">
            <div class="block-content">
                <h2 class="content-heading d-flex justify-content-between align-items-center">
                    <span>{{ __('Add Adjustment') }}</span>
                </h2>
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            <i class="fa fa-user-circle me-1 text-muted"></i> Basic Information
                        </h3>
                    </div>
                    <div class="block-content">
                        <form action="{{ route('adjustment.store') }}" method="POST">
                            @csrf
                            <div class="row items-push">
                                <div class="col-lg-3">
                                    <p class="text-muted">
                                        Your transfer's contact information will appear in bills and their profiles. </p>
                                </div>
                                <div class="col-lg-8 offset-lg-1">
                                    <div class="form-group row">
                                        <div class="form-floating col-6 mb-4">
                                            <select class="form-select" id="account" name="account"
                                                aria-label="Floating label select example" value="{{ old('account') }}">
                                                @foreach ($banks as $bank)
                                                    <option value="{{ $bank->id }}"
                                                        data-currency-code="{{ $bank->currencyCode }}">
                                                        {{ $bank->accountName }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label class="form-label" for="account">Account</label>
                                            <span style="color:red">
                                                @error('account')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-floating col-6 mb-4">
                                            <select class="form-select" id="type" name="type"
                                                aria-label="Floating label select example" value="{{ old('type') }}">
                                                <option value="Debit">Add Balance</option>
                                                <option value="Credit">Remove Balance</option>
                                            </select>
                                            <label class="form-label" for="type">From Account</label>
                                            <span style="color:red">
                                                @error('type')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="form-floating col-6 mb-4">
                                            <input type="text" class="form-control" id="amount" name="amount"
                                                placeholder=" " value="{{ old('amount') }}">
                                            <label class="form-label" for="amount">Amount</label>
                                            <span style="color:red">
                                                @error('amount')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-floating col-6 mb-4">
                                            <input type="text" class="js-flatpickr form-control" id="date"
                                                name="date" placeholder="d-m-Y" data-date-format="d-m-Y"
                                                value="{{ date('d-m-Y') }}">
                                            <label class="form-label" for="date">Date</label>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <textarea class="form-control" id="reason" name="reason" style="height: 200px" placeholder=" ">{{ old('reason') }}</textarea>
                                        <label class="form-label" for="reason">Reason</label>
                                        <span style="color:red">
                                            @error('reason')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="text-right mb-4">
                                        <a href="{{ '/bank/transfers/index' }}" type="button"
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
