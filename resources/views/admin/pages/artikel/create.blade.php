@extends('admin.layouts.app')

@section('page-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fas fa-share-alt mr-2"></i>
                    Artikel
                </h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ url('/app-admin/artikel') }}" class="btn btn-default rounded-0">
                    <i class="fas fa-table mr-1"></i> Daftar Artikel
                </a>
                <a href="{{ url('/app-admin/artikel/create') }}" class="btn btn-primary rounded-0">
                    <i class="fas fa-plus-circle mr-1"></i> Artikel Baru
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <form action="{{ route('artikel.store') }}" method="post" class="row">
            @csrf

            <div class="col-md-9">
                <div class="form-group">
                    <input type="text"
                        name="judul"
                        class="form-control form-control-lg"
                        placeholder="Masukan judul artikel disini" />
                </div>

                <div class="form-group">
                    <textarea name="konten" rows="15" class="form-control summernote"></textarea>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header p-2">
                        <h5 class="card-title">Publikasi</h5>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <small class="p-0 m-0 d-block">
                            STATUS: 
                            <span class="font-weight-bold mr-1">Aktif</span> 
                            <a href=""><i class="fas fa-edit"></i></a>
                        </small>
                        <small class="p-0 m-0 d-block">
                            PENGUNJUNG: 
                            <span class="font-weight-bold mr-1">0</span>
                        </small>
                        <small class="p-0 m-0 d-block">
                            PUBLISH PADA: <br />
                            <span class="font-weight-bold mr-1">
                                {{ Carbon\Carbon::parse(date('Y-m-d H:i:s'))->format('d M Y H:i:s') }}
                            </span> 
                            <a href=""><i class="fas fa-edit"></i>Edit</a>
                        </small>
                        <small class="p-0 m-0 d-block">
                            DIPERBARUI PADA: <br />
                            <span class="font-weight-bold mr-1">
                                {{ Carbon\Carbon::parse(date('Y-m-d H:i:s'))->format('d M Y H:i:s') }}
                            </span> 
                            <a href=""><i class="fas fa-edit"></i> Edit</a>
                        </small>
                    </div>
                    <div class="card-footer text-right p-2">
                        <button type="button" class="btn btn-default btn-sm">
                            SIMPAN KE DRAF
                        </button>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-paper-plane mr-1"></i> PUBLISH
                        </button>
                    </div>
                </div>
                <div class="card collapsed-card">
                    <div class="card-header p-2">
                        <h5 class="card-title">Tags</h5>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        The body of the card
                    </div>
                </div>
                <div class="card collapsed-card">
                    <div class="card-header p-2">
                        <h5 class="card-title">Images</h5>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        The body of the card
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('/app-admin/plugins/summernote/summernote-bs4.css') }}">
@endsection

@section('script')
<script src="{{ asset('/app-admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
  $(function () {
    $('.summernote').summernote({
        height: 340,
    })
  })
</script>
@endsection