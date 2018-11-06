<footer id="footer" class="content-info">
  <div class="container">
    @include('partials.news-letter')
    <div class="footer-contents">
      <img class="footer-logo" src="@asset('images/logo_white.svg')" alt="">
      <div class="footer-sns-container">
        <a class="footer-sns" href="https://www.instagram.com/canarie_official/" class="footer-instagram">
          <img class="sns-logo" src="@asset('images/instagram_logo.svg')" alt="">
          {{--<p>公式Instagram</p>--}}
        </a>
        <a class="footer-sns" href="https://twitter.com/CanarieOfficial" class="footer-instagram">
          <img class="sns-logo" src="@asset('images/twitter.svg')" alt="">
          {{--<p>公式Twitter</p>--}}
        </a>
        <a class="footer-sns" href="https://twitter.com/CanarieOfficial" class="footer-instagram">
          <img class="sns-logo" src="@asset('images/facebook_logo.svg')" alt="">
          {{--<p>公式Twitter</p>--}}
        </a>
      </div>
      <div class="footer-info">
        <ul>
          <li class="info-list"><a href="/contact">お問い合わせ</a></li>
          <li class="info-list"><a href="/sitemap">サイトマップ</a></li>
          <li class="info-list"><a href="/policy">プライバシーポリシー</a></li>
        </ul>
      </div>
      {{--<a class="footer-member" href="/members">Canarie Members</a>--}}
      <p class="footer-right">&#169; 2017  5kai</p>
    </div>
  </div>
</footer>
