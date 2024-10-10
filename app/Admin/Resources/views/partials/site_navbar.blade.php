<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">

  <div class="navbar-header">
    <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
      data-toggle="menubar">
      <span class="sr-only">Toggle navigation</span>
      <span class="hamburger-bar"></span>
    </button>
    <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
      data-toggle="collapse">
      <i class="icon wb-more-horizontal" aria-hidden="true"></i>
    </button>
    <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
      <img class="navbar-brand-logo" src="{{ asset('assets/admin/images/icon.jpeg') }}" title="Icon">
    </div>
{{--    <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"--}}
{{--      data-toggle="collapse">--}}
{{--      <span class="sr-only">Toggle Search</span>--}}
{{--      <i class="icon wb-search" aria-hidden="true"></i>--}}
{{--    </button>--}}
  </div>

  <div class="navbar-container container-fluid">
    <!-- Navbar Collapse -->
    <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
      <!-- Navbar Toolbar -->
      <!-- End Navbar Toolbar -->

      <!-- Navbar Toolbar Right -->
      <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">


        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('admin.profile.edit-profile') }}">Profile</a>
              <a class="dropdown-item" href="{{ route('admin.profile.change-password') }}">Change Password</a>
            <a class="dropdown-item" href="{{ route('admin.logout') }}"
               onclick="event.preventDefault(); document.getElementById('form-logout-form').submit();">
              {{ __('Logout') }}
            </a>

            {{-- <a class="dropdown-item" href="{{ route('admin.password.change') }}">
                   {{ __('Change Password') }}
             </a>--}}

            <form id="form-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>

      </ul>
      <!-- End Navbar Toolbar Right -->
    </div>
    <!-- End Navbar Collapse -->

    <!-- Site Navbar Seach -->
    <div class="collapse navbar-search-overlap" id="site-navbar-search">
      <form role="search">
        <div class="form-group">
          <div class="input-search">
            <i class="input-search-icon wb-search" aria-hidden="true"></i>
            <input type="text" class="form-control" name="site-search" placeholder="Search...">
            <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
              data-toggle="collapse" aria-label="Close"></button>
          </div>
        </div>
      </form>
    </div>
    <!-- End Site Navbar Seach -->
  </div>
</nav>
