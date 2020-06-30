@extends('layouts.app')

@section('content')
<section class="pages pb-md-3 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-n3 d-flex justify-content-between align-items-center">
                <h3 class="page-title"><i class="fa fa-newspaper-o mr-3"></i>{{__('Artikel')}}</h3>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active " aria-current="page"><a href="{{ url('/artikel') }}">{{__('Artikel')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('Detail')}}</li>
                </ol>
            </div>
        </div>
        <div class="row mt-3">
            <div  style="animation: tememplek 0.5s;" class="col-md-8">
                <div class="card shadow-2xl">
                    <div class="card-body">
                        <div class="title d-flex flex-column">
                            <small class="mt-n1 d-block text-right">{{__('Diposting Pada: ')}}{{__($artikel->created_at->format('d F Y'))}}</small>
                            <h2 class="pb-0 px-lg-5 pt-4 text-center">{{__($artikel->judul)}}</h2>
                        </div>
                        <hr class="mt-3">
                        <img src="{{ url('/storage/assets/artikel/' . $artikel->image) }}" width="100%" class="align-self-end my-3 rounded" alt="...">
                        <div class="list-artikel-bawah-bag-read-more p-0">
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
                        </div>
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
                        <div class="row px-2 mt-4">
                            <div class="col-12">
                                <h5 class="font-weight-bold d-inline mr-2">{{__('Bagikan ke: ')}}</h5>
                                <a href="http://www.facebook.com/sharer.php?u={{ url('/artikel/' . $artikel->link) }}" class="btn btn-primary btn-sm rounded-0" target="_blank">
                                    <i class="fa fa-facebook-square mr-1"></i>
                                    {{__('Facebook')}}
                                </a>
                                <a href="https://twitter.com/share?url={{ url('/artikel/' . $artikel->link) }}" class="btn btn-info btn-sm text-white rounded-0" target="_blank">
                                    <i class="fa fa-twitter-square mr-1"></i>
                                   {{__(' Twitter')}}
                                </a>
                                <a href="whatsapp://send?text={{ url('/artikel/' . $artikel->link) }}" class="btn btn-success btn-sm rounded-0" target="_blank">
                                    <i class="fa fa-whatsapp mr-1"></i>
                                    {{__('Whatsapp')}}
                                </a>
                            </div>
                        </div>

                        <div class="divider border-bottom my-5">
                            <div id="disqus_thread"></div>
                                <script>

                                /**
                                *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                                /*
                                var disqus_config = function () {
                                this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                                this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                };
                                */
                                (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');
                                s.src = 'https://smk-negeri-1-bojongsari-smk-bisa-kerja.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                                })();
                                </script>
                                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                                            
                        </div>

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
            <div  style="animation: tememplek 0.5s;" class="col-md-4 mt-3 mt-lg-0">
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
