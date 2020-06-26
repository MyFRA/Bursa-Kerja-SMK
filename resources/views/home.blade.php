@extends('layouts.app')

@section('content')
<div class="banner-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="content-text">
                    <h2>{{ __('SMK BISA KERJA') }}</h1>
                    <h3>{{ __('Dikembangkan oleh SMK Negeri 1 Bojongsari') }}</h3>
                    <h4>{{ __('SMK Bisa Kerja menyediakan informasi lowongan pekerjaan yang diberikan untuk lulusan SMA/SMK Sederajat
                        khususnya bagi para alumni SMK Negeri 1 Bojongsari') }}.</h4>

                    <div class="counting">
                        <b>320</b> {{ __('Lowongan tersedia') }}, <b>978</b> {{ __('Pengguna aktif') }}, <b>127</b> {{ __('Mitra Kerjasama') }}.
                    </div>
                </div>
            </div>
            @guest
                <div class="col-lg-4">
                    <div class="card box-login mt-lg-n4 mt-md-4">
                        <div class="card-body">

                            <form action="{{ route('siswa.register') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="nama_depan" class="mb-0">{{ __('Nama Depan') }} <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_depan" placeholder="{{ __('Tuliskan nama depan') }}" autocomplete="off" class="form-control form-control-lg" required="" value="{{ old('nama_depan') }}">

                                    @error('nama_depan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama_belakang" class="mb-0">{{ __('Nama Belakang') }}</label>
                                    <input type="text" name="nama_belakang" placeholder="{{ __('Tuliskan nama belakang') }}" autocomplete="off" class="form-control form-control-lg" value="{{ old('nama_belakang') }}">

                                    @error('nama_belakang')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="username" class="mb-0">{{ __('Username') }} <span class="text-danger">*</span></label>
                                    <input type="text" name="username" placeholder="{{ __('Tuliskan username') }}" autocomplete="off" class="form-control form-control-lg" required="" value="{{ old('username') }}">

                                    @error('username')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email" class="mb-0">{{ __('E-Mail') }} <span class="text-danger">*</span></label>
                                    <input type="email" name="email" placeholder="{{ __('mail@example.com') }}" autocomplete="off" class="form-control form-control-lg" required="" value="{{ old('email') }}">

                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-0">
                                    <label for="password" class="mb-0">{{ __('Kata Sandi') }} <span class="text-danger">*</span></label>
                                    <input type="password" name="password" placeholder="{{ __('Buat kata sandi') }}"
                                        autocomplete="off" class="form-control form-control-lg" required="">

                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="role-form mt-2">
                                    {{ __('Pastikan lebih dari 15 karakter ATAU setidaknya 8 karakter termasuk angka dan huruf kecil') }}.
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-lg btn-block btn-submit">
                                        {{ __('Daftar Sekarang') }}
                                    </button>
                                </div>
                                <div class="role-form text-center">
                                    Dengan mengklik "Daftar", Anda setuju dengan
                                        <div>Ketentuan Layanan</a> dan <a href="">Kebijakan Privasi</a> kami.
                                        Kami sesekali akan mengirimi Anda email terkait akun.
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            {{ __('Anda sudah memiliki akun') }}?<br />
                            <a href="{{ url('/siswa/login') }}">{{ __('Silahkan masuk') }}!</a>
                        </div>
                    </div>
                </div>
            @else

            @endguest

        </div>
    </div>
</div>
</div>


<div class="py-5 text-center" style="background-color: #fff">
    <h1 class="home-nama-sekolah">SMK NEGERI 1 BOJONGSARI</h1>
    <hr class="hr-bawah-home-nama-sekolah">
</div>

<div class="alur-dapat-kerja text-center" style="background-color: white">
    <div class="px-4" style="background-color: #094370">
        <br><br>
        <h1 class="text-white">Berbagai fitur kami kembangkan untuk kemudahan anak bangsa dalam mengembangkan dan menemukan karir mereka.</h1>
        <br>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#094370" fill-opacity="1" d="M0,288L34.3,282.7C68.6,277,137,267,206,240C274.3,213,343,171,411,149.3C480,128,549,128,617,144C685.7,160,754,192,823,186.7C891.4,181,960,139,1029,154.7C1097.1,171,1166,245,1234,272C1302.9,299,1371,277,1406,266.7L1440,256L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z"></path>
      </svg>
      <br><br>

</div>
<div class="info-service">
    <div class="container">
        <div class="row">
            <div class="col-md-4 service-item text-center">
                <div>
                    <div class="service-icon">
                        <i class="fa fa-bullhorn"></i>
                    </div>
                    <div class="mt-3"></div>
                    <span class="h3"><b>{{ __('Info Lowongan') }}</b> </span>
                    <p>Dapatkan informasi lowongan kerja sesuai dengan minat dan keahlianmu, dan ajukan lamaran secara online.</p>
                </div>
            </div>
            <div class="col-md-4 service-item text-center">
                <div>
                    <div class="service-icon">
                        <i class="fa fa-file-text-o"></i>
                    </div>
                    <div class="mt-3"></div>
                    <span class="h3"><b>{{ __('Buat Resume') }}</b> </span>
                    <p>Masukan datamu secara lengkap untuk bisa membuat resume secara profesional kepada perusahaan yang meliharnya.</p>
                </div>
            </div>
            <div class="col-md-4 service-item text-center">
                <div>
                    <div class="service-icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="mt-3"></div>
                    <span class="h3"><b>{{ __('Iklan Lowongan') }}</b> </span>
                    <p>Perusahaan bisa mempublikasi lowongan untuk mendapatkan karyawan yang handal dan profesional.</p>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
<div style="background-image: linear-gradient(90deg, #8796F0, #094370);">
    <br>
</div>
<div class="bg-white">
    <br>
    <div class="how-to-get-job">
        <div class="steps">
            <div class="desc align-items-end">
                <span class="new-ui-color"><i class="fa fa-user-o"></i></span>
                <h1>Daftar akun gratis</h1>
                <p>Buka web BKK sekolah yang menjadi member Pijar Career. Kamu dapat mendaftarkan akunmu di sana. Dengan mendaftarkan akun, kamu akan selalu update dengan informasi-informasi lowongan yang diposkan oleh sekolah tersebut.</p>
            </div>
            <div class="image-container justify-content-start">
                <img class="w-lg-75" src="{{ asset('/images/create-account.png') }}" alt="">
            </div>
        </div>
        <hr class="hr-bawah-steps" style="left: 0">
        <div class="steps">
            <div class="image-container justify-content-end">
                <img class="w-lg-75" src="{{ asset('/images/status-update.png') }}" alt="">
            </div>
            <div class="desc align-items-start">
                <span class="new-ui-color"><i class="fa fa-id-card-o"></i></span>
                <h1>Lengkapi datamu, dapatkan fitur lengkap dari kami</h1>
                <p class="text-left">Cukup dengan melengkapi datamu, kamu akan mendapatkan fitur lengkap dari Pijar Career. Seperti mengunduh CV kamu secara otomatis, fitur Artifacial Intelligent Jobmatching, dll.

                    Jangan khawatir, data kamu aman dengan sistem keamanan dan komitmen Kebijakan Privasi yang dimiliki pijar career.</p>
            </div>
        </div>
        <hr class="hr-bawah-steps" style="right: 0">
        <div class="steps">
            <div class="desc align-items-end">
                <span class="new-ui-color"><i class="fa fa-search"></i></span>
                <h1>Cari lowongan sesuai keahlian</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae totam explicabo pariatur eaque consectetur? Voluptatibus ducimus modi mollitia rem, ipsam sunt nulla ullam similique optio officia assumenda eligendi officiis et?</p>
            </div>
            <div class="image-container justify-content-start">
                <img class="w-lg-75" src="{{ asset('/images/job-portal-search.svg') }}" alt="">
            </div>
        </div>
        <hr class="hr-bawah-steps" style="left: 0">
        <div class="steps">
            <div class="image-container justify-content-end mt-5">
                <img class="w-lg-50" src="{{ asset('/images/survey-form.svg') }}" alt="">
            </div>
            <div class="desc align-items-start">
                <span class="new-ui-color"><i class="fa fa-file-text-o"></i></span>
                <h1>Kirim Proposal Lamaran</h1>
                <p class="text-left">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem unde aliquid deleniti dolor impedit, quis libero labore enim, atque temporibus dignissimos praesentium porro soluta dolore, animi aspernatur expedita quisquam! Aliquam.</p>
            </div>
        </div>
        <hr class="hr-bawah-steps" style="right: 0">
        <div class="steps">
            <div class="desc align-items-end">
                <span class="new-ui-color"><i class="fa fa-check"></i></span>
                <h1>Dapatkan Pekerjaan</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae totam explicabo pariatur eaque consectetur? Voluptatibus ducimus modi mollitia rem, ipsam sunt nulla ullam similique optio officia assumenda eligendi officiis et?</p>
            </div>
            <div class="image-container justify-content-start">
                <img class="w-100" src="{{ asset('/images/happy.svg') }}" alt="">
            </div>
        </div>
    </div>
</div>
<div style="background-image: linear-gradient(90deg, #8796F0, #094370);">
    <br>
</div>




<section id="clients" class="section-bg">
    <div class="container">
        <div class="section-header">
            <h3>Our CLients</h3>
            <p>Meet our happy clients</p>
        </div>
        <div class="row no-gutters clients-wrap clearfix wow fadeInUp mt-n5" style="visibility: visible; animation-name: fadeInUp;">
            <div class="px-5 px-lg-0 px-md-0 px-xs-0 col-lg-3 col-md-4 col-xs-6">
                <div class="client-logo"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1559460149/abof.png" class="img-fluid" alt=""> </div>
            </div>
            <div class="px-5 px-lg-0 px-md-0 px-xs-0 col-lg-3 col-md-4 col-xs-6">
                <div class="client-logo"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1559460224/cropped-cropped-20170720-lucuLogo-squ2-e1500543540803.png" class="img-fluid" alt=""> </div>
            </div>
            <div class="px-5 px-lg-0 px-md-0 px-xs-0 col-lg-3 col-md-4 col-xs-6">
                <div class="client-logo"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1559460269/104840a62d46c05d285762857fecb61a.png" class="img-fluid" alt=""> </div>
            </div>
            <div class="px-5 px-lg-0 px-md-0 px-xs-0 col-lg-3 col-md-4 col-xs-6">
                <div class="client-logo"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1559460358/client-4.png" class="img-fluid" alt=""> </div>
            </div>
            <div class="px-5 px-lg-0 px-md-0 px-xs-0 col-lg-3 col-md-4 col-xs-6">
                <div class="client-logo"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1559460379/client-5.png" class="img-fluid" alt=""> </div>
            </div>
            <div class="px-5 px-lg-0 px-md-0 px-xs-0 col-lg-3 col-md-4 col-xs-6">
                <div class="client-logo"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1559460398/client-6.png" class="img-fluid" alt=""> </div>
            </div>
            <div class="px-5 px-lg-0 px-md-0 px-xs-0 col-lg-3 col-md-4 col-xs-6">
                <div class="client-logo"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1559460418/client-7.png" class="img-fluid" alt=""> </div>
            </div>
            <div class="px-5 px-lg-0 px-md-0 px-xs-0 col-lg-3 col-md-4 col-xs-6">
                <div class="client-logo"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1559460418/client-7.png" class="img-fluid" alt=""> </div>
            </div>
        </div>
    </div>
</section>











{{-- <section class="job-categories">
    <div class="container">
        <div class="category-title">
            <h3>KATEGORI LOWONGAN</h3>
            <span>Cari Lowongan Pekerjaan Berdasarkan Kompetensi Keahlian</span>
        </div>

        <div class="row">
            @for($i = 0; $i < 20; $i++)
            <div class="col-md-4 justify-content-between">
                <i class="fa fa-angle-double-right mr-2"></i>
                Rekayasa Perangkat Lunak

                <label class="badge badge-pill badge-secondary ml-2">123</label>
            </div>
            @endfor
        </div>
    </div>
</section> --}}
<div style="background-image: linear-gradient(90deg, #8796F0, #094370);">
    <br>
</div>
<section class="testimonial pt-5 mb-n3 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-center m-auto">
                <h2 class="testi">Testimonials</h2>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for carousel items -->
                    <div class="carousel-inner">
                        <div class="item carousel-item active">
                            <div class="img-box"><img src="https://img.kpopmap.com/2018/05/hkt48-miyawaki-sakura.jpg" alt=""></div>
                            <p class="testimonial">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
                            <p class="overview"><b>Paula Wilson</b>, Media Analyst</p>
                        </div>
                        <div class="item carousel-item">
                            <div class="img-box"><img src="https://img1.kpopmap.com/2018/05/hkt48-yabuki-nayo.jpg" alt=""></div>
                            <p class="testimonial">Vestibulum quis quam ut magna consequat faucibus. Pellentesque eget nisi a mi suscipit tincidunt. Utmtc tempus dictum risus. Pellentesque viverra sagittis quam at mattis. Suspendisse potenti. Aliquam sit amet gravida nibh, facilisis gravida odio.</p>
                            <p class="overview"><b>Antonio Moreno</b>, Web Developer</p>
                        </div>
                        <div class="item carousel-item">
                            <div class="img-box"><img src="https://actressfact.com/wp-content/uploads/2020/04/Hashimoto_Kanna.jpg" alt=""></div>
                            <p class="testimonial">Phasellus vitae suscipit justo. Mauris pharetra feugiat ante id lacinia. Etiam faucibus mauris id tempor egestas. Duis luctus turpis at accumsan tincidunt. Phasellus risus risus, volutpat vel tellus ac, tincidunt fringilla massa. Etiam hendrerit dolor eget rutrum.</p>
                            <p class="overview"><b>Michael Holz</b>, Seo Analyst</p>
                        </div>
                    </div>
                    <!-- Carousel controls -->
                    <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection




@section('stylesheet')

<link rel="stylesheet" href="{{ asset('/css/carousel.css') }}">

@endsection
