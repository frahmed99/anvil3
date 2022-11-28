<!doctype html>
<html lang="en">

<head>
    @include('frontend.includes.head')
</head>

<body>
    <div id="page-container" class="main-content-boxed">

        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="hero bg-body-extra-light">
                <div class="hero-inner">
                    <div class="content content-full">
                        <div class="py-4 text-center">
                            <div class="display-1 fw-bold text-warning">403</div>
                            <h1 class="fw-bold mt-5 mb-2">Oops.. You just found an error page..</h1>
                            <h2 class="fs-4 fw-medium text-muted mb-5">You do not have enough permissions to perform this action.</h2>
                            <a class="btn btn-lg btn-alt-secondary" href="{{ route('home') }}">
                                <i class="fa fa-arrow-left opacity-50 me-1"></i> Back To HomePage
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->
</body>

</html>
