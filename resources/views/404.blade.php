@extends('layouts.app')

@section('content')
@include('partials.page-header')
<div class="regular-contents" style="height: 500px;">
  @if (!have_posts())
  <p class="contents-title">Coming soon...</p>
  <div class="sitemap-container">

    {{--<div class="alert alert-warning">--}}
      {{--{{ __('Sorry, but the page you were trying to view does not exist.', 'sage') }}--}}
      {{--</div>--}}
    {{--{!! get_search_form(false) !!}--}}
    <p>こちらのページは現在準備中です。</p>
  </div>
  @endif
</div>
@endsection