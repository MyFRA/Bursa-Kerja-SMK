@extends('layouts.app')

@section('content')
<div class="bg-gray p-3">
    <div class="container justify-content-between">
        <div class="row">
            <div class="col-6">
                lowongan di <b>Indonesia</b>
            </div>
            <div class="col-6 text-right">
                1 - 20 of 27,783 lowongan
            </div>
        </div>
    </div>
</div>

<div class="container py-2">
    <div class="row">
        <div class="col-md-3 px-2">
            <div class="widgets select-job-criteria card rounded-0 mb-3">
                <div class="card-body p-3">
                    <h4 class="widget-title">Pilih Kriteria</h4>
                    
                    <form action="" method="get">
                        <div class="form-group">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-search"></i>
                                    </span>
                                </div>
                                <input type="text" name="judul" class="form-control" placeholder="Judul, Posisi, Kata Kunci atau ...">
                            </div>
                        </div>

                        <div class="form-group">
                            <select name="" id="" class="form-control form-control-sm">
                                <option value="">Semua Lokasi</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select name="" id="" class="form-control form-control-sm">
                                <option value="">Semua Program Keahlian</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="text" name="" id="" placeholder="Gaji Minimum (IDR)" class="form-control form-control-sm">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-block btn-warning bg-dark-green">
                                Cari Lowongan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- navigation-list-page -->
            @include('widget.navigation-list-page')
        </div>
        <div class="col-md-7 px-2">
            <div class="card mb-3 rounded-0">
                <div class="card-body p-0">
                    <div class="row m-0">
                        <ul class="nav col-md-9">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Semua Lowongan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Prakerin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Perusahaan</a>
                            </li>
                        </ul>
                        <div class="col-md-3 text-right py-2">
                            <select name="" id="" class="form-control form-control-sm">
                                <option value="">Terbaru</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card rounded-0 mb-2">
                <div class="card-body p-2">
                    <div class="title row">
                        <div class="col-8">
                            <h4><a href="{{ url('/lowongan/staf-administrasi-193904031') }}">STAFF ADMINISTRASI</a></h4>
                            <p><a href="">PT Wiratama Kreasi Komputindo</a></p>
                        </div>
                        <div class="col-4">
                            <img src="https://siva.jsstatic.com/id/71980/images/logo/71980_logo_0_796142.jpg" width="100%" alt="">
                        </div>
                    </div>
                    <div class="info">
                        <p><i class="fa fa-map-marker mr-2"></i>Bekasi (Jawa Barat), Jakarta Timur (Jakarta Raya), Jakarta Utara (Jakarta Raya)</p>
                        <p><small>(IDR)</small>Login untuk melihat gaji</p>
                    </div>
                    <p>JOBS DESCRIPTION Melakukan kegiatan packing produk. Mempersiapkan barang untuk delivery ke customer. Mengatur dan menata barang di gudang. Menghitung...</p>
                    <p>15 menit yang lalu</p>
                </div>
            </div>
        </div>
        <div class="col-md-2 px-2">
            <img src="https://www.wmtips.com/i/art/547/160x600.gif" alt="">
        </div>
    </div>
</div>
@endsection