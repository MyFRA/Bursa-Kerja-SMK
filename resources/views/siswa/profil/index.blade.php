@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row mt-4 mb-5">
        
        @include('widget.trigger-navigasi-profil-siswa')

        <div class="col-lg-3 px-2">

        @include('widget.navigasi-profil-siswa')

        </div>
        <div class="col-lg-9 px-2">
            <div class="card p-3">
                <div>
                    <div class="float-right">
                        <span class="d-block small text-muted">Last Updated: 07 May 2020</span>
                        <span class="float-right mt-3">
                            <a class="mx-2" href=""><i class="fa fa-download"></i></a>
                            <a class="mx-2" href=""><i class="fa fa-print"></i></a>
                        </span>
                    </div>
                </div>
                <div id="profil-siswa-index" class="d-flex align-items-center text-decoration-none ">
                    <div class="mx-3" style="flex: 1">
                        <img width="100px" src="{{ asset('/images/profile.svg') }}" alt="">
                    </div>
                    <div style="flex: 6" class="d-flex flex-column px-2">
                        <span class="font-weight-bold h5 text-primary">Nama</span>
                        <span class="text-muted mt-n1">SMK/SMA/MA</span>
                        <span class="text-muted mt-n1">Konstruksi Jalan, Irigasi, dan Jembatan (September 2020)</span>
                        <span class="text-muted ">SMK NEGERI 1 REMBANG</span>
                        <div class="mt-2"> 
                            <span>
                                <i class="fa fa-phone mx-2"></i> (+62) 4234214231 |   
                            </span>
                            <span>
                                <i class="fa fa-envelope mx-2"></i> desfae@gmail.com | 
                            </span>
                            <span>
                                <i class="fa fa-dollar mx-2"></i> IDR 3,000,000 | 
                            </span>
                            <span>
                                <i class="fa fa-map-marker mx-2"></i> Jawa Tengah</div>
                            </span>
                    </div>
                </div>
                <div class="mt-4">
                    <hr class="py-1">
                    <div class="px-2 pb-5">
                        <span class="mt-5 h5"><i class="fa fa-mortar-board"></i> Pendidikan</span>
                        <div class="d-flex flex-column flex-md-row mt-3">
                            <div style="flex: 1">
                                <span class="text-muted">Januari 2020</span>
                            </div>
                            <div style="flex: 3">
                                <span class="font-weight-bold h5 d-block mb-0">SMK NEGERI 1 REMBANG</span>
                                <span class="" style="font-size: 17px">SMK/SMA/MA, Konstruksi Jalan, Irigasi, dan Jembatan </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <hr class="py-1">
                    <div class="px-2 pb-5">
                        <span class="mt-5 h5"><i class="fa fa-align-justify"></i> Info Lainya</span>
                        <div class="d-flex flex-column flex-md-row mt-3">
                            <div style="flex: 1">
                                <span class="text-muted d-block">Gaji Diharapkan</span>
                            </div>
                            <div style="flex: 3">
                                <span class="d-block">Rp. 3.000.000</span><br>
                            </div>
                        </div>
                        <div class="d-flex flex-column flex-md-row">
                            <div style="flex: 1">
                                <span class="text-muted">Lokasi Diharapkan</span>
                            </div>
                            <div style="flex: 3">
                                <span>Jawa Tengah </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <hr class="py-1">
                    <div class="px-2 pb-5">
                        <span class="mt-5 h5"><i class="fa fa-user"></i> Tentang Saya</span>
                        <div class="d-flex flex-column flex-md-row mt-3">
                            <div style="flex: 1">
                                <span class="text-muted d-block">Alamat</span>
                            </div>
                            <div style="flex: 3">
                                <span class="d-block">Jawa Tengah, Indonesia</span><br>
                            </div>
                        </div>
                        <div class="d-flex flex-column flex-md-row">
                            <div style="flex: 1">
                                <span class="text-muted">Negara</span>
                            </div>
                            <div style="flex: 3">
                                <span>Indonesia </span>
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

@endsection()