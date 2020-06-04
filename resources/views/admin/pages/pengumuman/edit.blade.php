@extends('admin.layouts.app')

@section('page-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fas fa-share-alt mr-2"></i>
                    {{__('Pengumuman')}}
                </h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ url('/app-admin/pengumuman') }}" class="btn btn-default rounded-0">
                    <i class="fas fa-table mr-1"></i> {{__('Daftar Pengumuman')}}
                </a>
                <a href="{{ url('/app-admin/pengumuman/create') }}" class="btn btn-primary rounded-0">
                    <i class="fas fa-plus-circle mr-1"></i> {{__('Pengumuman Baru')}}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ url('/app-admin/pengumuman/' . encrypt($pengumuman->id)) }}" method="post" class="row" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">{{__('Pengumuman')}}</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputJudul">{{__('Judul Pengumuman')}}</label>
                                        <input type="text" id="inputJudul" value="{{ old('judul') ? old('judul') : $pengumuman->judul }}" name="judul" onkeyup="getValue('inputJudul')" class="form-control @error('judul') is-invalid @enderror" required="">
                                    
                                        @error('judul')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDeskripsi">{{__('Deskripsi')}}</label>
                                        <textarea name="deskripsi" rows="15" class="form-control summernote">{!! old('deskripsi') ? old('deskripsi') : $pengumuman->deskripsi !!}</textarea>
                                    
                                        @error('deskripsi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Status</label>
                                        <select id="select-status" name="status" class="form-control custom-select  @error('status') is-invalid @enderror" required="">
                                            <option value="" selected="" disabled="">{{__('-- Pilih Status --')}}</option>
                                            <option value="Aktif" 
                                            @if (old('status'))
                                                {{ old('status') == 'Aktif' ? 'selected' : '' }}
                                            @else
                                                {{ $pengumuman->status == 'Aktif' ? 'selected' : '' }}
                                            @endif
                                            >{{__('Aktif')}}</option>
                                            <option value="Nonaktif" 
                                            @if (old('status'))
                                                {{ old('status') == 'Nonaktif' ? 'selected' : '' }}
                                            @else
                                                {{ $pengumuman->status == 'Nonaktif' ? 'selected' : '' }}
                                            @endif
                                            >{{__('Nonaktif')}}</option>
                                            <option value="Draf" 
                                            @if (old('status'))
                                                {{ old('status') == 'Draf' ? 'selected' : '' }}
                                            @else
                                                {{ $pengumuman->status == 'Draf' ? 'selected' : '' }}
                                            @endif
                                            >{{__('Draf')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="reset" class="btn btn-default">
                                        <i class="fas fa-undo mr-1"></i>
                                        {{__('RESET')}}
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save mr-1"></i>
                                        {{__('UPDATE')}}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border p-3">
                        <h6 class="text-uppercase border-bottom font-weight-bold font-size-sm pb-2">
                            <i class="fas fa-info-circle mr-2"></i>{{__('DETAIL PENGUMUMAN')}}
                        </h6>
                        <table class="table table-striped table-sm">
                            <tr>
                                <td width="30%">{{__('Judul')}}</td>
                                <td width="5px">{{__(':')}}</td>
                                <td style="overflow-x: auto;" id="inputJudul">-</td>
                            </tr>
                            <tr>
                                <td width="30%">{{__('Status')}}</td>
                                <td width="5px">{{__(':')}}</td>
                                <td style="overflow-x: auto;" id="statusNow">-</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
 

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('/app-admin/plugins/sweetalert2/sweetalert2.min.css') }}" />
<link rel="stylesheet" href="{{ asset('/app-admin/plugins/summernote/summernote-bs4.css') }}">
@endsection


@section('script')
<script src="{{ asset('/app-admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
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
          ]
      })
    })
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
    function getValue(id) {
        let inputForm = document.getElementById(id);
        let selector = 'table tr td#' + id;
        let td        = document.querySelector(selector);

        td.innerHTML = inputForm.value;

    }
</script>
<script>
    const inpFile = document.getElementById('image');
    const previewContainer = document.getElementById('imagePreview');
    const previewImage = previewContainer.querySelector(".image-preview__image");
    const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");

    inpFile.addEventListener("change", function() {
      const file = this.files[0];

      if (file) {
        const reader = new FileReader();

        previewDefaultText.style.display = 'none';
        previewImage.style.display = 'block';

        reader.addEventListener('load', function() {
          previewImage.setAttribute('src', this.result);
        });

        reader.readAsDataURL(file); 
      } else {
        previewDefaultText.style.display = null;
        previewImage.style.display = null;
        previewImage.setAttribute('src', '');

      }
    });
</script>
@if(Session::get('success'))
<script>
Swal.fire(
  'Berhasil',
  '{{ Session::get('success') }}',
  'success'
)
</script>
@elseif(Session::get('gagal'))
<script>
Swal.fire(
  'Oops ...',
  '{{ Session::get('gagal') }}',
  'error'
)
</script>
@endif
@endsection