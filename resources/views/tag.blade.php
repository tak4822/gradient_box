@extends('layouts.app')

@section('content')
    @php($cat = get_the_category()[0])
    <div class="cat-hero-container tag-page">
        <div class="gradient-bg tag-page"></div>
        <div class="title-wrapper">
            <p class="title tag">{{ get_the_archive_title() }}</p>
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
