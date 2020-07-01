@extends('layouts.app')

@section('content')
<section class="pages pb-md-3 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-n3 d-flex justify-content-between align-items-center">
                <h3 class="page-title"><i class="fa fa-address-card-o mr-3"></i>{{__('Bantuan Siswa')}}</h3>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="">{{__('Bantuan Siswa')}}</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-body">
                        <a href="{{ url()->previous() }}" class="h5"><i class="fa fa-arrow-left fa-0x mr-2"></i>Kembali</a>
                    </div>
                    <hr class="mt-0">
                    <div class="card-body pt-2 pb-5">
                        <div class="container">
                            <div class="row">
                                <h1 class="mx-auto py-3">Bantuan Siswa</h1>
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus similique suscipit aliquid quisquam nemo provident ea ratione voluptatum, et, molestiae pariatur dignissimos dolorem ducimus dolorum qui sunt saepe sed laborum!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

