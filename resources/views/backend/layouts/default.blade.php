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
                @isset($slot)
                    {{ $slot }}
                @endisset
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
        @include('backend.includes.footer')
    </div>
    <!-- END Page Container -->
    @yield('scripts')
    <script>
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif
        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif
        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif
        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>
</body>

</html>
