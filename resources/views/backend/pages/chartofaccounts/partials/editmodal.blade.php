<div class="modal" id="editModalChartOfAccounts" tabindex="-1" role="dialog" aria-labelledby="editModalChartOfAccounts"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Terms &amp; Conditions</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm">
                    <form enctype="multipart/form-data" id="formEditChartOfAccounts" method="POST">
                        @csrf
                        @method('PUT')
                        <p class="p-3 rounded" id="msgEditChartOfAccounts"></p>
                        <input type="hidden" name="idChartOfAccounts" id="idChartOfAccounts">
                        <div class="mb-4">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="editName" name="editName"
                                    placeholder="Name">
                                <label class="form-label" for="editName">Account Name</label>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="editCode" name="editCode"
                                    placeholder="Code">
                                <label class="form-label" for="editCode">Account Code</label>
                            </div>
                        </div>
                        <div class="form-floating mb-4">
                            <select class="form-select @error('code') is-invalid @enderror" id="editSubtypeId"
                                name="editSubtypeId" aria-label="Floating label select example">
                                <option value="">Select a value ...</option>
                                @foreach ($types as $type)
                                    <optgroup label="{{ $type->name }}">
                                        {{ count($type->subtypes) }}
                                        @foreach ($type->subtypes as $subtype)
                                            <option value="{{ $subtype->id }}">{{ $subtype->name }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                            <label class="form-label" for="editSubtypeId">Account Type*</label>
                        </div>
                        <div class="form-group">
                            <label for="editDescription">Description</label>
                            <textarea class="form-control" id="editDescription" name="editDescription" placeholder="Enter description">{{ old('editDescription') }}</textarea>
                        </div>
                        <div class="block-content block-content-full block-content-sm text-end border-top">
                            <button type="button" class="btn btn-alt-danger" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" id="submitForm" class="btn btn-alt-primary" value="Save">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
