@extends('admin.layouts.app')

@section('page-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fas fa-share-alt mr-2"></i>
                    Bidang Keahlian
                </h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ url('/app-admin/bidang-keahlian') }}" class="btn btn-default rounded-0">
                    <i class="fas fa-table mr-1"></i> Daftar Bidang Keahlian
                </a>
                <a href="{{ url('/app-admin/bidang-keahlian/create') }}" class="btn btn-primary rounded-0">
                    <i class="fas fa-plus-circle mr-1"></i> Bidang Keahlian Baru
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <form action="{{ route('bidang-keahlian.store') }}" method="post" class="card">
            @csrf

            <div class="card-body">
                <div class="form-group">
                    <label for="kode">KODE<span class="text-danger">*</span></label>
                    <input type="text" name="kode" value="{{ old('kode') }}" class="form-control @error('kode') is-invalid @enderror" / required="">

                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">NAMA BIDANG KEAHLIAN<span class="text-danger">*</span></label>
                    <input type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" / required="">

                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi">DESKRIPSI</label>
                    <textarea name="deskripsi" class="form-control" rows="5"></textarea>
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
                <i class="fas fa-info-circle mr-2"></i>DETAIL BIDANG KEAHLIAN
            </h6>
            <table class="table table-striped table-sm"></table>
        </div>
    </div>
</div>
@endsection

@section('stylesheet')
@endsection

@section('script')
@endsection