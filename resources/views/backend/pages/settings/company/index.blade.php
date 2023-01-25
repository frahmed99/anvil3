@extends('backend.pages.settings.index')

@section('title')
    Currencies - Anvil Accounts
@endsection

@section('js')
    @include('backend.pages.settings.currency.partials.styles')
@stop

@section('js')
    @include('backend.pages.settings.currency.partials.scripts')
@stop

@section('subcontent')
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Floating Labels</h3>
        </div>
        <div class="block-content">
            <form action="be_forms_elements.html" method="POST" onsubmit="return false;">
                <form <div class="form-floating col-6 mb-4">
                    <input type="text" class="form-control" id="companyName" name="companyName" placeholder="John Doe">
                    <label class="form-label" for="companyName">Company Name*</label>
        </div>
        <div class="form-floating col-6 mb-4">
            <input type="email" class="form-control" id="companyEmail" name="companyEmail"
                placeholder="john.doe@example.com">
            <label class="form-label" for="companyEmail">Company Email</label>
        </div>
        <div class="form-floating mb-4">
            <input type="email" class="form-control" id="companyWebsite" name="companyWebsite"
                placeholder="john.doe@example.com">
            <label class="form-label" for="companyWebsite">Company Website</label>
        </div>
        <div class="form-floating mb-4">
            <input type="email" class="form-control" id="companyPhone" name="companyPhone"
                placeholder="john.doe@example.com">
            <label class="form-label" for="companyPhone">Company Phone</label>
        </div>
        <div class="form-floating mb-4">
            <textarea class="form-control" id="companyAddress" name="companyAddress" style="height: 200px"
                placeholder="Leave a comment here"></textarea>
            <label class="form-label" for="companyAddress">Company Address</label>
        </div>
        </form>
    </div>
    </div>
@endsection
