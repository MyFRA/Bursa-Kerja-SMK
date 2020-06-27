@extends('layouts.app')

@section('content')

<?php
    use \App\Http\Controllers\HalamanSiswaController;
?>

<section class="pages py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-n3 mb-n2 d-flex justify-content-between align-items-center">
                <h3 class="page-title"><i class="fa fa-building mr-3"></i>{{__('Perusahaan')}}</h3>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('perusahaan')}}</li>
                </ol>
            </div>
        </div>
            <a href="{{ url()->previous() }}" class="h6"><i class="fa my-3 fa-arrow-left fa-0x mr-2 mt-0"></i>Kembali</a>
        <div class="row">
            <div class="col-md-3 px-2">
                <div class="widgets select-job-criteria card shadow-xl mb-3">
                    <div class="card-body p-3">
                        <h4 class="widget-title">{{__('Pilih Kriteria')}}</h4>

                        <form id="form-search" action="{{ url('/lowongan/cari/pekerjaan') }}" method="get">
                            <input type="hidden" name="urutBerdasarkan" value="terbaru">
                            <div class="form-group">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="judul" class="form-control" placeholder="Judul, Posisi, Kata Kunci atau ..." value="{{ (isset($oldInput['judul'])) ? $oldInput['judul'] : '' }}" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <select name="provinsi" id="" class="form-control form-control-sm">
                                    <option value="">{{__('Semua Lokasi')}}</option>
                                    @foreach ($provinsi as $prov)
                                        <option value="{{ $prov->nama_provinsi }}"
                                        >{{ $prov->nama_provinsi }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <select name="program_keahlian_id" id="" class="form-control form-control-sm">
                                    <option value="">{{__('Semua Program Keahlian')}}</option>
                                    @foreach ($programKeahlian as $progKeahlian)
                                        <option value="{{ $progKeahlian->id }}"
                                        >{{ $progKeahlian->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="gaji_min" id="" class="form-control form-control-sm">
                                    <option value="">{{__('Gaji Minimal IDR')}}</option>
                                    @foreach ($gaji_minimal as $gaji_min)
                                        <option value="{{ $gaji_min }}"
                                        >IDR {{ number_format($gaji_min, 0, '.', '.') }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="button_cont text-center" ><button class="example_a" type="submit">Cari Lowongan</button></div>
                        </form>
                    </div>
                </div>

                <div class="nav-list-page-for-dekstop">
                    <!-- navigation-list-page -->
                    @include('widget.navigation-list-page')
                </div>

            </div>
            <div class="col-md-9 px-2">
                <div class="card mb-3 shadow-md">
                    <div class="card-body py-1">
                        <div class="row m-0">
                            <ul class="nav col-md-9">
                                <li class="nav-item">
                                    <a class="nav-link font-weight-bold href-dark-to-blue {{ ($navLinkPerusahaan == 'semua') ? ' active-for-nav-link-atas-loker-and-perusahaan' : '' }}" href="{{ url('/daftar-perusahaan') }}">{{__('Semua')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-weight-bold href-dark-to-blue {{ ($navLinkPerusahaan == 'negeri') ? ' active-for-nav-link-atas-loker-and-perusahaan' : '' }}" href="{{ url('/daftar-perusahaan?kategori=negeri') }}">{{__('Negeri')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-weight-bold href-dark-to-blue {{ ($navLinkPerusahaan == 'swasta') ? ' active-for-nav-link-atas-loker-and-perusahaan' : '' }}" href="{{ url('/daftar-perusahaan?kategori=swasta') }}">{{__('SWASTA')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-weight-bold href-dark-to-blue {{ ($navLinkPerusahaan == 'bumn') ? ' active-for-nav-link-atas-loker-and-perusahaan' : '' }}" href="{{ url('/daftar-perusahaan?kategori=bumn') }}">{{__('BUMN')}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div style="animation: tememplek 0.5s;"  id="card-lowongan" class="card shadow-2xl p-3 mt-3">
                    <span class="h4 font-weight-bold mb-1 text-dark"><i class="fa fa-building mr-2"></i>{{__(' Perusahaan')}}</span>
                    @if ($list_perusahaan->isEmpty())
                    <div class="d-flex flex-column align-items-center justify-content-center text-center py-3">
                        <span class="display-1 text-muted"><i class="fa fa-building-o"></i></span>
                        <h3 class="quicksand font-weight-bold">{{__('Maaf, Perusahaan ')}}{{__(' tidak ditemukan')}}</h3>
                    </div>
                    @else
                        @foreach ($list_perusahaan as $perusahaan)
                            <div id="lowongan" class="my-0">
                                <hr>
                                <div id="njero-lowongan" class="d-flex w-100 pt-3">
                                    <div class="flex-1 flex-lg-1">
                                        <img class="w-lg-75 w-100 ml-lg-3 rounded-lg max-height-135 max-height-lg-200" style="object-fit: cover; object-position: center;" src=" {{ is_null($perusahaan->logo) ? asset('/images/company.png') :  asset('/storage/assets/daftar-perusahaan/logo/' . $perusahaan->logo)}}" alt="">
                                    </div>
                                    <div class="flex-3 flex-lg-4">
                                        <div class="d-flex flex-column flex-lg-row justify-content-between ml-lg-0" style="margin-left: -40%">
                                            <div class="order-2 order-lg-1 flex-lg-3 px-4">
                                                <div class="d-flex flex-column justify-content-center d-lg-inline-block">
                                                    <div class="mb-3 mt-4 mt-lg-0"><a href="{{ url('/perusahaan/show/' . encrypt($perusahaan->id)) }}" class="font-weight-bold h4 href-dark-to-blue">{{ $perusahaan->nama }}</a></div>
                                                    <div class="mt-1" style="font-size: 12.75px" class="d-block"><i class="fa fa-cogs mr-2"></i> {{ $perusahaan->bidangKeahlian->nama }}</div>
                                                    <div class="mt-1" style="font-size: 12.75px" class="d-block"><i class="fa fa-map-marker mr-2"></i> {{ $perusahaan->kabupaten  }}</div>
                                                    <div class="mt-1" style="font-size: 12.75px" class="d-block"><i class="fa fa-globe mr-2"></i> <a href="http:\\{{ $perusahaan->site  }}">{{ $perusahaan->site  }}</a></div>
                                                </div>
                                            </div>
                                            <div class="order-1 order-lg-2 flex-lg-1 px-3 ">
                                                <span style="background-color: #eee" class="px-3 float-right py-1 rounded-full small">{{ $perusahaan->kategori }}</span>
                                                <br>
                                                <br>
                                                <div class="d-flex mt-2 align-items-center justify-content-end mr-5">
                                                    <span class="h2 text-primary"><i class="fa fa-briefcase mx-3"></i></span>
                                                    <span class="h4 font-weight-bold">{{ $perusahaan->lowonganAktif->count() }}</span>
                                                </div>
                                                <div class="float-right">
                                                    Lowongan Tersedia
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pt-4 pl-3 ml-lg-0 d-none d-lg-inline-block" style="margin-left: -33%">
                                            <span class="text-muted font-weight-bold h6">Profil Perusahaan</span>
                                            <p>
                                                {!! HalamanSiswaController::html_cut($perusahaan->overview, 300) !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="mt-2 ml-2">
                    {{ $list_perusahaan->onEachSide(5)->links() }}
                </div>
            </div>
            {{-- <div class="col-md-2 px-2">
                <img src="https://www.wmtips.com/i/art/547/160x600.gif" alt="">
            </div> --}}
            <div class="col-12 px-2 mt-2">
                <div class="nav-list-page-for-mobile">
                    <!-- navigation-list-page -->
                    @include('widget.navigation-list-page')
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
