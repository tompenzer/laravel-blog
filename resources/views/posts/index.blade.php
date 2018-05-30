@extends('layouts.landing')

@section('content')
  @if (request()->has('q'))
    <h2 class="text-grey-light">{{ trans_choice('posts.search_results', $posts->count(), ['query' => request()->input('q')]) }}</h2>
  @else
    <h2 class="text-grey-light">@lang('posts.last_posts')</h2>
  @endif

  @include ('posts/_list')
@endsection
