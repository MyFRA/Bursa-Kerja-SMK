<div id="event-navigasi-profil-siswa" class="col px-2">
    <div class="card w-100 d-flex flex-row text-center mb-1" style="cursor: pointer">
        <a id="tombol-munculkan-navigasi" class="{{ $nav != 'lihat-profil' ? 'active' : '' }} py-2" href="" style="flex: 1">
            ubah <i class="fa fa-caret-down"></i>
        </a>     
        <a class="py-2 {{ $nav == 'lihat-profil' ? 'active' : '' }}" href="{{ url('/siswa/profil') }}" style="flex: 1">
            Profil Saya
        </a>     
    </div>
</div>