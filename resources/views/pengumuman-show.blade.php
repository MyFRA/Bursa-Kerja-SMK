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
                <div class="card shadow-2xl">
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
                                <h5 class="font-weight-bold d-md-inline mr-2">{{__('Bagikan ke: ')}}</h5>
                                <a href="http://www.facebook.com/sharer.php?u={{ url('/artikel/' . $pengumuman->link) }}" class="btn btn-primary btn-sm rounded-0" target="_blank">
                                    <i class="fa fa-facebook-square mr-1"></i>
                                    {{__('Facebook')}}
                                </a>
                                <a href="https://twitter.com/share?url={{ url('/artikel/' . $pengumuman->link) }}" class="btn btn-info btn-sm text-white rounded-0" target="_blank">
                                    <i class="fa fa-twitter-square mr-1"></i>
                                   {{__(' Twitter')}}
                                </a>
                                <a href="whatsapp://send?text={{ url('/artikel/' . $pengumuman->link) }}" class="btn btn-success btn-sm rounded-0" target="_blank">
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
