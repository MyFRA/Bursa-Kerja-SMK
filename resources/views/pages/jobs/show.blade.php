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
        <div class="row">
            <div class="col image-cover-perusahaan-lowongan px-1">
                <img class="w-100" class="" src="{{ asset('/images/4866_banner_0_278558.jpg') }}" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col px-1">
                <div class="card card-header-lowongan-show p-3">
                    <div>
                        <img class="image-cover-per" src="{{ asset('/images/faralia-shop1529850360.png') }}" alt="">
                    </div>
                    <div class="p-3">
                        <h3 class="font-weight-bold">okok</h3>
                        <a class="h5 mt-n2" href="">cv cahaya merdeka</a>
                    </div>
                    <div>
                        <div class="">
                            <span class="d-inline-block">
                                <i class="fa fa-dollar mr-2 text-success font-weight-bold"></i> 
                            </span>
                            <span class="text-muted">
                                Sekitar Gaji Yang Diharapkan
                            </span>
                        </div>
                        <div>
                            <span class="">
                                <i class="fa fa-briefcase mr-2 text-primary "></i> cdsmkm ok siap apik banget mantep banget sumpah
                            </span>
                        </div>
                        <div>
                            <span class="">
                                <i class="fa fa-map-marker mr-2 text-danger font-weight-bold"></i> cdsmkm
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
                            <h5 class="text-muted"><i class="fa fa-edit mr-2"></i> DESKRIPSI PEKERJAAN</h5>
                            <div class="mt-2">
                                <strong>Kualifikasi:</strong>
                                <ul>
                                    <li>Pendidikan minimal STM / D3 elektrikal / mekanikal / sipil.</li>
                                    <li>Berpengalaman <strong>minimal 2 tahun </strong>menangani MEP, mencakup instalasi listrik, AC, genset, chiller, dan sebagainya.</li>
                                    <li>Lebih diutamakan yang memiliki pengalaman sebagai teknisi gedung perkantoran/apartemen/gedung bertingkat lainnya.</li>
                                    <li>Bersedia ditempatkan di area <strong>Tangerang atau Jakarta Selatan (Alam Sutera, Cikokol, Cikupa, Gatot Subroto)</strong></li>
                                    <li>Mau bekerja keras, jujur, cepat belajar dan beradaptasi.</li>
                                    <li>Bersedia bekerja secara shift.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <div class="card p-3 pb-4">
                            <h5 class="text-muted"><i class="fa fa-edit mr-2"></i> LOKASI KERJA</h5>
                            <p class="text-primary mt-2" style="font-size: 16px"><i class="fa fa-building mr-1"></i> Alamat</p>
                            <div class="px-4 mt-n2">
                                Jl. Jalur Sutera Barat 17 Alam Sutera - Tangerang, Banten
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 px-1">
                <div class="row">
                    <div class="col-12 mt-2">
                        <div class="card p-3 pb-4">
                            <h5 class="text-muted"><i class="fa fa-list-alt mr-2"></i> GAMBARAN PERUSAHAAN</h5>
                            <div class="row">
                                <div class="col-lg-6 mt-3">
                                    <h6 class="font-weight-bold d-block mb-0">Waktu Proses Lamaran</h6>
                                    <span></span>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <h6 class="font-weight-bold d-block mb-0">Industri</h6>
                                    <span>Lainya</span>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <h6 class="font-weight-bold d-block mb-0">Ukuran Perusahaan</h6>
                                    <span>1 - 50 Pekerja</span>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <h6 class="font-weight-bold d-block mb-0">Situs</h6>
                                    <span><a href="">ok.com</a></span>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <h6 class="font-weight-bold d-block mb-0">Gaya Berpakaian</h6>
                                    <span>Bisnis ( Contoh: Kemeja ) </span>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <h6 class="font-weight-bold d-block mb-0">Waktu Bekerja</h6>
                                    <span>Senin - Jumat</span>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <h6 class="font-weight-bold d-block mb-0">Tunjangan</h6>
                                    <span>Kesehatan</span>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <h6 class="font-weight-bold d-block mb-0">Bahasa Yang Digunakan</h6>
                                    <span>Bahasa Indonesia</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <div class="card p-3 pb-4">
                            <h5 class="text-muted"><i class="fa fa-camera-retro mr-2"></i> FOTO PERUSAHAAN</h5>
                            <div class="px-5 p-3">
                                <div class="container-thumb-gede">
                                    <div class="row">
                                        <div class="col px-1">
                                            <img class="w-100" id="img-thumb-gede" src="{{ asset('/images/jakarta-office-building-vector-illustration_47305-12.jpg') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="container-thumb-cilik">
                                    <div class="row">
                                        <div class="col-3 mt-2 px-1">
                                            <img class="img-thumb-cilik" src="{{ asset('/images/jakarta-office-building-vector-illustration_47305-12.jpg') }}" alt="">
                                        </div>
                                        <div class="col-3 mt-2 px-1">
                                            <img class="img-thumb-cilik" src="{{ asset('/images/pijar-logo.png') }}" alt="">
                                        </div>
                                        <div class="col-3 mt-2 px-1">
                                            <img class="img-thumb-cilik" src="{{ asset('/images/bg-01.webp') }}" alt="">
                                        </div>
                                        <div class="col-3 mt-2 px-1">
                                            <img class="img-thumb-cilik" src="{{ asset('/images/jakarta-office-building-vector-illustration_47305-12.jpg') }}" alt="">
                                        </div>
                                        <div class="col-3 mt-2 px-1">
                                            <img class="img-thumb-cilik" src="{{ asset('/images/offer.png') }}" alt="">
                                        </div>
                                        <div class="col-3 mt-2 px-1">
                                            <img class="img-thumb-cilik" src="{{ asset('/images/employer.jpg') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <div class="card p-3 pb-4">
                            <h5 class="text-muted"><i class="fa fa-building mr-2"></i> INFORMASI PERUSAHAAN</h5>
                            <div class="px-3">
                                <p class="mt-3" style="text-indent: 20px">
                                    Alam Sutera is an integrated property developer in Indonesia, focusing on innovation to improve people’s quality of life. The township management are focused on the development as well as management of residential areas, commercial districts, industrial areas, shopping centers, leisure centers and hospitality. Alam Sutera has become a pioneer in green living and a dynamic icon of urban development, committed to building a better life. The journey as the leading property developer company began with developing excellent service and quality in comfortable, safe and healthy environments.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <div class="card p-3 pb-4">
                            <h5 class="text-muted"><i class="fa fa-bookmark mr-2"></i> MENGAPA BERGABUNG DENGAN KAMI</h5>
                            <div class="px-3">
                                <p class="mt-3" style="text-indent: 20px">
                                    Alam Sutera is an integrated property developer in Indonesia, focusing on innovation to improve people’s quality of life. The township management are focused on the development as well as management of residential areas, commercial districts, industrial areas, shopping centers, leisure centers and hospitality. Alam Sutera has become a pioneer in green living and a dynamic icon of urban development, committed to building a better life. The journey as the leading property developer company began with developing excellent service and quality in comfortable, safe and healthy environments.
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