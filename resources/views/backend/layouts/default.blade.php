<!doctype html>
<html lang="en">

<head>
    @include('backend.includes.head')
</head>

<body>
    <div id="page-container"
        class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow remember-theme">
        <!-- Main Container -->
        @include('backend.includes.sidebar')
        @include('backend.includes.header')
        <main id="main-container">
            <!-- Page Content -->
            <div class="content content-full">
                @yield('content')
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
        @include('backend.includes.footer')
    </div>
    <!-- END Page Container -->
    @yield('js_after')
</body>

</html>
