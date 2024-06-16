<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{url('/student/dashboard')}}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span> 
        </a>
      </li>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('student/courses')}}">
        <i class="mdi mdi-view-headline menu-icon"></i>
        <span class="menu-title">My Courses</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('student/messages')}}">
        <i class="mdi mdi-message-alert menu-icon"></i>
        <span class="menu-title">Messages</span>
      </a>
    </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('student/settings')}}">
          <i class="mdi mdi-settings menu-icon"></i>
          <span class="menu-title">Settings</span>
        </a>
      </li>
    </ul>
  </nav>