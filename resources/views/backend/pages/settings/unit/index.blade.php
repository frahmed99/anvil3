@extends('backend.pages.settings.index')

@section('title')
    Unit - Anvil Accounts
@endsection

@section('js')
    @include('backend.pages.settings.unit.partials.scripts')
@stop

@section('subcontent')
    <livewire:settings.unit>
    @endsection
