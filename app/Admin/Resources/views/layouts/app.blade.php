<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    @include('admin::partials.head')
</head>
<body class="animsition @yield('body_class')">
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    @include('admin::partials.site_navbar')
    @include('admin::partials.site_menubar')
    @include('admin::partials.site_gridmenu')

    @section('body')
    <div class="page">
        <div class="page-header">
            @yield('header')
        </div>
        <div class="page-content">
            @yield('content')
        </div>
    </div>
    @show

            <!-- Footer -->
    @include('admin::partials.site_footer')

    @include('admin::partials.javascripts')
</body>
</html>
