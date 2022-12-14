<!doctype html>
<html lang="en">

<head>
    @include('backend.includes.head')
</head>

<body>
    <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-fixed remember-theme">
        <!-- Main Container -->
        @include('backend.includes.sidebar')
        @include('backend.includes.header')
        <main id="main-container">
            @yield('content')
            @isset($slot)
                {{ $slot }}
            @endisset
        </main>
        <!-- END Main Container -->
        @include('backend.includes.footer')
    </div>
    <!-- END Page Container -->
    @include('backend.includes.scripts')
</body>

</html>
