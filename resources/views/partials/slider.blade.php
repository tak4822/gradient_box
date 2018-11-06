@php($slider = App\Controllers\FrontPage::get_slider_data())

<div class="home-slider">
  <div class="background"></div>
  <div id="touch" class="thumb-container">
    @foreach( $slider as $key => $post)
    <a href="{{ $post['link'] }}" class="thumb-item {{ $key === 0 ? 'active' : 'blur' }}">
      <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}">
    </a>
    @endforeach
  </div>
  <div class="desc-card">
    <a href="{{ $slider[0]['link'] }}" id="contents-link" class="contents">
      <div class="title-limit-wrapper">
        <p id="slider-title" class="title">{{ $slider[0]['title'] }}</p>
      </div>
      <p id="slider-short_description" class="slider-short-description">{{ $slider[0]['short_description'] }}</p>
    </a>
    <div class="navigation">
      <div class="page-category">
        <div class="page-number">
          <div class="reveal-wrapper">
            <p class="current-number">1</p>
          </div>
          <p>- {!! count($slider) !!}</p>
        </div>
        <div class="slider-category-container">
          <span class="category-deco"></span>
          <div class="reveal-wrapper">
            <p id="slider-category" class="category">{{ $slider[0]['category'] }}</p>
          </div>
        </div>
      </div>
      <div class="button-container">
        <button class="prev">
          <img class="arrow" src="@asset('images/arrow_left.svg')" alt="">
        </button>
        <div class="divider"></div>
        <button class="next">
          <img class="arrow" src="@asset('images/arrow_right.svg')" alt="">
        </button>
      </div>
    </div>
    <div class="tablet-bg-button-container">
      <a href="{{ $slider[0]['link'] }}" class="tablet-bg-button">
        <div class="deco"></div>
        <p class="text">Read This Article</p>
      </a>
    </div>
  </div>
</div>