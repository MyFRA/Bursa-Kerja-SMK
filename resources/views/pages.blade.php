@extends('layouts.app')

@section('content')
<section class="pages py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="page-title"><i class="fa fa-shield mr-3"></i>Kebijakan Privasi</h3>
    
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Kebijakan Privasi</li>
                </ol>
                <div class="d-block mt-3 mb-2">
                    <a href="{{ url()->previous() }}"><i class="fa fa-arrow-left mr-2"></i>Kembali</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card rounded-0">
                    <div class="card-body">
                        @include('dummy.kebijakan-privasi')
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                @include('widget.navigation-list-page')
            </div>
        </div>
    </div>
</section>
@endsection