@php(App\Controllers\App::is_mobile() ? $size = 'small_thumb' : $size = 'normal_thumb')

<div class="side-container">
    @if(is_single())
        <div class="other-articles">
            <div class="popular-articles">
                <div class="other-articles-title-container">
                    <div class="deco"></div>
                    <p class="other-articles-title">Popular Articles</p>
                </div>
                @php($i = 0) @while($popular_posts->have_posts() && $i < 5) @php($popular_posts->the_post())
                @component('partials.card-sm', [
                    'link' => get_permalink(),
                    'title' => get_the_title(),
                    'image' => get_the_post_thumbnail_url(get_the_ID(), $size),
                    'category' => get_the_category()[0]->cat_name,
                    'description' => get_post_meta(get_the_ID(), 'short_description', true),
                ])
                @endcomponent
                @php($i += 1) @endwhile
            </div>
            @if (App\Controllers\App::related_posts($post)->have_posts())
              <div class="related-articles">
                  <div class="other-articles-title-container">
                      <div class="deco"></div>
                      <p class="other-articles-title">Related Article</p>
                  </div>
                  @php($i = 0) @while(App\Controllers\App::related_posts($post)->have_posts() && $i < 5) @php(App\Controllers\App::related_posts($post)->the_post())
                  @component('partials.card-sm', [
                      'link' => get_permalink(),
                      'title' => get_the_title(),
                      'image' => get_the_post_thumbnail_url(get_the_ID(), $size),
                      'category' => get_the_category()[0]->cat_name,
                      'description' => get_post_meta(get_the_ID(), 'short_description', true),
                  ])
                  @endcomponent
                  @php($i += 1) @endwhile
              </div>
            @endif
        </div>
    @endif
    <div class="side-line">
        <p class="side-line-head">CanarieのLine＠相談</p>
        <div class="side-line-contents">
            <img class="side-line-img" src="@asset('images/line_rabit.png')" alt="">
            <p>カナダへの留学、ワーキングホリデーの悩みから、恋の悩みまで、Lineで気軽にCanarieスタッフと相談できちゃいます！</p>
        </div>
        <a href="https://line.me/R/ti/p/%40icw3397b" class="side-line-button">
            <p class="button-text">Talk With Us</p>
        </a>
    </div>
    <a href="/writer" class="side-ad">
        <img src="@asset('images/banner_writer.jpg')" alt="">
    </a>
</div>
