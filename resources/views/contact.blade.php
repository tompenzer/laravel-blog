@extends('layouts.app')

@section('content')

<h2 class="text-light">@lang('contact.form.title', ['author' => (isset($recipients->name) ? $recipients->name : __('contact.form.author'))])</h2>

{{ Form::open(['route' => ['contact.send']]) }}

<div class="form-row">
    <div class="form-group col-md-6">
        <label class="text-light">
            @lang('contact.form.email')
            {{ Form::email('email_from', null, ['class' => 'form-control' . ($errors->has('email_from') ? ' is-invalid' : ''), 'required']) }}
        </label>

        @if ($errors->has('email_from'))
        <span class="invalid-feedback">{{ $errors->first('email_from') }}</span>
        @endif
    </div>
</div>

@if (isset($recipients->id))
{{ Form::hidden('recipient', $recipients->id) }}
@elseif (is_array($recipients) && count($recipients) > 0)
<div class="form-row">
    <div class="form-group col-md-6">
        <label class="text-light">
            @lang('contact.form.recipient')
            {{ Form::select('recipient', $recipients, ['class' => 'form-control' . ($errors->has('recipient') ? ' is-invalid' : '')]) }}
        </label>

        @if ($errors->has('recipient'))
        <span class="invalid-feedback">{{ $errors->first('recipient') }}</span>
        @endif
    </div>
</div>
@endif

<div class="form-row">
    <div class="form-group col-md-12">
        <label class="text-light">
            @lang('contact.form.message')
            {{ Form::textarea('message', null, ['class' => 'form-control' . ($errors->has('message') ? ' is-invalid' : ''), 'required']) }}
        </label>

        @if ($errors->has('message'))
        <span class="invalid-feedback">{{ $errors->first('message') }}</span>
        @endif
    </div>
</div>

{{ Form::submit(__('forms.actions.send'), ['class' => 'btn btn-primary']) }}

{{ Form::close() }}
@endsection
