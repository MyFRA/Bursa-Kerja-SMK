<div class="container">
    <div class="route mb-4">
        <div class="d-flex align-items-center">
            <h2 class="m-0 pl-2">{{__('Detail Pelamar')}}</h2>
        </div>
        <div class="d-flex align-items-center justify-content-end">
            <a href="{{ url('/perusahaan') }}">{{__('Beranda')}} </a>
            <span class="mx-2">/</span>
            <a href="">{{__('Lowongan')}} </a>
            <span class="mx-2">/</span>
            <a href="{{ url()->current() }}">{{__('Pelamar')}} </a>
            <span class="float-right ml-2">{{__('/ Detail Pelamar')}}</span>
        </div>
    </div>
</div>

<div id="event-navigasi-profil-siswa" class="col px-2">
    <div class="card w-100 d-flex flex-row text-center mb-1" style="cursor: pointer">
        <a id="tombol-munculkan-navigasi" class="{{ $sidebar != 'lihat-profil' ? 'active' : '' }} py-2" href="" style="flex: 1">
            Info Lain <i class="fa fa-caret-down"></i>
        </a>     
        <a class="py-2 {{ $sidebar == 'lihat-profil' ? 'active' : '' }}" href="{{ url('profil-siswa/' . encrypt($pelamar->id)) }}" style="flex: 1">
            Profil
        </a>     
    </div>
</div>