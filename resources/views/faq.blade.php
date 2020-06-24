@extends('layouts.app')

@section('content')
<section class="pages py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-n3 mb-3 d-flex justify-content-between align-items-center">
                <h3 class="page-title"><i class="fa fa-question-circle mr-3"></i>{{__('Tanya Jawab')}}</h3>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('FAQ')}}</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="cursor: pointer">
                <div class="card shadow">
            @if ($faqs->isEmpty())
            <div class="d-flex flex-column align-items-center py-5">
                <span class="display-1 text-muted"><i class="fa fa-question-circle-o"></i></span>
                <h2 class="quicksand font-weight-bold">{{__('Belum ada FAQ')}}</h2>
            </div>
            @else
                @foreach ($faqs as $faq)

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

                @endforeach
            @endif
        </div>
    </div>
</section>
@endsection
