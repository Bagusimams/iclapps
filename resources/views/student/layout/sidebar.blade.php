<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="{{ Request::segment(2) == 'inventory' ? 'active' : ''  }} treeview">
        <a href="#">
          <i class="fa fa-book"></i><span>Inventory</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::segment(2) == 'inventory' && Request::segment(3) != 'create' && Request::segment(3) != 'booking' ? 'active' : '' }}"><a href="{{ url('student/inventory/10') }}"><i class="fa fa-circle-o"></i> List</a></li>
          <li class="{{ Request::segment(2) == 'inventory' && Request::segment(3) == 'booking' && Request::segment(4) != 'create' ? 'active' : '' }}"><a href="{{ url('student/inventory/booking/10') }}"><i class="fa fa-circle-o"></i> Booking List</a></li>
          <li class="{{ Request::segment(2) == 'inventory' && Request::segment(4) == 'create' ? 'active' : '' }}"><a href="{{ url('student/inventory/booking/create') }}"><i class="fa fa-circle-o"></i> Add Booking</a></li>
        </ul>
      </li>
      <li class="{{ Request::segment(2) == 'room' ? 'active' : ''  }} treeview">
        <a href="#">
          <i class="fa fa-book"></i><span>Room</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::segment(2) == 'room' && Request::segment(3) != 'create' && Request::segment(3) != 'booking' ? 'active' : '' }}"><a href="{{ url('student/room/10') }}"><i class="fa fa-circle-o"></i> List</a></li>
          <li class="{{ Request::segment(2) == 'room' && Request::segment(3) == 'booking' && Request::segment(4) != 'create' ? 'active' : '' }}"><a href="{{ url('student/room/booking/10') }}"><i class="fa fa-circle-o"></i> Booking List</a></li>
          <li class="{{ Request::segment(2) == 'room' && Request::segment(4) == 'create' ? 'active' : '' }}"><a href="{{ url('student/room/booking/create') }}"><i class="fa fa-circle-o"></i> Add Booking</a></li>
        </ul>
      </li>
      <li class="{{ Request::segment(2) == 'exam-supervisor' ? 'active' : ''  }} treeview">
        <a href="#">
          <i class="fa fa-university"></i><span>Proctor</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::segment(2) == 'exam-supervisor' && Request::segment(3) == 'create' ? 'active' : '' }}"><a href="{{ url('student/exam-supervisor/create') }}"><i class="fa fa-circle-o"></i> Add</a></li>
        </ul>
      </li>
      <li class="{{ Request::segment(2) == 'course' ? 'active' : ''  }} treeview">
        <a href="#">
          <i class="fa fa-building"></i><span>Course Schedule</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::segment(2) == 'course' && Request::segment(3) != 'create' && Request::segment(3) != 'req' ? 'active' : '' }}"><a href="{{ url('student/course/10') }}"><i class="fa fa-circle-o"></i> List</a></li>
          <li class="{{ Request::segment(2) == 'course' && Request::segment(3) == 'req' && Request::segment(3) != 'create' ? 'active' : '' }}"><a href="{{ url('student/course/req/all/10') }}"><i class="fa fa-circle-o"></i> My Request</a></li>
          <!-- <li class="{{ Request::segment(2) == 'course' && Request::segment(3) == 'create' ? 'active' : '' }}"><a href="{{ url('student/course/create') }}"><i class="fa fa-circle-o"></i> Add</a></li> -->
        </ul>
      </li>
      <li class="{{ Request::segment(2) == 'complaint' ? 'active' : ''  }} treeview">
        <a href="#">
          <i class="fa fa-user"></i><span>Complaint</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::segment(2) == 'complaint' && Request::segment(3) != 'create' && Request::segment(3) != 'booking' ? 'active' : '' }}"><a href="{{ url('student/complaint/10') }}"><i class="fa fa-circle-o"></i> List</a></li>
          <li class="{{ Request::segment(2) == 'complaint' && Request::segment(3) == 'create' ? 'active' : '' }}"><a href="{{ url('student/complaint/create') }}"><i class="fa fa-circle-o"></i> Add</a></li>
        </ul>
      </li>
      <li class="{{ Request::segment(2) == 'student-exchange' ? 'active' : ''  }} treeview">
        <a href="#">
          <i class="fa fa-graduation-cap"></i><span>Student Exchange</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::segment(2) == 'student-exchange' && Request::segment(3) == 'create' ? 'active' : '' }}"><a href="{{ url('student/student-exchange/create') }}"><i class="fa fa-circle-o"></i> Add</a></li>
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
          <li class="{{ Request::segment(2) == 'dual-degree' && Request::segment(3) == 'create' ? 'active' : '' }}"><a href="{{ url('student/dual-degree/create') }}"><i class="fa fa-circle-o"></i> Add</a></li>
        </ul>
      </li>
      <li class="{{ Request::segment(2) == 'summer' ? 'active' : ''  }} treeview">
        <a href="#">
          <i class="fa fa-tree"></i><span>Summer School Program</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::segment(2) == 'summer' && Request::segment(3) == 'create' ? 'active' : '' }}"><a href="{{ url('student/summer/create') }}"><i class="fa fa-circle-o"></i> Add</a></li>
        </ul>
      </li>
      <li class="{{ Request::segment(2) == 'winter' ? 'active' : ''  }} treeview">
        <a href="#">
          <i class="fa fa-snowflake-o"></i><span>Winter School Program</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::segment(2) == 'winter' && Request::segment(3) == 'create' ? 'active' : '' }}"><a href="{{ url('student/winter/create') }}"><i class="fa fa-circle-o"></i> Add</a></li>
        </ul>
      </li>
    </ul>
  </section>
</aside>