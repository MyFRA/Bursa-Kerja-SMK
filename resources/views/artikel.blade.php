@extends('layouts.app')

@section('content')
<section class="pages py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="media">
                            <a href="{{ url('artikel/sample-artikel') }}" class="col-3 p-0">
                                <img src="https://storage.travelingyuk.com/unggah/2019/08/20190731_161501_01_1_MAh.jpg" width="100%" class="align-self-end mr-3" alt="...">
                            </a>
                            <div class="media-body pl-3">
                                <a href="">
                                    <h5 class="font-weight-bold m-0">Bottom-aligned media</h5>
                                </a>
                                <small class="text-gainsboro">
                                    Oleh tony3supriadi, Diposting pada: September 29, 2019
                                </small>
                                <p class="mb-0">Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                            </div>
                        </div>

                        <div class="divider border-bottom my-4"></div>

                        <div class="d-flex justify-content-between">
                            <button class="btn btn-outline-secondary">
                                <i class="fa fa-angle-double-left mr-2"></i>Sebelumnya
                            </button>
                            <button class="btn btn-outline-secondary">
                                Berikutnya <i class="fa fa-angle-double-right ml-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @include('widget.popular-post-article')
            </div>
        </div>
    </div>
</section>
@endsection