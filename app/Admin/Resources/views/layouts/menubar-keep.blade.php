<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
      @include('partials.head')
  </head>
   <body class="animsition @yield('body_class')">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    @include('partials.site_navbar')
    @include('partials.site_menubar')
    @include('partials.site_gridmenu')

    @section('body')
        <h2>Hello World</h2>
    @show

            <!-- Footer -->
    @include('partials.site_footer')

    @include('partials.javascripts')
  </body>
</html>
