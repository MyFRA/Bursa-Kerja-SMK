@extends('layouts.app')

@section('content')
<section class="pages py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="page-title"><i class="fa fa-question-circle mr-3"></i>Tanya Jawab</h3>
    
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">FAQ</li>
                </ol>
                <div class="d-block mt-3 mb-2">
                    <a href="{{ url()->previous() }}"><i class="fa fa-arrow-left mr-2"></i>Kembali</a>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <div class="card">
                    <div data-target="#faq-1"
                        aria-controls="faq-1"
                        data-toggle="collapse"
                        role="button" aria-expanded="false"
                        class="card-header bg-white p-2 px-4"
                    >
                        <span class="fa fa-chevron-circle-right mr-3"></span>
                        Apa itu Bursa Kerja SMK?
                    </div>
                    <div id="faq-1" class="card-body bg-snow collapse">
                        Ini merupakan jawaban dari pertanyaan diatas. Kami harap Anda memahaminya untuk dipahami.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection