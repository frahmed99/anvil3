<nav id="sidebar">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
        <!-- Side Header -->
        <div class="content-header justify-content-lg-center">
            <!-- Logo -->
            <div>
                <span class="smini-visible fw-bold tracking-wide fs-lg">
                    c<span class="text-primary">b</span>
                </span>
                <a class="link-fx fw-bold tracking-wide mx-auto" href="{{ route('home') }}">
                    <span class="smini-hidden">
                        <i class="fa fa-fire text-primary"></i>
                        <span class="fs-4 text-dual">anvil</span><span class="fs-4 text-primary">Accounts</span>
                    </span>
                </a>
            </div>
            <!-- END Logo -->

            <!-- Options -->
            <div>
                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-sm btn-alt-danger d-lg-none" data-toggle="layout"
                    data-action="sidebar_close">
                    <i class="fa fa-fw fa-times"></i>
                </button>
                <!-- END Close Sidebar -->
            </div>
            <!-- END Options -->
        </div>
        <!-- END Side Header -->
        <!-- Sidebar Scrolling -->
        <div class="js-sidebar-scroll">
            <!-- Side User -->
            <div class="content-side content-side-user px-0 py-0">
                <!-- Visible only in mini mode -->
                <div class="smini-visible-block animated fadeIn px-3">
                    <img class="img-avatar img-avatar32"
                        src="{{ !empty(Auth::user()->profile_photo_path) ? url('media/upload/user_images/' . Auth::user()->profile_photo_path) : url('media/avatars/avatar0.jpg') }}"
                        alt="">
                </div>
                <!-- END Visible only in mini mode -->
                <!-- Visible only in normal mode -->
                <div class="smini-hidden text-center mx-auto">
                    <a class="img-link" href="{{ route('profile.edit') }}">
                        <img class="img-avatar"
                            src="{{ !empty(Auth::user()->profile_photo_path) ? url('media/upload/user_images/' . Auth::user()->profile_photo_path) : url('media/avatars/avatar0.jpg') }}"
                            alt="">
                    </a>
                    <ul class="list-inline mt-3 mb-0">
                        <li class="list-inline-item">
                            <a class="link-fx text-dual fs-sm fw-semibold text-uppercase"
                                href="be_pages_generic_profile.html">{{ Auth::user()->name }}</a>
                        </li>
                        <li class="list-inline-item">
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="link-fx text-dual" data-toggle="layout" data-action="dark_mode_toggle"
                                tooltip="Dark Mode">
                                <i class="fa fa-burn"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="link-fx text-dual" href="{{ route('admin.logout') }}"
                                @click.prevent="$root.submit();">
                                <i class="fa fa-sign-out-alt"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END Visible only in normal mode -->
            </div>
            <!-- END Side User -->

            <!-- Side Navigation -->
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('dashboard') }}">
                            <i class="nav-main-link-icon fa fa-house-user"></i>
                            <span class="nav-main-link-name">{{ __('Dashboard') }}</span>
                        </a>
                    </li>
                    <li class="nav-main-item{{ request()->is('staff/*') ? ' open' : '' }}">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-grip-vertical"></i>
                            <span class="nav-main-link-name">{{ __('Staff') }}</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link{{ request()->is('staff/user') ? ' active' : '' }}"
                                    href="{{ route('user.index') }}">
                                    <span class="nav-main-link-name">{{ __('Users') }}</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link{{ request()->is('staff/role') ? ' active' : '' }}"
                                    href="{{ route('role.index') }}">
                                    <span class="nav-main-link-name">{{ __('Roles') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="be_blocks_styles.html">
                            <i class="nav-main-link-icon fa fa-house-user"></i>
                            <span class="nav-main-link-name">{{ __('Product & Services') }}</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="be_blocks_styles.html">
                            <i class="nav-main-link-icon fa fa-house-user"></i>
                            <span class="nav-main-link-name">{{ __('Product Stock') }}</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('customer.index') }}">
                            <i class="nav-main-link-icon fa fa-house-user"></i>
                            <span class="nav-main-link-name">{{ __('Customers') }}</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="be_blocks_styles.html">
                            <i class="nav-main-link-icon fa fa-house-user"></i>
                            <span class="nav-main-link-name">{{ __('Vendors') }}</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-grip-vertical"></i>
                            <span class="nav-main-link-name">{{ __('Banking') }}</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_blocks_styles.html">
                                    <span class="nav-main-link-name">{{ __('Accounts') }}</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_blocks_styles.html">
                                    <span class="nav-main-link-name">{{ __('Transfer') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-grip-vertical"></i>
                            <span class="nav-main-link-name">Income</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_blocks_styles.html">
                                    <span class="nav-main-link-name">Quotations</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_blocks_styles.html">
                                    <span class="nav-main-link-name">Invoices</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_blocks_styles.html">
                                    <span class="nav-main-link-name">Revenue</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_blocks_styles.html">
                                    <span class="nav-main-link-name">Credit Note</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-grip-vertical"></i>
                            <span class="nav-main-link-name">Expense</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_blocks_styles.html">
                                    <span class="nav-main-link-name">Bill</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_blocks_styles.html">
                                    <span class="nav-main-link-name">Payment</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_blocks_styles.html">
                                    <span class="nav-main-link-name">Debit Note</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-grip-vertical"></i>
                            <span class="nav-main-link-name">Double Entry</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_blocks_styles.html">
                                    <span class="nav-main-link-name">Chart Of Accounts</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_blocks_styles.html">
                                    <span class="nav-main-link-name">Journal Account</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_blocks_styles.html">
                                    <span class="nav-main-link-name">Ledger Summary</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_blocks_styles.html">
                                    <span class="nav-main-link-name">Balance Sheet</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_blocks_styles.html">
                                    <span class="nav-main-link-name">Trial Balance</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="be_blocks_styles.html">
                            <i class="nav-main-link-icon fa fa-house-user"></i>
                            <span class="nav-main-link-name">Budget Planner</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="be_blocks_styles.html">
                            <i class="nav-main-link-icon fa fa-house-user"></i>
                            <span class="nav-main-link-name">Contract</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="be_blocks_styles.html">
                            <i class="nav-main-link-icon fa fa-house-user"></i>
                            <span class="nav-main-link-name">Goal</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="be_blocks_styles.html">
                            <i class="nav-main-link-icon fa fa-house-user"></i>
                            <span class="nav-main-link-name">Assets</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="be_blocks_styles.html">
                            <i class="nav-main-link-icon fa fa-house-user"></i>
                            <span class="nav-main-link-name">Plan</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="be_blocks_styles.html">
                            <i class="nav-main-link-icon fa fa-house-user"></i>
                            <span class="nav-main-link-name">Order</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-grip-vertical"></i>
                            <span class="nav-main-link-name">Reports</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_blocks_styles.html">
                                    <span class="nav-main-link-name">Transactions</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_blocks_styles.html">
                                    <span class="nav-main-link-name">Account Summary</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_blocks_styles.html">
                                    <span class="nav-main-link-name">Income Summary</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_blocks_styles.html">
                                    <span class="nav-main-link-name">Expense Summary</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_blocks_styles.html">
                                    <span class="nav-main-link-name">Income Vs Expense</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_blocks_styles.html">
                                    <span class="nav-main-link-name">Tax Summary</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_blocks_styles.html">
                                    <span class="nav-main-link-name">Profit And Loss</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_blocks_styles.html">
                                    <span class="nav-main-link-name">Invoice Summary</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_blocks_styles.html">
                                    <span class="nav-main-link-name">Bill Summary</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_blocks_styles.html">
                                    <span class="nav-main-link-name">Product Stock</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-grip-vertical"></i>
                            <span class="nav-main-link-name">Constant</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_blocks_styles.html">
                                    <span class="nav-main-link-name">Taxes</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_blocks_styles.html">
                                    <span class="nav-main-link-name">Category</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_blocks_styles.html">
                                    <span class="nav-main-link-name">Unit</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_blocks_styles.html">
                                    <span class="nav-main-link-name">Contract Type</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="be_blocks_styles.html">
                            <i class="nav-main-link-icon fa fa-house-user"></i>
                            <span class="nav-main-link-name">Company Settings</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- END Sidebar Scrolling -->
    </div>
    <!-- Sidebar Content -->
</nav>
<!-- END Sidebar -->
