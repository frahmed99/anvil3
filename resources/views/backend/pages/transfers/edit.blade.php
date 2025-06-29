@extends('backend.layouts.default')
@section('title')
    Add Transfer Account - Anvil Accounts
@endsection
@section('css')
    @include('backend.pages.transfers.partials.styles')
@stop
@section('js')
    @include('backend.pages.transfers.partials.scripts')
@stop

@section('content')
    <div class="content">
        <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
            <a class="breadcrumb-item" href="{{ '/dashboard' }}">{{ __('Dashboard') }}</a>
            <a class="breadcrumb-item" href="{{ '/bank/transfers/index' }}">{{ __('Transfers') }}</a>
            <span class="breadcrumb-item active">{{ __('Edit Transfer') }}</span>
        </nav>
        <div class="block block-themed block-rounded">
            <div class="block-content">
                <h2 class="content-heading d-flex justify-content-between align-items-center">
                    <span>{{ __('Edit Transfer') }}</span>
                </h2>
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            <i class="fa fa-user-circle me-1 text-muted"></i> Basic Information
                        </h3>
                    </div>
                    <div class="block-content">
                        <form action="{{ route('transfer.update', $transfer->id) }}" method="POST">
                            @csrf
                            <div class="row items-push">
                                <div class="col-lg-3">
                                    <p class="text-muted">
                                        Your transfer's contact information will appear in bills and their profiles. </p>
                                </div>
                                <div class="col-lg-8 offset-lg-1">
                                    <div class="form-group row">
                                        <div class="form-floating col-4 mb-4">
                                            <input type="text" class="form-control" id="fromAccount" name="fromAccount"
                                                value="{{ $transfer->fromAccount->accountName }}" readonly>
                                            <input type="hidden" name="from_account_id"
                                                value="{{ $transfer->from_account_id }}">
                                        </div>
                                        <div class="form-floating col-4 mb-4">
                                            <input type="text" class="form-control" id="rate" name="rate"
                                                placeholder=" " value="{{ $transfer->rate }}" readonly>
                                            <label class="form-label" for="rate">Currency Rate(Read Only)</label>
                                            <span style="color:red">
                                                @error('rate')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-floating col-4 mb-4">
                                            <input type="text" class="form-control" id="toAccount" name="toAccount"
                                                value="{{ $transfer->toAccount->accountName }}" readonly>
                                            <input type="hidden" name="to_account_id"
                                                value="{{ $transfer->to_account_id }}">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="form-floating col-4 mb-4">
                                            <input type="text" class="form-control" id="fromAmount" name="fromAmount"
                                                placeholder=" " value="{{ $transfer->fromAmount }}" readonly>
                                            <label class="form-label" for="fromAmount">Amount(Read Only)</label>
                                            <span style="color:red">
                                                @error('fromAmount')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-floating col-4 mb-4">
                                            <input type="text" class="form-control" id="toAmount" name="toAmount"
                                                placeholder=" " value="{{ $transfer->toAmount }}" readonly>
                                            <label class="form-label" for="toAmount">Converted Amount(Read Only)</label>
                                            <span style="color:red">
                                                @error('toAmount')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-floating col-4 mb-4">
                                            <input type="text" class="js-flatpickr form-control" id="date"
                                                name="date" placeholder="d-m-Y" data-date-format="d-m-Y"
                                                value="{{ date('d-m-Y', strtotime($transfer->date)) }}">
                                            <label class="form-label" for="date">Date</label>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" id="reference" name="reference"
                                            placeholder=" " value="{{ $transfer->reference }}">
                                        <label class="form-label" for="reference">Reference</label>
                                        <span style="color:red">
                                            @error('reference')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <textarea class="form-control" id="description" name="description" style="height: 200px" placeholder=" ">{{ old('description', $transfer->description) }}</textarea>
                                        <label class="form-label" for="description">Description</label>
                                        <span style="color:red">
                                            @error('description')
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
