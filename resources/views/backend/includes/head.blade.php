<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<title>Anvil Accounting Software </title>

<meta name="description" content="Anvil Accounting Software created by Reach IT Zambia">
<meta name="author" content="reachitzm">
<meta name="robots" content="noindex, nofollow">

<!-- Open Graph Meta -->
<meta property="og:title" content="Anvil Accounting Software">
<meta property="og:site_name" content="Anvil Accounting Software">
<meta property="og:description" content="Anvil Accounting Software created by Reach IT Zambia">
<meta property="og:type" content="website">
<meta property="og:url" content="">
<meta property="og:image" content="">

<!-- Icons -->
<link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
<link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

<!-- Modules -->
  @yield('css')
@vite(['resources/sass/main.scss', 'resources/js/codebase/app.js'])
  @yield('js')

<!-- Alternatively, you can also include a specific color theme after the main stylesheet to alter the default color theme of the template -->
{{-- @vite(['resources/sass/main.scss', 'resources/sass/codebase/themes/corporate.scss', 'resources/js/codebase/app.js']) --}}
