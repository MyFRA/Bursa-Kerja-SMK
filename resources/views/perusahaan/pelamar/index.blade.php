@extends('perusahaan.layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row mt-lg-2 mt-3">
                    <div class="col">
                        <div class="card p-4 pb-4">
                            <h5 class="text-muted "><i class="fa fa-paperclip mr-2"></i>{{__(' LOWONGAN')}}</h5>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="text-center">
                                        <img class="w-75 rounded" src="{{  ($perusahaan->logo == null ) ? asset('/images/company.png') : asset('/storage/assets/daftar-perusahaan/logo/' . $perusahaan->logo) }}" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div>
                                        <table class="table table-responsive">
                                            <tr class="border-0">
                                                <th class="border-0 pb-0" scope="col">Perusahaan</th>
                                                <th class="border-0 pb-0" scope="col">:</th>
                                                <th class="border-0 pb-0" scope="col"><a href="{{ url('/perusahaan/show/' . encrypt($perusahaan->id)) }}">{{__( $perusahaan->nama )}}</a></th>
                                            </tr>
                                            <tr>
                                                <th class="border-0 pb-0" scope="col">Jabatan</th>
                                                <th class="border-0 pb-0" scope="col">:</th>
                                                <th class="border-0 pb-0" scope="col"><a href="{{ url('lowongan/' . encrypt($lowongan->id)) }}">{{__( $lowongan->jabatan )}}</a></th>
                                            </tr>
                                            <tr>
                                                <th class="border-0 pb-0" scope="col">Gaji</th>
                                                <th class="border-0 pb-0" scope="col">:</th>
                                                <th class="border-0 pb-0" scope="col">IDR {{ (number_format($lowongan->gaji_min, 0, '.', '.')) }} {{('-')}} {{ (number_format($lowongan->gaji_max, 0, '.', '.')) }}</th>
                                            </tr>
                                            <tr>
                                                <th class="border-0 pb-0" scope="col">Alamat</th>
                                                <th class="border-0 pb-0" scope="col">:</th>
                                                <th class="border-0 pb-0" scope="col">{{ __( ($perusahaan->alamat == null) ? '-' : $perusahaan->alamat  ) }}</th>
                                            </tr>
                                        </table>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row mt-lg-2 mt-3">
                    <div class="col">
                        <div class="card p-4 pb-4">
                            <h5 class="text-muted "><i class="fa fa-paperclip mr-2"></i>{{__(' OPSI')}}</h5>
                            <hr class="mt-2">
                            <div class="w-100">
                                <a href="">
                                    <div class="py-1">
                                        Semua Pelamar
                                    </div>
                                </a>
                                <a href="">
                                    <div class="py-1">
                                       Pelamar Dipanggil
                                    </div>
                                </a>
                                <a href="">
                                    <div class="py-1">
                                        Pelamar  Diterima
                                    </div>
                                </a>
                                <a href="">
                                    <div class="py-1">
                                        Pelamar Ditolak
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>






        
        <div class="row">
            <div class="col-lg-8">
                <div class="row mt-3">
                    <div class="col">
                        <div class="card p-4 pb-4">
                            <h5 class="text-muted mt-2 mb-4"><i class="fa fa-user mr-2"></i>{{__(' PELAMAR')}}</h5>
                            @foreach ($pelamar as $org)
                            <div class="row">
                                <div class="col">
                                    <div class="row my-4">
                                        <div class="col-lg-3">
                                            <div class="m-auto text-center" style="width: 150px; height: 150px">
                                                <img class="h-100 rounded" src="{{ url('/storage/assets/daftar-siswa/' . $org->siswa->photo) }}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-9 mt-lg-0 mt-4">
                                            <table class="table table-responsive">
                                                <tr class="border-0">
                                                    <th class="border-0 pb-0" scope="col">Nama</th>
                                                    <th class="border-0 pb-0" scope="col">:</th>
                                                    <th class="border-0 pb-0" scope="col"><a href="{{ url('/perusahaan/lowongan/show/pelamar/' . encrypt($org->siswa->id)) }}">{{__( $org->siswa->nama_pertama )}} {{ __( $org->siswa->nama_belakang ) }} </a></th>
                                                </tr>
                                                <tr>
                                                    <th class="border-0 pb-0" scope="col">Gaji Diharapkan</th>
                                                    <th class="border-0 pb-0" scope="col">:</th>
                                                    <th class="border-0 pb-0" scope="col">IDR {{ (number_format($org->siswa->siswaLainya->gaji_diharapkan, 0, '.', '.')) }}</th>
                                                </tr>
                                                <tr>
                                                    <th class="border-0 pb-0" scope="col">Proposal</th>
                                                    <th class="border-0 pb-0" scope="col">:</th>
                                                    <th class="border-0 pb-0" scope="col">{!! __( $org->proposal_pelamaran ) !!}</th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection