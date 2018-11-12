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

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCg4eHF8OzId9jX9Bs949BpStwGLpyLoYQ"></script>
  <script async="" defer="defer" src="//platform.instagram.com/en_US/embeds.js"></script>

</head>
