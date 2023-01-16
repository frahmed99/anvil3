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
            <a class="breadcrumb-item" href="{{ '/transfer/index' }}">{{ __('Transfers') }}</a>
            <span class="breadcrumb-item active">{{ __('Add Transfer') }}</span>
        </nav>
        <div class="block block-themed block-rounded">
            <div class="block-content">
                <h2 class="content-heading d-flex justify-content-between align-items-center">
                    <span>{{ __('Add Transfer') }}</span>
                    <a href="{{ '/transfer/index' }}" type="button" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-plus opacity-50 me-1"></i> {{ __('Back To Transfers List') }}
                    </a>
                </h2>
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            <i class="fa fa-user-circle me-1 text-muted"></i> Basic Information
                        </h3>
                    </div>
                    <div class="block-content">
                        <form action="{{ route('transfer.store') }}" method="POST">
                            @csrf
                            <div class="row items-push">
                                <div class="col-lg-3">
                                    <p class="text-muted">
                                        Your transfer's contact information will appear in bills and their profiles. </p>
                                </div>
                                <div class="col-lg-8 offset-lg-1">
                                    <div class="form-group row">
                                        <div class="form-floating col-3 mb-4">
                                            <select class="form-select" id="fromAccount" name="fromAccount"
                                                aria-label="Floating label select example" value="{{ old('fromAccount') }}">
                                                @foreach ($banks as $bank)
                                                    <option value="{{ $bank->accountName }}">{{ $bank->accountName }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label class="form-label" for="fromAccount">From Account</label>
                                            <span style="color:red">
                                                @error('fromAccount')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-floating col-3 mb-4">
                                            <input type="text" class="form-control" id="balance" name="balance"
                                                placeholder=" " value="{{ old('balance') }}">
                                            <label class="form-label" for="balance">Balance</label>
                                            <span style="color:red">
                                                @error('balance')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-floating col-3 mb-4">
                                            <select class="form-select" id="toAccount" name="toAccount"
                                                aria-label="Floating label select example" value="{{ old('toAccount') }}">
                                                @foreach ($banks as $bank)
                                                    <option value="{{ $bank->accountName }}">{{ $bank->accountName }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label class="form-label" for="toAccount">To Account</label>
                                            <span style="color:red">
                                                @error('toAccount')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-floating col-3 mb-4">
                                            <input type="text" class="form-control" id="balance" name="balance"
                                                placeholder=" " value="{{ old('balance') }}">
                                            <label class="form-label" for="balance">Balance</label>
                                            <span style="color:red">
                                                @error('balance')
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
                                        <input type="text" class="form-control" id="reference" name="reference"
                                            placeholder=" " value="{{ old('reference') }}">
                                        <label class="form-label" for="reference">Reference</label>
                                        <span style="color:red">
                                            @error('reference')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <textarea class="form-control" id="description" name="description" style="height: 200px" placeholder=" ">{{ old('description') }}</textarea>
                                        <label class="form-label" for="description">Description</label>
                                        <span style="color:red">
                                            @error('description')
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
