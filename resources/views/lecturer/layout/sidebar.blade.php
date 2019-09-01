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
    </ul>
  </section>
</aside>