<div class="container-navbar">
    <div class="container d-flex navbar-perusahaan">
        <div class="d-flex align-items-center justify-content-center inner-navbar">
            <div class="logo d-flex align-items-center" style="flex: 2">
                <a href="{{ url('/') }}" class="mb-1"><img src="{{ asset('/images/logo-smk-n-1-bojongsari.jpg') }}" alt=""></a>
                <a href="{{ url('/') }}" class="ml-2">{{__('Bursa Kerja SMK')}}</a>
            </div>
            <div class="nav-item dropdown list-unstyled d-block float-right" style="flex: 1">
                <a class="nav-link dropdown-toggle float-right d-flex align-items-center" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="mr-2 @can('melakukan verifikasi') rounded-circle @endcan @cannot('melakukan verifikasi') {{ ( $user->perusahaan->logo == null ? 'rounded-circle' : '' ) }} @endcannot" src="@can('melakukan verifikasi'){{ asset('/images/noimagecompany.png') }}@endcan @cannot('melakukan verifikasi'){{ $user->perusahaan->logo == null ? asset('/images/noimagecompany.png') : asset('/storage/assets/daftar-perusahaan/logo/' . $user->perusahaan->logo) }} @endcannot" alt=" @cannot('melakukan verifikasi') {{ $user->perusahaan->nama }} @endcannot">
                    <span>{{ $user->name }}</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @cannot('melakukan verifikasi')
                        <a class="dropdown-item" href="{{ url('/perusahaan/profil') }}"><i class="fa fa-user"></i>{{__(' Profil Perusahaan')}}</a>
                        <a class="dropdown-item" href="{{ url('/perusahaan/profil/ubah') }}"><i class="fa fa-edit"></i>{{__(' Perbarui Informasi')}}</a>
                    @endcan
                    <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout').submit();"><i class="fa fa-sign-out"></i>{{__(' Keluar')}}</a>
                </div>
            </div>
        </div>
    </div>
    <hr>
<div class="container navigasi-perusahaan">
    <div class="row">
        <div class="col-4 m-0 p-0">
            <a href="{{ url('/perusahaan') }}">
                <div class="{{ $nav == 'beranda' ? 'active' : '' }} d-flex flex-column">
                    <i class="fa fa-home mr-1"></i> <span class="mt-1">{{__(' BERANDA')}}</span>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="@can('terverifikasi') {{ url('/perusahaan/lowongan') }} @endcan">
                <div class="{{ $nav == 'lowongan' ? 'active' : '' }} d-flex flex-column">
                    <i class="fa fa-suitcase mr-1"></i> <span class="mt-1">{{__(' MANAJEMEN LOWONGAN')}}</span>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="@cannot('melakukan verifikasi') {{ url('/perusahaan/profil') }} @endcan">
                <div class="{{ $nav == 'profil' ? 'active' : '' }} d-flex flex-column">
                    <i class="fa fa-building mr-1"></i> <span class="mt-1"> {{__('PROFIL')}}</span>
                </div>
            </a>
        </div>
    </div>
</div>
<hr>
</div>

<form action="{{ url('/perusahaan/logout') }}" method="post" id="logout">
    @csrf
</form>