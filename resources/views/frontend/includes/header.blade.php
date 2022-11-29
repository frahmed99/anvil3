    <!-- Header Content -->
    <div class="content-header">
        <!-- Left Section -->
        <div class="space-x-1">
            <!-- Logo -->
            <a class="link-fx fw-bold" href="{{ url('/') }}">
                <i class="fa fa-fire text-primary"></i>
                <span class="fs-4 text-dual">anvil</span><span class="fs-4 text-primary">Accounts</span>
            </a>
            <!-- END Logo -->
        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div class="d-flex align-items-center space-x-2">
            <!-- Header Navigation -->
            <!-- Desktop Navigation, mobile navigation can be found in #sidebar -->
            <ul class="nav-main nav-main-horizontal nav-main-hover d-none d-lg-block">
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="{{ route('home') }}">
                        <i class="nav-main-link-icon fa fa-home"></i>
                        <span class="nav-main-link-name">{{ __('Home') }}</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="{{ route('services') }}">
                        <i class="nav-main-link-icon fa fa-gears"></i>
                        <span class="nav-main-link-name">{{ __('Services') }}</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="{{ route('pricing') }}">
                        <i class="nav-main-link-icon fa fa-money-bill"></i>
                        <span class="nav-main-link-name">{{ __('Pricing') }}</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="{{ route('blog') }}">
                        <i class="nav-main-link-icon fa fa-blog"></i>
                        <span class="nav-main-link-name">{{ __('Blog') }}</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="{{ route('contact') }}">
                        <i class="nav-main-link-icon fa fa-address-card"></i>
                        <span class="nav-main-link-name">{{ __('Contact Us') }}</span>
                    </a>
                </li>
            </ul>

            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ route('dashboard') }}" type="button" class="btn btn-sm btn-primary me-1 mb-1">
                            <i
                                class="
                            fa-solid fa-right-to-bracket opacity-50 me-1"></i></i>Your
                            Account
                        </a>
                    @else
                        <a href="{{ route('login') }}" type="button" class="btn btn-sm btn-primary me-1 mb-1">
                            <i class="fa-solid fa-right-to-bracket opacity-50 me-1"></i></i>Login
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" type="button"
                                class="btn btn-sm btn-primary me-1 mb-1">
                                <i class="fa-solid fa-registered opacity-50 me-1"></i></i>Register
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
            <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <!-- END Toggle Sidebar -->
        </div>
        <!-- END Right Section -->
    </div>
    <!-- END Header Content -->
    <!-- Header Search -->
    <div id="page-header-search" class="overlay-header bg-body-extra-light">
        <div class="content-header">
            <form class="w-100" action="be_pages_generic_search.html" method="POST">
                <div class="input-group">
                    <!-- Close Search Section -->
                    <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                    <button type="button" class="btn btn-secondary" data-toggle="layout"
                        data-action="header_search_off">
                        <i class="fa fa-fw fa-times"></i>
                    </button>
                    <!-- END Close Search Section -->
                    <input type="text" class="form-control" placeholder="Search or hit ESC.."
                        id="page-header-search-input" name="page-header-search-input">
                    <button type="submit" class="btn btn-secondary">
                        <i class="fa fa-fw fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- END Header Search -->

    <!-- Header Loader -->
    <div id="page-header-loader" class="overlay-header bg-primary">
        <div class="content-header">
            <div class="w-100 text-center">
                <i class="far fa-sun fa-spin text-white"></i>
            </div>
        </div>
    </div>
    <!-- END Header Loader -->

