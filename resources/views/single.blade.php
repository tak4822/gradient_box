@extends('layouts.app')

@section('content')
{{--記事のview数を更新(ログイン時・ロボットを除く)--}}
@if(!is_user_logged_in() && !is_robots())
	@php(App\setPostViews(get_the_ID()))
@endif

{{--Contents--}}
@while(have_posts()) @php(the_post())
	@include('partials.content-single-'.get_post_type())
@endwhile

@endsection