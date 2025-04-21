@php

    if (auth()->user()->role !== 'admin') {
        $menus = [
            (object) [
                'title' => 'Pengisian Buku Tamu Kunjungan',
                'path' => 'bukutamu',
                'icon' => 'fas fa-book', // ikon buku tamu
            ],
            (object) [
                'title' => 'Pesan',
                'path' => 'pesan',
                'icon' => 'fas fa-envelope', // ikon pesan/email
            ],
            (object) [
                'title' => 'Hasil Kunjungan',
                'path' => 'hasil',
                'icon' => 'fas fa-file-alt', // ikon laporan/hasil
            ],
            (object) [
                'title' => 'Riwayat Kunjungan',
                'path' => 'riwayat',
                'icon' => 'fas fa-history', // ikon riwayat
            ],
        ];
    }

    if (auth()->user()->role == 'admin') {
        $menus = [
            (object) [
                'title' => 'Rekapitulasi Daftar Kunjungan',
                'path' => 'rekap',
                'icon' => 'fas fa-file-alt',
            ],
            (object) [
                'title' => 'Pengisian Hasil Kunjungan',
                'path' => 'hasilKunjung',
                'icon' => 'fas fa-edit',
            ],
            (object) [
                'title' => 'Pengaturan Akun',
                'path' => 'addUser',
                'icon' => 'fas fa-user-cog',
            ],
        ];
    }

    $menus = array_filter($menus, function ($menu) {
        return !(auth()->user()->role !== 'admin' && $menu->path === 'addproduct');
    });
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link d-flex align-items-center">
        <img src="logo-jdihn.png" alt="Logo JDIH" class="brand-image img-circle elevation-3 sidebar-logo-image">

        <span class="brand-text font-weight-light" style="font-size: 0.9rem; line-height: 1.2;">
            Pusat Layanan Literasi <br> Hukum & Pembinaan JDIHN
        </span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">


        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                @foreach ($menus as $menu)
                    <li class="nav-item ">
                        <a href='{{ $menu->path[0] !== '/' ? '/' . $menu->path : $menu->path }}'
                            class="nav-link {{ request()->path() === $menu->path ? 'active' : '' }}">
                            <i class="nav-icon {{ $menu->icon }}"></i>
                            <p class="mb-0 text-sm">{{ $menu->title }}</p>
                        </a>
                    </li>
                @endforeach
            </ul>


        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
