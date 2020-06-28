@extends('layouts.app')

@section('content')
<?php
    use \App\Http\Controllers\AgendaController;
?>
<section class="pages pb-md-3 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-n3 mb-2 d-flex justify-content-between align-items-center">
                <h3 class="page-title"><i class="fa fa-list mr-3"></i>{{__('Agenda')}}</h3>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="">{{__('Agenda')}}</a></li>
                </ol>
            </div>
        </div>
        <div class="row mt-n2">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-12 mt-3">
                        <div style="animation: tememplek 0.5s;" class="card shadow-2xl">
                            <div class="card-body">
                                <h4 class="font-weight-bold quicksand" style="letter-spacing: 0.6px">{{__('Agenda Terbaru')}}</h4>
                                <hr>
                                @if ($agenda->isEmpty())
                                    <div class="d-flex flex-column align-items-center py-3">
                                        <span class="display-1 text-muted"><i class="fa fa-newspaper-o"></i></span>
                                        <h2 class="quicksand font-weight-bold">{{__('Belum ada agenda')}}</h2>
                                    </div>
                                @else
                                    @foreach ($agenda as $item)
                                    <div style="margin-top: 2rem">
                                        <div class="media my-4">
                                            <a class="w-100" href="{{ url('/agenda/' . $item->link) }}">
                                                <img src="{{ asset('/storage/assets/agenda/' . $item->image) }}" width="100%" class="align-self-end mr-3 rounded-lg" alt="...">
                                            </a>
                                            <div class="media-body px-3 mt-4 ml-md-2 mt-md-0">
                                                <a class="text-decoration-none" href="{{ url('/agenda/' . $item->link) }}">
                                                    <h5 class="m-0 tailwind-font">{{ $item->judul }}</h5>
                                                </a>
                                                <div class="my-2 mt-lg-1">
                                                    <small class="text-gainsboro my-3">
                                                    {{__(' Oleh SMK N 1 Bojongsari, Diposting pada: ')}}{{ $item->created_at->format('d F Y') }}
                                                    </small>
                                                    <div class="mt-3" style="font-size: 13px">
                                                        <div><i class="fa fa-calendar mr-2 mb-2"></i> {{ $item->pelaksanaan }}</div>
                                                        <div><i class="fa fa-map-marker mr-2"></i> {{ $item->lokasi }}</div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="list-artikel-bawah-bag-read-more">
                                            <div class="icon">
                                                <span>
                                                    <i class="fa fa-clock-o mr-1"></i>
                                                    <span>{{ $item->created_at->diffForHumans() }}</span>
                                                </span>
                                                {{-- <span>
                                                    <i class="fa fa-eye mr-1"></i>
                                                    <span>Dilihatkali</span>
                                                </span> --}}
                                            </div>
                                            <div class="link">
                                                <a class="mr-lg-3" href="{{ url('/agenda/' . $item->link) }}">Lihat Detail </a>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    @endforeach
                                @endif


                                {{-- <div class="mt-4"></div>
                                <div class="d-flex justify-content-start">
                                    {{ $agenda->onEachSide(5)->links() }}
                                </div> --}}

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col my-3">
                        {{ $agenda->onEachSide(5)->links() }}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div style="animation: tememplek 0.5s;" class="col mt-md-3">
                        @include('widget.popular-post-article')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
