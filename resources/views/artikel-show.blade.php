@extends('layouts.app')

@section('content')
<section class="pages pb-md-3 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-n3 d-flex justify-content-between align-items-center">
                <h3 class="page-title"><i class="fa fa-newspaper-o mr-3"></i>{{__('Artikel')}}</h3>
    
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/artikel') }}">{{__('Artikel')}}</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card rounded-0">
                    <div class="card-body">
                        <div class="title d-flex flex-column">
                            <small class="mt-n1 d-block text-right">{{__($artikel->created_at->format('d F Y'))}}</small>
                            <h2 class="pb-0 pt-3 text-center">{{__($artikel->judul)}}</h2>
                        </div>
                        <hr class="mt-3">
                        <small class="float-right">{{__('Dilihat')}} <i class="fa fa-eye ml-1"></i> {{__($artikel->counter)}} {{__('kali')}}</small>
                        <img src="{{ url('/storage/assets/artikel/' . $artikel->image) }}" width="100%" class="align-self-end my-3 rounded" alt="...">
                        <hr>
                        <div class="mt-4">
                            {!! $artikel->konten !!}
                        </div>
                        <hr>
                        <div class="row px-4 mt-2 d-flex flex-row">
                            <h5 class="font-weight-bold d-inline-block mr-2" style="margin-top: 7.5px">{{__('Tags: ')}}</h5>
                            @foreach ($tags as $tag)
                                <a href="" class="tag-for-artikel text-decoration-none">{{__($tag)}}</a>
                            @endforeach
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <h5 class="font-weight-bold d-inline mr-2">{{__('Bagikan ke: ')}}</h5>
                                <button class="btn btn-primary btn-sm rounded-0">
                                    <i class="fa fa-facebook-square mr-1"></i>
                                    {{__('Facebook')}}
                                </button>
                                <button class="btn btn-info btn-sm text-white rounded-0">
                                    <i class="fa fa-twitter-square mr-1"></i>
                                   {{__(' Twitter')}}
                                </button>
                                <button class="btn btn-success btn-sm rounded-0">
                                    <i class="fa fa-whatsapp mr-1"></i>
                                    {{__('Whatsapp')}}
                                </button>
                            </div>
                        </div>

                        <div class="divider border-bottom my-3"></div>

                        <div class="row my-3">
                            <div class="col-12">
                                <h5>{{__('Artikel Terkait')}}</h5>
                            </div>
                            @foreach ($randomArtikel as $randArtikel)
                            <div class="col-md-4 px-2">
                                <div class="media my-4 d-flex flex-column">
                                    <a class="w-100" href="{{ url('artikel/' . $randArtikel->link) }}">
                                        <img src="{{ asset('/storage/assets/artikel/' . $randArtikel->image) }}" width="100%" class="align-self-end mr-3 rounded" alt="...">
                                    </a>
                                    <div class="media-body px-3 mt-4 ml-md-2 mt-md-0">
                                        <a href="{{ url('artikel/' . $randArtikel->link) }}">
                                            <h5 class="font-weight-bold m-0 mt-lg-3">{{ $randArtikel->judul }}</h5>
                                        </a>
                                        <div class="my-2 mt-lg-1">
                                            <small class="text-gainsboro mt-3 d-block">
                                               {{__(' Oleh SMK N 1 Bojongsari')}}
                                            </small>
                                            <small class="text-gainsboro my-3">
                                                {{__( $randArtikel->created_at->format('d F Y'))}}
                                             </small>
                                        </div>
                                    </div>
                                </div>
                                <hr class="hr-from-rand-artikel">
                            </div>
                            @endforeach
                        </div>
                        <div id="disqus_thread"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-3 mt-lg-0">
                @include('widget.popular-post-article')
            </div>
        </div>
    </div>
</section>
@endsection


@section('stylesheet')

<style>
    @media screen and (min-width: 768px) {
        hr.hr-from-rand-artikel {
            display: none
        }
    }
</style>

@endsection