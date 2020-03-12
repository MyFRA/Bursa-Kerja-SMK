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
                    <a href="{{ url('/app-admin/lowongan-kerja') }}"
                        class="nav-link {{ $nav == 'lowongan-kerja' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-mail-bulk"></i>
                        <p>Lowongan Kerja</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/app-admin/artikel') }}"
                        class="nav-link {{ $nav == 'artikel' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-align-left"></i>
                        <p>Artikel</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/app-admin/halaman') }}"
                        class="nav-link {{ $nav == 'halaman' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Halaman</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/app-admin/agenda') }}"
                        class="nav-link {{ $nav == 'agenda' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>Agenda</p>
                    </a>
                </li>

                <li class="nav-header">Lainnya</li>

                <li class="nav-item has-treeview 
                    {{ $nav == 'bahasa' ? 'menu-open' : '' }}
                    {{ $nav == 'bidang-keahlian' ? 'menu-open' : '' }}
                    {{ $nav == 'kabupaten' ? 'menu-open' : '' }}
                    {{ $nav == 'keterampilan' ? 'menu-open' : '' }}
                    {{ $nav == 'kompetensi-keahlian' ? 'menu-open' : '' }}
                    {{ $nav == 'mata-uang' ? 'menu-open' : '' }}
                    {{ $nav == 'negara' ? 'menu-open' : '' }}
                    {{ $nav == 'program-keahlian' ? 'menu-open' : '' }}
                    {{ $nav == 'provinsi' ? 'menu-open' : '' }}
                ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>Master File<i class="fas fa-angle-left right"></i></p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/app-admin/bidang-keahlian') }}"
                                class="nav-link {{ $nav == 'bidang-keahlian' ? 'active' : '' }}">
                                <i class="fas nav-icon"></i>
                                <p>Bidang Keahlian</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/app-admin/program-keahlian') }}"
                                class="nav-link {{ $nav == 'program-keahlian' ? 'active' : '' }}">
                                <i class="far nav-icon"></i>
                                <p>Program Keahlian</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/app-admin/kompetensi-keahlian') }}"
                                class="nav-link {{ $nav == 'kompetensi-keahlian' ? 'active' : '' }}">
                                <i class="far nav-icon"></i>
                                <p>Kompetensi Keahlian</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/app-admin/keterampilan') }}"
                                class="nav-link {{ $nav == 'keterampilan' ? 'active' : '' }}">
                                <i class="far nav-icon"></i>
                                <p>Keterampilan</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/app-admin/mata-uang') }}"
                                class="nav-link {{ $nav == 'mata-uang' ? 'active' : '' }}">
                                <i class="far nav-icon"></i>
                                <p>Mata Uang</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/app-admin/bahasa') }}"
                                class="nav-link {{ $nav == 'bahasa' ? 'active' : '' }}">
                                <i class="far nav-icon"></i>
                                <p>Bahasa</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/app-admin/negara') }}"
                                class="nav-link {{ $nav == 'negara' ? 'active' : '' }}">
                                <i class="far nav-icon"></i>
                                <p>Negara</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/app-admin/provinsi') }}"
                                class="nav-link {{ $nav == 'provinsi' ? 'active' : '' }}">
                                <i class="far nav-icon"></i>
                                <p>Provinsi</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/app-admin/kabupaten') }}"
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