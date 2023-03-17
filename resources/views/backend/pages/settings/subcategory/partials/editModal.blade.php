<div class="modal" id="editModalSubCategories" tabindex="-1" role="dialog" aria-labelledby="editModalSubCategories"
    aria-hidden="true">
    <div class="modal-dialog " role="document">
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
                    <form enctype="multipart/form-data" id="editSubCategoryForm">
                        @csrf
                        <input type="hidden" id="idSubCategory" name="idSubCategory" />
                        <div class="block-content fs-sm">
                            <div class="form-floating col-12 mb-4">
                                <input type="text"
                                    class="form-control @error('subcategoryNameEdit') is-invalid @enderror"
                                    id="subcategoryNameEdit" name="subcategoryNameEdit" placeholder="Category Name"
                                    value="{{ old('subcategoryName') }}">
                                <label class="form-label" for="example-text-input-floating">Name</label>
                                @if ($errors->has('subcategoryNameEdit'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('subcategoryNameEdit') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-floating col-12 mb-4">
                                <select class="form-select @error('category_idEdit') is-invalid @enderror"
                                    id="category_idEdit" name="category_idEdit"
                                    aria-label="Floating label select example">
                                    <option selected="">Select a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <label class="form-label" for="example-select-floating">Category</label>
                                @if ($errors->has('category_idEdit'))
                                    <span class="invalid-feedback">{{ $errors->first('category_idEdit') }}
                                    </span>
                                @endif
                                @error('category_idEdit')
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
                            <button type="submit" id="submitForm" class="btn btn-alt-primary" value="Save">
                                Save
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
