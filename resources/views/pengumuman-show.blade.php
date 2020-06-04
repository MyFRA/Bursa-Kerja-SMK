@extends('layouts.app')

@section('content')
<section class="pages pb-md-3 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-n3 d-flex justify-content-between align-items-center">
                <h3 class="page-title"><i class="fa fa-bullhorn mr-3"></i>{{__('Pengumuman')}}</h3>
    
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/pengumuman') }}">{{__('pengumuman')}}</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card rounded-0">
                    <div class="card-body">
                        <div class="title d-flex flex-column">
                            <small class="mt-n1 d-block text-right">{{__('Diposting Pada: ')}}{{__($pengumuman->created_at->format('d F Y'))}}</small>
                            <h3 class="pb-0 pt-3 text-center font-weight-bold ">{{__($pengumuman->judul)}}</h3>
                        </div>
                        <hr class="mt-3">
                        <div class="px-md-3 pt-2 pb-4">
                            {!! $pengumuman->deskripsi !!}
                        </div>
                        <div class="px-4 row mt-1 mb-4">
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
                            <div class="col-12 my-3">
                                <h5>{{__('Pengumuman Terbaru')}}</h5>
                            </div>
                            @foreach ($pengumumanTerbaru as $newPengumuman)
                            <div class="col-md-12">
                                <div>
                                    <ul class="ml-n2">
                                        <li>
                                            <a href="{{ url('pengumuman/' . $newPengumuman->link) }}">
                                                <h5 class="font-weight-bold ">{{ $newPengumuman->judul }}</h5>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
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
        hr.hr-from-rand-agenda {
            display: none
        }
    }
</style>

@endsection