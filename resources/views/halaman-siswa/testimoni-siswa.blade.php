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
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url()->previous() }}" class="h5"><i class="fa fa-arrow-left fa-0x mr-2"></i>Kembali</a>
                    </div>
                    <hr class="mt-0">
                    <div class="card-body pt-2 pb-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-center m-auto">
                                    <h2 class="testi">Testimoni Siswa</h2>
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="item carousel-item active">
                                                <div class="img-box"><img src="https://randomuser.me/api/portraits/women/81.jpg" alt=""></div>
                                                <p class="testimonial">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
                                                <p class="overview"><b>Paula Wilson</b>, Media Analyst</p>
                                            </div>
                                            <div class="item carousel-item">
                                                <div class="img-box"><img src="https://randomuser.me/api/portraits/women/56.jpg" alt=""></div>
                                                <p class="testimonial">Vestibulum quis quam ut magna consequat faucibus. Pellentesque eget nisi a mi suscipit tincidunt. Utmtc tempus dictum risus. Pellentesque viverra sagittis quam at mattis. Suspendisse potenti. Aliquam sit amet gravida nibh, facilisis gravida odio.</p>
                                                <p class="overview"><b>Antonio Moreno</b>, Web Developer</p>
                                            </div>
                                            <div class="item carousel-item">
                                                <div class="img-box"><img src="https://randomuser.me/api/portraits/women/9.jpg" alt=""></div>
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
    h2.testi {
color: #333;
text-align: center;
text-transform: uppercase;
font-family: "Roboto", sans-serif;
font-weight: bold;
position: relative;
margin: 30px 0 60px;
}
h2.testi::after {
content: "";
width: 100px;
position: absolute;
margin: 0 auto;
height: 3px;
background: #4B68EC;
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
border: 1px solid #ddd;
border-radius: 50%;
}
.carousel .img-box img {
width: 100%;
height: 100%;
display: block;
border-radius: 50%;
}
.carousel .testimonial {
padding: 30px 0 10px;
}
.carousel .overview {
font-style: italic;
}
.carousel .overview b {
text-transform: uppercase;
color: #4B68EC;
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
color: #546FED;
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





.section-header h3 {
 font-size: 36px;
 color: #283d50;
 text-align: center;
 font-weight: 500;
 position: relative
}

.section-header p {
 text-align: center;
 margin: auto;
 font-size: 15px;
 padding-bottom: 60px;
 color: #556877;
 width: 50%
}

#clients {
 padding: 60px 0
}

#clients .clients-wrap {
 /* border-top: 1px solid #d6eaff;
 border-left: 1px solid #d6eaff; */
 margin-bottom: 30px
}

#clients .client-logo {
 padding: 64px;
 display: -webkit-box;
 display: -webkit-flex;
 display: -ms-flexbox;
 display: flex;
 -webkit-box-pack: center;
 -webkit-justify-content: center;
 -ms-flex-pack: center;
 justify-content: center;
 -webkit-box-align: center;
 -webkit-align-items: center;
 -ms-flex-align: center;
 align-items: center;
 /* border-right: 1px solid #d6eaff;
 border-bottom: 1px solid #d6eaff; */
 overflow: hidden;
 /* background: #fff; */
 height: 160px
}

#clients img {
 transition: all 0.4s ease-in-out
}
</style>

@endsection
