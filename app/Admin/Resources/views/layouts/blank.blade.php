<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
   @include('admin::partials.head')
  </head>
  <body class="animsition @yield('body_class')">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    @section('body')
      @yield('content')
    @show

    @include('admin::partials.javascripts')
  </body>
</html>
