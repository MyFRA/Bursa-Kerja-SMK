@extends('layouts.app')

@section('content')
<section class="pages pb-md-3 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-n3 d-flex justify-content-between align-items-center">
                <h3 class="page-title"><i class="fa fa-address-card-o mr-3"></i>{{__('Hubungi Kami')}}</h3>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="">{{__('Hubungi Kami')}}</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-body">
                        <a href="{{ url()->previous() }}" class="h5"><i class="fa fa-arrow-left fa-0x mr-2"></i>Kembali</a>
                    </div>
                    <hr class="mt-0">
                    <div class="card-body px-5 pt-2 pb-5">
                        <h3>Skagata Career Center - Bursa Kerja Online</h3>
                        <p class="mt-3">Bagi Perusahaan yang berminat untuk bekerjasama dalam pelaksanaan rekrutmen di Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta dapat menghubungi :</p>
                        <p class="font-weight-bold">Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta</p>
                        <span class="d-block">Alamat : Jl. R.W. Monginsidi No.2, Cokrodiningratan, Jetis, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55233</span>
                        <span class="d-block">Telepon : 082227780589</span>
                        <span class="d-block">Email : bkk@smkn3jogja.sch.id</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
