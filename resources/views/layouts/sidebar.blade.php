<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link bg-primary">
        {{-- <img src="{{asset('')}}assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
            <span class="brand-text text-bold ml-4">Si_Mekar</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('index')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('daftar-dokumen')}}" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Daftar Dokumen Upload
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('agenda.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Agenda Pelayanan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('usulan.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>
                            Berkas Usulan
                        </p>
                    </a>
                </li>

                @can('viewAny', App\Models\Pegawai::class)
                <li class="nav-item">
                    <a href="{{route('verifikasi.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>
                            Verifikasi Berkas
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('pegawai.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Daftar Pegawai
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('operator.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Daftar Operator
                        </p>
                    </a>
                </li>
                @endcan
            </ul>
        </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
