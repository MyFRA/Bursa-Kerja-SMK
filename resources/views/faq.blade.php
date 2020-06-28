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
        @if ($faqs->isEmpty())

        <div class="row">
            <div class="col-12" style="cursor: pointer">
                <div class="card shadow" style="animation: tememplek 0.5s;">
                <div class="d-flex flex-column align-items-center py-5">
                    <span class="display-1 text-muted"><i class="fa fa-question-circle-o"></i></span>
                    <h2 class="quicksand font-weight-bold">{{__('Belum ada FAQ')}}</h2>
                </div>
                </div>
            </div>
        </div>

        @endif
        <div class="row">
            <div class="col-12">
                <div class="accordion ">
                @foreach ($faqs as $faq)

                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            {{ $faq->pertanyaan }}
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                {{ $faq->jawaban }}
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('/css/accordion.css') }}">
@endsection

@section('script')
<script>
    const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");

    accordionItemHeaders.forEach(accordionItemHeader => {
    accordionItemHeader.addEventListener("click", event => {

        // Uncomment in case you only want to allow for the display of only one collapsed item at a time!

        const currentlyActiveAccordionItemHeader = document.querySelector(".accordion-item-header.active");
        if(currentlyActiveAccordionItemHeader && currentlyActiveAccordionItemHeader!==accordionItemHeader) {
          currentlyActiveAccordionItemHeader.classList.toggle("active");
          currentlyActiveAccordionItemHeader.nextElementSibling.style.maxHeight = 0;
        }

        accordionItemHeader.classList.toggle("active");
        const accordionItemBody = accordionItemHeader.nextElementSibling;
        if(accordionItemHeader.classList.contains("active")) {
        accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
        }
        else {
        accordionItemBody.style.maxHeight = 0;
        }

    });
    });
</script>
@endsection
