  <div class="form-row">
    <div class="form-group col-md-6">
      {{ Form::label('name', __('users.attributes.name')) }}
      {{ Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('users.placeholder.name'), 'required']) }}

      @if ($errors->has('name'))
        <span class="invalid-feedback">{{ $errors->first('name') }}</span>
      @endif
    </div>

    <div class="form-group col-md-6">
      {{ Form::label('email', __('users.attributes.email')) }}
      {{ Form::text('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => __('users.placeholder.email'), 'required']) }}

      @if ($errors->has('email'))
        <span class="invalid-feedback">{{ $errors->first('email') }}</span>
      @endif
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      {{ Form::label('password', __('users.attributes.password')) }}
      {{ Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => __('users.placeholder.password')]) }}

      @if ($errors->has('password'))
        <span class="invalid-feedback">{{ $errors->first('password') }}</span>
      @endif
    </div>

    <div class="form-group col-md-6">
      {{ Form::label('password_confirmation', __('users.attributes.password_confirmation')) }}
      {{ Form::password('password_confirmation', ['class' => 'form-control' . ($errors->has('password_confirmation') ? ' is-invalid' : ''), 'placeholder' => __('users.placeholder.password_confirmation')]) }}

      @if ($errors->has('password_confirmation'))
        <span class="invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
      @endif
    </div>
  </div>

  <div class="form-group">
    {{ Form::label('roles', __('users.attributes.roles')) }}

    @foreach($roles as $role)
      <div class="checkbox">
        <label>
          {{ Form::checkbox("roles[$role->id]", $role->id, (isset($user) ? $user->hasRole($role->name) : false)) }}
          @if (Lang::has('roles.' . $role->name))
            {!! __('roles.' . $role->name) !!}
          @else
            {{ ucfirst($role->name) }}
          @endif
        </label>
      </div>
    @endforeach
  </div>

  <div class="form-group">
      {{ Form::label('title', __('users.attributes.title')) }}
      {{ Form::text('title', null, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => __('users.placeholder.title')]) }}

      @if ($errors->has('title'))
          <span class="invalid-feedback">{{ $errors->first('title') }}</span>
      @endif
  </div>

  <div class="form-group">
      {{ Form::label('blurb', __('users.attributes.blurb')) }}
      {{ Form::textarea('blurb', null, ['class' => 'form-control trumbowyg-form' . ($errors->has('blurb') ? ' is-invalid' : ''), 'placeholder' => __('users.placeholder.blurb')]) }}

      @if ($errors->has('blurb'))
          <span class="invalid-feedback">{{ $errors->first('blurb') }}</span>
      @endif
  </div>

  <div class="form-group">
      {{ Form::label('media_id', __('users.attributes.profile_pic')) }}
      {{ Form::select('media_id', $media, null, ['placeholder' => __('users.placeholder.profile_pic'), 'class' => 'form-control' . ($errors->has('media_id') ? ' is-invalid' : '')]) }}

      @if ($errors->has('media_id'))
          <span class="invalid-feedback">{{ $errors->first('media_id') }}</span>
      @endif
  </div>

  {{ link_to_route('admin.users.index', __('forms.actions.back'), [], ['class' => 'btn btn-secondary']) }}
