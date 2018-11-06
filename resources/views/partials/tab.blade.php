@php(App\Controllers\App::is_mobile() ? $size = 'small_thumb' : $size = 'normal_thumb')

<div class="tab-container">
    <div class="tab-buttons-wrapper">
        <div id="tabNew" class="tab-button active">
            <div class="active-line"></div>
            <div class="tab-bg"></div>
            <p class="tab-text">New Posts</p>
        </div>
        <div id="tabPop" class="tab-button">
            <div class="active-line"></div>
            <div class="tab-bg"></div>
            <p class="tab-text">Poplar Posts</p>
        </div>
    </div>
    <div class="tab-card-wrapper">
        <div class="tab-new-wrapper active">
            @component('partials.tab-header', [
                    'tabName' => 'New Posts',
                    'tabLink' => '/new',
            ])
            @endcomponent
            <div class="tab-card-inside-wrapper">
                @php($i = 0) @while($latest_posts->have_posts() && $i < 5) @php($latest_posts->the_post())
                @component('partials.card-sm', [
                    'link' => get_permalink(),
                    'title' => get_the_title(),
                    'image' => get_the_post_thumbnail_url(get_the_ID(), $size),
                    'category' => get_the_category()[0]->cat_name,
                    'description' => get_post_meta(get_the_ID(), 'short_description', true)
                ])
                @endcomponent
                @php($i += 1) @endwhile
            </div>
            <a href="/new" class="tab-view-more-button">
                <p class="text">View More New Posts</p>
                <img class="arrow-right" src="@asset('images/arrow_right_white.svg')" alt="">
            </a>
        </div>

        <div class="tab-pop-wrapper">
            @component('partials.tab-header', [
                    'tabName' => 'Popular Posts',
                    'tabLink' => '/popular',
            ])
            @endcomponent
            <div class="tab-card-inside-wrapper">
                @php($i = 0) @while($popular_posts->have_posts() && $i < 5) @php($popular_posts->the_post())
                @component('partials.card-sm', [
                    'link' => get_permalink(),
                    'title' => get_the_title(),
                    'image' => get_the_post_thumbnail_url(get_the_ID(), $size),
                    'category' => get_the_category()[0]->cat_name,
                    'description' => get_post_meta(get_the_ID(), 'short_description', true)
                ])
                @endcomponent
                @php($i += 1) @endwhile
            </div>
            <a href="/popular" class="tab-view-more-button">
                <p class="text">View More Popular Posts</p>
                <img class="arrow-right" src="@asset('images/arrow_right_white.svg')" alt="">
            </a>
        </div>
    </div>
</div>