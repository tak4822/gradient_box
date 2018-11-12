@extends('layouts.app')

@section('content')
@php($cat = get_the_category()[0] echo(get_the_category()))
<div class="cat-hero-container">
  <div class="gradient-bg"></div>
  <div class="title-wrapper">
    <p class="title">{{ $cat->name }}</p>
    <p class="desc">{{ $cat->description }}</p>
  </div>

  <p class="tags-tile">POPURAR TAGS</p>
  <div class="tags-container">
    @foreach(App\my_category_tag_cloud(['cat' => $cat->cat_ID]) as $key => $tag)
    @if($key < 6 ) <a href="{{ get_tag_link($tag->term_id) }}" class="tag-wrapper pull-right">
      <div class="tag-deco">
        <img src="@asset('images/tag_deco.svg')" alt="">
      </div>
      <p class="tag-text">{{ $tag->name }}</p>
      </a>
      @endif
      @endforeach
  </div>
</div>
<div class="category-container">
  @while(have_posts()) @php(the_post())
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
  @php($count = $cat->category_count)
  @php(App\pagination($count))
</div>
@endsection