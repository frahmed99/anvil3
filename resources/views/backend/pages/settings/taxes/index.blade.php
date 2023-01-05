@extends('backend.pages.settings.index')

@section('title')
    Taxes - Anvil Accounts
@endsection

@section('js')
    @include('backend.pages.settings.taxes.partials.scripts')
@stop

@section('subcontent')
    <livewire:settings.tax>
    @endsection
