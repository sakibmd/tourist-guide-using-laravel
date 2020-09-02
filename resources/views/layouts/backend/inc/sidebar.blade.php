

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link text-center">
      <span class="brand-text font-weight-bold">{{ Auth::user()->role_id == 1 ? 'Admin Panel' : 'User Panel' }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/admin/img')}}/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block font-weight-bold">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          

          @if (Request::is('admin*'))
          <li class="nav-item has-treeview active">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
              <i class="fas fa-border-style"></i>
              <p class="ml-2">
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('admin.district.index') }}" class="nav-link {{ Request::is('admin/district*') ? 'active' : '' }}">
              <i class="fas fa-chart-area"></i>
              <p class="ml-2">
                District
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('admin.type.index') }}" class="nav-link {{ Request::is('admin/type*') ? 'active' : '' }}">
              <i class="fas fa-atlas"></i>
              <p class="ml-2">
                Place Type
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('admin.about.index') }}" class="nav-link {{ Request::is('admin/about*') ? 'active' : '' }}">
              <i class="fa fa-info-circle" aria-hidden="true"></i>
              <p class="ml-2">
                About
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('admin.guide.index') }}" class="nav-link {{ Request::is('admin/guide*') ? 'active' : '' }}">
              <i class="fa fa-user" aria-hidden="true"></i>
              <p class="ml-2">
                Guides
              </p>
            </a>
          </li>
          @endif

          @if (Request::is('user*'))
            <li class="nav-item has-treeview">
              <a href="{{ route('user.dashboard') }}" class="nav-link {{ Request::is('user/dashboard') ? 'active' : '' }}">
                <i class="fas fa-border-style"></i>
                <p class="pl-2">
                  Dashboard
                 
                </p>
              </a>
            </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
