<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <i class="fas fa-tasks"></i>
        </div>
        <div class="sidebar-brand-text mx-3">M-Togas<sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ $menuDashboard ?? '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>


    @if (auth()->user()->id_jabatan === 1)
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            MENU ADMIN
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item {{ $menuAdminUser ?? '' }}">
            <a class="nav-link" href="{{ route('pegawai.index') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>Data Pegawai</span></a>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item {{ $menuAdminKantor ?? '' }}">
            <a class="nav-link" href="{{ route('kantorIndex') }}">
                <i class="fas fa-fw fa-building"></i>
                <span>Data Kantor</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item {{ $menuAdminTugas ?? '' }}">
            <a class="nav-link" href="{{ route('tugas') }}">
                <i class="fas fa-fw fa-tasks"></i>
                <span>Data Tugas</span></a>
        </li>
    @else
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            MENU KARYAWAN
        </div>


        <!-- Nav Item - Tables -->
        <li class="nav-item {{ $menuKaryawanTugas ?? '' }}">
            <a class="nav-link" href="{{ route('tugas') }}">
                <i class="fas fa-fw fa-tasks"></i>
                <span>Data Tugas</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    @endif




    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
