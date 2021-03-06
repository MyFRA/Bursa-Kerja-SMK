@extends('admin.layouts.app')

@section('page-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fas fa-share-alt mr-2"></i>
                    Pengaturan
                </h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ url('/app-admin/pengaturan') }}" class="btn btn-default rounded-0">
                    <i class="fas fa-table mr-1"></i> Daftar Pengaturan
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <form action="{{ url('/app-admin/pengaturan/' . encrypt($item->id)) }}" method="post" class="card">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="form-group">
                    <label for="nama">KODE <span class="text-danger">*</span></label>
                    <input disabled="" type="text" name="kode" value="{{ $item->kode }}" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="nama">NAMA<span class="text-danger">*</span></label>
                    <input disabled=""  type="text" name="nama" value="{{ $item->nama }}" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="konten">KONTEN</label>
                    <textarea name="konten" class="form-control" rows="5">{{ $item->konten }}</textarea>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="reset" class="btn btn-default">
                    <i class="fas fa-undo mr-1"></i>
                    RESET
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-edit mr-1"></i>
                    UPDATE
                </button>
            </div>
        </form>
    </div>
    <div class="col-md-8">
        <div class="border p-3">
            <h6 class="text-uppercase border-bottom font-weight-bold font-size-sm pb-2">
                <i class="fas fa-info-circle mr-2"></i>DETAIL PENGATURAN
            </h6>
            <table class="table table-striped table-sm">
                <tr>
                    <td width="30%">KODE</td>
                    <td width="5px">:</td>
                    <td>{{ $item->kode }}</td>
                </tr>
                <tr>
                    <td width="30%">NAMA</td>
                    <td width="5px">:</td>
                    <td>{{ $item->nama }}</td>
                </tr>
                <tr>
                    <td width="30%">KONTEN</td>
                    <td width="5px">:</td>
                    <td>{{ $item->konten ? $item->konten : '-' }}</td>
                </tr>
                <tr>
                    <td width="30%">DIPERBARUI PADA</td>
                    <td width="5px">:</td>
                    <td>{{ Carbon\Carbon::parse($item->updated_at)->format("d M Y H:i:s") }}</td>
                </tr>
                <tr>
                    <td width="30%">DITAMBAHKAN PADA</td>
                    <td width="5px">:</td>
                    <td>{{ Carbon\Carbon::parse($item->created_at)->format("d M Y H:i:s") }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('/app-admin/plugins/summernote/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('/app-admin/plugins/sweetalert2/sweetalert2.min.css') }}" />
@endsection

@section('script')
<script src="{{ asset('/app-admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

@if(Session::get('success'))
<script>
Swal.fire(
  'Berhasil',
  '{{ Session::get('success') }}',
  'success'
)
</script>
@endif
<script src="{{ asset('/app-admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
  $(function () {
    $('.summernote').summernote({
        height: 340,
    })
  })
</script>
@endsection