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
<main class="main">
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
