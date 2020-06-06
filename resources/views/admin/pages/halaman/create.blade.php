@extends('admin.layouts.app')

@section('page-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fas fa-share-alt mr-2"></i>
                    {{__('HALAMAN')}}
                </h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ url('/app-admin/halaman') }}" class="btn btn-default rounded-0">
                    <i class="fas fa-table mr-1"></i> {{__('Daftar Halaman')}}
                </a>
                <a href="{{ url('/app-admin/halaman/create') }}" class="btn btn-primary rounded-0">
                    <i class="fas fa-plus-circle mr-1"></i> {{__('Halaman Baru')}}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <form action="{{ route('halaman.store') }}" method="post" class="row" enctype="multipart/form-data">
            @csrf

            <div class="col-md-9">
                <div class="form-group">
                    <input type="text" name="judul" id="inputJudul" onkeyup="getValue('inputJudul')" class="form-control form-control-lg @error('judul') is-invalid @enderror" placeholder="Masukan judul halaman disini" value="{{ old('judul') }}" required="" />
                    
                    @error('judul')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea name="konten" rows="15" class="form-control summernote">{{ old('konten') }}</textarea>
                
                    @error('konten')
                        <span class="text-danger">{{ __($message) }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header p-2">
                        <h5 class="card-title">{{__('Detail Halaman')}}</h5>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <table class="table table-striped table-sm">
                        <tr>
                            <td width="30%">{{__('Judul')}}</td>
                            <td width="5px">{{__(':')}}</td>
                            <td style="overflow-x: auto" id="inputJudul">-</td>
                        </tr>
                        <tr>
                            <td width="30%">{{__('Status')}}</td>
                            <td width="5px">{{__(':')}}</td>
                            <td style="overflow-x: auto" id="statusNow">-</td>
                        </tr>
                    </table>
                    </div>
                    <div class="card-footer text-right p-2">
                        <button id="simpan-draf" type="submit" class="btn btn-default btn-sm">
                            {{__('SIMPAN KE DRAF')}}
                        </button>
                        <button id="publish" type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-paper-plane mr-1"></i>{{__(' PUBLISH')}}
                        </button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header p-2">
                        <h5 class="card-title">{{__('Status')}}</h5>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <div class="form-group">
                            <select id="select-status" name="status" id="select-status" required="" class="form-control">
                                <option value="">{{__('--Pilih Status--')}}</option>
                                <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>{{__('Aktif')}}</option>
                                <option value="Nonaktif" {{ old('status') == 'Nonaktif' ? 'selected' : '' }}>{{__('Nonaktif')}}</option>
                                <option value="Draf" {{ old('status') == 'Draf' ? 'selected' : '' }}>{{__('Draf')}}</option>
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
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],         
            ['color', ['color']], 
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link']],
            ['view', ['fullscreen', 'codeview', 'help']]                 
        ],
        placeholder: 'Tulis Isi Halaman...'
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
    let statusNow = document.getElementById('statusNow');
    let opsiStatus = document.querySelectorAll('select option');

    selectStatus.addEventListener('change', function() {
        for (let i = 0; i < opsiStatus.length ; i++) {
            let dipilih = opsiStatus[i];
            if( dipilih.selected === true ) {
                statusNow.innerHTML = opsiStatus[i].text;
            }
        }
    })


    // Tombol di klik
    const simpanDraf = document.getElementById('simpan-draf');
    const publish = document.getElementById('publish');

    simpanDraf.addEventListener('click', function() {
        opsiStatus.forEach((e) => {
            e.value = 'Draf';
            if( e.text == 'Draf') {
                e.setAttribute('selected', '');
            }
        });
    });

    publish.addEventListener('click', function() {
        opsiStatus.forEach((e) => {
            if(e.text == '--Pilih Status--') {
                e.value = '';
            } else {
                e.value = e.text;
            }
        });
    });

</script>
@endsection