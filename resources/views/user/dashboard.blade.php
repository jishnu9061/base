@extends('layouts.app')

@section('content')

    <body>
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                    <div class="app-brand demo mt-4">
                        <a href="index.html" class="app-brand-link">
                            <span class="app-brand-logo demo">
                                <svg width="32" height="22" viewBox="0 0 32 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                                        fill="#7367F0" />
                                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                                        fill="#161616" />
                                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                                        fill="#161616" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                                        fill="#7367F0" />
                                </svg>
                            </span>
                            <span class="app-brand-text demo menu-text fw-bold">Vuexy</span>
                        </a>

                        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
                        </a>
                    </div>

                    <div class="menu-inner-shadow"></div>

                    <ul class="menu-inner py-1">
                        <!-- Apps & Pages -->
                        <li class="menu-header small text-uppercase">
                            <span class="menu-header-text">Apps &amp; Pages</span>
                        </li>
                        <li class="menu-item">
                            <a href="app-email.html" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-mail"></i>
                                <div data-i18n="Email">Email</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="app-chat.html" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-messages"></i>
                                <div data-i18n="Chat">Chat</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="app-calendar.html" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-calendar"></i>
                                <div data-i18n="Calendar">Calendar</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="app-kanban.html" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-layout-kanban"></i>
                                <div data-i18n="Kanban">Kanban</div>
                            </a>
                        </li>
                    </ul>
                </aside>
                <!-- / Menu -->

                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Navbar -->

                    <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                        id="layout-navbar">
                        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                                <i class="ti ti-menu-2 ti-sm"></i>
                            </a>
                        </div>

                        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                            <!-- Search -->
                            <div class="navbar-nav align-items-center">
                                <div class="nav-item navbar-search-wrapper mb-0">
                                </div>
                            </div>
                            <!-- /Search -->

                            <ul class="navbar-nav flex-row align-items-center ms-auto">
                                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                        data-bs-toggle="dropdown">
                                        <div class="avatar avatar-online">
                                            <img src="../../assets/img/avatars/1.png" alt class="h-auto rounded-circle" />
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="pages-account-settings-account.html">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar avatar-online">
                                                            <img src="../../assets/img/avatars/1.png" alt
                                                                class="h-auto rounded-circle" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <span class="fw-semibold d-block">John Doe</span>
                                                        <small class="text-muted">Admin</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('user.logout') }}">
                                                @csrf
                                                <button type="submit" class="dropdown-item">
                                                    <i class="ti ti-logout me-2 ti-sm"></i>
                                                    <span class="align-middle">Log Out</span>
                                                </button>
                                            </form>
                                        </li>

                                    </ul>
                                </li>
                                <!--/ User -->
                            </ul>
                        </div>

                        <!-- Search Small Screens -->
                        <div class="navbar-search-wrapper search-input-wrapper d-none">
                            <input type="text" class="form-control search-input container-xxl border-0"
                                placeholder="Search..." aria-label="Search..." />
                            <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
                        </div>
                    </nav>

                    <!-- / Navbar -->

                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Content -->

                        <div class="container-xxl flex-grow-1 container-p-y">
                            <div class="row">
                                <!-- Website Analytics -->
                                <div class="col-lg-6 mb-4">
                                    <div class="swiper-container swiper-container-horizontal swiper swiper-card-advance-bg"
                                        id="swiper-with-pagination-cards">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h5 class="text-white mb-0 mt-2">Website Analytics</h5>
                                                        <small>Total 28.5% Conversion Rate</small>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-7 col-md-9 col-12 order-2 order-md-1">
                                                            <h6 class="text-white mt-0 mt-md-3 mb-3">Traffic</h6>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <ul class="list-unstyled mb-0">
                                                                        <li class="d-flex mb-4 align-items-center">
                                                                            <p
                                                                                class="mb-0 fw-semibold me-2 website-analytics-text-bg">
                                                                                28%</p>
                                                                            <p class="mb-0">Sessions</p>
                                                                        </li>
                                                                        <li class="d-flex align-items-center mb-2">
                                                                            <p
                                                                                class="mb-0 fw-semibold me-2 website-analytics-text-bg">
                                                                                1.2k</p>
                                                                            <p class="mb-0">Leads</p>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-6">
                                                                    <ul class="list-unstyled mb-0">
                                                                        <li class="d-flex mb-4 align-items-center">
                                                                            <p
                                                                                class="mb-0 fw-semibold me-2 website-analytics-text-bg">
                                                                                3.1k</p>
                                                                            <p class="mb-0">Page Views</p>
                                                                        </li>
                                                                        <li class="d-flex align-items-center mb-2">
                                                                            <p
                                                                                class="mb-0 fw-semibold me-2 website-analytics-text-bg">
                                                                                12%</p>
                                                                            <p class="mb-0">Conversions</p>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-lg-5 col-md-3 col-12 order-1 order-md-2 my-4 my-md-0 text-center">
                                                            <img src="../../assets/img/illustrations/card-website-analytics-1.png"
                                                                alt="Website Analytics" width="170"
                                                                class="card-website-analytics-img" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h5 class="text-white mb-0 mt-2">Website Analytics</h5>
                                                        <small>Total 28.5% Conversion Rate</small>
                                                    </div>
                                                    <div class="col-lg-7 col-md-9 col-12 order-2 order-md-1">
                                                        <h6 class="text-white mt-0 mt-md-3 mb-3">Spending</h6>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <ul class="list-unstyled mb-0">
                                                                    <li class="d-flex mb-4 align-items-center">
                                                                        <p
                                                                            class="mb-0 fw-semibold me-2 website-analytics-text-bg">
                                                                            12h</p>
                                                                        <p class="mb-0">Spend</p>
                                                                    </li>
                                                                    <li class="d-flex align-items-center mb-2">
                                                                        <p
                                                                            class="mb-0 fw-semibold me-2 website-analytics-text-bg">
                                                                            127</p>
                                                                        <p class="mb-0">Order</p>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-6">
                                                                <ul class="list-unstyled mb-0">
                                                                    <li class="d-flex mb-4 align-items-center">
                                                                        <p
                                                                            class="mb-0 fw-semibold me-2 website-analytics-text-bg">
                                                                            18</p>
                                                                        <p class="mb-0">Order Size</p>
                                                                    </li>
                                                                    <li class="d-flex align-items-center mb-2">
                                                                        <p
                                                                            class="mb-0 fw-semibold me-2 website-analytics-text-bg">
                                                                            2.3k</p>
                                                                        <p class="mb-0">Items</p>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-lg-5 col-md-3 col-12 order-1 order-md-2 my-4 my-md-0 text-center">
                                                        <img src="../../assets/img/illustrations/card-website-analytics-2.png"
                                                            alt="Website Analytics" width="170"
                                                            class="card-website-analytics-img" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h5 class="text-white mb-0 mt-2">Website Analytics</h5>
                                                        <small>Total 28.5% Conversion Rate</small>
                                                    </div>
                                                    <div class="col-lg-7 col-md-9 col-12 order-2 order-md-1">
                                                        <h6 class="text-white mt-0 mt-md-3 mb-3">Revenue Sources</h6>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <ul class="list-unstyled mb-0">
                                                                    <li class="d-flex mb-4 align-items-center">
                                                                        <p
                                                                            class="mb-0 fw-semibold me-2 website-analytics-text-bg">
                                                                            268</p>
                                                                        <p class="mb-0">Direct</p>
                                                                    </li>
                                                                    <li class="d-flex align-items-center mb-2">
                                                                        <p
                                                                            class="mb-0 fw-semibold me-2 website-analytics-text-bg">
                                                                            62</p>
                                                                        <p class="mb-0">Referral</p>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-6">
                                                                <ul class="list-unstyled mb-0">
                                                                    <li class="d-flex mb-4 align-items-center">
                                                                        <p
                                                                            class="mb-0 fw-semibold me-2 website-analytics-text-bg">
                                                                            890</p>
                                                                        <p class="mb-0">Organic</p>
                                                                    </li>
                                                                    <li class="d-flex align-items-center mb-2">
                                                                        <p
                                                                            class="mb-0 fw-semibold me-2 website-analytics-text-bg">
                                                                            1.2k</p>
                                                                        <p class="mb-0">Campaign</p>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-lg-5 col-md-3 col-12 order-1 order-md-2 my-4 my-md-0 text-center">
                                                        <img src="../../assets/img/illustrations/card-website-analytics-3.png"
                                                            alt="Website Analytics" width="170"
                                                            class="card-website-analytics-img" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                                <!--/ Website Analytics -->

                                <!-- Sales Overview -->
                                <div class="col-lg-3 col-sm-6 mb-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="d-flex justify-content-between">
                                                <small class="d-block mb-1 text-muted">Sales Overview</small>
                                                <p class="card-text text-success">+18.2%</p>
                                            </div>
                                            <h4 class="card-title mb-1">$42.5k</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="d-flex gap-2 align-items-center mb-2">
                                                        <span class="badge bg-label-info p-1 rounded"><i
                                                                class="ti ti-shopping-cart ti-xs"></i></span>
                                                        <p class="mb-0">Order</p>
                                                    </div>
                                                    <h5 class="mb-0 pt-1 text-nowrap">62.2%</h5>
                                                    <small class="text-muted">6,440</small>
                                                </div>
                                                <div class="col-4">
                                                    <div class="divider divider-vertical">
                                                        <div class="divider-text">
                                                            <span class="badge-divider-bg bg-label-secondary">VS</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <div class="d-flex gap-2 justify-content-end align-items-center mb-2">
                                                        <p class="mb-0">Visits</p>
                                                        <span class="badge bg-label-primary p-1 rounded"><i
                                                                class="ti ti-link ti-xs"></i></span>
                                                    </div>
                                                    <h5 class="mb-0 pt-1 text-nowrap ms-lg-n3 ms-xl-0">25.5%</h5>
                                                    <small class="text-muted">12,749</small>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center mt-4">
                                                <div class="progress w-100" style="height: 8px">
                                                    <div class="progress-bar bg-info" style="width: 70%"
                                                        role="progressbar" aria-valuenow="70" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-primary" role="progressbar"
                                                        style="width: 30%" aria-valuenow="30" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Sales Overview -->

                                <!-- Revenue Generated -->
                                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                                    <div class="card">
                                        <div class="card-body pb-0">
                                            <div class="card-icon">
                                                <span class="badge bg-label-success rounded-pill p-2">
                                                    <i class="ti ti-credit-card ti-sm"></i>
                                                </span>
                                            </div>
                                            <h5 class="card-title mb-0 mt-2">97.5k</h5>
                                            <small>Revenue Generated</small>
                                        </div>
                                        <div id="revenueGenerated"></div>
                                    </div>
                                </div>
                                <!--/ Revenue Generated -->

                                <!-- Earning Reports -->
                                <div class="col-lg-6 mb-4">
                                    <div class="card h-100">
                                        <div class="card-header pb-0 d-flex justify-content-between mb-lg-n4">
                                            <div class="card-title mb-0">
                                                <h5 class="mb-0">Earning Reports</h5>
                                                <small class="text-muted">Weekly Earnings Overview</small>
                                            </div>
                                            <div class="dropdown">
                                                <button class="btn p-0" type="button" id="earningReportsId"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="earningReportsId">
                                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                </div>
                                            </div>
                                            <!-- </div> -->
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 col-md-4 d-flex flex-column align-self-end">
                                                    <div class="d-flex gap-2 align-items-center mb-2 pb-1 flex-wrap">
                                                        <h1 class="mb-0">$468</h1>
                                                        <div class="badge rounded bg-label-success">+4.2%</div>
                                                    </div>
                                                    <small class="text-muted">You informed of this week compared to last
                                                        week</small>
                                                </div>
                                                <div class="col-12 col-md-8">
                                                    <div id="weeklyEarningReports"></div>
                                                </div>
                                            </div>
                                            <div class="border rounded p-3 mt-2">
                                                <div class="row gap-4 gap-sm-0">
                                                    <div class="col-12 col-sm-4">
                                                        <div class="d-flex gap-2 align-items-center">
                                                            <div class="badge rounded bg-label-primary p-1">
                                                                <i class="ti ti-currency-dollar ti-sm"></i>
                                                            </div>
                                                            <h6 class="mb-0">Earnings</h6>
                                                        </div>
                                                        <h4 class="my-2 pt-1">$545.69</h4>
                                                        <div class="progress w-75" style="height: 4px">
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: 65%" aria-valuenow="65" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <div class="d-flex gap-2 align-items-center">
                                                            <div class="badge rounded bg-label-info p-1"><i
                                                                    class="ti ti-chart-pie-2 ti-sm"></i></div>
                                                            <h6 class="mb-0">Profit</h6>
                                                        </div>
                                                        <h4 class="my-2 pt-1">$256.34</h4>
                                                        <div class="progress w-75" style="height: 4px">
                                                            <div class="progress-bar bg-info" role="progressbar"
                                                                style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <div class="d-flex gap-2 align-items-center">
                                                            <div class="badge rounded bg-label-danger p-1">
                                                                <i class="ti ti-brand-paypal ti-sm"></i>
                                                            </div>
                                                            <h6 class="mb-0">Expense</h6>
                                                        </div>
                                                        <h4 class="my-2 pt-1">$74.19</h4>
                                                        <div class="progress w-75" style="height: 4px">
                                                            <div class="progress-bar bg-danger" role="progressbar"
                                                                style="width: 65%" aria-valuenow="65" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Earning Reports -->

                                <!-- Support Tracker -->
                                <div class="col-md-6 mb-4">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between pb-0">
                                            <div class="card-title mb-0">
                                                <h5 class="mb-0">Support Tracker</h5>
                                                <small class="text-muted">Last 7 Days</small>
                                            </div>
                                            <div class="dropdown">
                                                <button class="btn p-0" type="button" id="supportTrackerMenu"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="supportTrackerMenu">
                                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 col-sm-4 col-md-12 col-lg-4">
                                                    <div class="mt-lg-4 mt-lg-2 mb-lg-4 mb-2 pt-1">
                                                        <h1 class="mb-0">164</h1>
                                                        <p class="mb-0">Total Tickets</p>
                                                    </div>
                                                    <ul class="p-0 m-0">
                                                        <li class="d-flex gap-3 align-items-center mb-lg-3 pt-2 pb-1">
                                                            <div class="badge rounded bg-label-primary p-1"><i
                                                                    class="ti ti-ticket ti-sm"></i></div>
                                                            <div>
                                                                <h6 class="mb-0 text-nowrap">New Tickets</h6>
                                                                <small class="text-muted">142</small>
                                                            </div>
                                                        </li>
                                                        <li class="d-flex gap-3 align-items-center mb-lg-3 pb-1">
                                                            <div class="badge rounded bg-label-info p-1">
                                                                <i class="ti ti-circle-check ti-sm"></i>
                                                            </div>
                                                            <div>
                                                                <h6 class="mb-0 text-nowrap">Open Tickets</h6>
                                                                <small class="text-muted">28</small>
                                                            </div>
                                                        </li>
                                                        <li class="d-flex gap-3 align-items-center pb-1">
                                                            <div class="badge rounded bg-label-warning p-1"><i
                                                                    class="ti ti-clock ti-sm"></i></div>
                                                            <div>
                                                                <h6 class="mb-0 text-nowrap">Response Time</h6>
                                                                <small class="text-muted">1 Day</small>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-12 col-sm-8 col-md-12 col-lg-8">
                                                    <div id="supportTracker"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Support Tracker -->
                            </div>
                        </div>
                        <!-- / Content -->

                        <!-- Footer -->
                        <footer class="content-footer footer bg-footer-theme">
                            <div class="container-xxl">
                                <div
                                    class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                                    <div>
                                        ©
                                        <script>
                                            document.write(new Date().getFullYear());
                                        </script>
                                        , made with ❤️ by <a href="https://pixinvent.com" target="_blank"
                                            class="fw-semibold">Pixinvent</a>
                                    </div>
                                    <div>
                                        <a href="https://themeforest.net/licenses/standard" class="footer-link me-4"
                                            target="_blank">License</a>
                                        <a href="https://1.envato.market/pixinvent_portfolio" target="_blank"
                                            class="footer-link me-4">More Themes</a>

                                        <a href="https://demos.pixinvent.com/vuexy-html-admin-template/documentation/"
                                            target="_blank" class="footer-link me-4">Documentation</a>

                                        <a href="https://pixinvent.ticksy.com/" target="_blank"
                                            class="footer-link d-none d-sm-inline-block">Support</a>
                                    </div>
                                </div>
                            </div>
                        </footer>
                        <!-- / Footer -->

                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>

            <!-- Drag Target Area To SlideIn Menu On Small Screens -->
            <div class="drag-target"></div>
        </div>
    </body>
@endsection
