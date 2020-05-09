<div id="navigasi-profil-siswa" class="d-none-sm mb-2">
    <div id="profil" class="card rounded-0">
    <a href="{{ url('/siswa/profil') }}" class="d-flex p-3 align-items-center text-decoration-none {{ $nav == 'lihat-profil' ? 'siswa-profil-active' : '' }}">
            <div style="flex: 1" class="px-2">
                <img src="{{ asset('/images/profile.svg') }}" alt="">
            </div>
            <div style="flex: 3" class="d-flex flex-column px-2">
                <span>Nama</span>
                <span class="small text-muted">Lihat profil saya</span>
            </div>
        </a>
    </div>
    <div class="d-flex flex-column card border-top-0">
        <a href="{{ url('/siswa/profil/pengalaman') }}" class="{{ $nav == 'pengalaman' ? 'siswa-profil-active' : '' }} text-dark navigasi-siswa-profil text-decoration-none p-3">
            <i class="fa fa-briefcase mr-3"></i> {{__("Pengalaman")}}
        </a>
        <a href="{{ url('/siswa/profil/pendidikan') }}" class="{{ $nav == 'pendidikan' ? 'siswa-profil-active' : '' }} text-dark navigasi-siswa-profil text-decoration-none p-3">
            <i class="fa fa-mortar-board mr-3"></i> {{__('Pendidikan')}}
        </a>
        <a href="{{ url('/siswa/profil/keterampilan') }}" class=" {{ $nav == 'keterampilan' ? 'siswa-profil-active' : '' }} text-dark navigasi-siswa-profil text-decoration-none p-3">
            <i class="fa fa-joomla mr-3"></i> {{__('Keterampilan')}}
        </a>
        <a href="" class=" text-dark navigasi-siswa-profil text-decoration-none p-3">
            <i class="fa fa-comments-o mr-3"></i> Bahasa
        </a>
        <a href="" class=" text-dark navigasi-siswa-profil text-decoration-none p-3">
            <i class="fa fa-align-justify mr-3"></i> Info Lain
        </a>
        <a href="" class=" text-dark navigasi-siswa-profil text-decoration-none p-3">
            <i class="fa fa-user mr-3"></i> Profil Saya
        </a>
        <a href="" class=" text-dark navigasi-siswa-profil text-decoration-none p-3">
            <i class="fa fa-cogs mr-3"></i> Pengaturan Akun
        </a>
    </div>
</div>