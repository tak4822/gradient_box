@extends('layouts.app')

@section('content')
<div class="cat-hero-container tag-page">
  <div class="gradient-bg tag-page"></div>
  <div class="title-wrapper">
    <p class="title">New Posts</p>
    <p class="desc">最新記事</p>
  </div>
</div>
<div class="category-container">
  @while($latest_posts->have_posts()) @php($latest_posts->the_post())
  @component('partials.card-bg', [
  'link' => get_permalink(),
  'date' => get_post_time('M j Y'),
  'title' => get_the_title(),
  'image' => get_the_post_thumbnail_url(),
  'description' => mb_strimwidth( get_post_meta(get_the_ID(), 'short_description', true), 0, 150, "...", "UTF-8"),
  'tags' => get_the_tags()
  ])
  @endcomponent
  @endwhile
</div>
<div class="pagination-container">
  @php($count = $latest_posts->found_posts)
  @php(App\pagination($count))
</div>
@endsection