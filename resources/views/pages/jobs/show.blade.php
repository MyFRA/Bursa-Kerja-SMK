@extends('layouts.app')

@section('content')
<div class="pages-beranda-lowongan">
    <div class="pages-beranda-cari-lowongan">
        {{-- For Dekstop --}}
        <input id="for-dekstop" type="text" placeholder="Mencari berdasarkan posisi, keahlian dan kata kunci">
        <button id="for-dekstop"><i class="fa fa-search"></i></button>
        {{-- For Mobile --}}
        <input id="for-mobile" class="d-none w-100" type="text" placeholder="Mencari berdasarkan posisi, keahlian dan kata kunci">
        <button id="for-mobile" ><i class="fa fa-search"></i></button>
    </div>
</div>

<div class="container mt-3">
    <div>
        @if ($lowongan->perusahaan->image != NULL)
            <div class="row">
                <div class="col image-cover-perusahaan-lowongan px-1">
                    <img class="w-100" class="" src="{{ asset('/storage/assets/daftar-perusahaan/image/' . $lowongan->perusahaan->image) }}" alt="">
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col px-1">
                <div class="card card-header-lowongan-show p-3">
                    <div>
                        <img class="image-cover-per" src="{{ asset('/storage/assets/daftar-perusahaan/logo/' . $lowongan->perusahaan->logo) }}" alt="">
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
                                <i class="fa fa-map-marker mr-2 text-danger font-weight-bold"></i> {{ __( $lowongan->perusahaan->alamat ) }}
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
                        <div class="card p-3 pb-4">
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
                        <div class="card p-3 pb-4">
                            <h5 class="text-muted"><i class="fa fa-edit mr-2"></i>{{__(' LOKASI KERJA')}}</h5>
                            <p class="text-primary mt-2" style="font-size: 16px"><i class="fa fa-building mr-1"></i>{{__(' Alamat')}}</p>
                            <div class="px-4 mt-n2">
                                {{__( $lowongan->perusahaan->alamat )}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 px-1">
                <div class="row">
                    <div class="col-12 mt-2">
                        <div class="card p-3 pb-4">
                            <h5 class="text-muted"><i class="fa fa-list-alt mr-2"></i>{{__(' GAMBARAN PERUSAHAAN')}}</h5>
                            <div class="row">
                                <div class="col-lg-6 mt-3">
                                    <h6 class="font-weight-bold d-block mb-0">{{__('Proses Lamaran')}}</h6>
                                    <span>{{ __( $lowongan->proses_lamaran ) }}</span>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <h6 class="font-weight-bold d-block mb-0">Industri</h6>
                                    <span>Lainya</span>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <h6 class="font-weight-bold d-block mb-0">{{__('Ukuran Perusahaan')}}</h6>
                                    <span>{{__( $lowongan->perusahaan->jumlah_karyawan )}}</span>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <h6 class="font-weight-bold d-block mb-0">{{__('Situs')}}</h6>
                                    <span><a href="">{{__( $lowongan->perusahaan->site )}}</a></span>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <h6 class="font-weight-bold d-block mb-0">{{__('Gaya Berpakaian')}}</h6>
                                    <span>{{__( $lowongan->perusahaan->gaya_berpakaian )}}</span>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <h6 class="font-weight-bold d-block mb-0">{{__('Waktu Bekerja')}}</h6>
                                    <span>{{__( $lowongan->perusahaan->waktu_bekerja )}}</span>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <h6 class="font-weight-bold d-block mb-0">{{__('Tunjangan')}}</h6>
                                    <span>{{__( $lowongan->perusahaan->tunjangan )}}</span>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <h6 class="font-weight-bold d-block mb-0">{{__('Bahasa Yang Digunakan')}}</h6>
                                    <span>{{__( $lowongan->perusahaan->bahasa )}}</span>
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
                                    <span> {{ __( date('d-M-Y', strtotime($lowongan->batas_akhir_lamaran)) ) }} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <div class="card p-3 pb-4">
                            <h5 class="text-muted"><i class="fa fa-camera-retro mr-2"></i> {{__('FOTO PERUSAHAAN')}}</h5>
                            <div class="px-5 p-3">
                                <div class="container-thumb-gede">
                                    <div class="row">
                                        <div class="col px-1">
                                            <img class="w-100" id="img-thumb-gede" src="{{ asset('/storage/assets/lowongan-kerja/' . $lowongan->image) }}" alt="">
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
                        <div class="card p-3 pb-4">
                            <h5 class="text-muted"><i class="fa fa-building mr-2"></i>{{__(' INFORMASI PERUSAHAAN')}}</h5>
                            <div class="px-3">
                                <p class="mt-3" style="text-indent: 20px">
                                    {!! $lowongan->perusahaan->overview !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <div class="card p-3 pb-4">
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
                <div class="card p-3 row-lamar-sekarang">
                    <div>
                        <a class="h5" href=""><span><i class="fa fa-list mr-2"></i> Lihat Siapa Yang Telah Melamar <i class="fa fa-caret-right ml-2"></i></span></a>
                    </div>
                    <div>
                        <a href="" class="h6 mr-4">Simpan</a>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit">Lamar Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col px-1">
                <div class="p-3 w-100 d-flex flex-row justify-content-between container-show-waktu-lowongan" style="background-color: #eee">
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
    const tombol = document.querySelector('.pages-beranda-cari-lowongan button#for-mobile');
    const input  = document.querySelector('.pages-beranda-cari-lowongan input#for-mobile');



    tombol.addEventListener('click', function () {
        if( input.classList.contains('d-none') ) {
            input.classList.remove('d-none');
        } else {
            alert(input.value)
        }
    });

</script>

@endsection