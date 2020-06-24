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
                                <h4 class="font-weight-bold quicksand" style="letter-spacing: 0.6px">{{__('Agenda')}}</h4>
                                <hr>
                                @if ($agenda->isEmpty())
                                <div class="d-flex flex-column align-items-center py-3">
                                    <span class="display-1 text-muted"><i class="fa fa-list"></i></span>
                                    <h2 class="quicksand font-weight-bold">{{__('Belum ada Agenda')}}</h2>
                                </div>
                                @else
                                    @foreach ($agenda as $item)

                                            <a href="{{ url('/agenda/' . $item->link) }}"><h3 class="font-weight-bold pt-3 text-center px-2">{{__($item->judul)}}</h3></a>
                                            <img class="w-100 px-3 px-md-5 my-b mt-3" style="height: 250px; object-fit: cover; object-position: center;" src="{{ asset('/storage/assets/agenda/' . $item->image) }}" alt="">
                                            <div class="px-4">
                                                <table class="table table-responsive">
                                                    <tbody>
                                                        <tr class="border-0">
                                                            <td class="border-0 pb-0" scope="col">Pelaksanaan</td>
                                                            <td class="border-0 pb-0 px-0" scope="col">:</td>
                                                            <td class="border-0 pb-0" scope="col">{{__($item->pelaksanaan)}}</td>
                                                        </tr>
                                                        <tr class="border-0">
                                                            <td class="border-0 pb-0" scope="col">Lokasi</td>
                                                            <td class="border-0 pb-0 px-0" scope="col">:</td>
                                                            <td class="border-0 pb-0" scope="col">{{__($item->lokasi)}}</td>
                                                        </tr>
                                                        <tr class="border-0">
                                                            <td class="border-0 pb-0" scope="col">Diposting Pada</td>
                                                            <td class="border-0 pb-0 px-0" scope="col">:</td>
                                                            <td class="border-0 pb-0" scope="col">{{ $item->created_at->format('d F Y') }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                            <hr>
                                            <div class="px-4 pb-4 text-justify" style="text-indent: 20px">
                                                {!! AgendaController::html_cut($item->deskripsi, 250) !!}
                                            </div>
                                            <div class="list-artikel-bawah-bag-read-more mt-n4">
                                                <div class="icon">
                                                    <span>
                                                        <i class="fa fa-clock-o mr-1"></i>
                                                        <span>{{ $item->created_at->diffForHumans() }}</span>
                                                    </span>
                                                </div>
                                                <div class="link">
                                                    <a class="mr-lg-3" href="{{ url('/agenda/' . $item->link) }}">Lihat Selengkapnya</a>
                                                </div>
                                            </div>
                                            <hr>
                                    @endforeach
                                @endif
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
