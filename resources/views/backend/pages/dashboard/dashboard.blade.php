@extends('backend.layouts.default')
@section('content')
    <div class="content">
        <div class="row">
            <!-- Row #1 -->
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded text-center js-appear-enabled animated fadeIn" data-toggle="appear"
                    data-offset="-200" href="javascript:void(0)">
                    <div class="block-content ribbon ribbon-bookmark ribbon-glass ribbon-left bg-gd-dusk">
                        <div class="ribbon-box">750</div>
                        <p class="mt-2 mb-3">
                            <i class="si si-book-open fa-2x text-white-75"></i>
                        </p>
                        <p class="fw-semibold text-white">Customers</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded text-center js-appear-enabled animated fadeIn" data-toggle="appear"
                    data-offset="-200" data-timeout="200" href="javascript:void(0)">
                    <div class="block-content bg-gd-primary">
                        <p class="mt-2 mb-3">
                            <i class="si si-plus fa-2x text-white-75"></i>
                        </p>
                        <p class="fw-semibold text-white">Vendors</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded text-center js-appear-enabled animated fadeIn" data-toggle="appear"
                    data-offset="-200" data-timeout="400" href="be_pages_forum_categories.html">
                    <div class="block-content ribbon ribbon-bookmark ribbon-glass ribbon-left bg-gd-sea">
                        <div class="ribbon-box">16</div>
                        <p class="mt-2 mb-3">
                            <i class="si si-bubbles fa-2x text-white-75"></i>
                        </p>
                        <p class="fw-semibold text-white">Invoices</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded text-center js-appear-enabled animated fadeIn" data-toggle="appear"
                    data-offset="-200" data-timeout="600" href="be_pages_generic_search.html">
                    <div class="block-content bg-gd-lake">
                        <p class="mt-2 mb-3">
                            <i class="si si-magnifier fa-2x text-white-75"></i>
                        </p>
                        <p class="fw-semibold text-white">Bills</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded text-center js-appear-enabled animated fadeIn" data-toggle="appear"
                    data-offset="-200" data-timeout="800" href="be_pages_generic_search.html">
                    <div class="block-content bg-gd-lake">
                        <p class="mt-2 mb-3">
                            <i class="si si-magnifier fa-2x text-white-75"></i>
                        </p>
                        <p class="fw-semibold text-white">Bills</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded text-center js-appear-enabled animated fadeIn" data-toggle="appear"
                    data-offset="-200" data-timeout="1000" href="be_pages_generic_search.html">
                    <div class="block-content bg-gd-lake">
                        <p class="mt-2 mb-3">
                            <i class="si si-magnifier fa-2x text-white-75"></i>
                        </p>
                        <p class="fw-semibold text-white">Bills</p>
                    </div>
                </a>
            </div>
            <!-- END Row #1 -->
        </div>
        <div class="row">
            <!-- Row #2 -->
            <div class="col-md-6">
                <div class="block block-rounded block-bordered">
                    <div class="block-header block-header-default border-bottom">
                        <h3 class="block-title">
                            Sales <small>This week</small>
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option">
                                <i class="si si-wrench"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="pull pt-5">
                            <!-- Lines Chart Container functionality is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _js/pages/be_pages_dashboard.js -->
                            <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
                            <canvas id="js-chartjs-dashboard-lines" width="586" height="293"
                                style="display: block; box-sizing: border-box; height: 293px; width: 586px;"></canvas>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="row items-push text-center">
                            <div class="col-6 col-sm-4">
                                <div class="fw-semibold text-success">
                                    <i class="fa fa-caret-up"></i> +16%
                                </div>
                                <div class="fs-4 fw-semibold">720</div>
                                <div class="fs-sm fw-semibold text-uppercase text-muted">This Month</div>
                            </div>
                            <div class="col-6 col-sm-4">
                                <div class="fw-semibold text-danger">
                                    <i class="fa fa-caret-down"></i> -3%
                                </div>
                                <div class="fs-4 fw-semibold">160</div>
                                <div class="fs-sm fw-semibold text-uppercase text-muted">This Week</div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="fw-semibold text-success">
                                    <i class="fa fa-caret-up"></i> +9%
                                </div>
                                <div class="fs-4 fw-semibold">24.3</div>
                                <div class="fs-sm fw-semibold text-uppercase text-muted">Average</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="block block-rounded block-bordered">
                    <div class="block-header block-header-default border-bottom">
                        <h3 class="block-title">
                            Earnings <small>This week</small>
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option">
                                <i class="si si-wrench"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="pull pt-5">
                            <!-- Lines Chart Container functionality is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _js/pages/be_pages_dashboard.js -->
                            <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
                            <canvas id="js-chartjs-dashboard-lines2" width="586" height="293"
                                style="display: block; box-sizing: border-box; height: 293px; width: 586px;"></canvas>
                        </div>
                    </div>
                    <div class="block-content bg-body-extra-light">
                        <div class="row items-push text-center">
                            <div class="col-6 col-sm-4">
                                <div class="fw-semibold text-success">
                                    <i class="fa fa-caret-up"></i> +4%
                                </div>
                                <div class="fs-4 fw-semibold">$ 6,540</div>
                                <div class="fs-sm fw-semibold text-uppercase text-muted">This Month</div>
                            </div>
                            <div class="col-6 col-sm-4">
                                <div class="fw-semibold text-danger">
                                    <i class="fa fa-caret-down"></i> -7%
                                </div>
                                <div class="fs-4 fw-semibold">$ 1,525</div>
                                <div class="fs-sm fw-semibold text-uppercase text-muted">This Week</div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="fw-semibold text-success">
                                    <i class="fa fa-caret-up"></i> +35%
                                </div>
                                <div class="fs-4 fw-semibold">$ 9,352</div>
                                <div class="fs-sm fw-semibold text-uppercase text-muted">Balance</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Row #2 -->
        </div>
        <div class="row">
            <!-- Row #3 -->
            <div class="col-xl-8 d-flex align-items-stretch">
                <div class="block block-rounded block-themed block-mode-loading-dark block-transparent bg-image w-100"
                    style="background-image: url('/media/photos/photo34@2x.jpg');">
                    <div class="block-header bg-black-50">
                        <h3 class="block-title">
                            Sales <small class="text-white">This week</small>
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option">
                                <i class="si si-wrench"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content bg-black-50 p-1">
                        <!-- Lines Chart Container functionality is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _js/pages/be_pages_dashboard.js -->
                        <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
                        <canvas id="js-chartjs-dashboard-lines"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 d-flex align-items-stretch">
                <div class="block block-rounded block-transparent bg-primary-dark d-flex align-items-center w-100">
                    <div class="block-content block-content-full">
                        <div class="py-3 px-3 border-black-op-b d-flex justify-content-between align-items-center">
                            <div>
                                <div class="fs-3 fw-semibold text-success">750</div>
                                <div class="fs-sm fw-semibold text-uppercase text-success-light">Articles
                                </div>
                            </div>
                            <div class="mt-3 d-none d-sm-block">
                                <i class="si si-book-open fa-2x text-success"></i>
                            </div>
                        </div>
                        <div class="py-3 px-3 border-black-op-b d-flex justify-content-between align-items-center">
                            <div>
                                <div class="fs-3 fw-semibold text-danger">$980</div>
                                <div class="fs-sm fw-semibold text-uppercase text-danger-light">Earnings</div>
                            </div>
                            <div class="mt-3 d-none d-sm-block">
                                <i class="si si-wallet fa-2x text-danger"></i>
                            </div>
                        </div>
                        <div class="py-3 px-3 border-black-op-b d-flex justify-content-between align-items-center">
                            <div>
                                <div class="fs-3 fw-semibold text-warning">38</div>
                                <div class="fs-sm fw-semibold text-uppercase text-warning-light">Messages
                                </div>
                            </div>
                            <div class="mt-3 d-none d-sm-block">
                                <i class="si si-envelope-open fa-2x text-warning"></i>
                            </div>
                        </div>
                        <div class="py-3 px-3 border-black-op-b d-flex justify-content-between align-items-center">
                            <div>
                                <div class="fs-3 fw-semibold text-info">260</div>
                                <div class="fs-sm fw-semibold text-uppercase text-info-light">Online</div>
                            </div>
                            <div class="mt-3 d-none d-sm-block">
                                <i class="si si-users fa-2x text-info"></i>
                            </div>
                        </div>
                        <div class="py-3 px-3  d-flex justify-content-between align-items-center">
                            <div>
                                <div class="fs-3 fw-semibold text-elegance">59</div>
                                <div class="fs-sm fw-semibold text-uppercase text-elegance-light">Themes</div>
                            </div>
                            <div class="mt-3 d-none d-sm-block">
                                <i class="si si-drop fa-2x text-elegance"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Row #3 -->
        </div>
        <div class="row">
            <!-- Row #3 -->
            <div class="col-md-6">
                <div class="block block-rounded block-bordered">
                    <div class="block-header block-header-default border-bottom">
                        <h3 class="block-title">Latest Orders</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option">
                                <i class="si si-wrench"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <table class="table table-sm table-vcenter table-borderless table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 100px;">ID</th>
                                    <th>Status</th>
                                    <th class="d-none d-sm-table-cell">Customer</th>
                                    <th class="d-none d-sm-table-cell text-end">Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a class="fw-semibold" href="be_pages_ecom_order.html">ORD.1851</a>
                                    </td>
                                    <td>
                                        <span class="badge bg-danger">Canceled</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <a href="be_pages_ecom_customer.html">Sara Fields</a>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end">
                                        <span>$103</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="fw-semibold" href="be_pages_ecom_order.html">ORD.1850</a>
                                    </td>
                                    <td>
                                        <span class="badge bg-info">Processing</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <a href="be_pages_ecom_customer.html">Carl Wells</a>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end">
                                        <span>$291</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="fw-semibold" href="be_pages_ecom_order.html">ORD.1849</a>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">Completed</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <a href="be_pages_ecom_customer.html">Carol White</a>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end">
                                        <span>$535</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="fw-semibold" href="be_pages_ecom_order.html">ORD.1848</a>
                                    </td>
                                    <td>
                                        <span class="badge bg-warning">Pending</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <a href="be_pages_ecom_customer.html">Carol Ray</a>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end">
                                        <span>$887</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="fw-semibold" href="be_pages_ecom_order.html">ORD.1847</a>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">Completed</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <a href="be_pages_ecom_customer.html">Jesse Fisher</a>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end">
                                        <span>$767</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="fw-semibold" href="be_pages_ecom_order.html">ORD.1846</a>
                                    </td>
                                    <td>
                                        <span class="badge bg-danger">Canceled</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <a href="be_pages_ecom_customer.html">Jack Estrada</a>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end">
                                        <span>$840</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="fw-semibold" href="be_pages_ecom_order.html">ORD.1845</a>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">Completed</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <a href="be_pages_ecom_customer.html">Judy Ford</a>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end">
                                        <span>$552</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="fw-semibold" href="be_pages_ecom_order.html">ORD.1844</a>
                                    </td>
                                    <td>
                                        <span class="badge bg-danger">Canceled</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <a href="be_pages_ecom_customer.html">Susan Day</a>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end">
                                        <span>$767</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="fw-semibold" href="be_pages_ecom_order.html">ORD.1843</a>
                                    </td>
                                    <td>
                                        <span class="badge bg-danger">Canceled</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <a href="be_pages_ecom_customer.html">Lori Moore</a>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end">
                                        <span>$188</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="fw-semibold" href="be_pages_ecom_order.html">ORD.1842</a>
                                    </td>
                                    <td>
                                        <span class="badge bg-warning">Pending</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <a href="be_pages_ecom_customer.html">Jack Estrada</a>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end">
                                        <span>$814</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="block block-rounded block-bordered">
                    <div class="block-header block-header-default border-bottom">
                        <h3 class="block-title">Top Products</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option">
                                <i class="si si-wrench"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <table class="table table-sm table-vcenter table-borderless table-striped">
                            <thead>
                                <tr>
                                    <th class="d-none d-sm-table-cell" style="width: 100px;">ID</th>
                                    <th>Product</th>
                                    <th class="text-center">Orders</th>
                                    <th class="d-none d-sm-table-cell text-center">Rating</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="d-none d-sm-table-cell">
                                        <a class="fw-semibold" href="be_pages_ecom_product_edit.html">PID.258</a>
                                    </td>
                                    <td>
                                        <a href="be_pages_ecom_product_edit.html">Dark Souls III</a>
                                    </td>
                                    <td class="text-center">
                                        <a class="text-gray-dark" href="be_pages_ecom_orders.html">912</a>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-center">
                                        <div class="text-warning">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-none d-sm-table-cell">
                                        <a class="fw-semibold" href="be_pages_ecom_product_edit.html">PID.198</a>
                                    </td>
                                    <td>
                                        <a href="be_pages_ecom_product_edit.html">Bioshock Collection</a>
                                    </td>
                                    <td class="text-center">
                                        <a class="text-gray-dark" href="be_pages_ecom_orders.html">895</a>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-center">
                                        <div class="text-warning">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-none d-sm-table-cell">
                                        <a class="fw-semibold" href="be_pages_ecom_product_edit.html">PID.852</a>
                                    </td>
                                    <td>
                                        <a href="be_pages_ecom_product_edit.html">Alien Isolation</a>
                                    </td>
                                    <td class="text-center">
                                        <a class="text-gray-dark" href="be_pages_ecom_orders.html">820</a>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-center">
                                        <div class="text-warning">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-none d-sm-table-cell">
                                        <a class="fw-semibold" href="be_pages_ecom_product_edit.html">PID.741</a>
                                    </td>
                                    <td>
                                        <a href="be_pages_ecom_product_edit.html">Bloodborne</a>
                                    </td>
                                    <td class="text-center">
                                        <a class="text-gray-dark" href="be_pages_ecom_orders.html">793</a>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-center">
                                        <div class="text-warning">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-none d-sm-table-cell">
                                        <a class="fw-semibold" href="be_pages_ecom_product_edit.html">PID.985</a>
                                    </td>
                                    <td>
                                        <a href="be_pages_ecom_product_edit.html">Forza Motorsport 7</a>
                                    </td>
                                    <td class="text-center">
                                        <a class="text-gray-dark" href="be_pages_ecom_orders.html">782</a>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-center">
                                        <div class="text-warning">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-none d-sm-table-cell">
                                        <a class="fw-semibold" href="be_pages_ecom_product_edit.html">PID.056</a>
                                    </td>
                                    <td>
                                        <a href="be_pages_ecom_product_edit.html">Fifa 18</a>
                                    </td>
                                    <td class="text-center">
                                        <a class="text-gray-dark" href="be_pages_ecom_orders.html">776</a>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-center">
                                        <div class="text-warning">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-none d-sm-table-cell">
                                        <a class="fw-semibold" href="be_pages_ecom_product_edit.html">PID.036</a>
                                    </td>
                                    <td>
                                        <a href="be_pages_ecom_product_edit.html">Gears of War 4</a>
                                    </td>
                                    <td class="text-center">
                                        <a class="text-gray-dark" href="be_pages_ecom_orders.html">680</a>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-center">
                                        <div class="text-warning">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-none d-sm-table-cell">
                                        <a class="fw-semibold" href="be_pages_ecom_product_edit.html">PID.682</a>
                                    </td>
                                    <td>
                                        <a href="be_pages_ecom_product_edit.html">Minecraft</a>
                                    </td>
                                    <td class="text-center">
                                        <a class="text-gray-dark" href="be_pages_ecom_orders.html">670</a>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-center">
                                        <div class="text-warning">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-none d-sm-table-cell">
                                        <a class="fw-semibold" href="be_pages_ecom_product_edit.html">PID.478</a>
                                    </td>
                                    <td>
                                        <a href="be_pages_ecom_product_edit.html">Dishonored 2</a>
                                    </td>
                                    <td class="text-center">
                                        <a class="text-gray-dark" href="be_pages_ecom_orders.html">640</a>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-center">
                                        <div class="text-warning">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-none d-sm-table-cell">
                                        <a class="fw-semibold" href="be_pages_ecom_product_edit.html">PID.952</a>
                                    </td>
                                    <td>
                                        <a href="be_pages_ecom_product_edit.html">Gran Turismo Sport</a>
                                    </td>
                                    <td class="text-center">
                                        <a class="text-gray-dark" href="be_pages_ecom_orders.html">630</a>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-center">
                                        <div class="text-warning">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END Row #3 -->
        </div>
    </div>
@stop
