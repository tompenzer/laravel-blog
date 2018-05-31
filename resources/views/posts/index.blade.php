@extends('layouts.landing')

@section('content')
  @if (request()->has('q'))
    <h2 class="text-grey-light margin-b-xl">{{ trans_choice('posts.search_results', $posts->count(), ['query' => request()->input('q')]) }}</h2>
  @else
    <h2 class="text-grey-light margin-b-xl">@lang('posts.last_posts')</h2>
  @endif

  @include ('posts/_list')
@endsection
