@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-2">
            <div class="card-body text-center">
                @if ($user->hasMedia())
                <img class="profile-img margin-b-m" src="{{ $user->media()->first()->getUrl() }}" alt="{{ $user->media()->first()->name }}">
                @endif
                <h2 v-pre class="card-title mb-0">{{ $user->name }}</h2>
                <small class="card-subtitle mb-2 text-muted">{{ $user->title }}</small>

                <div class="card-text text-left margin-t-m margin-b-m">{!! $user->blurb !!}</div>

                @profile($user)
                {{ link_to_route('users.edit', __('users.edit'), [], ['class' => 'btn btn-primary btn-sm float-right']) }}
                @endprofile
            </div>
        </div>
    </div>
</div>

<div class="row margin-t-m">
    <div class="col-md-12">
        <h2 class="text-grey-light">@lang('posts.last_posts')</h2>
        @each('users/_post', $posts, 'post')
    </div>
</div>
@endsection
