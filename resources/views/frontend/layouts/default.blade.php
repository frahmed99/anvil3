<!doctype html>
<html lang="en">

<head>
    @include('frontend.includes.head')
</head>

<body>
    <div id="page-container"
        class="sidebar-dark side-scroll page-header-fixed page-header-glass main-content-boxed remember-theme">

        <!-- Header -->
        <header id="page-header">
            @include('frontend.includes.header')
        </header>
        <!-- END Header -->

        <!-- Main Container -->
        <main id="main-container">
            @yield('content')
        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        <footer id="page-footer" class="bg-body-extra-light">
            @include('frontend.includes.footer')
        </footer>
        <!-- END Footer -->
</body>

</html>
