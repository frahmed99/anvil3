<div class="col-md-7 col-xl-12">
    <!-- Message List -->
    @include('livewire.settings.modals.addCategory')
    <div class="block block-rounded block-themed">
        <div class="block-header block-header-default">
            <h3 class="block-title">{{ __('CATEGORY') }}</h3>
            <div class="block-options">
                <button href="" type="button" class="btn btn-sm btn-alt-primary" data-bs-toggle="modal"
                    data-bs-target="#addModal">
                    <i class="fa fa-plus opacity-50 me-1"></i>{{ __('Add Category') }}
                </button>
            </div>
        </div>
        <div class="block-content">
            <table class="table table-bordered table-striped table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center">Category Name</th>
                        <th class="text-center">Category Type</th>
                        <th class="text-center">Description</th>
                        <th style="width: 15%;" class="text-center">Actions</th>
                    </tr>
                </thead>
                @foreach ($categories as $category)
                    <tbody>
                        <tr>
                            <td class="fw-semibold">{{ $category->name }}</td>
                            <td>{{ $category->type }}</td>
                            <td>{{ $category->description }}</td>
                            <td class="text-center">
                                <button type="button" wire:click="edit({{ $category->id }})"
                                    class=" btn btn-sm btn-alt-primary me-1 js-bs-tooltip-enabled" href=""
                                    data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i class="fa fa-fw fa-edit"></i></button>
                                <button type="button" wire:click.prevent="delete({{ $category->id }})"
                                    class="btn btn-sm btn-alt-danger me-1 js-bs-tooltip-enabled"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
            <div>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
    <!-- END Message List -->
</div>
