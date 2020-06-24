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
        <div class="row mt-n3">
            <div class="col-lg-8 mt-3">
                <div style="animation: tememplek 0.5s;" class="card shadow-md">
                    <div class="card-body body-artikel-order-by">
                        <h5 class="quicksand font-weight-bold" style="letter-spacing: 0.5px">Urut Berdasarkan</h5>
                        <select id="urutkan-berdasarkan" class="artikel-order rounded">
                            <option value="terbaru"
                                @if (isset($urutBerdasarkan))
                                    {{ ($urutBerdasarkan == 'terbaru') ? 'selected' : '' }}
                                @endif
                            >{{__('Terbaru')}}</option>
                            <option value="terpopuler"
                                @if (isset($urutBerdasarkan))
                                    {{ ($urutBerdasarkan == 'terpopuler') ? 'selected' : '' }}
                                @endif
                            >{{__('Terpopuler')}}</option>
                        </select>
                    </div>
                </div>
                <div style="animation: tememplek 0.5s;" class="card shadow-2xl">
                    <div class="card-body">
                        <h4 class="font-weight-bold quicksand" style="letter-spacing: 0.6px">{{__('Artikel Terbaru')}}</h4>
                        <hr>
                        @if ($items->isEmpty())
                            <div class="d-flex flex-column align-items-center py-3">
                                <span class="display-1 text-muted"><i class="fa fa-newspaper-o"></i></span>
                                <h2 class="quicksand font-weight-bold">{{__('Belum ada artikel')}}</h2>
                            </div>
                        @else
                            @foreach ($items as $artikel)
                            <div style="margin-top: 2rem">
                                <div class="media my-4">
                                    <a class="w-100" href="{{ url('artikel/' . $artikel->link) }}">
                                        <img src="{{ asset('/storage/assets/artikel/' . $artikel->image) }}" width="100%" class="align-self-end mr-3 rounded-lg" alt="...">
                                    </a>
                                    <div class="media-body px-3 mt-4 ml-md-2 mt-md-0">
                                        <a class="text-decoration-none" href="{{ url('artikel/' . $artikel->link) }}">
                                            <h5 class="m-0 tailwind-font">{{ $artikel->judul }}</h5>
                                        </a>
                                        <div class="my-2 mt-lg-1">
                                            <small class="text-gainsboro my-3">
                                            {{__(' Oleh SMK N 1 Bojongsari, Diposting pada: ')}}{{ $artikel->created_at->format('d F Y') }}
                                            </small>
                                        </div>

                                        <p class="text-justify" style="text-indent: 20px">{{ __(substr($artikel->deskripsi, 0, 225) . '...') }}</p>
                                    </div>
                                </div>
                                <div>
                                    <div class="row px-4 mt-n3 mt-lg-n2 d-flex flex-row mb-4">
                                        <h5 class="h5-tag-artikel font-weight-bold d-inline-block mr-2" style="margin-top: 7.5px">{{__('Tags: ')}}</h5>
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
                                <div class="list-artikel-bawah-bag-read-more">
                                    <div class="icon">
                                        <span>
                                            <i class="fa fa-clock-o mr-1"></i>
                                            <span>{{ $artikel->created_at->diffForHumans() }}</span>
                                        </span>
                                        <span>
                                            <i class="fa fa-eye mr-1"></i>
                                            <span>Dilihat {{ $artikel->counter }} kali</span>
                                        </span>
                                    </div>
                                    <div class="link">
                                        <a class="mr-lg-3" href="{{ url('artikel/' . $artikel->link) }}">Baca Selengkapnya</a>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            @endforeach
                        @endif


                        <div class="mt-4"></div>
                        <div class="d-flex justify-content-start">
                            {{ $items->onEachSide(5)->links() }}
                        </div>

                    </div>
                </div>
            </div>
            <div style="animation: tememplek 0.5s;" class="col-lg-4 mt-3">
                @include('widget.popular-post-article')
            </div>
        </div>
    </div>
</section>



<form id="form-search" action="{{ url('/artikel/') }}" method="get">
    <input type="hidden" name="urutBerdasarkan" value="terbaru">

</form>
@endsection


@section('script')

<script>
    document.getElementById('urutkan-berdasarkan').addEventListener('change', function(element) {
        const formSearch = document.getElementById('form-search');
        let inputOrderBy = formSearch.querySelector('input[name="urutBerdasarkan"]');
        inputOrderBy.value = this.value;

        formSearch.submit()
    })
</script>

@endsection
