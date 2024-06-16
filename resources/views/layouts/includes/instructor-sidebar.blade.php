<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{url('/instructor/dashboard')}}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span> 
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">My Courses</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item "> <a class="nav-link" href="{{url('instructor/courses')}}">Courses</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('instructor/add-course')}}">Add Course</a></li>
          </ul>
        </div>
      </li>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('instructor/students')}}">
        <i class="mdi mdi-account menu-icon"></i>
        <span class="menu-title">My Students</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('instructor/messages')}}">
        <i class="mdi mdi-message-alert menu-icon"></i>
        <span class="menu-title">Messages</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('instructor/revenues')}}">
        <i class="mdi mdi-currency-usd menu-icon"></i>
        <span class="menu-title">Revenues</span>
      </a>
    </li>      
      <li class="nav-item">
        <a class="nav-link" href="{{url('instructor/settings')}}">
          <i class="mdi mdi-settings menu-icon"></i>
          <span class="menu-title">Settings</span>
        </a>
      </li>
    </ul>
  </nav>
