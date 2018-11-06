<article @php(post_class())>
  <div class="post-header">
    <div class="featured-image">
      <img src="{{ get_the_post_thumbnail_url() }}" alt="">
      <div class="featured-image-deco"></div>
    </div>
    <header class="article-header">
      <p class="date"><a class="cat" href="/category/{{ get_the_category()[0]->name }}">{{ get_the_category()[0]->name }} </a> / {{ get_post_time('M j, Y') }}</p>
      <div class="deco"></div>
      <h1 class="entry-title">{{ get_the_title() }}</h1>
      @php($interviewee = get_post_meta(get_the_ID(), 'interviewee', true) )
      @if($interviewee)
        <h4 class="interviewee">- {{ $interviewee }}</h4>
      @endif
      <h2 class="short_description">{{ get_post_meta(get_the_ID(), 'short_description', true) }}</h2>
      @if($interviewee)
        <div class="author-container">
          <p class="title">Interviewer</p>
          <div class="author-wrapper">
            <div class="avator-container">
              <img class="avator" src="{{ get_avatar_url(get_the_author_meta( 'ID' ), 32) }}" alt="">
            </div>
            <div class="contents">
              <p class="name">{{ the_author_meta('nickname') }}</p>
              <p class="desc">{{ the_author_meta('description') }}</p>
            </div>
          </div>
        </div>
      @endif
    </header>
  </div>
  <div class="entry-content">
    <div id="toc"></div>

    @php(the_content())

    <div class="article-tags-container">
      {{--<p class="title">Related Tags</p>--}}
      <div class="article-tags">
        @php($tags = get_the_tags())
        @foreach($tags as $key => $tag)
          <a href="{{ get_tag_link($tag->term_id) }}" class="tag-wrapper pull-left">
            <div class="tag-deco">
              <img class="image-cover" src="@asset('images/tag_deco.svg')" alt="">
            </div>
            <p class="tag-text">{{ $tag->name }}</p>
          </a>
        @endforeach
      </div>
    </div>

    @if(get_post_meta(get_the_ID(), 'isauthor', true))
    <div class="article-author">
      <p class="author-title">About The Author</p>
      <div class="author-contents">
        <div class="author-img-container">
          <img src="{{ get_avatar_url(get_the_author_meta( 'ID' ), array("size"=>200)) }}" alt="">
        </div>
        <div class="author-introduce">
          <p class="name">{{ the_author_meta('nickname') }}</p>
          <p class="author-comments">{{ the_author_meta('description') }}</p>

          <a href="{{ the_author_meta('user_url') }}" target="_blank" class="author-url">
            <img src="@asset('images/author_url_icon.svg')" alt="">
            <p class="author-url-text">{{ the_author_meta('user_url') }}</p>
          </a>

        </div>
      </div>
    </div>
    @endif
  </div>

  <footer>
    {!!
      wp_link_pages( array(
        'echo'      => 0,
        'before'    => '<div class="post-pagination-container">',
        'after'     => '</div>',
        'pagelink'  => '<span class="number">%</span>',
      ));
    !!}
  </footer>
</article>
