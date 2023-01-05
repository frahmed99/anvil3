@extends('backend.pages.settings.index')

@section('title')
    Category - Anvil Accounts
@endsection

@section('js')
    @include('backend.pages.settings.category.partials.scripts')
@stop

@section('subcontent')
    <livewire:settings.category>
    @endsection
