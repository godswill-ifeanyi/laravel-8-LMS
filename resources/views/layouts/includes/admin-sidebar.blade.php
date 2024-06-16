<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{url('/admin/dashboard')}}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span> 
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-circle-outline menu-icon"></i>
          <span class="menu-title">Categories</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item "> <a class="nav-link" href="{{url('admin/categories')}}">Categories</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/add-category')}}">Add Category</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item"> 
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Courses</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item "> <a class="nav-link" href="{{url('admin/courses')}}">Courses</a></li>
            <li class="nav-item "> <a class="nav-link" href="{{url('admin/my-courses')}}">My Courses</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/add-course')}}">Add Course</a></li>
          </ul>
        </div>
      </li>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/instructors')}}">
        <i class="mdi mdi-account-box-outline menu-icon"></i>
        <span class="menu-title">Instructors</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/students')}}">
        <i class="mdi mdi-account menu-icon"></i>
        <span class="menu-title">Students</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/batches')}}">
        <i class="mdi mdi-account-multiple-outline menu-icon"></i>
        <span class="menu-title">Batches</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/messages')}}">
        <i class="mdi mdi-message-alert menu-icon"></i>
        <span class="menu-title">Messages</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/revenues')}}">
        <i class="mdi mdi-currency-usd menu-icon"></i>
        <span class="menu-title">Revenues</span>
      </a>
    </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/reports')}}">
          <i class="mdi mdi-chart-pie menu-icon"></i>
          <span class="menu-title">Reports</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/settings')}}">
          <i class="mdi mdi-settings menu-icon"></i>
          <span class="menu-title">Settings</span>
        </a>
      </li>
    </ul>
  </nav>