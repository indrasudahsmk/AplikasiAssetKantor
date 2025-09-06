<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <i class="fas fa-cubes"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Asset Kantor<sup></sup></div>
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
            <a class="nav-link" href="{{ route('pegawaiIndex') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Data Pegawai</span></a>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item {{ $menuAdminBidang ?? '' }}">
            <a class="nav-link" href="{{ route('bidangIndex') }}">
                <i class="fas fa-project-diagram"></i>
                <span>Data Bidang</span></a>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item {{ $menuAdminKantor ?? '' }}">
            <a class="nav-link" href="{{ route('kantorIndex') }}">
                <i class="fas fa-fw fa-building"></i>
                <span>Data Kantor</span></a>
        </li>

        <!-- Nav Item - Barang (Dropdown) -->
        <li class="nav-item {{ $menuAdminBarang ?? '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBarang"
                aria-expanded="true" aria-controls="collapseBarang">
                <i class="fas fa-fw fa-box"></i>
                <span>Barang</span>
            </a>
            <div id="collapseBarang" class="collapse" aria-labelledby="headingBarang" data-parent="#accordionSidebar">
                <div class="bg-primary py-2 collapse-inner rounded">
                    <a class="dropdown-item bg-primary text-white" href="{{ route('barang') }}">
                        <i class="fas fa-fw fa-box"></i> Data Barang
                    </a>
                    <a class="dropdown-item bg-primary text-white" href="{{ route('tipe') }}">
                        <i class="fas fa-fw fa-boxes"></i> Data Tipe
                    </a>
                    <a class="dropdown-item bg-primary text-white" href="{{ route('merk') }}">
                        <i class="fas fa-fw fa-tags"></i> Data Merk
                    </a>
                    <a class="dropdown-item bg-primary text-white" href="{{ route('jenis') }}">
                        <i class="fas fa-fw fa-th-large"></i> Data Jenis
                    </a>
                </div>
            </div>
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
