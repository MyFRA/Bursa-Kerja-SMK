@extends('layouts.app')

@section('content')
<section class="pages py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-n3 mb-3 d-flex justify-content-between align-items-center">
                <h3 class="page-title"><i class="fa fa-newspaper-o mr-3"></i>{{__('Artikel')}}</h3>
    
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('Artikel')}}</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="d-block mt-n3 mb-2">
                    <a href="{{ url()->previous() }}"><i class="fa fa-arrow-left mr-2"></i>{{__('Kembali')}}</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mt-2">
                <div class="card">
                    <div class="card-body">
                        <h4>{{__('Artikel Terbaru')}}</h4>
                        <hr>
                        @foreach ($items as $artikel)
                            <div class="media my-4">
                                <a class="w-100" href="{{ url('artikel/' . $artikel->link) }}">
                                    <img src="{{ asset('/storage/assets/artikel/' . $artikel->image) }}" width="100%" class="align-self-end mr-3 rounded" alt="...">
                                </a>
                                <div class="media-body px-3 mt-4 ml-md-2 mt-md-0">
                                    <a href="{{ url('artikel/' . $artikel->link) }}">
                                        <h5 class="font-weight-bold m-0">{{ $artikel->judul }}</h5>
                                    </a>
                                    <div class="my-2 mt-lg-1">
                                        <small class="text-gainsboro my-3">
                                           {{__(' Oleh SMK N 1 Bojongsari, Diposting pada: ')}}{{ $artikel->created_at->format('d F Y') }}
                                        </small>
                                    </div>

                                    <p class=" text-justify" style="text-indent: 20px">{{ __(substr($artikel->deskripsi, 0, 225) . '...') }}</p>
                                </div>
                            </div>
                            <div>
                                <div class="row px-4 mt-n3 d-flex flex-row">
                                    <h5 class="font-weight-bold d-inline-block mr-2" style="margin-top: 7.5px">{{__('Tags: ')}}</h5>
                                    @php
                                        // Pengubahan tags menjadi arrray
                                        $tags = explode(';', $artikel->tags);

                                        // menghapus index array terakhir
                                        unset($tags[count($tags) - 1]);

                                    @endphp
                                    @foreach ($tags as $tag)
                                        <a href="" class="tag-for-artikel text-decoration-none">{{__($tag)}}</a>
                                    @endforeach
                                </div>
                            </div>
                            <hr>
                        @endforeach

                        <div class="mt-4"></div>
                        <div class="d-flex justify-content-center">
                            {{ $items->onEachSide(5)->links() }}
                        </div>
                        {{-- <div class="d-flex justify-content-between">
                            <button class="btn btn-outline-secondary">
                                <i class="fa fa-angle-double-left mr-2"></i>Sebelumnya
                            </button>
                            <button class="btn btn-outline-secondary">
                                Berikutnya <i class="fa fa-angle-double-right ml-2"></i>
                            </button>
                        </div> --}}
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