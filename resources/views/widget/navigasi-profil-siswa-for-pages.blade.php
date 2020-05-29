<div id="navigasi-profil-siswa" class="d-none-sm mb-2">
    <div id="profil" class="card rounded-0">
    <a href="{{ url('profil-siswa/' . encrypt($pelamar->id)) }}" class="d-flex p-3 align-items-center text-decoration-none {{ $sidebar == 'lihat-profil' ? 'siswa-profil-active' : '' }}">
            <div style="flex: 1" class="px-2">
				<img class="w-100 rounded" src="{{ ($pelamar->siswa->photo == null) ? asset('/images/profile.svg') : asset('storage/assets/daftar-siswa/' . $pelamar->siswa->photo) }}" alt="" >
            </div>
            <div style="flex: 3" class="d-flex flex-column px-2">
                <span>{{ __( $pelamar->name ) }}</span>
                <span class="small text-muted">{{__('Lihat Profil')}}</span>
            </div>
        </a>
    </div>
    <div class="d-flex flex-column card border-top-0">
        <a href="{{ url('profil-siswa/' . encrypt($pelamar->id) . '/pengalaman') }}" class="{{ $sidebar == 'pengalaman' ? 'siswa-profil-active' : '' }} text-dark navigasi-siswa-profil text-decoration-none p-3">
            <i class="fa fa-briefcase mr-3"></i> {{__("Pengalaman")}}
        </a>
        <a href="{{ url('profil-siswa/' . encrypt($pelamar->id) . '/pendidikan') }}" class="{{ $sidebar == 'pendidikan' ? 'siswa-profil-active' : '' }} text-dark navigasi-siswa-profil text-decoration-none p-3">
            <i class="fa fa-mortar-board mr-3"></i> {{__('Pendidikan')}}
        </a>
        <a href="{{ url('profil-siswa/' . encrypt($pelamar->id) . '/keterampilan') }}" class=" {{ $sidebar == 'keterampilan' ? 'siswa-profil-active' : '' }} text-dark navigasi-siswa-profil text-decoration-none p-3">
            <i class="fa fa-joomla mr-3"></i> {{__('Keterampilan')}}
        </a>
        <a href="{{ url('profil-siswa/' . encrypt($pelamar->id) . '/bahasa') }}" class="{{ $sidebar == 'bahasa' ? 'siswa-profil-active' : '' }} text-dark navigasi-siswa-profil text-decoration-none p-3">
            <i class="fa fa-comments-o mr-3"></i> {{__('Bahasa')}}
        </a>
        <a href="{{ url('profil-siswa/' . encrypt($pelamar->id) . '/lainya') }}" class="{{ $sidebar == 'lainya' ? 'siswa-profil-active' : '' }} text-dark navigasi-siswa-profil text-decoration-none p-3">
            <i class="fa fa-align-justify mr-3"></i> {{__('Info Lain')}}
        </a>
        <a href="{{ url('profil-siswa/' . encrypt($pelamar->id) . '/profil-lengkap') }}" class="{{ $sidebar == 'profil-saya' ? 'siswa-profil-active' : '' }} text-dark navigasi-siswa-profil text-decoration-none p-3">
            <i class="fa fa-user mr-3"></i> {{__('Profil Lengkap')}}
        </a>
    </div>
</div>