@extends('layouts.app')

@section('content')
<div class="row justify-content-md-center">
    <div class="col-md-6">
        <h1 class="text-light">@lang('auth.login')</h1>

        {!! Form::open(['route' => 'login', 'role' => 'form', 'method' => 'POST']) !!}
            <div class="form-group">
                {!! Form::label('email', __('validation.attributes.email'), ['class' => 'control-label text-light']) !!}
                {!! Form::email('email', old('email'), ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'required', 'autofocus']) !!}

                @if ($errors->has('email'))
                    <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('password', __('validation.attributes.password'), ['class' => 'control-label text-light']) !!}
                {!! Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'required']) !!}

                @if ($errors->has('password'))
                    <span class="invalid-feedback">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="form-group">
                <div class="checkbox">
                    <label class="text-light">
                        {!! Form::checkbox('remember', null, old('remember')) !!} @lang('auth.remember_me')
                    </label>
                </div>
            </div>

            <div class="form-group">
                {!! Form::submit(__('auth.login'), ['class' => 'btn btn-primary']) !!}
                {{ link_to('/password/reset', __('auth.forgotten_password'), ['class' => 'btn btn-link'])}}
            </div>
        {!! Form::close() !!}

        <hr>

        <div class="d-flex justify-content-between flex-wrap">
            @if (env('GITHUB_ID'))
                <a href="{{ route('auth.provider', ['provider' => 'github']) }}" class="btn btn-secondary mb-2">
                    @lang('auth.services.github')
                    <i class="fa fa-github" aria-hidden="true"></i>
                </a>
            @endif

            @if (env('TWITTER_ID'))
                <a href="{{ route('auth.provider', ['provider' => 'twitter']) }}" class="btn btn-secondary mb-2">
                    @lang('auth.services.twitter')
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
            @endif
        </div>
    </div>
</div>
@endsection
