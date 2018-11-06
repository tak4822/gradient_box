<header id="header" class="banner">
  <div class="container">
    <a class="brand" href="{{ home_url('/') }}">
      <div class="header-logo">
        <img class="bird" src="@asset('images/logo_bird.svg')" alt="">
        <div class="logo-letter-container">
          <img class="logo-letter" src="@asset('images/logo_c.svg')" alt="">
          <img class="logo-letter" src="@asset('images/logo_a.svg')" alt="">
          <img class="logo-letter" src="@asset('images/logo_n.svg')" alt="">
          <img class="logo-letter" src="@asset('images/logo_a.svg')" alt="">
          <img class="logo-letter" src="@asset('images/logo_r.svg')" alt="">
          <img class="logo-letter" src="@asset('images/logo_i.svg')" alt="">
          <img class="logo-letter" src="@asset('images/logo_e.svg')" alt="">
        </div>
      </div>
    </a>
    <button class="hamburger hamburger--elastic" type="button">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </button>
    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!!
         wp_nav_menu(
            array (
                'menu'            => 'main-menu',
                'theme_location' => 'primary_navigation',
                'container'       => FALSE,
                'container_id'    => FALSE,
                'menu_class'      => 'nav',
                'menu_id'         => FALSE,
                'depth'           => 1,
                'walker'          => new Description_Walker
            )
          );
         !!}
      @endif
    </nav>
    <a href="https://line.me/R/ti/p/%40icw3397b" class="nav-line">
      <div class="line-container">
        <div class="line-contents">
          <p class="nav-line-head">CanarieとLine＠</p>
          <p class="nav-line-text">カナダへの留学、ワーキングホリデーの悩みから、恋の悩みまで、Lineで気軽にCanarieスタッフと相談できちゃいます！もちろん無料です！</p>
        </div>
        <div class="line-block"></div>
      </div>
    </a>
  </div>
</header>
