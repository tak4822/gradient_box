<!doctype html>
<html @php(language_attributes())>
  @include('partials.head')
  <body @php(body_class())>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KNCLD8M"
                    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
    <div class="transition-overlay">
      {{--<img class="loader" src="@asset('images/canarie_loading_low.gif')" alt="">--}}
    </div>
    <div id="site-wrap" style="opacity: 0;">
      @php(do_action('get_header'))
      @include('partials.header')

      <div id="barba-wrapper" class="wrap container" role="document">
        <div class="barba-container" data-namespace="{{ $current_template }}">
          <div class="content">
            <main class="main">
              @yield('content')
            </main>
            @if (App\display_sidebar())
              <aside class="sidebar">
                @include('partials.sidebar')
              </aside>
            @endif
          </div>
        </div>
      </div>
      @php(do_action('get_footer'))
      @include('partials.footer')
    </div>
    @php(wp_footer())
  </body>
</html>
