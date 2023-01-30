@section('js')
    @include('backend.pages.settings.currency.partials.scripts')
@stop
<div class="modal" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
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
                    <form action="{{ route('currency.store') }}" method="post">
                        @csrf

                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="example-text-input-floating"
                                name="example-text-input-floating" placeholder="John Doe">
                            <label class="form-label" for="example-text-input-floating">Currency Symbol</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="example-text-input-floating"
                                name="example-text-input-floating" placeholder="John Doe">
                            <label class="form-label" for="example-text-input-floating">Currency Code</label>
                        </div>
                    </form>
                </div>
                <div class="block-content block-content-full block-content-sm text-end border-top">
                    <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-alt-primary" data-bs-dismiss="modal">
                        Done
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
