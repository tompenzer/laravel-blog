@extends('admin.layouts.app')

@section('content')
    <h1>@lang('users.create')</h1>

    {{ Form::open(['route' => ['admin.users.store']]) }}

        @include('admin/users/_form')

        {{ Form::submit(__('forms.actions.add'), ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}
@endsection
