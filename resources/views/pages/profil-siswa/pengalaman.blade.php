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
                <div class="mt-4">
                    <div class="px-2 pb-5">
                        <span class=" h5 d-block"><i class="fa fa-briefcase"></i> {{('Pengalaman')}}</span>
                        <div class="px-lg-5 mt-4">
                            @foreach ($pengalaman as $item)
                                <div>
                                    <div class="row mt-5">
                                        <div class="col">
                                            <div class="row title-pengalaman">
                                                <div class="col-md-3">
                                                    <span class="small d-block">{{__( $item->mulai_kerja_bulan )}} {{__( $item->mulai_kerja_tahun )}} {{__('-')}} {{__( $item->akhir_kerja_bulan )}} {{__( $item->akhir_kerja_tahun )}}</span>
                                                    <span class="small text-muted">{{__($item->akhir_kerja_tahun - $item->mulai_kerja_tahun )}}{{__(' tahun')}}</span>
                                                </div>
                                                <div class="col-md-7">
                                                    <p class="h5 font-weight-bold">{{__( $item->jabatan )}}</p>
                                                    <div class="p">
                                                        <span>{{__( $item->perusahaan )}} {{__('|')}} </span>
                                                        <span>{{__($item->provinsi)}}, </span>
                                                        <span>{{__( $item->negara )}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3 info-lengkap-pengalaman">
                                                <div class="col-md-3">

                                                </div>
                                                <div class="col-md-9">
                                                    <table class="table border-0">
                                                        <tr class="border-0">
                                                            <td class="border-0 p-1 text-muted">{{'Bidang Keahlian'}}</td>
                                                            <td class="border-0 p-1">{{__(':')}}</td>
                                                            <td class="border-0 p-1 pl-3">{{__( $item->bidangKeahlian->nama )}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border-0 p-1 text-muted">{{('Program Keahlian')}}</td>
                                                            <td class="border-0 p-1">{{__(':')}}</td>
                                                            <td class="border-0 p-1 pl-3">{{__( $item->programKeahlian->nama )}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border-0 p-1 text-muted">{{__('Kompetensi Keahlian')}}</td>
                                                            <td class="border-0 p-1">{{__(':')}}</td>
                                                            <td class="border-0 p-1 pl-3">{{__( $item->kompetensiKeahlian->nama )}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border-0 p-1 text-muted">{{__('Jabatan')}}</td>
                                                            <td class="border-0 p-1">{{__(':')}}</td>
                                                            <td class="border-0 p-1 pl-3">{{__( $item->jabatan )}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border-0 p-1 text-muted">{{('Gaji Bulanan')}}</td>
                                                            <td class="border-0 p-1">{{__(':')}}</td>
                                                            <td class="border-0 p-1 pl-3">{{__( $item->mata_uang )}} {{__( number_format($item->gaji_bulanan, 0, '.', '.') )}}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-3">
                                                
                                                </div>
                                                <div class="col-md-9">
                                                    <p>{{__( $item->keterangan )}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>     
                            @endforeach

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
