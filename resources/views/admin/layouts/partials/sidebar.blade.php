<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ url('/app-admin/dashboard') }}" class="brand-link">
        <img alt="Logo" style="opacity: .8"
            src="{{ asset('/app-admin/dist/img/AdminLTELogo.png')}}"
            class="brand-image img-circle elevation-3" />
        <span class="brand-text font-weight-light">AdminLTE.BK</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('/app-admin/dist/img/avatar5.png') }}"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ url('/app-admin/users/account') }}" class="d-block">
                    {{ Auth::user()->name }}
                </a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ url('/app-admin/dashboard') }}"
                        class="nav-link {{ $nav == 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-header">Aktor</li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Keanggotaan<i class="fas fa-angle-left right"></i></p>
                    </a>

                    <ul class="nav nav-treeview
                        {{ $nav == 'daftar-siswa' ? 'menu-open' : '' }}
                        {{ $nav == 'daftar-perusahaan' ? 'menu-open' : '' }}
                    ">
                        <li class="nav-item">
                            <a href="{{ url('/app-admin/daftar-siswa') }}"
                                class="nav-link {{ $nav == 'daftar-siswa' ? 'active' : '' }}">
                                <i class="fas nav-icon"></i>
                                <p>Daftar Siswa</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/app-admin/daftar-perusahaan') }}"
                                class="nav-link {{ $nav == 'daftar-perusahaan' ? 'active' : '' }}">
                                <i class="far nav-icon"></i>
                                <p>Daftar Perusahaan</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>Pengguna<i class="fas fa-angle-left right"></i></p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/app-admin/daftar-pengguna/create') }}" class="nav-link">
                                <i class="fas nav-icon"></i>
                                <p>Tambah Pengguna</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/app-admin/daftar-pengguna') }}" class="nav-link">
                                <i class="far nav-icon"></i>
                                <p>Daftar Pengguna</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/app-admin/roles') }}" class="nav-link">
                                <i class="far nav-icon"></i>
                                <p>Roles</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/app-admin/permissions') }}" class="nav-link">
                                <i class="far nav-icon"></i>
                                <p>Permissions</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">Publikasi</li>

                <li class="nav-item">
                    <a href="{{ url('/app-admin/dashboard') }}"
                        class="nav-link {{ $nav == 'dashboard' ? 'lowongan-kerja' : '' }}">
                        <i class="nav-icon fas fa-mail-bulk"></i>
                        <p>Lowongan Kerja</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/app-admin/dashboard') }}"
                        class="nav-link {{ $nav == 'dashboard' ? 'artikel' : '' }}">
                        <i class="nav-icon fas fa-align-left"></i>
                        <p>Artikel</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/app-admin/dashboard') }}"
                        class="nav-link {{ $nav == 'dashboard' ? 'halaman' : '' }}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Halaman</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/app-admin/dashboard') }}"
                        class="nav-link {{ $nav == 'dashboard' ? 'agenda' : '' }}">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>Agenda</p>
                    </a>
                </li>

                <li class="nav-header">Lainnya</li>

                <li class="nav-item has-treeview 
                    {{ $nav == 'jurusan' ? 'menu-open' : '' }}
                    {{ $nav == 'bidang-studi' ? 'menu-open' : '' }}
                    {{ $nav == 'bidang-pekerjaan' ? 'menu-open' : '' }}
                    {{ $nav == 'bidang-industri' ? 'menu-open' : '' }}
                    {{ $nav == 'daftar-keahlian' ? 'menu-open' : '' }}
                    {{ $nav == 'mata-uang' ? 'menu-open' : '' }}
                    {{ $nav == 'bahasa' ? 'menu-open' : '' }}
                    {{ $nav == 'negara' ? 'menu-open' : '' }}
                    {{ $nav == 'provinsi' ? 'menu-open' : '' }}
                    {{ $nav == 'kabupaten' ? 'menu-open' : '' }}
                ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>Master File<i class="fas fa-angle-left right"></i></p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/app-admin/jurusan') }}"
                                class="nav-link {{ $nav == 'jurusan' ? 'active' : '' }}">
                                <i class="fas nav-icon"></i>
                                <p>Jurusan</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/app-admin/bidang-studi') }}"
                                class="nav-link {{ $nav == 'bidang-studi' ? 'active' : '' }}">
                                <i class="far nav-icon"></i>
                                <p>Bidang Studi</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/app-admin/bidang-pekerjaan') }}"
                                class="nav-link {{ $nav == 'bidang-pekerjaan' ? 'active' : '' }}">
                                <i class="far nav-icon"></i>
                                <p>Bidang Pekerjaan</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/app-admin/bidang-industri') }}"
                                class="nav-link {{ $nav == 'bidang-industri' ? 'active' : '' }}">
                                <i class="far nav-icon"></i>
                                <p>Bidang Industri</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/app-admin/daftar-keahlian') }}"
                                class="nav-link {{ $nav == 'daftar-keahlian' ? 'active' : '' }}">
                                <i class="far nav-icon"></i>
                                <p>Daftar Keahlian</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/app-admin/daftar-perusahaan') }}"
                                class="nav-link {{ $nav == 'mata-uang' ? 'active' : '' }}">
                                <i class="far nav-icon"></i>
                                <p>Mata Uang</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/app-admin/daftar-perusahaan') }}"
                                class="nav-link {{ $nav == 'bahasa' ? 'active' : '' }}">
                                <i class="far nav-icon"></i>
                                <p>Bahasa</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/app-admin/daftar-perusahaan') }}"
                                class="nav-link {{ $nav == 'negara' ? 'active' : '' }}">
                                <i class="far nav-icon"></i>
                                <p>Negara</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/app-admin/daftar-perusahaan') }}"
                                class="nav-link {{ $nav == 'provinsi' ? 'active' : '' }}">
                                <i class="far nav-icon"></i>
                                <p>Provinsi</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/app-admin/daftar-perusahaan') }}"
                                class="nav-link {{ $nav == 'kabupaten' ? 'active' : '' }}">
                                <i class="far nav-icon"></i>
                                <p>Kota / Kabupaten</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ $nav == 'pengaturan' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Pengaturan</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>