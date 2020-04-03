@extends('admin.layouts.app')

@section('page-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fas fa-share-alt mr-2"></i>
                    faq
                </h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ url('/app-admin/faq') }}" class="btn btn-default rounded-0">
                    <i class="fas fa-table mr-1"></i> Daftar faq
                </a>
                <a href="{{ url('/app-admin/faq/create') }}" class="btn btn-primary rounded-0">
                    <i class="fas fa-plus-circle mr-1"></i> faq Baru
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <form action="{{ route('faq.store') }}" method="post" class="card">
            @csrf

            <div class="card-body">
                <div class="form-group">
                    <label for="pertanyaan">PERTANYAAN<span class="text-danger">*</span></label>
                    <input type="text" name="pertanyaan" value="{{ old('pertanyaan') }}" class="form-control @error('pertanyaan') is-invalid @enderror" / required="">

                    @error('pertanyaan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jawaban">Jawaban</label>
                    <textarea name="jawaban" class="form-control" rows="5">{{ old('jawaban') }}</textarea>
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
                <i class="fas fa-info-circle mr-2"></i>DETAIL faq
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