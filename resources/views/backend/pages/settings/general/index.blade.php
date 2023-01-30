@extends('backend.pages.settings.index')

@section('title')
    Company Settings - Anvil Accounts
@endsection

@section('css')
    @include('backend.pages.settings.general.partials.styles')
@stop

@section('js')
    @include('backend.pages.settings.general.partials.scripts')
@stop

@section('subcontent')
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Company Settings</h3>
        </div>
        <div class="block-content">
            <form action="{{ route('general.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <div class="form-group row">
                        <div class="form-floating col-6 mb-4">
                            <input type="text" class="form-control" id="companyName" name="companyName" placeholder=" "
                                value="{{ $generalSettings->where('key', 'companyName')->first()->value }}">
                            <label class="form-label" for="companyName">Company Name*</label>
                        </div>
                        <div class="form-floating col-6 mb-4">
                            <input type="text" class="form-control" id="emailAddress" name="emailAddress" placeholder=""
                                value="{{ $generalSettings->where('key', 'emailAddress')->first()->value }}">
                            <label class="form-label" for="emailAddress">Company Email</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-floating col-4 mb-4">
                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder=" "
                                value="{{ $generalSettings->where('key', 'phoneNumber')->first()->value }}">
                            <label class="form-label" for="phoneNumber">Company Phone</label>
                        </div>
                        <div class="form-floating col-4 mb-4">
                            <select class="form-select" id="defaultCurrency" name="defaultCurrency"
                                aria-label="Default Currency">
                                @foreach ($codes as $code => $value)
                                    <option value="{{ $code }}"
                                        {{ old('defaultCurrency', $generalSettings->where('key', 'defaultCurrency')->first()->value) == $code ? 'selected' : '' }}>
                                        {{ $code }}</option>
                                @endforeach
                            </select>
                            <label class="form-label" for="defaultCurrency">Default Currency</label>
                        </div>
                        <div class="form-floating col-4 mb-4">
                            <input type="text" class="form-control" id="TPIN" name="TPIN" placeholder=" "
                                value="{{ $generalSettings->where('key', 'TPIN')->first()->value }}">
                            <label class="form-label" for="TPIN">Company TPIN*</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-floating col-6 mb-4">
                            <textarea class="form-control" id="address" name="address" style="height: 200px" placeholder=" ">
                                {{ $generalSettings->where('key', 'address')->first()->value }}</textarea>
                            <label class="form-label" for="address">Company Address</label>
                        </div>
                        <div class="col-md-6 animated fadeIn">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="example-file-input">LOGO</label>
                                <input class="form-control" type="file" id="image" name="image">
                            </div>
                            <div class="bg-light mt-4 w-75">
                                <img class="img-fluid" id="showImage"
                                    src="{{ asset('storage/images/' . $generalSettings->where('key', 'logo')->first()->value) }}"
                                    alt="Logo" style="width:400px;height:120px;">
                            </div>
                        </div>
                    </div>
                    <p class="fw-semibold">Code Prefixes</p>
                    <hr class="col-12 mb-4">
                    </hr>
                    <div class="form-group row">
                        <div class="form-floating col-6 mb-4">
                            <input type="text" class="form-control" id="customerPrefix" name="customerPrefix"
                                placeholder=" "
                                value="{{ $generalSettings->where('key', 'customerPrefix')->first()->value }}">
                            <label class="form-label" for="customerPrefix">Customer Prefix</label>
                        </div>
                        <div class="form-floating col-6 mb-4">
                            <input type="text" class="form-control" id="vendorPrefix" name="vendorPrefix" placeholder=" "
                                value="{{ $generalSettings->where('key', 'vendorPrefix')->first()->value }}">
                            <label class="form-label" for="vendorPrefix">Company Email</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-floating col-6 mb-4">
                            <input type="text" class="form-control" id="quotationPrefix" name="quotationPrefix"
                                placeholder=" "
                                value="{{ $generalSettings->where('key', 'quotationPrefix')->first()->value }}">
                            <label class="form-label" for="quotationPrefix">Quotation Prefix</label>
                        </div>
                        <div class="form-floating col-6 mb-4">
                            <input type="text" class="form-control" id="invoicePrefix" name="invoicePrefix"
                                placeholder=" "
                                value="{{ $generalSettings->where('key', 'invoicePrefix')->first()->value }}">
                            <label class="form-label" for="invoicePrefix">Invoice Prefix</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-floating col-6 mb-4">
                            <input type="text" class="form-control" id="adjustmentPrefix" name="adjustmentPrefix"
                                placeholder=" "
                                value="{{ $generalSettings->where('key', 'adjustmentPrefix')->first()->value }}">
                            <label class="form-label" for="adjustmentPrefix">Adjustment Prefix</label>
                        </div>
                        <div class="form-floating col-6 mb-4">
                            <input type="text" class="form-control" id="transferPrefix" name="transferPrefix"
                                placeholder=" "
                                value="{{ $generalSettings->where('key', 'transferPrefix')->first()->value }}">
                            <label class="form-label" for="transferPrefix">Transfer Prefix</label>
                        </div>
                    </div>
                    <div class="form-floating col-12 mb-4">
                        <textarea class="form-control" id="invoiceNote" name="invoiceNote" style="height: 200px" placeholder=" ">
                                {{ $generalSettings->where('key', 'invoiceNote')->first()->value }}</textarea>
                        <label class="form-label" for="invoiceNote">Invoice Footer</label>
                    </div>
                    <div class="form-floating col-12 mb-4">
                        <textarea class="form-control" id="quotationNote" name="quotationNote" style="height: 200px" placeholder=" ">
                                {{ $generalSettings->where('key', 'quotationNote')->first()->value }}</textarea>
                        <label class="form-label" for="quotationNote">Quotation Footer</label>
                    </div>
                    <div class="form-floating col-12 mb-4">
                        <textarea class="form-control" id="copyright" name="copyright" style="height: 200px" placeholder=" ">
                                {{ $generalSettings->where('key', 'copyright')->first()->value }}</textarea>
                        <label class="form-label" for="copyright">Copyright</label>
                    </div>
                    <div class="text-right mb-4">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
