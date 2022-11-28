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
            <div class="content content-full text-center">
                @yield('content')
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->
</body>
</html>
