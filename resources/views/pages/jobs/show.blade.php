@extends('layouts.app')

@section('content')
@php
    $today = new DateTime();
    $exp = new DateTime($lowongan->batas_akhir_lamaran);
@endphp
<div class="pages-beranda-lowongan"style="box-shadow: 0 1px 6px 0 rgba(32,33,36,.28);">
    <div class="pages-beranda-cari-lowongan">

        {{-- For Dekstop --}}
			<input id="for-dekstop" type="text" placeholder="Mencari berdasarkan posisi, keahlian dan kata kunci">
			<button id="for-dekstop" onclick="cariLoker(this)"><i class="fa fa-search"></i></button>

        {{-- For Mobile --}}
        <input id="for-mobile" class="d-none w-100" type="text" placeholder="Mencari berdasarkan posisi, keahlian dan kata kunci">
        <button id="for-mobile"><i class="fa fa-search"></i></button>

    </div>
</div>

<div class="container px-4 mt-3">
    <div>
        @if ($lowongan->perusahaan->image != NULL)
            <div class="row">
                <div class="col image-cover-perusahaan-lowongan px-1">
                    <img class="w-100 rounded-top" class="" src="{{ asset('/storage/assets/daftar-perusahaan/image/' . $lowongan->perusahaan->image) }}" alt="">
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col px-1">
                <div class="card card-header-lowongan-show shadow p-3 pt-lg-4 pt-5" style="@if ($lowongan->perusahaan->image != NULL) border-top-left-radius: 0px; border-top-right-radius: 0px;@endif" >
                    <div class="m-auto w-100">
                        <div class="text-center m-auto w-100">
                            @if (is_null($lowongan->perusahaan->logo))
                                <img class="logo-perusahaan-show-lowongan text-center" src="{{ asset('/images/company.png') }}" alt="">
                            @else
                                <img class="logo-perusahaan-show-lowongan text-center" src="{{ asset('/storage/assets/daftar-perusahaan/logo/' . $lowongan->perusahaan->logo) }}" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="p-3">
                        <h3 class="font-weight-bold">{{ __( $lowongan->jabatan ) }}</h3>
                        <a href="{{ url('/perusahaan/show/' . encrypt($lowongan->perusahaan->id)) }}" class="h5 mt-n2">{{ __($lowongan->nama_perusahaan) }}</a>
                    </div>
                    <div>
                        <div class="">
                            <span class="d-inline-block">
                                <i class="fa fa-dollar mr-2 text-success font-weight-bold"></i>
                            </span>
                            <span class="text-muted">
                                {{__('IDR')}} {{ __(number_format($lowongan->gaji_min, 0, '.', '.')) }} {{__('-')}}  {{__( number_format($lowongan->gaji_max, 0, '.', '.') )}}
                            </span>
                        </div>
                        <div>
                            <span class="">
                                <i class="fa fa-briefcase mr-2 text-primary "></i> {{ __('Fresh Graduate, Are Welcome') }}
                            </span>
                        </div>
                        <div>
                            <span class="">
                                <i class="fa fa-map-marker mr-2 text-danger font-weight-bold"></i> {{ $lowongan->perusahaan->alamat != null ? $lowongan->perusahaan->alamat : '-' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 px-1">
                <div class="row">
                    <div class="col-12 mt-2">
                        <div class="card shadow p-3 pb-4">
                            <h5 class="text-muted"><i class="fa fa-edit mr-2"></i>{{__(' DESKRIPSI PEKERJAAN')}}</h5>
                            <div class="mt-2">
                                {!! $lowongan->deskripsi !!}
                            </div>
                            <div class="mt-2">
                                <p class="mb-1">{{__('Persyaratan')}}</p>
                                {!! $lowongan->persyaratan !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <div class="card shadow p-3 pb-4">
                            <h5 class="text-muted"><i class="fa fa-edit mr-2"></i>{{__(' LOKASI KERJA')}}</h5>
                            <p class="text-primary mt-2" style="font-size: 16px"><i class="fa fa-building mr-1"></i>{{__(' Alamat')}}</p>
                            <div class="px-4 mt-n2">
                                {{$lowongan->perusahaan->alamat != null ? $lowongan->perusahaan->alamat : '-'}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 px-1">
                <div class="row">
                    <div class="col-12 mt-2">
                        <div class="card shadow p-3 pb-4">
                            <h5 class="text-muted"><i class="fa fa-list-alt mr-2"></i>{{__(' GAMBARAN PERUSAHAAN')}}</h5>
                            <div class="row">
                                <div class="col-lg-6 mt-3">
                                    <h6 class="font-weight-bold d-block mb-0">{{__('Proses Lamaran')}}</h6>
                                    <span class="ml-1 d-flex align-items-center">
                                        <i class="fa fa-circle mr-1 {{ ($lowongan->proses_lamaran == 'Online') ? 'text-success' : 'text-danger' }}" style="font-size: 8px"></i>
										<span>{{ $lowongan->proses_lamaran }}</span>
                                    </span>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <h6 class="font-weight-bold d-block mb-0">{{__('Kategori')}}</h6>
                                    <span class="ml-1">{{$lowongan->perusahaan->kategori != null ? $lowongan->perusahaan->kategori : '-' }}</span>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <h6 class="font-weight-bold d-block mb-0">{{__('Ukuran Perusahaan')}}</h6>
                                    <span class="ml-1">{{($lowongan->perusahaan->jumlah_karyawan != null) ? $lowongan->perusahaan->jumlah_karyawan . ' karyawan' : '-'}}</span>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <h6 class="font-weight-bold d-block mb-0">{{__('Situs')}}</h6>
                                    <span class="ml-1"><a href="http:\\{{ $lowongan->perusahaan->site }}" target="_blank">{{ $lowongan->perusahaan->site != null ? $lowongan->perusahaan->site : '-'}}</a></span>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <h6 class="font-weight-bold d-block mb-0">{{__('Gaya Berpakaian')}}</h6>
                                    <span class="ml-1">{{$lowongan->perusahaan->gaya_berpakaian != null ? $lowongan->perusahaan->gaya_berpakaian : '-' }}</span>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <h6 class="font-weight-bold d-block mb-0">{{__('Waktu Bekerja')}}</h6>
                                    <span class="ml-1">{{$lowongan->perusahaan->waktu_bekerja != null ? $lowongan->perusahaan->waktu_bekerja : '-' }}</span>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <h6 class="font-weight-bold d-block mb-0">{{__('Tunjangan')}}</h6>
                                    <span class="ml-1">{{$lowongan->perusahaan->tunjangan != null ? $lowongan->perusahaan->tunjangan : '-' }}</span>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <h6 class="font-weight-bold d-block mb-0">{{__('Bahasa Yang Digunakan')}}</h6>
                                    <span class="ml-1">{{$lowongan->perusahaan->bahasa != null ? $lowongan->perusahaan->bahasa : '-' }}</span>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <h6 class="font-weight-bold d-block mb-0">{{__('Kompetensi Keahlian')}}</h6>
                                    <span>
                                        @php
                                            $arr = json_decode($lowongan->kompetensi_keahlian);
                                            foreach ($arr as $value) {
                                                echo "- " . $value . "<br>";
                                            }
                                        @endphp
                                    </span>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <h6 class="font-weight-bold d-block mb-0">{{__('Keahlian')}}</h6>
                                    <span>
                                        @php
                                            $arr = json_decode($lowongan->keahlian);
                                            foreach ($arr as $value) {
                                                echo "- " . $value . "<br>";
                                            }
                                        @endphp
                                    </span>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <h6 class="font-weight-bold d-block mb-0">{{__('Batas AKhir Lamaran')}}</h6>
                                    @if($today->format("Y-m-d") > $exp->format("Y-m-d"))
                                        <span class="btn btn-sm mt-2 btn-secondary"><i class="fa fa-clock-o mr-2"></i> Lowongan Telah Berakhir</span>
                                    @else
                                        <span> {{ __( date('d M Y', strtotime($lowongan->batas_akhir_lamaran)) ) }} </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <div class="card shadow p-3 pb-4">
                            <h5 class="text-muted"><i class="fa fa-camera-retro mr-2"></i> {{__('IMAGE')}}</h5>
                            <div class="px-5 p-3">
                                <div class="container-thumb-gede">
                                    <div class="row">
                                        <div class="col px-1">
                                            <img class="w-100 rounded-lg" id="img-thumb-gede" src="{{ asset('/storage/assets/lowongan-kerja/' . $lowongan->image) }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="container-thumb-cilik">
                                    <div class="row">
                                        <div class="col-3 mt-2 px-1">
                                            <img class="img-thumb-cilik" src="{{ asset('/storage/assets/lowongan-kerja/' . $lowongan->image) }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <div class="card shadow p-3 pb-4">
                            <h5 class="text-muted"><i class="fa fa-building mr-2"></i>{{__(' INFORMASI PERUSAHAAN')}}</h5>
                            <div class="px-3">
                                <p class="mt-3" style="text-indent: 20px">
                                    {!! $lowongan->perusahaan->overview !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <div class="card shadow p-3 pb-4">
                            <h5 class="text-muted"><i class="fa fa-bookmark mr-2"></i>{{__(' MENGAPA BERGABUNG DENGAN KAMI')}}</h5>
                            <div class="px-3">
                                <p class="mt-3" style="text-indent: 20px">
                                    {!! $lowongan->perusahaan->alasan_harus_melamar !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col mt-2 px-1">
                    <div class="card shadow-xl p-3 row-lamar-sekarang">
                        <div>
                            @if ($lowongan->proses_lamaran == 'Offline')
                                <span class="h5">Proses Lamaran Dilaksanakan Offline</span>
                            @else
                                <a class="h5" href="{{ url('/siswa/lowongan/lihat/pelamar/'. encrypt($lowongan->id)) }}"><span><i class="fa fa-list mr-2"></i> Lihat Siapa Yang Telah Melamar <i class="fa fa-caret-right ml-2"></i></span></a>
                            @endif
                        </div>

                        @if($today->format("Y-m-d") > $exp->format("Y-m-d"))
                            <span class="btn btn-secondary mt-3 mt-lg-0"><i class="fa fa-clock-o mr-2"></i> Lowongan Telah Berakhir</span>
                        @elseif($lowongan->proses_lamaran == 'Offline')

                        @elseif (is_null($melamar))
                            @if (Auth::check())
                                @if (Auth::user()->hasRole('siswa'))
                                    <div>
                                    </div>
                                    <div>
                                        <form action="{{ url('/siswa/lowongan/lamar') }}" method="get">
                                            @csrf
                                            <input type="hidden" name="lowonganId" value="{{ encrypt($lowongan->id) }}">
                                            <button class="btn btn-primary" type="submit">Lamar Sekarang</button>
                                        </form>
                                    </div>
                                @endif
                            @else
                                <div>
                                </div>
                                <div>
                                    <form action="{{ url('/siswa/lowongan/lamar') }}" method="get">
                                        @csrf
                                        <input type="hidden" name="lowonganId" value="{{ encrypt($lowongan->id) }}">
                                        <button class="btn btn-primary" type="submit">Lamar Sekarang</button>
                                    </form>
                                </div>
                            @endif
                        @else
                            <div>
                                <a href="{{ url('/siswa/lamaran/' . encrypt($melamar->id)) }}" class="h6 mr-4">Lihat Lamaran</a>
                            </div>
                            <div>
                                <button class="btn btn-secondary" type="button">Telah Dilamar</button>
                            </div>
                        @endif
                    </div>
            </div>
        </div>
        <div class="row">
            <div class="col px-1">
                <div class=" p-3 w-100 d-flex flex-row justify-content-between container-show-waktu-lowongan" style="background-color: rgb(223, 223, 223)">
                    <p class="my-0 text-muted">
                        {{__('Ditayangkan ')}}{{ __( date('d-M-Y', strtotime($lowongan->created_at)) ) }}
                    </p>
                    <p class="my-0 text-muted">
                        {{__('Tutup Pada ')}}{{ __( date('d-M-Y', strtotime($lowongan->batas_akhir_lamaran)) ) }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<form id="form-to-search-jobs" action="{{ url('/lowongan/cari/pekerjaan') }}" method="get">
    <input type="hidden" name="judul" value="">
</form>

@endsection


@section('script')

    <script>
        let imgThumbGede = document.getElementById('img-thumb-gede')
        const containerThumbCilik = document.getElementsByClassName('container-thumb-cilik')[0]
        let imgThumbCilik = document.querySelectorAll('.img-thumb-cilik')

        containerThumbCilik.addEventListener('click', function(e) {
            if(e.target.className == 'img-thumb-cilik') {

                let srcThumbCilik = e.target.getAttribute('src')
                imgThumbGede.setAttribute('src', srcThumbCilik)

                imgThumbGede.classList.add('fade-img-thumb-gede');
                setTimeout(() => {
                    imgThumbGede.classList.remove('fade-img-thumb-gede');
                }, 500);

                imgThumbCilik.forEach(function(e) {
                    if(e.classList.contains('img-cilik-active')) {
                        e.classList.remove('img-cilik-active')
                    }
                });

                e.target.classList.add('img-cilik-active');
            }
        })
    </script>


    <script>
        const buttonForMobile = document.querySelector('.pages-beranda-cari-lowongan button#for-mobile');
        const inputForMobile = document.querySelector('.pages-beranda-cari-lowongan input#for-mobile');

        buttonForMobile.addEventListener('click', function () {
            if( inputForMobile.classList.contains('d-none') ) {
                inputForMobile.classList.remove('d-none');
            } else {
                cariLoker(buttonForMobile);
            }
        });
    </script>


    <script>
        function cariLoker(element) {
            let formForSearchJobs = document.getElementById('form-to-search-jobs');
            formForSearchJobs.children[0].value = element.previousElementSibling.value;
            formForSearchJobs.submit();
        }
    </script>

@endsection
