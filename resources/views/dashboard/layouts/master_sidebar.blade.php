<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
    {{-- <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div> --}}
    <div class="sidebar-brand-text">Smart Attendance</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{route('home')}}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Data
  </div>

  @php
    $route = ['member-company-list', 'member-company-update',];
    if (in_array(Route::currentRouteName(), $route)) {
      $member_active = 'active'; $member_collapse = ''; $member_show = 'show';
    } else {
      $member_active = ''; $member_collapse = 'collapsed'; $member_show = '';
    }
  @endphp

  @if (Auth::user()->userRole->role_id < 3)
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{$member_active}}">
      <a class="nav-link {{$member_collapse}}" href="#" data-toggle="collapse" data-target="#member" aria-expanded="true" aria-controls="member">
        <i class="fas fa-fw fa-address-book"></i>
        <span>Member Data</span>
      </a>
      <div id="member" class="collapse {{$member_show}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Member Menu:</h6>
          <a class="collapse-item {{Route::currentRouteName() == 'member-company-list' ? 'active' : ''}}" href="{{route('member-company-list')}}">Member Company List</a>
        </div>
      </div>
    </li>
  @endif

  @php
    $route = ['common-country-list', 'common-state-list', 'common-city-list', 'common-religion-list', 'common-permission-list', 'common-role-list', 'common-group-list', 'common-access-list', 'common-feature-list'];
    if (in_array(Route::currentRouteName(), $route)) {
      $common_active = 'active'; $common_collapse = ''; $common_show = 'show';
    } else {
      $common_active = ''; $common_collapse = 'collapsed'; $common_show = '';
    }
  @endphp
  @if (Auth::user()->userRole->role_id < 3)
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{$common_active}}">
      <a class="nav-link {{$common_collapse}}" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Common Data</span>
      </a>
      <div id="collapseTwo" class="collapse {{$common_show}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Common List:</h6>
          <a class="collapse-item {{Route::currentRouteName() == 'common-feature-list' ? 'active' : ''}}" href="{{route('common-feature-list')}}">Feature</a>
          <a class="collapse-item {{Route::currentRouteName() == 'common-country-list' ? 'active' : ''}}" href="{{route('common-country-list')}}">Country</a>
          <a class="collapse-item {{Route::currentRouteName() == 'common-state-list' ? 'active' : ''}}" href="{{route('common-state-list')}}">State</a>
          <a class="collapse-item {{Route::currentRouteName() == 'common-city-list' ? 'active' : ''}}" href="{{route('common-city-list')}}">City</a>
          <a class="collapse-item {{Route::currentRouteName() == 'common-religion-list' ? 'active' : ''}}" href="{{route('common-religion-list')}}">Religion</a>
          <hr>
          <a class="collapse-item {{Route::currentRouteName() == 'common-role-list' ? 'active' : ''}}" href="{{route('common-role-list')}}">Role</a>
          <a class="collapse-item {{Route::currentRouteName() == 'common-group-list' ? 'active' : ''}}" href="{{route('common-group-list')}}">Group</a>
          <a class="collapse-item {{Route::currentRouteName() == 'common-permission-list' ? 'active' : ''}}" href="{{route('common-permission-list')}}">Permission</a>
          <a class="collapse-item {{Route::currentRouteName() == 'common-access-list' ? 'active' : ''}}" href="{{route('common-access-list')}}">Access</a>
        </div>
      </div>
    </li>
  @endif

  @php
    $route = ['master-office-list', 'master-work-unit-list', 'master-work-area-list', 'master-position-list', 'setting-feature'];
    if (in_array(Route::currentRouteName(), $route)) {
      $master_active = 'active'; $master_collapse = ''; $master_show = 'show';
    } else {
      $master_active = ''; $master_collapse = 'collapsed'; $master_show = '';
    }
  @endphp
  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item {{$master_active}}">
    <a class="nav-link {{$master_collapse}}" href="#" data-toggle="collapse" data-target="#master-data" aria-expanded="true" aria-controls="master-data">
      <i class="fas fa-fw fa-wrench"></i>
      <span>Master Data</span>
    </a>
    <div id="master-data" class="collapse {{$master_show}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Master List:</h6>
        <a class="collapse-item {{Route::currentRouteName() == 'setting-feature' ? 'active' : ''}}" href="{{route('setting-feature')}}">Feature Setting</a>
        <a class="collapse-item {{Route::currentRouteName() == 'master-office-list' ? 'active' : ''}}" href="{{route('master-office-list')}}">Office</a>
        <a class="collapse-item {{Route::currentRouteName() == 'master-work-unit-list' ? 'active' : ''}}" href="{{route('master-work-unit-list')}}">Department</a>
        <a class="collapse-item {{Route::currentRouteName() == 'master-work-area-list' ? 'active' : ''}}" href="{{route('master-work-area-list')}}">Location</a>
        <a class="collapse-item {{Route::currentRouteName() == 'master-position-list' ? 'active' : ''}}" href="{{route('master-position-list')}}">Position</a>
      </div>
    </div>
  </li>

  @php
    $route = ['user-permission-list'];
    if (in_array(Route::currentRouteName(), $route)) {
      $permission_active = 'active'; $permission_collapse = ''; $permission_show = 'show';
    } else {
      $permission_active = ''; $permission_collapse = 'collapsed'; $permission_show = '';
    }
  @endphp
  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item {{$permission_active}}">
    <a class="nav-link {{$permission_collapse}}" href="#" data-toggle="collapse" data-target="#permission" aria-expanded="true" aria-controls="permission">
      <i class="fas fa-fw fa-users"></i>
      <span>User</span>
    </a>
    <div id="permission" class="collapse {{$permission_show}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">User Menu:</h6>
        {{-- <a class="collapse-item {{Route::currentRouteName() == 'role-permission-list' ? 'active' : ''}}" href="{{route('role-permission-list')}}">Role Permission</a> --}}
        <a class="collapse-item {{Route::currentRouteName() == 'user-permission-list' ? 'active' : ''}}" href="{{route('user-permission-list')}}">User List</a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Employee
  </div>

  @php
    $route = ['employee-list', 'employee-search', 'project-mutation-list'];
    if (in_array(Route::currentRouteName(), $route)) {
      $employee_active = 'active'; $employee_collapse = ''; $employee_show = 'show';
    } else {
      $employee_active = ''; $employee_collapse = 'collapsed'; $employee_show = '';
    }
  @endphp
  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item {{$employee_active}}">
    <a class="nav-link {{$employee_collapse}}" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-fw fa-user"></i>
      <span>Employee</span>
    </a>
    <div id="collapsePages" class="collapse {{$employee_show}}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Employee Menu:</h6>
        <a class="collapse-item {{Route::currentRouteName() == 'employee-list' ? 'active' : ''}}" href="{{route('employee-list')}}">List Employee</a>
        <a class="collapse-item {{Route::currentRouteName() == 'project-mutation-list' ? 'active' : ''}}" href="{{route('project-mutation-list')}}">Project Mutation</a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Project
  </div>

  @php
    $route = ['project-list', 'project-work-unit-list', 'project-addendum-list'];
    if (in_array(Route::currentRouteName(), $route)) {
      $project_active = 'active'; $project_collapse = ''; $project_show = 'show';
    } else {
      $project_active = ''; $project_collapse = 'collapsed'; $project_show = '';
    }
  @endphp
  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item {{$project_active}}">
    <a class="nav-link {{$project_collapse}}" href="#" data-toggle="collapse" data-target="#projectMenu" aria-expanded="true" aria-controls="projectMenu">
      <i class="fas fa-fw fa-book"></i>
      <span>Project</span>
    </a>
    <div id="projectMenu" class="collapse {{$project_show}}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Project Menu:</h6>
        <a class="collapse-item {{Route::currentRouteName() == 'project-list' ? 'active' : ''}}" href="{{route('project-list')}}">Project</a>
        {{-- <a class="collapse-item {{Route::currentRouteName() == 'project-work-unit-list' ? 'active' : ''}}" href="{{route('project-work-unit-list')}}">Project Work Unit</a> --}}
        <a class="collapse-item {{Route::currentRouteName() == 'project-addendum-list' ? 'active' : ''}}" href="{{route('project-addendum-list')}}">Project Addendum</a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Attendance
  </div>

  @php
    $route = ['attendance-report','attendance-category-list'];
    if (in_array(Route::currentRouteName(), $route)) {
      $attendance_active = 'active'; $attendance_collapse = ''; $attendance_show = 'show';
    } else {
      $attendance_active = ''; $attendance_collapse = 'collapsed'; $attendance_show = '';
    }
  @endphp
  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item {{$attendance_active}}">
    <a class="nav-link {{$attendance_collapse}}" href="#" data-toggle="collapse" data-target="#attendanceMenu" aria-expanded="true" aria-controls="attendanceMenu">
      <i class="fas fa-fw fa-calendar-check"></i>
      <span>Attendance</span>
    </a>
    <div id="attendanceMenu" class="collapse {{$attendance_show}}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Attendance Menu:</h6>
        <a class="collapse-item {{Route::currentRouteName() == 'attendance-category-list' ? 'active' : ''}}" href="{{route('attendance-category-list')}}">Attendance Category</a>
        <a class="collapse-item {{Route::currentRouteName() == 'attendance-report' ? 'active' : ''}}" href="{{route('attendance-report')}}">Attendance Report</a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->