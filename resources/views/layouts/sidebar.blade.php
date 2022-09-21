<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard.index') }}">
      <div class="sidebar-brand-icon">
        <i class="fas fa-address-card"></i>
      </div>
      <div class="sidebar-brand-text mx-3"> <sup>SKPTH</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0" />

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="{{ route('dashboard.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a
      >
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Heading -->
    <div class="sidebar-heading">Fitur</div>

    <!-- Nav Item - Pages Collapse Menu -->
    @if (auth()->user()->role_id=='1' )
        
    <li class="nav-item">
      <a class="nav-link" href="{{ route('calon-tenaga-honorer.index') }}">
        <i class="fas fa-fw fa-users"></i>
        <span>Data Tenaga Honorer</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('kriteria.index') }}" >
        <i class="fas fa-fw fa-cube"></i>
        <span>Data Kriteria</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('sub-kriteria.index') }}" >
        <i class="fas fa-fw fa-cubes"></i>
        <span>Data Sub Kriteria</span>
      </a>
    </li>
    @endif
@if (auth()->user()->role_id=='2')
{{-- <li class="nav-item">
  <a class="nav-link" href="{{ route('perhitungan') }}" >
    <i class="fas fa-fw fa-table"></i>
    <span>Data Perhitungan MAUT</span>
  </a>
</li> --}}
<li class="nav-item">
  <a class="nav-link" href="{{ route('bobot') }}" >
    <i class="fas fa-fw fa-table"></i>
    <span>Bobot</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link" href="{{ route('hasil.index') }}">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Hasil Akhir</span>
  </a>
</li>
@endif
  
  
    

    <!-- Nav Item - Utilities Collapse Menu -->

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Heading -->
    <div class="sidebar-heading">Pengaturan</div>
@if (auth()->user()->role_id=='1' )
<li class="nav-item">
  <a class="nav-link" href="{{ route('user.index') }}">
    <i class="fas fa-fw fa-users-cog"></i>
    <span>Data User</span></a>
</li>
@endif
    <!-- Nav Item - Charts -->
    
    <li class="nav-item">
      <a class="nav-link" href="{{ route('profil.index') }}">
        <i class="fas fa-fw fa-user"></i>
        <span>Profil</span></a
      >
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block" />

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
  </ul>
  <!-- End of Sidebar -->