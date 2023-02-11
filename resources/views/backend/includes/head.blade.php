    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>@yield('title', 'Anvil Accounts')</title>

    <meta name="description" content="Anvil Accounts &amp; Created By ReachIT Zambia">
    <meta name="author" content="reachitzm">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Anvil Accounts &amp; UI Framework">
    <meta property="og:site_name" content="Codebase">
    <meta property="og:description" content="Anvil Accounts &amp; Created By ReachIT Zambia">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    @yield('css')

    @vite(['resources/sass/main.scss', 'resources/js/codebase/app.js'])
    @notifyCss
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css" rel="stylesheet"
        type="text/css" />
