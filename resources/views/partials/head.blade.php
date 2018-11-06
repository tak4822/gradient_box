<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{!! App\Controllers\App::getTitle() !!}</title>
  <meta name="description" content="{!! App\Controllers\App::getDescription() !!}" />
  <meta property="fb:app_id" content="320108315190662" />
  <meta property="article:publisher" content="https://www.facebook.com/Canarie-273980186510063/?modal=admin_todo_tour" />
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="@CanarieOfficial">
  <meta property="og:title" content="{!! App\Controllers\App::getTitle() !!}" />
  <meta property="og:url" content="{!! App\Controllers\App::getUrl() !!}" />
  <meta property="og:description" content="{!! App\Controllers\App::getDescription() !!}" />
  @if(App\Controllers\App::getImage() === null)
    <meta property="og:image" content="@asset('images/canarie_logo.jpg')" />
  @else
    <meta property="og:image" content="{!! App\Controllers\App::getImage() !!}" />
  @endif

  <meta property="og:site_name" content="Canarie" />
  <meta property="og:type" content="{!! App\Controllers\App::getType() !!}" />
  <link rel="icon" type="image/x-icon" href="@asset('images/canarie_logo.png')" />
  @php(wp_head())
<!-- Global site tag (gtag.js) - Google Analytics -->
  {{--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118467846-1"></script>--}}
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCg4eHF8OzId9jX9Bs949BpStwGLpyLoYQ"></script>
  <script async="" defer="defer" src="//platform.instagram.com/en_US/embeds.js"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-118467846-1');
  </script>

  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
              new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
          j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
          'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-KNCLD8M');</script>
  <!-- End Google Tag Manager -->

</head>
