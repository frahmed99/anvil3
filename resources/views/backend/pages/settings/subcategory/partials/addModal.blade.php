<div class="modal js-animation-object animated fadeIn" id="addModal" tabindex="-1" role="dialog"
    aria-labelledby="addModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-lg mb-0">
                <div class="block block-rounded shadow-none mb-0 block-themed">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Add Sub Category</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <form action="{{ route('subcategory.store') }}" method="POST" id="subcategoryForm"
                        name="subcategoryForm">
                        @csrf
                        <div class="block-content fs-sm">
                            <div class="form-floating col-12 mb-4">
                                <input type="text"
                                    class="form-control @error('subcategoryName') is-invalid @enderror"
                                    id="subcategoryName" name="subcategoryName" placeholder="Category Name"
                                    value="{{ old('subcategoryName') }}">
                                <label class="form-label" for="example-text-input-floating">Name</label>
                                @error('subcategoryName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-floating col-12 mb-4">
                                <select class="form-select @error('category_id') is-invalid @enderror"
                                    id="example-select-floating" name="category_id"
                                    aria-label="Floating label select example">
                                    <option selected="">Select a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <label class="form-label" for="example-select-floating">Category</label>
                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="block-content block-content-full block-content-sm text-end border-top">
                            <button type="button" class="btn btn-alt-secondary" data-animation-class="bounceOut"
                                data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-alt-primary">
                                Save
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
