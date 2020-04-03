@extends('admin.layouts.app')

@section('page-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fas fa-share-alt mr-2"></i>
                    Kompetensi Keahlian
                </h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ url('/app-admin/kompetensi-keahlian') }}" class="btn btn-default rounded-0">
                    <i class="fas fa-table mr-1"></i> Daftar
                </a>
                <a href="{{ url('/app-admin/kompetensi-keahlian/create') }}" class="btn btn-primary rounded-0">
                    <i class="fas fa-plus-circle mr-1"></i> Baru
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <form action="{{ route('kompetensi-keahlian.store') }}" method="post" class="card">
            @csrf

            <div class="card-body">
                <div class="form-group">
                    <label for="kode">KODE <span class="text-danger">*</span></label>
                    <input required="" type="text" name="kode" value="{{ old('kode') }}" class="form-control @error('kode') is-invalid @enderror" />

                    @error('kode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">KOMPETENSI KEAHLIAN <span class="text-danger">*</span></label>
                    <input required="" type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" />

                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="program_keahlian_id">PROGRAM KEAHLIAN <span class="text-danger">*</span></label>
                    <select required="" name="program_keahlian_id" class="form-control select2 @error('program_keahlian_id') is-invalid @enderror" style="width: 100%;">
                        <option></option>
                        @foreach($programs as $val)
                            <option value="{{ $val->id }}" {{ old('program_keahlian_id') == $val->id ? 'selected' : '' }}>{{ $val->nama }}</option>
                        @endforeach
                    </select>

                    @error('program_keahlian_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi">DESKRIPSI</label>
                    <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi') }}</textarea>
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
                <i class="fas fa-info-circle mr-2"></i>DETAIL KOMPETENSI KEAHLIAN
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