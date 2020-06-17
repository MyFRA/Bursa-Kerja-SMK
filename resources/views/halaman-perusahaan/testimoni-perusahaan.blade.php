@extends('layouts.app')

@section('content')
<section class="pages pb-md-3 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-n3 d-flex justify-content-between align-items-center">
                <h3 class="page-title"><i class="fa fa-address-card-o mr-3"></i>{{__('Testimoni Perusahaan')}}</h3>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="">{{__('Testimoni Perusahaan')}}</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url()->previous() }}" class="h5"><i class="fa fa-arrow-left fa-0x mr-2"></i>Kembali</a>
                    </div>
                    <hr class="mt-0">
                    <div class="card-body px-5 pt-2 pb-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-center m-auto">
                                    <h2>Testimoni Perusahaan</h2>
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="item carousel-item active">
                                                <div class="img-box"><img src="https://3.bp.blogspot.com/-C4dbDsZaxQY/WgSoDzTjnOI/AAAAAAAAAh0/ZtEnVR7WfqEM5HmavBpQNm0vH5LxCzHIACLcBGAs/s1600/bukalapak.png" alt=""></div>
                                                <p class="testimonial">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
                                                <p class="overview"><b>Paula Wilson</b>, Media Analyst</p>
                                            </div>
                                            <div class="item carousel-item">
                                                <div class="img-box"><img src="data:image/jpeg;base64,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" alt=""></div>
                                                <p class="testimonial">Vestibulum quis quam ut magna consequat faucibus. Pellentesque eget nisi a mi suscipit tincidunt. Utmtc tempus dictum risus. Pellentesque viverra sagittis quam at mattis. Suspendisse potenti. Aliquam sit amet gravida nibh, facilisis gravida odio.</p>
                                                <p class="overview"><b>Antonio Moreno</b>, Web Developer</p>
                                            </div>
                                            <div class="item carousel-item">
                                                <div class="img-box"><img src="data:image/png;base64,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" alt=""></div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@section('stylesheet')
<style>
h2 {
	color: #333;
	text-align: center;
	text-transform: uppercase;
	font-family: "Roboto", sans-serif;
	font-weight: bold;
	position: relative;
	margin: 30px 0 60px;
}
h2::after {
	content: "";
	width: 100px;
	position: absolute;
	margin: 0 auto;
	height: 3px;
	background: #8fbc54;
	left: 0;
	right: 0;
	bottom: -10px;
}
.col-center {
	margin: 0 auto;
	float: none !important;
}
.carousel {
	margin: 50px auto;
	padding: 0 70px;
}
.carousel .item {
	color: #999;
	font-size: 14px;
    text-align: center;
	overflow: hidden;
    min-height: 290px;
}
.carousel .item .img-box {
	width: 135px;
	height: 135px;
	margin: 0 auto;
	padding: 5px;
	border: 1px solid #fff;
	/* border-radius: 50%; */
}
.carousel .img-box img {
	width: 100%;
    object-fit: cover;
    object-position: center;
	height: 100%;
	display: block;
	/* border-radius: 50%; */
}
.carousel .testimonial {
	padding: 30px 0 10px;
}
.carousel .overview {
	font-style: italic;
}
.carousel .overview b {
	text-transform: uppercase;
	color: #7AA641;
}
.carousel .carousel-control {
	width: 40px;
    height: 40px;
    margin-top: -20px;
    top: 50%;
	background: none;
}
.carousel-control i {
    font-size: 68px;
	line-height: 42px;
    position: absolute;
    display: inline-block;
	color: rgba(0, 0, 0, 0.8);
    text-shadow: 0 3px 3px #e6e6e6, 0 0 0 #000;
}
.carousel .carousel-indicators {
	bottom: -40px;
}
.carousel-indicators li, .carousel-indicators li.active {
	width: 10px;
	height: 10px;
	margin: 1px 3px;
	border-radius: 50%;
}
.carousel-indicators li {
	background: #999;
	border-color: transparent;
	box-shadow: inset 0 2px 1px rgba(0,0,0,0.2);
}
.carousel-indicators li.active {
	background: #555;
	box-shadow: inset 0 2px 1px rgba(0,0,0,0.2);
}
</style>

@endsection
