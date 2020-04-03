@extends('admin.layouts.app')

@section('page-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fas fa-share-alt mr-2"></i>
                    Provinsi
                </h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ url('/app-admin/provinsi') }}" class="btn btn-default rounded-0">
                    <i class="fas fa-table mr-1"></i> Daftar Provinsi
                </a>
                <a href="{{ url('/app-admin/provinsi/create') }}" class="btn btn-primary rounded-0">
                    <i class="fas fa-plus-circle mr-1"></i> Provinsi Baru
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <form action="{{ route('provinsi.store') }}" method="post" class="card">
            @csrf

            <div class="card-body">
                <div class="form-group">
                    <label for="nama_provinsi">NAMA PROVINSI <span class="text-danger">*</span></label>
                    <input type="text" name="nama_provinsi" value="{{ old('nama_provinsi') }}" class="form-control @error('nama_provinsi') is-invalid @enderror" />

                    @error('nama_provinsi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>NEGARA <span class="text-danger">*</span></label>
                    <select name="negara_id" class="form-control select2 @error('negara_id') is-invalid @enderror" style="width: 100%;">
                        <option></option>
                        @foreach($id_negara as $negara)
                            <option value="{{ $negara->id }}" {{ old('negara_id') ? 'selected' : '' }}>{{ $negara->nama_negara }}</option>
                        @endforeach
                    </select>

                    @error('negara_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="reset" class="btn btn-default">
                    <i class="fas fa-undo mr-1"></i>
                    RESET
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save mr-1"></i>
                    SIMPAN
                </button>
            </div>
        </form>
    </div>
    <div class="col-md-8">
        <div class="border p-3">
            <h6 class="text-uppercase border-bottom font-weight-bold font-size-sm pb-2">
                <i class="fas fa-info-circle mr-2"></i>DETAIL PROVINSI
            </h6>
            <table class="table table-striped table-sm"></table>
        </div>
    </div>
</div>
@endsection

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('/app-admin/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('/app-admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('script')
<script src="{{ asset('/app-admin/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $(function () {
        $('.select2').select2({
            theme: 'bootstrap4'
        })
    });
</script>
@endsection