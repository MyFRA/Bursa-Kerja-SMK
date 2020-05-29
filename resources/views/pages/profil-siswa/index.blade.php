@extends('perusahaan.layouts.app')

@section('content')

<div class="container">
    <div class="row mt-4 mb-5">
        
        @include('widget.trigger-navigasi-profil-siswa-for-pages')

        <div class="col-lg-3 px-2">

        @include('widget.navigasi-profil-siswa-for-pages')

        </div>
        <div class="col-lg-9 px-2">
            <div class="card p-3">
                <div>
                    <div class="float-right mb-3">
                        <span class="d-block small text-muted">{{__('Bergabung Pada ')}}{{ $pelamar->created_at->format('d-m-Y') }}</span>
                    </div>
                </div>
                <div id="profil-siswa-index" class="d-flex align-items-center text-decoration-none ">
                    <div class="mx-3" style="flex: 1">
						<img width="100px" class="rounded" src="{{ ($pelamar->siswa->photo == null) ? asset('/images/profile.svg') : asset('storage/assets/daftar-siswa/' . $pelamar->siswa->photo) }}" alt="" >
                    </div>
                    <div style="flex: 6" class="d-flex flex-column px-2">
                        <span class="font-weight-bold h5 text-primary">{{( $pelamar->name )}}</span>
                        <span class="text-muted mt-n1">{{($pelamar->siswa->siswaPendidikan->tingkat_sekolah)}}</span>
                        <span class="text-muted mt-n1">{{( $pelamar->siswa->siswaPendidikan->kompetensiKeahlian->nama )}}</span>
                        <span class="text-muted ">{{( $pelamar->siswa->siswaPendidikan->nama_sekolah )}}</span>
                        <div class="mt-2"> 
                            <span>
                                <i class="fa fa-phone mx-2"></i> {{( $pelamar->siswa->hp )}} |   
                            </span>
                            <span>
                                <i class="fa fa-envelope mx-2"></i> {{( $pelamar->siswa->email )}} | 
                            </span>
                            <span>
                                <i class="fa fa-dollar mx-2"></i> {{( number_format( $pelamar->siswa->siswaLainya->gaji_diharapkan, 0, '.', '.' ) )}} | 
                            </span>
                            <span>
                                <i class="fa fa-map-marker mx-2"></i> {{( $pelamar->siswa->provinsi )}} |
                            </span>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <hr class="py-1">
                    <div class="px-2 pb-5">
                        <span class="mt-5 h5"><i class="fa fa-mortar-board"></i> {{('Pendidikan')}}</span>
                        @foreach ($siswaPendidikan as $siswaPend)
                            <div class="d-flex flex-column flex-md-row mt-5">
                                <div style="flex: 1">
                                    <span class="text-muted">{{( $siswaPend->bulan_lulus )}} {{( $siswaPend->tahun_lulus )}}</span>
                                </div>
                                <div style="flex: 3">
                                    <span class="font-weight-bold h5 d-block mb-0">{{( $siswaPend->nama_sekolah )}}</span>
                                    <span class="" style="font-size: 17px">{{( $siswaPend->tingkat_sekolah )}}, {{ $siswaPend->siswa->siswaPendidikan->kompetensiKeahlian->nama }} </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mt-4">
                    <hr class="py-1">
                    <div class="px-2 pb-5">
                        <span class="mt-5 h5"><i class="fa fa-align-justify"></i> {{('Info Lainya')}}</span>
                        <div class="d-flex flex-column flex-md-row mt-3">
                            <div style="flex: 1">
                                <span class="text-muted d-block">{{('Gaji Diharapkan')}}</span>
                            </div>
                            <div style="flex: 3">
                                <span class="d-block">{{('Rp.')}} {{ $pelamar->siswa->siswaLainya->gaji_diharapkan }}</span><br>
                            </div>
                        </div>
                        <div class="d-flex flex-column flex-md-row">
                            <div style="flex: 1">
                                <span class="text-muted">{{('Lokasi Diharapkan')}}</span>
                            </div>
                            <div style="flex: 3">
                                <span>{{ implode(', ', json_decode($pelamar->siswa->siswaLainya->lokasi_diharap)) }} </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <hr class="py-1">
                    <div class="px-2 pb-5">
                        <span class="mt-5 h5"><i class="fa fa-user"></i> {{('Tentang Saya')}}</span>
                        <div class="d-flex flex-column flex-md-row mt-3">
                            <div style="flex: 1">
                                <span class="text-muted d-block">{{'Alamat'}}</span>
                            </div>
                            <div style="flex: 3">
                                <span class="d-block">{{ $pelamar->siswa->provinsi }}, {{ $pelamar->siswa->negara }}</span><br>
                            </div>
                        </div>
                        <div class="d-flex flex-column flex-md-row">
                            <div style="flex: 1">
                                <span class="text-muted">{{('Negara')}}</span>
                            </div>
                            <div style="flex: 3">
                                <span>{{( $pelamar->siswa->negara )}} </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

    <script>
        const tombol = document.getElementById('tombol-munculkan-navigasi')
        const navigasi = document.getElementById('navigasi-profil-siswa')

        tombol.addEventListener('click', function(e) {
            e.preventDefault();
            navigasi.classList.toggle('d-none-sm')
        });
    </script>

@endsection