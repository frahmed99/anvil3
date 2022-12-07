@extends('backend.layouts.default')
@section('content')
    <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
        <a class="breadcrumb-item" href="{{ '/dashboard' }}">{{ __('Dashboard') }}</a>
        <a class="breadcrumb-item" href="{{ route('user.index') }}">{{ __('Users') }}</a>
        <span class="breadcrumb-item active">{{ __('Add User') }}</span>
    </nav>


@stop
