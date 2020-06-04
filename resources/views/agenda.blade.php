@extends('layouts.app')

@section('content')
<?php
    use \App\Http\Controllers\AgendaController;
?>
<section class="pages pb-md-3 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-n3 d-flex justify-content-between align-items-center">
                <h3 class="page-title"><i class="fa fa-list mr-3"></i>{{__('Agenda')}}</h3>
    
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/artikel') }}">{{__('Artikel')}}</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col py-3">
                <div class="d-block mt-n3 mb-2">
                    <a href="{{ url()->previous() }}"><i class="fa fa-arrow-left mr-2"></i>{{__('Kembali')}}</a>
                </div>
            </div>
        </div>
        <div class="row mt-n2">
            <div class="col-md-8">
                <div class="row">
                    @if ($agenda->isEmpty())
                        <h1 class="p-4 text-muted">{{__('Agenda Belum ada')}}</h1>
                    @else
                        @foreach ($agenda as $item)
                        <div class="col-12 mt-3">
                            <div class="card">
                                <small class="text-gainsboro text-right pr-4 pt-4">{{__('Diposting Pada:')}} {{ $item->created_at->format('d F Y') }}</small>
                                <a href="{{ url('/agenda/' . $item->link) }}"><h3 class="font-weight-bold pt-3 text-center px-2">{{__($item->judul)}}</h3></a> 
                                <img class="w-100 px-3 px-md-5 rounded my-b mt-3" style="height: 250px; object-fit: cover; object-position: center" src="{{ asset('/storage/assets/agenda/' . $item->image) }}" alt="">
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
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <div class="px-4 pb-4 text-justify" style="text-indent: 20px">
                                    {!! AgendaController::html_cut($item->deskripsi, 250) !!} <div class="mt-1 text-right"> <a class="font-weight-bold" href="{{ url('/agenda/' . $item->link) }}">{{__('Lihat Selengkapnya...')}}</a></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
                <div class="row">
                    <div class="col my-3">
                        {{ $agenda->onEachSide(5)->links() }}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col mt-md-3">
                        @include('widget.popular-post-article')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection