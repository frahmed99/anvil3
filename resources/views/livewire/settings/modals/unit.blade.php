<div wire:ignore.self class="modal" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">New Unit</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close"
                            wire:click="closeModal">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <form wire:submit.prevent="store">
                        <div class="row">
                            <div class="col-lg-8 col-xl-12">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control" wire:model="name" id="name"
                                        name="name" placeholder=" ">
                                    <label class="form-label" for="name">Unit Name</label>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full block-content-sm text-end border-top">
                            <button type="button" class="btn btn-alt-danger" data-bs-dismiss="modal"
                                wire:click="closeModal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-alt-success">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">New Unit</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <form wire:submit.prevent="update">
                        <div class="row">
                            <div class="col-lg-8 col-xl-12">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control" wire:model="name" id="name"
                                        name="name" placeholder=" ">
                                    <label class="form-label" for="name">Unit Name</label>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full block-content-sm text-end border-top">
                            <button type="button" class="btn btn-alt-danger" data-bs-dismiss="modal"
                                wire:click="closeModal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-alt-success">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
