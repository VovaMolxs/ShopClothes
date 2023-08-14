<!DOCTYPE HTML>
<html lang="en">


<!-- Mirrored from wp.alithemes.com/html/evara/evara-backend/page-products-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 01 Aug 2021 15:33:00 GMT -->
<head>
    <meta charset="utf-8">
    <title>Evara Dashboard</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('../admin/imgs/theme/favicon.svg') }}">
    <!-- Template CSS -->
    @vite([
        'resources/css/admin_css/main.css',
        'resources/css/admin_css/vendors/bootstrap.css',
        'resources/css/admin_css/vendors/material-icon-round.css',
        'resources/css/admin_css/vendors/normalize.css',
        'resources/css/admin_css/vendors/perfect-scrollbar.css',
        'resources/css/admin_css/vendors/select2.min.css',
        'resources/js/admin_js/main.js',
        'resources/js/admin_js/custom-chart.js',
        'resources/js/admin_js/vendors/bootstrap.bundle.min.js',
        'resources/js/admin_js/vendors/chart.js',
        'resources/js/admin_js/vendors/jquery-3.6.0.min.js',
        'resources/js/admin_js/vendors/perfect-scrollbar.js',
        'resources/js/admin_js/vendors/select2.min.js',

    ])
</head>

<body>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<div class="screen-overlay"></div>
<aside class="navbar-aside" id="offcanvas_aside">
    <div class="aside-top">
        <a href="index.html" class="brand-wrap">
            <img src="{{ url('../assets/imgs/theme/logo.svg') }}" class="logo" alt="Evara Dashboard">
        </a>
        <div>
            <button class="btn btn-icon btn-aside-minimize"> <i class="text-muted material-icons md-menu_open"></i> </button>
        </div>
    </div>
    <nav>
        <ul class="menu-aside">
            <li class="menu-item active">
                <a class="menu-link" href="{{ route('admin.index') }}"> <i class="icon material-icons md-home"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="menu-item ">
                <a class="menu-link" href="{{ route('products.index')}}"> <i class="icon material-icons md-shopping_cart"></i>
                    <span class="text">Product list</span>
                </a>
            </li>
            <li class="menu-item ">
                <a class="menu-link" href="{{ route('products.create') }}"> <i class="icon material-icons md-add_box"></i>
                    <span class="text">Product add</span>
                </a>
            </li>
            <li class="menu-item ">
                <a class="menu-link" href="{{ route ('categories.index')}}"> <i class="icon material-icons md-shopping_cart"></i>
                    <span class="text">Categories</span>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="{{route('reviews.index')}}"> <i class="icon material-icons md-comment"></i>
                    <span class="text">Reviews</span>
                </a>
            </li>
            <li class="menu-item">
                <a class="menu-link" href="{{route('orders.index')}}"> <i class="icon material-icons md-shopping_cart"></i>
                    <span class="text">Orders</span>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="{{route('transaction.index')}}"> <i class="icon material-icons md-monetization_on"></i>
                    <span class="text">Transactions</span>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" disabled href="#"> <i class="icon material-icons md-pie_chart"></i>
                    <span class="text">Statistics</span>
                </a>
            </li>
        </ul>
        <hr>
        <ul class="menu-aside">
            <li class="menu-item has-submenu">
                <a class="menu-link" href="#"> <i class="icon material-icons md-settings"></i>
                    <span class="text">Settings</span>
                </a>
                <div class="submenu">
                    <a href="page-settings-1.html">Setting sample 1</a>
                    <a href="page-settings-2.html">Setting sample 2</a>
                </div>
            </li>
            <li class="menu-item">
                <a class="menu-link" href="/"> <i class="icon material-icons md-local_offer"></i>
                    <span class="text"> Starter page </span>
                </a>
            </li>
        </ul>
        <br>
        <br>
    </nav>
</aside>
<main class="main-wrap">
    <header class="main-header navbar">
        <div class="col-search">

        </div>
        <div class="col-nav">
            <ul class="nav">

                <li class="dropdown nav-item">
                    <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownLanguage" aria-expanded="false"><i class="material-icons md-public"></i></a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLanguage">
                        <a class="dropdown-item text-brand" href="#"><img src="{{ url('../assets/imgs/theme/flag-us.png') }}" alt="English">English</a>
                        <a class="dropdown-item" href="#"><img src="{{ url('../assets/imgs/theme/flag-fr.png') }}" alt="Français">Français</a>
                        <a class="dropdown-item" href="#"><img src="{{ url('../assets/imgs/theme/flag-jp.png') }}" alt="Français">日本語</a>
                        <a class="dropdown-item" href="#"><img src="{{ url('../assets/imgs/theme/flag-cn.png') }}" alt="Français">中国人</a>
                    </div>
                </li>
                <li class="dropdown nav-item">
                    <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount" aria-expanded="false"> <img class="img-xs rounded-circle" src="{{ url('../assets/imgs/people/avatar2.jpg') }}" alt="User"></a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">
                        <a class="dropdown-item" href="{{route('profile.edit')}}"><i class="material-icons md-perm_identity"></i>Edit Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{route('logout')}}"><i class="material-icons md-exit_to_app"></i>Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </header>
@yield('content')
    <footer class="main-footer font-xs">
        <div class="row pb-30 pt-15">
            <div class="col-sm-6">
                <script>
                    document.write(new Date().getFullYear())
                </script> ©, Evara - HTML Ecommerce Template .
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end">
                    All rights reserved
                </div>
            </div>
        </div>
    </footer>
</main>

</body>


<!-- Mirrored from wp.alithemes.com/html/evara/evara-backend/page-products-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 01 Aug 2021 15:33:12 GMT -->
</html>
