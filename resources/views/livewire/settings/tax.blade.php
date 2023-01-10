<div class="col-md-7 col-xl-12">
    @include('livewire.settings.modals.tax')
    <div class="block block-rounded block-themed">
        <div class="block-header block-header-default">
            <h3 class="block-title">{{ __('TAX') }}</h3>
            <div class="block-options">
                <button href="" type="button" class="btn btn-sm btn-alt-primary" data-bs-toggle="modal"
                    data-bs-target="#addModal">
                    <i class="fa fa-plus opacity-50 me-1"></i>{{ __('Add Tax') }}
                </button>
            </div>
        </div>
        <div class="block-content">
            <table class="table table-bordered table-striped table-vcenter" id="DataTable">
                <thead>
                    <tr>
                        <th>Tax Name</th>
                        <th>Tax Rate (%)</th>
                        <th style="width: 15%;" class="text-center">Actions</th>
                    </tr>
                </thead>
                @foreach ($taxes as $tax)
                    <tbody>
                        <tr>
                            <td class="fw-semibold">{{ $tax->name }}</td>
                            <td>{{ $tax->rate }}</td>
                            <td class="text-center">
                                <button type="button" wire:click="edit({{ $tax->id }})"
                                    class=" btn btn-sm btn-alt-primary me-1 js-bs-tooltip-enabled" href=""
                                    data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i class="fa fa-fw fa-edit"></i></button>
                                <button type="button" wire:click.prevent="delete({{ $tax->id }})"
                                    class="btn btn-sm btn-alt-danger me-1 js-bs-tooltip-enabled"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
            <div class="col-sm-12 col-md-7">
            </div>
        </div>
    </div>
</div>
