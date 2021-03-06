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
        <form action="{{ url('/app-admin/provinsi/' . encrypt($item->id)) }}" method="post" class="card">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="form-group">
                    <label for="nama_provinsi">NAMA PROVINSI <span class="text-danger">*</span></label>
                    <input type="text" name="nama_provinsi" value="{{ old('nama_provinsi') ? old('nama_provinsi') : $item->nama_provinsi }}" class="form-control @error('nama_provinsi') is-invalid @enderror" />

                    @error('nama_provinsi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>NEGARA</label>
                    <select name="negara_id" class="form-control select2 @error('nama') is-invalid @enderror" style="width: 100%;">
                        @foreach($negara as $val)
                            <option value="{{ $val->id }}" 
                                @if ($val->id == $item->negara_id)
                                    selected="" 
                                @endif> 
                                {{ $val->nama_negara }}
                            </option>
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
                    <i class="fas fa-edit mr-1"></i>
                    UPDATE
                </button>
            </div>
        </form>
    </div>
    <div class="col-md-8">
        <div class="border p-3">
            <h6 class="text-uppercase border-bottom font-weight-bold font-size-sm pb-2">
                <i class="fas fa-info-circle mr-2"></i>DETAIL PROVINSI
            </h6>
            <table class="table table-striped table-sm">
                <tr>
                    <td width="30%">NAMA PROVINSI</td>
                    <td width="5px">:</td>
                    <td>{{ $item->nama_provinsi }}</td>
                </tr>
                <tr>
                    <td width="30%">NEGARA</td>
                    <td width="5px">:</td>
                    <td>{{ $item->nama_negara }}</td>
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
<link rel="stylesheet" href="{{ asset('/app-admin/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('/app-admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
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
@endsection