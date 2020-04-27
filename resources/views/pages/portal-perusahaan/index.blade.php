@extends('layouts.app')

@section('content')
<div class="banner-perusahaan d-flex flex-column align-items-center justify-content-center">
    <div class="container ">
        <div class="row" >
            <div class=" col-md-6" >
                <div class="content-text">
                    <h2 class="">{{ __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta?') }}</h1>
                    <p>{{ __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos explicabo, accusantium nostrum aut aspernatur voluptas perferendis sit, maxime vel fuga!') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="fitur-perusahaan">
    <div class="container">
        <div class="row">
            <div data-aos="fade-up" class="col pt-5 mt-3 pb-1">
                <h2>{{__('Fitur Perusahaan')}}</h2>
                <p>{{__('Berbagai fitur kami kembangkan untuk kemudahan perekrutan dan pelamaran pekerjaan.')}} <br>{{__('Sebagai perusahaan anda dapat menikmati berbagai fitur tersebut.')}}</p>
            </div>
        </div>
    </div>
</div>


<div class="keunggulan-fitur-perusahaan">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <section class="icon">
                        <i class="fa fa-bullhorn"></i>
                    </section>
                    <section class="title">
                        <h2>{{__('Efektif dan Cepat')}}</h2>
                    </section>
                    <section class="content">
                        <p>{{__('Seleksi kandidat otomatis sesuai dengan kriteria loker anda. Juga melihat CV kandidat secara lengkap, cepat dan printable')}}</p>
                    </section>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <section class="icon">
                        <i class="fa fa-bullhorn"></i>
                    </section>
                    <section class="title">
                        <h2>{{__('Efektif dan Cepat')}}</h2>
                    </section>
                    <section class="content">
                        <p>{{__('Seleksi kandidat otomatis sesuai dengan kriteria loker anda. Juga melihat CV kandidat secara lengkap, cepat dan printable')}}</p>
                    </section>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <section class="icon">
                        <i class="fa fa-bullhorn"></i>
                    </section>
                    <section class="title">
                        <h2>{{__('Efektif dan Cepat')}}</h2>
                    </section>
                    <section class="content">
                        <p>{{__('Seleksi kandidat otomatis sesuai dengan kriteria loker anda. Juga melihat CV kandidat secara lengkap, cepat dan printable')}}</p>
                    </section>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <section class="icon">
                        <i class="fa fa-bullhorn"></i>
                    </section>
                    <section class="title">
                        <h2>{{__('Efektif dan Cepat')}}</h2>
                    </section>
                    <section class="content">
                        <p>{{__('Seleksi kandidat otomatis sesuai dengan kriteria loker anda. Juga melihat CV kandidat secara lengkap, cepat dan printable')}}</p>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="login-or-register">
    <div class="container-fluid ">
        <div data-aos="fade-up" class="row d-flex flex-row align-items-center justify-content-center">
            <div class="col-md-5 order-md-last">
                <img src="{{ asset('/images/offer.png') }}" alt="">
            </div>
            <div class="col-md-7 ">
                <p>{{__('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic reprehenderit, provident eius est magnam accusantium cumque. Et reprehenderit molestiae, tempora.')}}</p>
                <br>
                <a href="{{ url('/perusahaan/login') }}" class="pl-5 pr-5 m-2" id="masuk">{{__('Masuk')}}</a>
                <br><br>
                <a href="{{ url('/perusahaan/register') }}" class="pl-5 pr-5 m-2" id="daftar">{{__('Daftar')}}</a>
            </div>
        </div>
    </div>
</div>


<div class="fitur-perusahaan">
    <div class="container">
        <div class="row">
            <div data-aos="fade-up" class="col pb-1">
                <h2>{{__('Mitra Perusahaan')}}</h2>
                <p>{{__('Kami Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta bekerjasama dengan berbagai perusahaan')}} <br>{{__('dalam berbagai bidang dan spesialisasi di Indonesia.')}}</p>
            </div>
        </div>
    </div>
</div>

<div class="card-list-perusahaan mt-3 p-3 ">
    <div class="container-fluid">
        <div data-aos="fade-up" class="siema pb-3">
            <div class="col">
                <div class="card p-3">
                    <section class="logo p-4 pt-5">
                        <img class="img-thumbnail img-fluid" src="{{ asset('images/faralia-shop1529850360.png') }}" alt="">
                    </section>
                    <section class="body">
                        <a href="">{{__('PT. Toyota Motor Manufacturing Indonesia')}}</a>
                        <p class="mt-2">{{__('Jakarta')}}</p>
                    </section>
                </div>
            </div>
            <div class="col">
                <div class="card p-3">
                    <section class="logo p-4 pt-5">
                        <img class="img-thumbnail img-fluid" src="{{ asset('images/faralia-shop1529850360.png') }}" alt="">
                    </section>
                    <section class="body">
                        <a href="">{{__('PT. Toyota Motor Manufacturing Indonesia')}}</a>
                        <p class="mt-2">{{__('Jakarta')}}</p>
                    </section>
                </div>
            </div>
            <div class="col">
                <div class="card p-3">
                    <section class="logo p-4 pt-5">
                        <img class="img-thumbnail img-fluid" src="{{ asset('images/faralia-shop1529850360.png') }}" alt="">
                    </section>
                    <section class="body">
                        <a href="">{{__('PT. Toyota Motor Manufacturing Indonesia')}}</a>
                        <p class="mt-2">{{__('Jakarta')}}</p>
                    </section>
                </div>
            </div>
            <div class="col">
                <div class="card p-3">
                    <section class="logo p-4 pt-5">
                        <img class="img-thumbnail img-fluid" src="{{ asset('images/faralia-shop1529850360.png') }}" alt="">
                    </section>
                    <section class="body">
                        <a href="">{{__('PT. Toyota Motor Manufacturing Indonesia')}}</a>
                        <p class="mt-2">{{__('Jakarta')}}</p>
                    </section>
                </div>
            </div>
            <div class="col">
                <div class="card p-3">
                    <section class="logo p-4 pt-5">
                        <img class="img-thumbnail img-fluid" src="{{ asset('images/faralia-shop1529850360.png') }}" alt="">
                    </section>
                    <section class="body">
                        <a href="">{{__('PT. Toyota Motor Manufacturing Indonesia')}}</a>
                        <p class="mt-2">{{__('Jakarta')}}</p>
                    </section>
                </div>
            </div>
            <div class="col">
                <div class="card p-3">
                    <section class="logo p-4 pt-5">
                        <img class="img-thumbnail img-fluid" src="{{ asset('images/faralia-shop1529850360.png') }}" alt="">
                    </section>
                    <section class="body">
                        <a href="">{{__('PT. Toyota Motor Manufacturing Indonesia')}}</a>
                        <p class="mt-2">{{__('Jakarta')}}</p>
                    </section>
                </div>
            </div>
            <div class="col">
                <div class="card p-3">
                    <section class="logo p-4 pt-5">
                        <img class="img-thumbnail img-fluid" src="{{ asset('images/faralia-shop1529850360.png') }}" alt="">
                    </section>
                    <section class="body">
                        <a href="">{{__('PT. Toyota Motor Manufacturing Indonesia')}}</a>
                        <p class="mt-2">{{__('Jakarta')}}</p>
                    </section>
                </div>
            </div>
            <div class="col">
                <div class="card p-3">
                    <section class="logo p-4 pt-5">
                        <img class="img-thumbnail img-fluid" src="{{ asset('images/faralia-shop1529850360.png') }}" alt="">
                    </section>
                    <section class="body">
                        <a href="">{{__('PT. Toyota Motor Manufacturing Indonesia')}}</a>
                        <p class="mt-2">{{__('Jakarta')}}</p>
                    </section>
                </div>
            </div>
            <div class="col">
                <div class="card p-3">
                    <section class="logo p-4 pt-5">
                        <img class="img-thumbnail img-fluid" src="{{ asset('images/faralia-shop1529850360.png') }}" alt="">
                    </section>
                    <section class="body">
                        <a href="">{{__('PT. Toyota Motor Manufacturing Indonesia')}}</a>
                        <p class="mt-2">{{__('Jakarta')}}</p>
                    </section>
                </div>
            </div>
            <div class="col">
                <div class="card p-3">
                    <section class="logo p-4 pt-5">
                        <img class="img-thumbnail img-fluid" src="{{ asset('images/faralia-shop1529850360.png') }}" alt="">
                    </section>
                    <section class="body">
                        <a href="">{{__('PT. Toyota Motor Manufacturing Indonesia')}}</a>
                        <p class="mt-2">{{__('Jakarta')}}</p>
                    </section>
                </div>
            </div>
        </div>
        <button class="kiri"><i class="fa fa-arrow-left"></i></button>
        <button class="kanan"><i class="fa fa-arrow-right"></i></button>
    </div>
</div> 


<div class="bg-bisa-kerja ">
    <div class="bg-pewarna text-center d-flex flex-column align-items-center justify-content-center">
        <img src="{{ asset('images/pijar-logo.png') }}" alt="">
        <h2> #semuaorangbisakerja </h2>
        <p>{{__('Untuk mewujudkan visi Semua Orang Bisa Kerja, kami tim Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta mengundang anda sebagai perwakilan perusahaan untuk berkolaborasi dan bersinergi bersama kami')}}</p>
        <br>
        <a href="{{ url('/perusahaan/register') }}">{{__('Daftarkan Perusahaan')}}</a>
    </div>
</div>


<div class="fitur-perusahaan mt-5 mb-4">
    <div class="container">
        <div class="row">
            <div data-aos="fade-up" class="col pt-2 pb-1">
                <h2>{{__('Testimoni Perusahaan')}}</h2>
                <p>{{__('Sekapur sirih testimoni dari perusahaan yang bekerjasama dengan kami,')}} <br>{{__('Apa kata mereka?')}}</p>
            </div>
        </div>
    </div>
</div>

<hr style="width: 30%">

<div class="testimoni-dari-perusahaan mt-5 pb-5">
    <div class="container pb-2">
        <div class="testi">
            <div class="col">
                <div data-aos="fade-up"  class="col text-center">
                    <img class="img-fluid" src="{{ asset('images/faralia-shop1529850360.png') }}" alt="">
                    <h5 class="mt-5">{{__('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga pariatur, vero obcaecati impedit nam architecto cumque suscipit, a alias iusto minima facere, voluptate, neque sapiente!')}}</h5>
                    <h3 class="mt-4">{{__('PT. Toyota Motor Indonesia')}}</h3>
                </div>
            </div>
            <div class="col">
                <div data-aos="fade-up"  class="col text-center">
                    <img class="img-fluid" src="{{ asset('images/faralia-shop1529850360.png') }}" alt="">
                    <h5 class="mt-5">{{__('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga pariatur, vero obcaecati impedit nam architecto cumque suscipit, a alias iusto minima facere, voluptate, neque sapiente!')}}</h5>
                    <h3 class="mt-4">{{__('PT. Toyota Motor Indonesia')}}</h3>
                </div>
            </div>
            <div class="col">
                <div data-aos="fade-up"  class="col text-center">
                    <img class="img-fluid" src="{{ asset('images/faralia-shop1529850360.png') }}" alt="">
                    <h5 class="mt-5">{{__('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga pariatur, vero obcaecati impedit nam architecto cumque suscipit, a alias iusto minima facere, voluptate, neque sapiente!')}}</h5>
                    <h3 class="mt-4">{{__('PT. Toyota Motor Indonesia')}}</h3>
                </div>
            </div>
            <div class="col">
                <div data-aos="fade-up"  class="col text-center">
                    <img class="img-fluid" src="{{ asset('images/faralia-shop1529850360.png') }}" alt="">
                    <h5 class="mt-5">{{__('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga pariatur, vero obcaecati impedit nam architecto cumque suscipit, a alias iusto minima facere, voluptate, neque sapiente!')}}</h5>
                    <h3 class="mt-4">{{__('PT. Toyota Motor Indonesia')}}</h3>
                </div>
            </div>
        </div>

    </div>
    <span class="testi-left"><i class="fa fa-chevron-left testi-kiri"></i></span>
    <span class="testi-right"><i class="fa fa-chevron-right testi-kanan"></i></span>
</div>


@endsection




@section('script')
    <script src="{{ asset('plugins/siema-1.5.1/dist/siema.min.js') }}"></script>
    <script>
        const mySiema = new Siema({
          selector: '.siema',
          perPage: {
            425: 1,
            768: 4,
          },
          loop: true,
          duration: 400,
        });

        const testi = new Siema({
            selector: '.testi',
            loop: true,
            duration: 700,
        });

        setInterval(() => testi.next(), 2200)

        const kiri = document.querySelector('.kiri');
        const kanan = document.querySelector('.kanan');
        const prevTesti = document.querySelector('.testi-left');
        const nextTesti = document.querySelector('.testi-right');

        kiri.addEventListener('click', () => mySiema.prev());
        kanan.addEventListener('click', () => mySiema.next());
        prevTesti.addEventListener('click', () => testi.prev());
        nextTesti.addEventListener('click', () => testi.next());
    </script>

@endsection