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
            <div class="bg-image" style="background-image: url('media/photos/photo34@2x.jpg');">
                <div class="row mx-0 bg-earth-op">
                    <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
                        <div class="p-4">
                            <p class="fs-3 fw-semibold text-white mb-1">
                                We're very happy you are joining our community!
                            </p>
                            <p class="fs-5 text-white fw-medium">
                                <i class="fa fa-angle-right opacity-50"></i> Create your account today.
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
                                <a class="link-fx fw-bold" href="index.html">
                                    <i class="fa fa-fire"></i>
                                    <span class="fs-4 text-body-color">anvil</span><span
                                        class="fs-4">ERP</span>
                                </a>
                                <h1 class="h3 fw-bold mt-4 mb-2">Create New Account</h1>
                                <h2 class="h5 fw-medium text-muted mb-0">Please add your details</h2>
                            </div>
                            <!-- END Header -->

                            <!-- Sign Up Form -->
                            <!-- jQuery Validation functionality is initialized with .js-validation-signup class in js/pages/op_auth_signup.min.js which was auto compiled from _js/pages/op_auth_signup.js -->
                            <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            <form class="js-validation-signup px-4" action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control" id="name" name="name"
                                        :value="old('name')" required autofocus placeholder="Enter your Name">
                                    <label class="form-label" for="{{ __('name') }}">Name</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="email" class="form-control" id="email" name="email"
                                        required autofocus placeholder="Enter your email">
                                    <label class="form-label" for="{{ __('Email') }}">Email</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="password" class="form-control" id="password" name="password"
                                        required autofocus placeholder="Enter your password">
                                    <label class="form-label" for="{{ __('Password') }}">Password</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="password" class="form-control" id="password_confirmation"
                                        required autofocus name="password_confirmation" placeholder="Confirm Password">
                                    <label class="form-label" for="signup-password-confirm"
                                        value="{{ __('Confirm Password') }}">Confirm Password</label>
                                </div>
                                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                    <div class="mt-4">
                                        <x-jet-label for="terms">
                                            <div class="flex items-center">
                                                <x-jet-checkbox name="terms" id="terms" />

                                                <div class="ml-2">
                                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
    'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900">' . __('Terms of Service') . '</a>',
    'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900">' . __('Privacy Policy') . '</a>',
]) !!}
                                                </div>
                                            </div>
                                        </x-jet-label>
                                    </div>
                                @endif
                                <div class="mb-4">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="signup-terms"
                                            name="signup-terms" value="1">
                                        <label class="form-check-label" for="signup-terms">I agree to Terms</label>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <button type="submit" class="btn btn-lg btn-alt-primary fw-semibold"
                                        href="{{ route('register') }}">
                                        Create Account
                                    </button>
                                </div>
                            </form>
                            <div class="mt-4">
                                <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="#"
                                    data-bs-toggle="modal" data-bs-target="#modal-terms">
                                    Read Terms
                                </a>
                                <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block"
                                    href="{{ route('login') }}">
                                    Sign In
                                </a>
                            </div>

                            <!-- END Sign Up Form -->
                        </div>
                    </div>
                </div>

                <!-- Terms Modal -->
                <div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-labelledby="modal-terms"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-slidedown" role="document">
                        <div class="modal-content">
                            <div class="block block-rounded shadow-none mb-0">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Terms &amp; Conditions</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content fs-sm">
                                    <h5 class="mb-2">1. General</h5>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices,
                                        justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien
                                        in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum
                                        tincidunt auctor.
                                    </p>
                                    <h5 class="mb-2">2. Account</h5>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices,
                                        justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien
                                        in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum
                                        tincidunt auctor.
                                    </p>
                                    <h5 class="mb-2">3. Service</h5>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices,
                                        justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien
                                        in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum
                                        tincidunt auctor.
                                    </p>
                                    <h5 class="mb-2">4. Payments</h5>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices,
                                        justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien
                                        in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum
                                        tincidunt auctor.
                                    </p>
                                </div>
                                <div class="block-content block-content-full block-content-sm text-end border-top">
                                    <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="button" class="btn btn-alt-primary" data-bs-dismiss="modal">
                                        Done
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Terms Modal -->
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <!-- Terms Modal -->
    <div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-labelledby="modal-terms"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-slidedown" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Terms &amp; Conditions</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat
                            magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna
                            molestie vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero
                            condimentum venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat
                            nostra molestie neque nullam scelerisque neque commodo turpis quisque etiam egestas
                            vulputate massa, curabitur tellus massa venenatis congue dolor enim integer luctus, nisi
                            suscipit gravida fames quis vulputate nisi viverra luctus id leo dictum lorem, inceptos nibh
                            orci.</p>
                        <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat
                            magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna
                            molestie vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero
                            condimentum venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat
                            nostra molestie neque nullam scelerisque neque commodo turpis quisque etiam egestas
                            vulputate massa, curabitur tellus massa venenatis congue dolor enim integer luctus, nisi
                            suscipit gravida fames quis vulputate nisi viverra luctus id leo dictum lorem, inceptos nibh
                            orci.</p>
                        <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat
                            magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna
                            molestie vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero
                            condimentum venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat
                            nostra molestie neque nullam scelerisque neque commodo turpis quisque etiam egestas
                            vulputate massa, curabitur tellus massa venenatis congue dolor enim integer luctus, nisi
                            suscipit gravida fames quis vulputate nisi viverra luctus id leo dictum lorem, inceptos nibh
                            orci.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-alt-success" data-dismiss="modal">
                        <i class="fa fa-check"></i> Perfect
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- END Terms Modal -->
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/pages/op_auth_signup.min.js') }}"></script>
</body>

</html>
