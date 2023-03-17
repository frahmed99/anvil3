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
        <div class="block block-rounded">
            <div class="block-content">
                <h2 class="content-heading d-flex justify-content-between align-items-center">
                    <span>{{ __('Add Quotation') }}</span>
                </h2>
                <div class="block block-rounded">
                    <div class="block-content">
                        <form>
                            @csrf
                            <div class="form-group row">
                                <div class="col-4 mb-4">
                                    <label class="form-label" for="quotationId">Quotation Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            {{ $quotationPrefix }}
                                        </span>
                                        <input type="text" class="form-control" id="quotationId" name="quotationId"
                                            value="{{ str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT) }}">
                                    </div>
                                </div>
                                <div class="col-4 mb-4">
                                    <label class="form-label" for="issueDate">Issue Date</label>
                                    <input type="text" class="js-flatpickr form-control" id="issueDate" name="issueDate"
                                        placeholder="d-m-Y" data-date-format="d-m-Y" value="{{ $issueDate }}">
                                </div>
                                <div class="col-4 mb-4">
                                    <label class="form-label" for="validDate">Valid Till</label>
                                    <input type="text" class="js-flatpickr form-control" id="validDate" name="validDate"
                                        placeholder="d-m-Y" data-date-format="d-m-Y" value="{{ $validTill }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-4 mb-4">
                                    <label class="form-label" for="customerName">Customer</label>
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
                                </div>
                                <div class="col-4 mb-4">
                                    <label class="form-label" for="billingAddress">Billing Address</label>
                                    <textarea class="form-control" id="billingAddress" name="billingAddress" style="height: 100px"
                                        placeholder="Choose a Customer">{{ old('billingAddress') ?: ($customers->count() ? $customers[0]->billingAddress : '') }}</textarea>
                                </div>
                                <div class="col-4 mb-4">
                                    <label class="form-label" for="shippingAddress">Shipping Address</label>
                                    <textarea class="form-control" id="shippingAddress" name="shippingAddress" style="height: 100px"
                                        placeholder="Choose a Customer">{{ old('shippingAddress') ?: ($customers->count() ? $customers[0]->shippingAddress : '') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-2 mb-4">
                                    <label class="form-label" for="currencyCode">Currency</label>
                                    <select class="form-select" id="currencyCode" name="currencyCode"
                                        aria-label="Currency Code" onchange="updateExchangeRate(this)">
                                        @foreach ($codes as $code => $value)
                                            <option data-code="{{ $code }}"
                                                {{ $code == $defaultCurrency ? 'selected' : '' }}>{{ $code }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4 mb-4">
                                    <label class="form-label" for="PurchaseOrder">P.O/S.O
                                        <i class="far fa fa-circle-question" data-bs-toggle="popover"
                                            data-bs-placement="top"
                                            data-bs-content="Purchase Order/ Shipping Order"></i></label>
                                    <input type="text" class="form-control" id="PurchaseOrder" name="PurchaseOrder"
                                        placeholder="">
                                </div>
                                <div class="col-6 mb-4">
                                    <label class="form-label" for="example-text-input">Subheading</label>
                                    <input type="text" class="form-control" id="example-text-input"
                                        name="example-text-input" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-6 mb-4">
                                    <label class="form-label" for="memo">Memo</label>
                                    <textarea class="form-control" id="memo" name="memo" rows="3" placeholder=""></textarea>
                                </div>
                                <div class="col-6 mb-4">
                                    <label class="form-label" for="footer">Footer</label>
                                    <textarea class="form-control" id="footer" name="footer" rows="3" placeholder=""></textarea>
                                </div>
                            </div>
                            <table class="table table-bordered table-hover" id="tab_logic">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 60px;"></th>
                                        <th>Product</th>
                                        <th class="text-center" style="width: 150px;">Qnt</th>
                                        <th class="text-center" style="width: 150px;">Unit Price</th>
                                        <th class="text-center" style="width: 150px;">Tax</th>
                                        <th class="text-center" style="width: 150px;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id='addr0'>
                                        <td></td>
                                        <td>
                                            <select name='product[]'
                                                class='form-select form-control-alt form-control-sm product' required>
                                                <option value='' selected disabled>Select Product</option>
                                                @foreach ($products as $product)
                                                    <option value='{{ $product->id }}'
                                                        data-description="{{ $product->description }}"
                                                        data-price='{{ $product->sale_price }}'
                                                        data-taxes='{{ json_encode($product->taxes) }}'>
                                                        {{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                            <p class="text-success" id="product-service-description">Description</p>
                                        </td>

                                        <td class="text-center"><input name='quantity[]' type='number'
                                                class='form-control form-control-alt form-control-sm quantity' required
                                                min='1' max='9999' step='1'>
                                        </td>

                                        <td class="text-center"><input name='price[]' type='number'
                                                class='form-control form-control-alt form-control-sm price' readonly>
                                        </td>

                                        <td class="text-center">
                                            <div class="tax-container">
                                                <input name='tax[]' type='text'
                                                    class='form-control form-control-alt form-control-sm tax' readonly>
                                            </div>
                                        </td>
                                        <td><input name='amount[]' type='number' step='0.01'
                                                class='form-control form-control-alt form-control-sm amount' readonly></td>
                                    </tr>
                                    <tr id='addr1'></tr>
                                </tbody>
                            </table>
                            <div class="row items-push">
                                <div class="btn-group" role="group" aria-label="Horizontal Outline Secondary">
                                    <button id="add_row" class="btn btn-primary me-1 mb-1"><i
                                            class="fa fa-plus opacity-50 me-1"></i>Add Row</button>
                                    <button id='delete_row' class="btn btn-danger me-1 mb-1"><i
                                            class="fa fa-times opacity-50 me-1"></i>Delete Row</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xl-4"></div>
                                <div class="col-sm-6 col-xl-4"></div>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="row items-push">
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-hover" id="tab_logic_total">
                                                <tbody>
                                                    <tr>
                                                        <th class="text-center">Sub Total</th>
                                                        <td class="text-center"><input type="number" name='sub_total'
                                                                placeholder='0.00' class="form-control" id="sub_total"
                                                                readonly /></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center">Tax</th>
                                                        <td class="text-center">
                                                            <div class="input-group mb-2 mb-sm-0">
                                                                <input type="number" class="form-control" id="tax"
                                                                    placeholder="0">
                                                                <div class="input-group-addon">%</div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center">Tax Amount</th>
                                                        <td class="text-center"><input type="number" name='tax_amount'
                                                                id="tax_amount" placeholder='0.00' class="form-control"
                                                                readonly /></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center">Grand Total</th>
                                                        <td class="text-center"><input type="number" name='total_amount'
                                                                id="total_amount" placeholder='0.00' class="form-control"
                                                                readonly />
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right mb-4">
                                    <a href="{{ '/bank/transfers/index' }}" type="button"
                                        class="btn btn-alt-danger">{{ __('Cancel') }}
                                    </a>
                                    <span></span>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
