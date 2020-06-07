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
    <div class="col-md-4">
        <form action="{{ url('/app-admin/bidang-keahlian/' . encrypt($item->id)) }}" method="post" class="card">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="form-group">
                    <label for="kode">{{__('KODE')}}<span class="text-danger">*</span></label>
                    <input type="text" name="kode" value="{{ old('kode') ? old('kode') : $item->kode }}" class="form-control @error('kode') is-invalid @enderror" required=""/>

                    @error('kode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">{{__('NAMA BIDANG KEAHLIAN')}}<span class="text-danger">*</span></label>
                    <input type="text" name="nama" value="{{ old('nama') ? old('nama') : $item->nama }}" class="form-control @error('nama') is-invalid @enderror" required />

                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi">{{__('DESKRIPSI')}}</label>
                    <textarea name="deskripsi" class="form-control" rows="5">{{ old('deskripsi') ? old('deskripsi') : $item->deskripsi }}</textarea>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="reset" class="btn btn-default">
                    <i class="fas fa-undo mr-1"></i>
                    {{__('RESET')}}
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-edit mr-1"></i>
                    {{__('UPDATE')}}
                </button>
            </div>
        </form>
    </div>
    <div class="col-md-8">
        <div class="border p-3">
            <h6 class="text-uppercase border-bottom font-weight-bold font-size-sm pb-2">
                <i class="fas fa-info-circle mr-2"></i>{{__('DETAIL BIDANG KEAHLIAN')}}
            </h6>
            <table class="table table-striped table-sm">
                <tr>
                    <td width="30%">{{__('KODE')}}</td>
                    <td width="5px">:</td>
                    <td>{{ $item->kode }}</td>
                </tr>
                <tr>
                    <td width="30%">{{__('NAMA BIDANG KEAHLIAN')}}</td>
                    <td width="5px">:</td>
                    <td>{{ $item->nama }}</td>
                </tr>
                <tr>
                    <td width="30%">{{__('DESKRIPSI')}}</td>
                    <td width="5px">:</td>
                    <td>{{ $item->deskripsi ? $item->deskripsi : '-' }}</td>
                </tr>
                <tr>
                    <td width="30%">{{__('DIPERBARUI PADA')}}</td>
                    <td width="5px">:</td>
                    <td>{{ Carbon\Carbon::parse($item->updated_at)->format("d M Y H:i:s") }}</td>
                </tr>
                <tr>
                    <td width="30%">{{__('DITAMBAHKAN PADA')}}</td>
                    <td width="5px">:</td>
                    <td>{{ Carbon\Carbon::parse($item->created_at)->format("d M Y H:i:s") }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection

@section('stylesheet')
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