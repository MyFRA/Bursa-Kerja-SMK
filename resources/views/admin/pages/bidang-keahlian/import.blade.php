@extends('admin.layouts.app')

@section('page-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fas fa-share-alt mr-2"></i>
                    {{__('Bidang Keahlian')}}
                </h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ url('/app-admin/bidang-keahlian') }}" class="btn btn-default rounded-0">
                    <i class="fas fa-table mr-1"></i> {{__('Daftar Bidang Keahlian')}}
                </a>
                <a href="{{ url('/app-admin/bidang-keahlian/create') }}" class="btn btn-primary rounded-0">
                    <i class="fas fa-plus-circle mr-1"></i> {{__('Bidang Keahlian Baru')}}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <form action="{{ route('bidang-keahlian.imported') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="border p-2">
                <h5 class="border-bottom pb-2 mb-2">
                    {{__('IMPORT DATA BIDANG KEAHLIAN')}}
                </h5>
                <p>{{__('Impor data bidang keahlian dari berkas Excel. Silahkan ')}}<a href="{{ url('/app-admin/bidang-keahlian/format-excel-import') }}">{{__('download panduan format file excel')}}</a>.</p>

                <div class="form-group col-6 px-0">
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">{{__('Pilih File Import')}}</label>
                        </div>
                    </div>
                </div>
                <div class="form-group col-6 px-0 text-right">
                    <button class="btn btn-primary">
                        <i class="fas fa-upload mr-1"></i>{{__(' UPLOAD')}}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('stylesheet')
@endsection

@section('script')
@endsection