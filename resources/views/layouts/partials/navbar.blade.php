<nav class="navbar navbar-expand-lg main-navbar navbar-light" style="box-shadow: 0 1px 6px 0 rgba(32,33,36,.28);">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="https://pbs.twimg.com/profile_images/848467042474704899/BOkOCZhd_400x400.jpg" width="30" height="30" alt="{{ config('app.name', 'Laravel') }}">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse bg-white p-4 p-lg-0 rounded nav-for-mobile" id="navigation"  style="z-index: 999000000000000">
            <ul class="navbar-nav mr-auto">
                @role('siswa')
                    <li class="nav-item active">
                        <a class="nav-link {{ ($navLink == 'beranda') ? 'active-for-nav-link' : '' }}" href="{{ url('/siswa/beranda') }}">{{ __('Beranda') }}</a>
                    </li>
                @endrole
                <li class="nav-item ">
                    <a class="nav-link {{ ($navLink == 'lowongan') ? 'active-for-nav-link' : '' }}" href="{{ url('/lowongan') }}">{{ __('Lowongan') }}</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ ($navLink == 'perusahaan') ? 'active-for-nav-link' : '' }}" href="{{ url('/daftar-perusahaan') }}">{{ __('Perusahaan') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($navLink == 'agenda') ? 'active-for-nav-link' : '' }}" href="{{ url('/agenda') }}">{{ __('Agenda') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($navLink == 'pengumuman') ? 'active-for-nav-link' : '' }}" href="{{ url('/pengumuman') }}">{{ __('Pengumuman') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($navLink == 'produk-siswa') ? 'active-for-nav-link' : '' }}" href="{{ url('/produk-siswa') }}">{{ __('Produk Siswa') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($navLink == 'artikel') ? 'active-for-nav-link' : '' }}" href="{{ url('/artikel') }}">{{ __('Artikel') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($navLink == 'faq') ? 'active-for-nav-link' : '' }}" href="{{ url('/faq') }}">{{ __('FAQ') }}</a>
                </li>
                @role('siswa')
                <li class="nav-item">
                    <a class="nav-link {{ ($navLink == 'lamaran') ? 'active-for-nav-link' : '' }}" href="{{ url('/siswa/lamaran') }}">{{ __('Lamaran') }}</a>
                </li>
                @endrole
            </ul>

            <ul class="navbar-nav ml-auto">
                @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if (Auth::user()->hasRole('perusahaan'))
                                <a class="dropdown-item" href="{{ url('/perusahaan') }}">Dasbhboard</a>
                                <a class="dropdown-item" href="{{ url('/bantuan-perusahaan') }}"><i class="fa fa-question-circle"></i> Bantuan</a>
                            @elseif(Auth::user()->hasRole('siswa'))
                                <a class="dropdown-item" href="{{ url('/siswa/profil') }}"><i class="fa fa-user"></i> Profil</a>
                                <a class="dropdown-item" href="{{ url('/bantuan-siswa') }}"><i class="fa fa-question-circle"></i> Bantuan</a>
                            @else
                                <a class="dropdown-item" href="{{ url('/app-admin/dashboard') }}">Dasbhboard</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @else
                    @if (isset($navbarForPerusahaan))
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="{{ url('/perusahaan/login') }}">{{ __('Masuk') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-danger px-3 py-1 rounded-0 text-white" href="{{ url('/perusahaan/register') }}">
                                {{ __('Daftar Perusahaan') }}
                            </a>
                        </li>
                    @else
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="{{ url('/siswa/login') }}">{{ __('Masuk') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-success px-3 py-1 rounded-0" href="{{ url('/portal/perusahaan') }}">
                                {{ __('Perusahaan') }}
                            </a>
                        </li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
</nav>
