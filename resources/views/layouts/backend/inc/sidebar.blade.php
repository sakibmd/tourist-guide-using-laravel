
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
          <a href="{{ Auth::user()->role_id == 1 ? route('admin.profile.show') : route('user.profile.show') }}">
            <img src="{{  Auth::user()->image != 'default.png' ?  asset('storage/profile_photo/' . Auth::user()->image ) :  asset('assets/admin/img/user2-160x160.jpg')  }}" class="img-circle elevation-2" alt="User Image">
          </a>
          
        </div>
        <div class="info">
          <a href="{{ Auth::user()->role_id == 1 ? route('admin.profile.show') : route('user.profile.show') }}" class="d-block font-weight-bold">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          

          @if (Request::is('admin*'))
          <li class="nav-item has-treeview active">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
              <i class="fas fa-tachometer-alt"></i>

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
            <a href="{{ route('admin.place.index') }}" class="nav-link {{ Request::is('admin/place*') ? 'active' : '' }}">
              <i class="fa fa-info-circle" aria-hidden="true"></i>
              <p class="ml-2">
                Places
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
        @if (Auth::id() == 1)
        <li class="nav-item has-treeview">
          <a href="{{ route('admin.users.index') }}" class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
            <i class="fa fa-users" aria-hidden="true"></i>
            <p class="ml-2">
              Users
            </p>
          </a>
        </li>
        @endif


        @if (Auth::id() == 1)
        <li class="nav-item has-treeview">
          <a href="{{ route('admin.list') }}" class="nav-link {{ Request::is('admin/list') ? 'active' : '' }}">
            <i class="fa fa-list" aria-hidden="true"></i>
              <p class="ml-2">
              Admin List
            </p>
          </a>
        </li>
        @endif


        <li class="nav-item has-treeview">
          <a href="{{ route('admin.package.index') }}" class="nav-link {{ Request::is('admin/package*') ? 'active' : '' }}">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              <p class="ml-2">
                  Packages
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="{{ route('admin.profile.show') }}" class="nav-link {{ Request::is('admin/profile-info*') ? 'active' : '' }}">
            <i class="far fa-id-badge"></i>
              <p class="ml-2">
                  Your Profile
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="{{ route('admin.pending.booking') }}" class="nav-link {{ Request::is('admin/booking-request/list') ? 'active' : '' }}">
            <i class="fas fa-chalkboard"></i>
              <p class="ml-2">
                  Booking Request
            </p>
          </a>
        </li>


        <li class="nav-item has-treeview">
          <a href="{{ route('admin.package.running') }}" class="nav-link {{ Request::is('admin/running/package*') ? 'active' : '' }}">
            <i class="fas fa-box"></i>
              <p class="ml-2">
                  Running Package
            </p>
          </a>
        </li>


        <li class="nav-item has-treeview">
          <a href="{{ route('admin.tour.history') }}" class="nav-link {{ Request::is('admin/tour-history/list') ? 'active' : '' }}">
            <i class="fas fa-history"></i>
              <p class="ml-2">
                  Tour History
            </p>
          </a>
        </li>
        



          @endif

          @if (Request::is('user*'))
            <li class="nav-item has-treeview">
              <a href="{{ route('user.dashboard') }}" class="nav-link {{ Request::is('user/dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i>
                <p class="pl-2">
                  Dashboard
                 
                </p>
              </a>
            </li>


            <li class="nav-item has-treeview">
              <a href="{{ route('user.district') }}" class="nav-link {{ Request::is('user/districts') ? 'active' : '' }}">
                <i class="fas fa-chart-area"></i>
                <p class="ml-2">
                  District
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="{{ route('user.placetype') }}" class="nav-link {{ Request::is('user/placetypes') ? 'active' : '' }}">
                <i class="fas fa-atlas"></i>
                <p class="ml-2">
                  Place Type
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="{{ route('user.place') }}" class="nav-link {{ Request::is('user/places*') ? 'active' : '' }}">
                <i class="fa fa-info-circle" aria-hidden="true"></i>
                <p class="ml-2">
                  Places
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="{{ route('user.guide') }}" class="nav-link {{ Request::is('user/guide*') ? 'active' : '' }}">
                <i class="fa fa-user" aria-hidden="true"></i>
                <p class="ml-2">
                  Guides
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="{{ route('user.package') }}" class="nav-link {{ Request::is('user/package*') ? 'active' : '' }}">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                  <p class="ml-2">
                      Packages
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="{{ route('user.profile.show') }}" class="nav-link {{ Request::is('user/profile-info*') ? 'active' : '' }}">
                <i class="far fa-id-badge"></i>
                  <p class="ml-2">
                      Your Profile
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="{{ route('user.pending.booking') }}" class="nav-link {{ Request::is('user/booking-request/list') ? 'active' : '' }}">
                <i class="fas fa-chalkboard"></i>
                  <p class="ml-2">
                      Pending Request
                </p>
              </a>
            </li>
    

            <li class="nav-item has-treeview">
              <a href="{{ route('user.tour.history') }}" class="nav-link {{ Request::is('user/tour-history/list') ? 'active' : '' }}">
                <i class="fas fa-history"></i>
                  <p class="ml-2">
                      Tour History
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="{{ route('welcome') }}" class="nav-link">
                <i class="fas fa-pager"></i>
                  <p class="ml-2">
                      Home Page
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
