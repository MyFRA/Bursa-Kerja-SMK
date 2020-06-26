@extends('layouts.app')

@section('content')
<section class="pages pb-md-3 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-n3 d-flex justify-content-between align-items-center">
                <h3 class="page-title"><i class="fa fa-address-card-o mr-3"></i>{{__('Testimoni Siswa')}}</h3>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="">{{__('Testimoni Siswa')}}</a></li>
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
                    <div class="card-body pt-2 pb-5">
                        <div class="container">
                            <div class="row">
                                <section class="testimonial mb-n3 bg-white">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('/css/carousel.css') }}">
@endsection
