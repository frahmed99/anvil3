<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<title>Anvil Accounting</title>

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
@vite(['resources/sass/main.scss', 'resources/js/codebase/app.js', 'resources/sass/codebase/themes/elegance.scss'])
<script src="{{ asset('js/lib/jquery.min.js') }}"></script>
<!--Toastr---->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="@sweetalert2/theme-borderless/borderless.css">

@notifyCss

@yield('js')
