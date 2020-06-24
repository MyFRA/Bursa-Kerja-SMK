<div id="navigasi-profil-siswa" class="d-none-sm mb-2">
    <div id="profil" class="card rounded-lg shadow">
    <a href="{{ url('/siswa/profil') }}" class="d-flex p-3 align-items-center text-decoration-none {{ $nav == 'lihat-profil' ? 'siswa-profil-active' : '' }}">
            <div style="flex: 1" class="px-2">
				<img class="w-100 rounded" src="{{ (Auth::user()->siswa->photo == null) ? asset('/images/profile.svg') : asset('storage/assets/daftar-siswa/' . Auth::user()->siswa->photo) }}" alt="" >
            </div>
            <div style="flex: 3" class="d-flex flex-column px-2">
                <span>{{__(Auth::user()->siswa->nama_pertama)}} {{__(Auth::user()->siswa->nama_belakang)}}</span>
                <span class="small text-muted">{{__('Lihat profil saya')}}</span>
            </div>
        </a>
    </div>
    <div class="d-flex flex-column card shadow border-top-0">
        <a href="{{ url('/siswa/profil/pengalaman') }}" class="{{ $nav == 'pengalaman' ? 'siswa-profil-active' : '' }} text-dark navigasi-siswa-profil text-decoration-none p-3">
            <i class="fa fa-briefcase mr-3"></i> {{__("Pengalaman")}}
        </a>
        <a href="{{ url('/siswa/profil/pendidikan') }}" class="{{ $nav == 'pendidikan' ? 'siswa-profil-active' : '' }} text-dark navigasi-siswa-profil text-decoration-none p-3">
            <i class="fa fa-mortar-board mr-3"></i> {{__('Pendidikan')}}
        </a>
        <a href="{{ url('/siswa/profil/keterampilan') }}" class=" {{ $nav == 'keterampilan' ? 'siswa-profil-active' : '' }} text-dark navigasi-siswa-profil text-decoration-none p-3">
            <i class="fa fa-joomla mr-3"></i> {{__('Keterampilan')}}
        </a>
        <a href="{{ url('/siswa/profil/bahasa') }}" class="{{ $nav == 'bahasa' ? 'siswa-profil-active' : '' }} text-dark navigasi-siswa-profil text-decoration-none p-3">
            <i class="fa fa-comments-o mr-3"></i> {{__('Bahasa')}}
        </a>
        <a href="{{ url('/siswa/profil/lainya') }}" class="{{ $nav == 'lainya' ? 'siswa-profil-active' : '' }} text-dark navigasi-siswa-profil text-decoration-none p-3">
            <i class="fa fa-align-justify mr-3"></i> {{__('Info Lain')}}
        </a>
        <a href="{{ url('/siswa/profil/profil-saya') }}" class="{{ $nav == 'profil-saya' ? 'siswa-profil-active' : '' }} text-dark navigasi-siswa-profil text-decoration-none p-3">
            <i class="fa fa-user mr-3"></i> {{__('Profil Saya')}}
        </a>
        <a href="{{ url('/siswa/profil/akun') }}" class="{{ $nav == 'akun' ? 'siswa-profil-active' : '' }} text-dark navigasi-siswa-profil text-decoration-none p-3">
            <i class="fa fa-cogs mr-3"></i> {{__('Pengaturan Akun')}}
        </a>
    </div>
</div>
