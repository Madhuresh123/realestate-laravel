<nav class="sidebar">
    <div class="sidebar-header">
      <a href="#" class="sidebar-brand">
        Noble<span>UI</span>
      </a>
      <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="sidebar-body">
      <ul class="nav">
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item">
          <a href="{{route('admin.dashboard')}}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item nav-category">Real Estate</li>
        
        {{-- @if(Auth::user()->can('type.menu')) --}}
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">Property Type</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="emails">
            <ul class="nav sub-menu">
              {{-- @if(Auth::user()->can('all.type')) --}}
              <li class="nav-item">
                <a href="{{route('admin.property.alltype')}}" class="nav-link">All Type</a>
              </li>
              {{-- @endif --}}

              {{-- @if(Auth::user()->can('add.type')) --}}
              <li class="nav-item">
                <a href="{{ route('admin.property.addtype') }}" class="nav-link">Add Type</a>
              </li>
              {{-- @endif --}}

            </ul>
          </div>
        </li>
        {{-- @endif --}}

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">Property Amities</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="emails">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="" class="nav-link">All Amities</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">Add Amities</a>
              </li>
            </ul>
          </div>
        </li>


        <li class="nav-item nav-category">Roles & Permission</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
            <i class="link-icon" data-feather="feather"></i>
            <span class="link-title">Roles and Permissions</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="uiComponents">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{route('all.permission')}}" class="nav-link">All Permission</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('add.permission') }}" class="nav-link">Add Permission</a>
              </li>
              <li class="nav-item">
                <a href="{{route('all.roles')}}" class="nav-link">All Roles</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('add.permission') }}" class="nav-link">Add Roles</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('all.roles.permission') }}" class="nav-link">Roles in Permission</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('roles.permission.view') }}" class="nav-link">All Roles in Permission</a>
              </li>
            </ul>
          </div>

          <li class="nav-item nav-category">Admin</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
              <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">Admins</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="uiComponents">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{route('all.admin')}}" class="nav-link">All Admin</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('add.admin') }}" class="nav-link">Add Admin</a> 
                </li>
                </li>
              </ul>
            </div>


      
        <li class="nav-item nav-category">Docs</li>
        <li class="nav-item">
          <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="nav-link">
            <i class="link-icon" data-feather="hash"></i>
            <span class="link-title">Documentation</span>
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <nav class="settings-sidebar">
    <div class="sidebar-body">
      <a href="#" class="settings-sidebar-toggler">
        <i data-feather="settings"></i>
      </a>
      <div class="theme-wrapper">
        <h6 class="text-muted mb-2">Light Theme:</h6>
        <a class="theme-item" href="../demo1/dashboard.html">
          <img src="../assets/images/screenshots/light.jpg" alt="light theme">
        </a>
        <h6 class="text-muted mb-2">Dark Theme:</h6>
        <a class="theme-item active" href="../demo2/dashboard.html">
          <img src="../assets/images/screenshots/dark.jpg" alt="light theme">
        </a>
      </div>
    </div>
  </nav>