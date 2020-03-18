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
                    <input type="text" name="judul" class="form-control form-control-lg @error('judul') is-invalid @enderror" placeholder="Masukan judul halaman disini" value="{{ old('judul') ? old('judul') : $item->judul }}" required="" />
                    
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
                            <span class="font-weight-bold mr-1" id="statusNow">{{ $item->status }}</span> 
                            <i id="edit-status" class="fas fa-edit"></i>
                        </small>
                        <small class="p-0 m-0 d-block">
                            PENGUNJUNG: 
                            <span class="font-weight-bold mr-1">0</span>
                        </small>
                        <small class="p-0 m-0 d-block">
                            PUBLISH PADA: <br />
                            <span class="font-weight-bold mr-1">
                                {{ $item->created_at->format('d M Y H:i:s') }}
                            </span> 
                            {{-- <a href=""><i class="fas fa-edit"></i>Edit</a> --}}
                        </small>
                        <small class="p-0 m-0 d-block">
                            DIPERBARUI PADA: <br />
                            <span class="font-weight-bold mr-1">
                                {{ $item->updated_at->format('d M Y H:i:s') }}
                            </span> 
                            {{-- <a href=""><i class="fas fa-edit"></i> Edit</a> --}}
                        </small>
                    </div>
                    <div class="card-footer text-right p-2">
                        <button id="simpan-draf" type="submit" class="btn btn-default btn-sm">
                            SIMPAN KE DRAF
                        </button>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-paper-plane mr-1"></i> UPDATE
                        </button>
                    </div>
                </div>
                <div class="card collapsed-card">
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
                            <select id="select-status" name="status" class="form-control">
                                <option value="Aktif">Aktif</option>
                                <option value="Nonaktif">Nonaktif</option>
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
    let tombolPlusStatus = document.querySelector('.collapsed-card .card-header .card-tools button');
    let iEditStatusPublikasi = document.getElementById('edit-status');
    let selectStatus = document.getElementById('select-status');
    let opsiStatus = document.getElementsByTagName('option');
    let statusNow = document.getElementById('statusNow');
    let simpanDraf = document.getElementById('simpan-draf');

    iEditStatusPublikasi.style.color = 'blue';
    iEditStatusPublikasi.style.cursor = 'pointer';

    iEditStatusPublikasi.addEventListener('click', function() {
        tombolPlusStatus.click();
    });

    simpanDraf.addEventListener('click', function() {
        for (let i = 0; i < opsiStatus.length ; i++) {
            opsiStatus[i].setAttribute('value', 'Draf');
        }
    });

    selectStatus.addEventListener('change', function() {
        for (let i = 0; i < opsiStatus.length ; i++) {
            let dipilih = opsiStatus[i];
            if( dipilih.selected === true ) {
                statusNow.innerHTML = opsiStatus[i].value;
            }
        }
    })
</script>
@endsection