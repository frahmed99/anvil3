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
            <div class="bg-image" style="background-image: url('media/photos/Victoria_Falls.jpg');">
                <div class="row mx-0 bg-default-op">
                    <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
                        <div class="p-4">
                            <p class="fs-3 fw-semibold text-white">
                                You are awesome! Build something amazing!
                            </p>
                            <p class="text-white-75 fw-medium">
                                Copyright &copy; <span data-toggle="year-copy"></span>
                            </p>
                        </div>
                    </div>
                    <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-body-extra-light">
                        <div class="content content-full">
                            <!-- Header -->
                            <div class="px-4 py-2 mb-4">
                                <a class="link-fx fw-bold" href="{{ route('home') }}">
                                    <i class="fa fa-fire"></i>
                                    <span class="fs-4 text-body-color">code</span><span class="fs-4">base</span>
                                </a>
                                <h1 class="h3 fw-bold mt-4 mb-2">Don’t worry, we’ve got your back</h1>
                                <h2 class="h5 fw-medium text-muted mb-0">Please enter your email</h2>
                            </div>
                            <!-- END Header -->

                            <!-- Reminder Form -->
                            <!-- jQuery Validation functionality is initialized with .js-validation-reminder class in js/pages/op_auth_reminder.min.js which was auto compiled from _js/pages/op_auth_reminder.js -->
                            <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            <form class="js-validation-reminder px-4" action="{{ route('password.email') }}"
                                method="POST">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control" id="{{ __('Email') }}"
                                        name="{{ __('Email') }}" placeholder="Enter your email">
                                    <label class="form-label" for="{{ __('Email') }}">{{ __('Email') }}</label>
                                </div>
                                <div class="mb-4">
                                    <button type="submit" class="btn btn-lg btn-alt-primary fw-semibold">
                                        {{ __('Email Password Reset Link') }}
                                    </button>
                                    <div class="mt-4">
                                        <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block"
                                            href="{{ route('login') }}">
                                            <i class="fa fa-arrow-left opacity-50 me-1"></i> Sign In
                                        </a>
                                    </div>
                                </div>
                            </form>
                            <!-- END Reminder Form -->
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
