<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="{{ Request::segment(2) == 'student-exchange' ? 'active' : ''  }} treeview">
        <a href="#">
          <i class="fa fa-graduation-cap"></i><span>Student Exchange</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::segment(2) == 'student-exchange' && Request::segment(3) != 'create' && Request::segment(3) != 'booking' ? 'active' : '' }}"><a href="{{ url('lecturer/student-exchange/all/1/10') }}"><i class="fa fa-circle-o"></i> List</a></li>
        </ul>
      </li>
      <li class="{{ Request::segment(2) == 'dual-degree' ? 'active' : ''  }} treeview">
        <a href="#">
          <i class="fa fa-handshake-o"></i><span>Dual Degree</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::segment(2) == 'dual-degree' && Request::segment(3) != 'create' && Request::segment(3) != 'booking' ? 'active' : '' }}"><a href="{{ url('lecturer/dual-degree/all/1/10') }}"><i class="fa fa-circle-o"></i> List</a></li>
        </ul>
      </li>
      <li class="{{ Request::segment(2) == 'summer' ? 'active' : ''  }} treeview">
        <a href="#">
          <i class="fa fa-tree"></i><span>Summer School</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::segment(2) == 'summer' && Request::segment(3) != 'create' && Request::segment(3) != 'booking' ? 'active' : '' }}"><a href="{{ url('lecturer/summer/all/1/10') }}"><i class="fa fa-circle-o"></i> List</a></li>
        </ul>
      </li>
      <li class="{{ Request::segment(2) == 'winter' ? 'active' : ''  }} treeview">
        <a href="#">
          <i class="fa fa-snowflake-o"></i><span>Winter School</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::segment(2) == 'winter' && Request::segment(3) != 'create' && Request::segment(3) != 'booking' ? 'active' : '' }}"><a href="{{ url('lecturer/winter/all/1/10') }}"><i class="fa fa-circle-o"></i> List</a></li>
        </ul>
      </li>
    </ul>
  </section>
</aside>