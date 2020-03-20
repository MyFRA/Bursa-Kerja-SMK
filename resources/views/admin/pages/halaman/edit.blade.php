@extends('admin.layouts.app')

@section('page-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fas fa-share-alt mr-2"></i>
                    HALAMAN
                </h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ url('/app-admin/halaman') }}" class="btn btn-default rounded-0">
                    <i class="fas fa-table mr-1"></i> Daftar Halaman
                </a>
                <a href="{{ url('/app-admin/halaman/create') }}" class="btn btn-primary rounded-0">
                    <i class="fas fa-plus-circle mr-1"></i> Halaman Baru
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <form action="{{ url('/app-admin/halaman/' . encrypt($item->id)) }}" method="post" class="row" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-9">
                <div class="form-group">
                    <input type="text" id="inputJudul" onkeyup="getValue('inputJudul')" name="judul" class="form-control form-control-lg @error('judul') is-invalid @enderror" placeholder="Masukan judul halaman disini" value="{{ old('judul') ? old('judul') : $item->judul }}" required="" />
                    
                    @error('judul')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea name="konten" rows="15" class="form-control summernote">{{ $item->konten }}</textarea>
                </div>

            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header p-2">
                        <h5 class="card-title">Detail Halaman</h5>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <table class="table table-striped table-sm">
                        <tr>
                            <td width="30%">Judul</td>
                            <td width="5px">:</td>
                            <td style="word-break: break-all;" id="inputJudul">{{ $item->judul }}</td>
                        </tr>
                        <tr>
                            <td width="30%">Status</td>
                            <td width="5px">:</td>
                            <td style="word-break: break-all;" id="statusNow">{{ $item->status }}</td>
                        </tr>
                    </table>
                    </div>
                    <div class="card-footer text-right p-2">
                        <button id="simpan-draf" type="submit" class="btn btn-default btn-sm">
                            SIMPAN KE DRAF
                        </button>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-paper-plane mr-1"></i> PUBLISH
                        </button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header p-2">
                        <h5 class="card-title">Status</h5>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <div class="form-group">
                            <select id="select-status" name="status" id="select-status" required="" class="form-control">
                                <option value="{{ $item->status }}">{{ $item->status }}</option>
                                <option value="Aktif" style="{{ $item->status == 'Aktif' ? 'display: none' : '' }}">Aktif</option>
                                <option value="Nonaktif" style="{{ $item->status == 'Nonaktif' ? 'display: none' : '' }}">Nonaktif</option>
                                <option value="Draf" style="{{ $item->status == 'Draf' ? 'display: none' : '' }}">Draf</option>
                            </select>
                        </div>
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

<script>
    function getValue(id) {
        let inputForm = document.getElementById(id);
        let selector = 'table tr td#' + id;
        let td        = document.querySelector(selector);

        td.innerHTML = inputForm.value;
    }
</script>

<script>
    let selectStatus = document.getElementById('select-status');
    let opsiStatus = document.getElementsByTagName('option');
    let statusNow = document.getElementById('statusNow');

    selectStatus.addEventListener('change', function() {
        for (let i = 0; i < opsiStatus.length ; i++) {
            let dipilih = opsiStatus[i];
            if( dipilih.selected === true ) {
                statusNow.innerHTML = opsiStatus[i].value;
            }
        }
    })
</script>

<script>
    let simpanDraf = document.getElementById('simpan-draf');

    simpanDraf.addEventListener('click', function() {
        for (let i = 0; i < opsiStatus.length ; i++) {
            opsiStatus[i].setAttribute('value', 'Draf');
        }
    });
</script>
@endsection