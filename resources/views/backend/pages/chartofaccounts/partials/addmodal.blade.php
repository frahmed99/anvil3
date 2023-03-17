<div class="modal fade" id="addChartOfAccounts" tabindex="-1" aria-labelledby="addChartOfAccounts" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0 block-themed">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Add Account</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <form action="{{ route('chartofaccounts.store') }}" method="POST" id="chartOfAccountsForm"
                    name="chartOfAccountsForm">
                    @csrf
                    <div class="block-content fs-sm">
                        <div class="form-floating mb-4">
                            <input type="text"
                                class="form-control @error('chartOfAccountsName') is-invalid @enderror"
                                id="chartOfAccountsName" name="chartOfAccountsName" placeholder="Name"
                                value="{{ old('chartOfAccountsName') }}">
                            <label class="form-label" for="chartOfAccountsName">Name*</label>
                            @error('chartOfAccountsName')
                                <span class="invalid-feedback" role="alert">
                                    <strong id="nameErr">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text"
                                class="form-control  @error('chartOfAccountsCode') is-invalid @enderror"
                                id="chartOfAccountsCode" name="chartOfAccountsCode" placeholder="chartOfAccountsCode">
                            <label class="form-label" for="chartOfAccountsCode">Code</label>
                            @error('chartOfAccountsCode')
                                <span class="invalid-feedback" role="alert">
                                    <strong id="codeErr">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <select class="form-select @error('chart_of_accounts_subtypes_id') is-invalid @enderror"
                                id="chart_of_accounts_subtypes_id" name="chart_of_accounts_subtypes_id"
                                aria-label="Floating label select example">
                                <option selected="">Select an option</option>
                                @foreach ($types as $type)
                                    <optgroup label="{{ $type->name }}">
                                        {{ count($type->subtypes) }}
                                        @foreach ($type->subtypes as $subtype)
                                            <option value="{{ $subtype->id }}">{{ $subtype->name }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                            @error('chart_of_accounts_subtypes_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label class="form-label" for="chart_of_accounts_subtypes_id">Account Type*</label>
                        </div>
                        <div class="form-floating mb-4">
                            <textarea class="form-control  @error('chartOfAccountsDescription') is-invalid @enderror"
                                id="chartOfAccountsDescription" name="chartOfAccountsDescription" style="height: 100px"
                                placeholder="Leave a description here"></textarea>
                            <label class="form-label" for="description">Description</label>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm text-end border-top">
                        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-success">
                            Add
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
