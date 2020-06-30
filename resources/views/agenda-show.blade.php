@extends('layouts.app')

@section('content')
<section class="pages pb-md-3 pt-5">
    <div class="container">
        <div class="row mb-3">
            <div class="col-12 mt-n3 d-flex justify-content-between align-items-center">
                <h3 class="page-title"><i class="fa fa-list mr-3"></i>{{__('Agenda')}}</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/agenda') }}">{{__('agenda')}}</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mt-3">
                <div class="card shadow-2xl">
                    <div class="card-body">
                        <div class="title d-flex flex-column">
                            <small class="mt-n1 d-block text-right">{{__('Diposting Pada: ')}}{{__($agenda->created_at->format('d F Y'))}}</small>
                            <h3 class="pb-0 pt-3 text-center font-weight-bold ">{{__($agenda->judul)}}</h3>
                        </div>
                        <hr class="mt-3">
                        <img src="{{ url('/storage/assets/agenda/' . $agenda->image) }}" width="100%" class="align-self-end my-3 rounded" alt="...">
                        <div class="px-4">
                            <table class="table table-responsive">
                                <tbody>
                                    <tr class="border-0">
                                        <td class="border-0 pb-0" scope="col">Pelaksanaan</td>
                                        <td class="border-0 pb-0 px-0" scope="col">:</td>
                                        <td class="border-0 pb-0" scope="col">{{__($agenda->pelaksanaan)}}</td>
                                    </tr>
                                    <tr class="border-0">
                                        <td class="border-0 pb-0" scope="col">Lokasi</td>
                                        <td class="border-0 pb-0 px-0" scope="col">:</td>
                                        <td class="border-0 pb-0" scope="col">{{__($agenda->lokasi)}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="px-4 pb-4" style="text-indent: 20px">
                            {!! $agenda->deskripsi !!}
                        </div>
                        <div class="px-4 row mt-1 mb-4">
                            <div class="col-12">
                                <h5 class="font-weight-bold d-inline mr-2">{{__('Bagikan ke: ')}}</h5>
                                <a href="http://www.facebook.com/sharer.php?u={{ url('/artikel/' . $agenda->link) }}" class="btn btn-primary btn-sm rounded-0" target="_blank">
                                    <i class="fa fa-facebook-square mr-1"></i>
                                    {{__('Facebook')}}
                                </a>
                                <a href="https://twitter.com/share?url={{ url('/artikel/' . $agenda->link) }}" class="btn btn-info btn-sm text-white rounded-0" target="_blank">
                                    <i class="fa fa-twitter-square mr-1"></i>
                                   {{__(' Twitter')}}
                                </a>
                                <a href="whatsapp://send?text={{ url('/artikel/' . $agenda->link) }}" class="btn btn-success btn-sm rounded-0" target="_blank">
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
                                <h5>{{__('Agenda Terbaru')}}</h5>
                            </div>
                            @foreach ($agendaTerbaru as $newAgenda)
                            <div class="col-md-4 px-2">
                                <div class="media my-4 d-flex flex-column">
                                    <a class="w-100" href="{{ url('agenda/' . $newAgenda->link) }}">
                                        <img src="{{ asset('/storage/assets/agenda/' . $newAgenda->image) }}" width="100%" class="align-self-end mr-3 rounded" alt="...">
                                    </a>
                                    <div class="media-body px-3 mt-4 ml-md-2 mt-md-0">
                                        <a href="{{ url('agenda/' . $newAgenda->link) }}">
                                            <h5 class="font-weight-bold m-0 mt-lg-3">{{ $newAgenda->judul }}</h5>
                                        </a>
                                        <div class="my-2 mt-lg-1">
                                            <small class="text-gainsboro my-3">
                                                {{__('Diposting Pada')}} {{__( $newAgenda->created_at->format('d F Y'))}}
                                             </small>
                                        </div>
                                    </div>
                                </div>
                                <hr class="hr-from-rand-agenda">
                            </div>
                            @endforeach
                        </div>
                        <div id="disqus_thread"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-3">
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
