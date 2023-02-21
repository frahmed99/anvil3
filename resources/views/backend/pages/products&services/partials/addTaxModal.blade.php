<div class="modal" id="addTaxModal" tabindex="-1" role="dialog" aria-labelledby="addTaxModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('pnstax.store') }}" method="POST" id="taxForm" name="taxForm">
                @csrf
                <div class="block block-rounded shadow-none mb-0 block-themed">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Add Tax</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <table class="table table-vcenter" id="taxTable">
                            <thead>
                                <tr>
                                    <th class="text-info">Tax</th>
                                    <th class="d-none d-sm-table-cell text-info" style="width: 15%">
                                        Rate
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($taxes as $tax)
                                    <tr>
                                        <td>{{ $tax->name }}</td>
                                        <td class="d-none d-sm-table-cell">{{ $tax->rate }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row mb-4">
                            <div class="form-floating col-6 mb-4">
                                <input type="text" class="form-control @error('taxName') is-invalid @enderror"
                                    id="taxName" name="taxName" placeholder="Tax Name">
                                <label class="form-label" for="example-text-input-floating">Name</label>
                                @error('taxName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-floating col-6 mb-4">
                                <input type="text" class="form-control @error('taxRate') is-invalid @enderror"
                                    id="taxRate" name="taxRate" placeholder="Tax Rate %">
                                <label class="form-label" for="example-text-input-floating">Rate</label>
                                @error('taxRate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm text-end border-top">
                        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-alt-primary">
                            Add Tax
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
