<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="{{ Request::segment(2) == 'inventory' ? 'active' : ''  }} treeview">
        <a href="#">
          <i class="fa fa-book"></i><span> Inventory</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::segment(2) == 'inventory' && Request::segment(3) != 'create' && Request::segment(3) != 'booking' ? 'active' : '' }}"><a href="{{ url('staff/inventory/10') }}"><i class="fa fa-circle-o"></i> List</a></li>
          <li class="{{ Request::segment(2) == 'inventory' && Request::segment(3) == 'create' ? 'active' : '' }}"><a href="{{ url('staff/inventory/create') }}"><i class="fa fa-circle-o"></i> Add</a></li>
          <li class="{{ Request::segment(2) == 'inventory' && Request::segment(3) == 'booking' && Request::segment(4) != 'create' ? 'active' : '' }}"><a href="{{ url('staff/inventory/booking/10') }}"><i class="fa fa-circle-o"></i> Booking List</a></li>
          <li class="{{ Request::segment(2) == 'inventory' && Request::segment(4) == 'create' ? 'active' : '' }}"><a href="{{ url('staff/inventory/booking/create') }}"><i class="fa fa-circle-o"></i> Add Booking</a></li>
        </ul>
      </li>
      <li class="{{ Request::segment(2) == 'complaint' ? 'active' : ''  }} treeview">
        <a href="#">
          <i class="fa fa-user"></i><span> Complaint</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::segment(2) == 'complaint' && Request::segment(3) != 'create' && Request::segment(3) != 'booking' ? 'active' : '' }}"><a href="{{ url('staff/complaint/10') }}"><i class="fa fa-circle-o"></i> List</a></li>
          <li class="{{ Request::segment(2) == 'complaint' && Request::segment(3) == 'create' ? 'active' : '' }}"><a href="{{ url('staff/complaint/create') }}"><i class="fa fa-circle-o"></i> Add</a></li>
        </ul>
      </li>
      <li class="{{ Request::segment(2) == 'room' ? 'active' : ''  }} treeview">
        <a href="#">
          <i class="fa fa-building"></i><span> Room</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::segment(2) == 'room' && Request::segment(3) != 'create' && Request::segment(3) != 'booking' ? 'active' : '' }}"><a href="{{ url('staff/room/10') }}"><i class="fa fa-circle-o"></i> List</a></li>
          <li class="{{ Request::segment(2) == 'room' && Request::segment(3) == 'create' ? 'active' : '' }}"><a href="{{ url('staff/room/create') }}"><i class="fa fa-circle-o"></i> Add</a></li>
          <li class="{{ Request::segment(2) == 'room' && Request::segment(3) == 'booking' && Request::segment(4) != 'create' ? 'active' : '' }}"><a href="{{ url('staff/room/booking/10') }}"><i class="fa fa-circle-o"></i> Booking List</a></li>
          <li class="{{ Request::segment(2) == 'room' && Request::segment(4) == 'create' ? 'active' : '' }}"><a href="{{ url('staff/room/booking/create') }}"><i class="fa fa-circle-o"></i> Add Booking</a></li>
        </ul>
      </li>
      <li class="{{ Request::segment(2) == 'course' ? 'active' : ''  }} treeview">
        <a href="#">
          <i class="fa fa-bars"></i><span> Course Schedule</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::segment(2) == 'course' && Request::segment(3) != 'create' && Request::segment(3) != 'req' ? 'active' : '' }}"><a href="{{ url('staff/course/10') }}"><i class="fa fa-circle-o"></i> List</a></li>
          <li class="{{ Request::segment(2) == 'course' && Request::segment(3) == 'req' && Request::segment(3) != 'create' ? 'active' : '' }}"><a href="{{ url('staff/course/req/all/10') }}"><i class="fa fa-circle-o"></i> Request</a></li>
          <li class="{{ Request::segment(2) == 'course' && Request::segment(3) == 'create' ? 'active' : '' }}"><a href="{{ url('staff/course/create/new/null') }}"><i class="fa fa-circle-o"></i> Add</a></li>
        </ul>
      </li>
      <li class="{{ Request::segment(2) == 'exam-supervisor' ? 'active' : ''  }} treeview">
        <a href="#">
          <i class="fa fa-university"></i><span> Proctor</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::segment(2) == 'exam-supervisor' && Request::segment(3) != 'create' && Request::segment(3) != 'booking' ? 'active' : '' }}"><a href="{{ url('staff/exam-supervisor/10') }}"><i class="fa fa-circle-o"></i> List</a></li>
          <li class="{{ Request::segment(2) == 'exam-supervisor' && Request::segment(3) == 'create' ? 'active' : '' }}"><a href="{{ url('staff/exam-supervisor/create') }}"><i class="fa fa-circle-o"></i> Add</a></li>
        </ul>
      </li>
      <li class="{{ Request::segment(2) == 'student-exchange' || Request::segment(2) == 'university-exchange' ? 'active' : ''  }} treeview">
        <a href="#">
          <i class="fa fa-graduation-cap"></i><span> Student Exchange</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::segment(2) == 'student-exchange' && Request::segment(4) == 'all' ? 'active' : '' }}"><a href="{{ url('staff/student-exchange/all/all/10') }}"><i class="fa fa-circle-o"></i> List All</a></li>
          <li class="{{ Request::segment(2) == 'student-exchange' && Request::segment(4) == '1' ? 'active' : '' }}"><a href="{{ url('staff/student-exchange/all/1/10') }}"><i class="fa fa-circle-o"></i> List Accepted</a></li>
          <li class="{{ Request::segment(2) == 'student-exchange' && Request::segment(4) == '2' ? 'active' : '' }}"><a href="{{ url('staff/student-exchange/all/2/10') }}"><i class="fa fa-circle-o"></i> List Rejected</a></li>
          <li class="{{ Request::segment(2) == 'university-exchange' ? 'active' : '' }}"><a href="{{ url('staff/university-exchange/10') }}"><i class="fa fa-circle-o"></i> University List</a></li>
        </ul>
      </li>
      <li class="{{ Request::segment(2) == 'dual-degree' || Request::segment(2) == 'university-joint' ? 'active' : ''  }} treeview">
        <a href="#">
          <i class="fa fa-handshake-o"></i><span> Dual Degree</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::segment(2) == 'dual-degree' && Request::segment(4) == 'all' ? 'active' : '' }}"><a href="{{ url('staff/dual-degree/all/all/10') }}"><i class="fa fa-circle-o"></i> List All</a></li>
          <li class="{{ Request::segment(2) == 'dual-degree' && Request::segment(4) == '1' ? 'active' : '' }}"><a href="{{ url('staff/dual-degree/all/1/10') }}"><i class="fa fa-circle-o"></i> List Accepted</a></li>
          <li class="{{ Request::segment(2) == 'dual-degree' && Request::segment(4) == '2' ? 'active' : '' }}"><a href="{{ url('staff/dual-degree/all/2/10') }}"><i class="fa fa-circle-o"></i> List Rejected</a></li>
          <li class="{{ Request::segment(2) == 'university-joint' ? 'active' : '' }}"><a href="{{ url('staff/university-joint/10') }}"><i class="fa fa-circle-o"></i> University List</a></li>
        </ul>
      </li>
      <li class="{{ Request::segment(2) == 'summer' || Request::segment(2) == 'summer-school' ? 'active' : ''  }} treeview">
        <a href="#">
          <i class="fa fa-tree"></i><span> Summer School</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::segment(2) == 'summer' && Request::segment(4) == 'all' ? 'active' : '' }}"><a href="{{ url('staff/summer/all/all/10') }}"><i class="fa fa-circle-o"></i> List All</a></li>
          <li class="{{ Request::segment(2) == 'summer' && Request::segment(4) == '1' ? 'active' : '' }}"><a href="{{ url('staff/summer/all/1/10') }}"><i class="fa fa-circle-o"></i> List Accepted</a></li>
          <li class="{{ Request::segment(2) == 'summer' && Request::segment(4) == '2' ? 'active' : '' }}"><a href="{{ url('staff/summer/all/2/10') }}"><i class="fa fa-circle-o"></i> List Rejected</a></li>
          <li class="{{ Request::segment(2) == 'summer-school' ? 'active' : '' }}"><a href="{{ url('staff/summer-school/10') }}"><i class="fa fa-circle-o"></i> University List</a></li>
        </ul>
      </li>
      <li class="{{ Request::segment(2) == 'winter' || Request::segment(2) == 'winter-school' ? 'active' : ''  }} treeview">
        <a href="#">
          <i class="fa fa-snowflake-o"></i><span> Winter School</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::segment(2) == 'winter' && Request::segment(4) == 'all' ? 'active' : '' }}"><a href="{{ url('staff/winter/all/all/10') }}"><i class="fa fa-circle-o"></i> List All</a></li>
          <li class="{{ Request::segment(2) == 'winter' && Request::segment(4) == '1' ? 'active' : '' }}"><a href="{{ url('staff/winter/all/1/10') }}"><i class="fa fa-circle-o"></i> List Accepted</a></li>
          <li class="{{ Request::segment(2) == 'winter' && Request::segment(4) == '2' ? 'active' : '' }}"><a href="{{ url('staff/winter/all/2/10') }}"><i class="fa fa-circle-o"></i> List Rejected</a></li>
          <li class="{{ Request::segment(2) == 'winter-school' ? 'active' : '' }}"><a href="{{ url('staff/winter-school/10') }}"><i class="fa fa-circle-o"></i> University List</a></li>
        </ul>
      </li>
      <li class="{{ Request::segment(2) == 'variable' ? 'active' : '' }}"><a href="{{ url('staff/variable/all') }}"><i class="fa fa-window-restore"></i> Variable</a></li>
      <li class="{{ Request::segment(2) == 'internship' ? 'active' : '' }}"><a href="{{ url('staff/internship/20') }}"><i class="fa fa-window-restore"></i> Internship Programs</a></li>
    </ul>
  </section>
</aside>