@extends('backend.layouts.default')
@section('title')
    Add Quotation Account - Anvil Accounts
@endsection
@section('css')
    @include('backend.pages.quotations.partials.styles')
@stop
@section('js')
    @include('backend.pages.quotations.partials.scripts')
@stop

@section('content')
    <div class="content">
        <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
            <a class="breadcrumb-item" href="{{ '/dashboard' }}">{{ __('Dashboard') }}</a>
            <a class="breadcrumb-item" href="{{ '/bank/quotations/index' }}">{{ __('Quotations') }}</a>
            <span class="breadcrumb-item active">{{ __('Add Quotation') }}</span>
        </nav>
        <div class="block block-themed block-rounded">
            <div class="block-content">
                <h2 class="content-heading d-flex justify-content-between align-items-center">
                    <span>{{ __('Add Quotation') }}</span>
                </h2>
                <div class="block block-rounded">
                    <div class="block-content">
                        <form action="{{ route('quotation.store') }}" method="POST">
                            @csrf
                            <form action="be_forms_premade.html" method="POST" onsubmit="return false;">
                                <div class="form-group row">
                                    <div class="form-floating col-4 mb-4">
                                        <input type="text" class="form-control" id="estimateNumber" name="estimateNumber"
                                            placeholder="John Doe">
                                        <label class="form-label" for="estimateNumber">Estimate #</label>
                                    </div>
                                    <div class="form-floating col-4 mb-4">
                                        <input type="text" class="js-flatpickr form-control" id="issueDate"
                                            name="issueDate" placeholder="d-m-Y" data-date-format="d-m-Y"
                                            value="{{ date('d-m-Y') }}">
                                        <label class="form-label" for="date">Issue Date</label>
                                    </div>
                                    <div class="form-floating col-4 mb-4">
                                        <input type="text" class="js-flatpickr form-control" id="validDate"
                                            name="validDate" placeholder="d-m-Y" data-date-format="d-m-Y"
                                            value="{{ date('d-m-Y') }}">
                                        <label class="form-label" for="date">Valid Till</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-floating col-6 mb-4">
                                        <select class="form-select" id="customerName" name="customerName"
                                            aria-label="Floating label select example">
                                            <option>Select an option</option>
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}"
                                                    data-billing-address="{{ $customer->billingAddress }}"
                                                    data-shipping-address="{{ $customer->shippingAddress }}">
                                                    {{ $customer->name }}</option>
                                            @endforeach
                                        </select>
                                        <label class="form-label" for="customerName">Customer</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-floating col-6 mb-4">
                                        <textarea class="form-control" id="billingAddress" name="billingAddress" style="height: 200px"
                                            placeholder="Leave a comment here"></textarea>
                                        <label class="form-label" for="billingAddress">Billing Address</label>
                                    </div>
                                    <div class="form-floating col-6 mb-4">
                                        <textarea class="form-control" id="shippingAddress" name="shippingAddress" style="height: 200px"
                                            placeholder="Leave a comment here"></textarea>
                                        <label class="form-label" for="shippingAddress">Shipping Address</label>
                                    </div>
                                </div>

                            </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
