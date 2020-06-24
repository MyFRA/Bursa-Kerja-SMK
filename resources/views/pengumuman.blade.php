@extends('layouts.app')

@section('content')
<section class="pages py-5">
    <div class="container">
        <div class="row mb-n3">
            <div class="col-12 mt-n3 mb-3 d-flex justify-content-between align-items-center">
                <h3 class="page-title"><i class="fa fa-bullhorn mr-3"></i>{{__('Pengumuman')}}</h3>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('Pengumuman')}}</li>
                </ol>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col">
                <div class="d-block mt-n3 mb-2">
                    <a href="{{ url()->previous() }}"><i class="fa fa-arrow-left mr-2"></i>{{__('Kembali')}}</a>
                </div>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-md-8 mt-3">
                <div style="animation: tememplek 0.5s;" class="card shadow-2xl">
                    <div class="card-body">
                        <h4 class="font-weight-bold quicksand" style="letter-spacing: 0.6px">{{__('Pengumuman')}}</h4>
                        <hr>
                        @if ($items->isEmpty())
                        <div class="d-flex flex-column align-items-center py-3">
                            <span class="display-1 text-muted"><i class="fa fa-bullhorn"></i></span>
                            <h2 class="quicksand font-weight-bold">{{__('Belum ada Pengumuman')}}</h2>
                        </div>
                        @else
                            @foreach ($items as $pengumuman)
                            <ul>
                                <li>
                                    <div class="media my-4">
                                        <div class="media-body px-2 mt-n5 mt-md-0">
                                            <a href="{{ url('pengumuman/' . $pengumuman->link) }}">
                                                <h5 class="font-weight-bold m-0">{{ $pengumuman->judul }}</h5>
                                            </a>
                                            <div class="my-2 mt-lg-1">
                                                <small class="text-gainsboro my-3">
                                                {{__(' Diposting pada: ')}}{{ $pengumuman->created_at->format('d F Y') }}
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-n3">
                                </li>
                            </ul>
                            @endforeach
                        @endif
                        <div class="px-3">
                            {{ $items->onEachSide(5)->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div style="animation: tememplek 0.5s;"  class="col mt-3">
                        @include('widget.popular-post-article')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
