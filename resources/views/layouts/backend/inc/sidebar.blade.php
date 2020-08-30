<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <span class="brand-text font-weight-light">{{ Auth::user()->role_id == 1 ? 'Admin Panel' : 'User Panel' }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/admin/img')}}/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item has-treeview">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
              <i class="fas fa-border-style"></i>
              <p class="pl-2">
                Dashboard
               
              </p>
            </a>
          </li>




          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-chart-area"></i>
              <p class="pl-2">
                District
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.district.create') }}" class="nav-link">
                  <i class="fa fa-plus" aria-hidden="true"></i>
                  <p>Add New District</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.district.index') }}" class="nav-link">
                  <i class="fa fa-list" aria-hidden="true"></i>
                  <p>Manage District</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-atlas"></i>
              <p class="pl-2">
                Place Type
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.type.create') }}" class="nav-link">
                  <i class="fa fa-plus" aria-hidden="true"></i>
                  <p>Add New Type</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.type.index') }}" class="nav-link">
                  <i class="fa fa-list" aria-hidden="true"></i>
                  <p>Manage Place Type</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cogs"></i>
              <p>
                Administrative
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('administrative.create') }}" class="nav-link">
                  <i class="fa fa-user-plus nav-icon"></i>
                  <p>Register User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('administrative.index') }}" class="nav-link">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Manage User</p>
                </a>
              </li>
            </ul>
          </li> --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
