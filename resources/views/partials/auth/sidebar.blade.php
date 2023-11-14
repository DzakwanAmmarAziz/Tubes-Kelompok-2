<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand text-dark font-weight-bold">
       <h5>Pengaduan Gedung</h5>
      </div>
      <ul class="sidebar-menu">
        <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
          <a href="/dashboard" class="nav-link"><i class="fas fa-fire mx-2"></i><span>Dashboard</span></a>
        </li>
        <li class="nav-item dropdown {{ Request::is('pengaduan*') ? 'active' : '' }}">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-bell mx-2"></i> <span>Pengaduan</span></a>
          <ul class="dropdown-menu">
            <li class="{{ Request::is('pengaduan') ? 'active' : '' }}"><a class="nav-link" href="/pengaduan"><i
                  class="fas fa-list mx-2"></i> Daftar Pengaduan</a></li>
            @if (auth()->user()->level == 'user')
              <li class="{{ Request::is('pengaduan/create') ? 'active' : '' }}"><a class="nav-link"
                  href="/pengaduan/create"><i class="fas fa-plus-circle mx-2"></i> Buat Pengaduan</a></li>
            @endif
          </ul>
        </li>
        @if (auth()->user()->level == 'admin')
          <li class="menu-header">Admin</li>
          <li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
            <a href="/users" class="nav-link"><i class="fas fa-users mx-2"></i><span>User</span></a>
          </li>
          <li class="nav-item {{ Request::is('gedung*') ? 'active' : '' }}">
            <a href="/gedung" class="nav-link"><i class="fas fa-object-group mx-2"></i><span>Gedung</span></a>
          </li>
        @endif
      </ul>
    </aside>
  </div>
