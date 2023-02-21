<div class="modal" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('pnsCategory.store') }}" method="POST" id="categoryForm" name="categoryForm">
                @csrf
                <div class="block block-rounded shadow-none mb-0 block-themed">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Add Category</h3>
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
                                    <th class="text-info">Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row mb-6">
                            <div class="form-floating col-12 mb-4">
                                <input type="text" class="form-control @error('categoryName') is-invalid @enderror"
                                    id="categoryName" name="categoryName" placeholder="Category Name"
                                    value="{{ old('categoryName') }}">
                                <label class="form-label" for="example-text-input-floating">Name</label>
                                @error('categoryName')
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
                            Add Category
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
