<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('lte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('pegawai.index') }}" class="nav-link {{ request()->is('pegawai') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Pegawai
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('penilaianKerja.index') }}" class="nav-link {{ request()->is('penilaian-kerja') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tasks"></i>
                    <p>
                        Penilaian Kinerja
                    </p>
                </a>
            </li>

            <li class="nav-header">DATA LAINNYA</li>
            <li class="nav-item">
                <a href="{{ route('jabatan.index') }}" class="nav-link {{ request()->is('data-jabatan') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tasks"></i>
                    <p>
                        Data Jabatan
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('divisi.index') }}" class="nav-link {{ request()->is('data-divisi') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tasks"></i>
                    <p>
                        Data Divisi
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('skalaNilai.index') }}" class="nav-link {{ request()->is('data-skala-nilai') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tasks"></i>
                    <p>
                        Data Skala Nilai
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('kategori.index') }}" class="nav-link {{ request()->is('data-kategori') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tasks"></i>
                    <p>
                        Data Kategori
                    </p>
                </a>
            </li>

            <li class="nav-header">PENGATURAN</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>
                        Options
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn nav-link bg-red">
                                <p class="text-light"><i class="fa fa-power-off"></i> Logout</p>
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
