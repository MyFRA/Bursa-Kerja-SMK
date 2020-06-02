@extends('layouts.app')

@section('content')
<section class="pages py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="page-title"><i class="fa fa-question-circle mr-3"></i>{{__('Tanya Jawab')}}</h3>
    
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('FAQ')}}</li>
                </ol>
                <div class="d-block mt-3 mb-2">
                    <a href="{{ url()->previous() }}"><i class="fa fa-arrow-left mr-2"></i>{{__('Kembali')}}</a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($faqs as $faq)
            <div class="col-12 mt-2" style="cursor: pointer">
                <div class="card">
                    <div data-target="#faq-{{ $faq->id }}"
                        aria-controls="faq-{{ $faq->id }}"
                        data-toggle="collapse"
                        role="button" aria-expanded="false"
                        class="card-header bg-white p-2 px-4"
                    >
                        <span class="fa fa-chevron-circle-right mr-3 text-primary"></span>
                        {{ __($faq->pertanyaan) }}
                    </div>
                    <div id="faq-{{ $faq->id }}" class="card-body bg-snow collapse">
                        {{ __($faq->jawaban) }}
                    </div>
                </div>
            </div>       
            @endforeach
        </div>
    </div>
</section>
@endsection