<header class="main-header">
  <!-- Logo -->
  <a href="{{ url($role) }}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>I-CLAPPS</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>{{ $role }}</b> I-CLAPPS</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li>
          <a href="{{ url('/' . $role . '/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off" aria-hidden="true"></i></a>

          <form id="logout-form" action="{{ url('/' . $role . '/logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        </li>
      </ul>
    </div>
  </nav>
</header>