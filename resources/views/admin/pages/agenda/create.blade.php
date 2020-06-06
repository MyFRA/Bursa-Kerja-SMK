@extends('admin.layouts.app')

@section('page-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fas fa-share-alt mr-2"></i>
                    {{__('AGENDA')}}
                </h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ url('/app-admin/agenda') }}" class="btn btn-default rounded-0">
                    <i class="fas fa-table mr-1"></i> {{__('Daftar Agenda')}}
                </a>
                <a href="{{ url('/app-admin/agenda/create') }}" class="btn btn-primary rounded-0">
                    <i class="fas fa-plus-circle mr-1"></i>{{__(' Agenda Baru')}}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <form action="{{ route('agenda.store') }}" method="post" class="row" enctype="multipart/form-data">
            @csrf
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{__('Agenda')}}</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputJudul">{{__('Judul Agenda')}} <span class="text-danger">*</span> </label>
                                    <input type="text" id="inputJudul" value="{{ old('judul') }}" name="judul" onkeyup="getValue('inputJudul')" class="form-control @error('judul') is-invalid @enderror" required="">
                                
                                    @error('judul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDeskripsi">{{__('Deskripsi')}}</label>
                                    <textarea name="deskripsi" rows="15" class="form-control summernote">{!! old('deskripsi') !!}</textarea>
                                
                                    @error('deskripsi')
                                        <span class="error invalid-feedback">{{ __($message) }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputPelaksanaan">{{__('Pelaksanaan')}} <span class="text-danger">*</span> </label>
                                    <input type="text" value="{{ old('pelaksanaan') }}" id="inputPelaksanaan" name="pelaksanaan" onkeyup="getValue('inputPelaksanaan')" class="form-control @error('pelaksanaan') is-invalid @enderror" required>
                                
                                    @error('pelaksanaan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputLokasi">{{__('Lokasi')}} <span class="text-danger">*</span> </label>
                                    <input type="text" value="{{ old('lokasi') }}" id="inputLokasi" name="lokasi" onkeyup="getValue('inputLokasi')" class="form-control @error('lokasi') is-invalid @enderror" required>
                                
                                    @error('lokasi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">{{__('Status')}} <span class="text-danger">*</span> </label>
                                    <select id="select-status" name="status" class="form-control custom-select  @error('status') is-invalid @enderror" required="">
                                        <option value="" selected disabled>{{__('-- Pilih Status --')}}</option>
                                        <option value="Aktif" {{ old('status') == "Aktif" ? 'selected' : '' }}>{{__('Aktif')}}</option>
                                        <option value="Nonaktif" {{ old('status') == "Nonaktif" ? 'selected' : '' }}>{{__('Nonaktif')}}</option>
                                        <option value="Draf" {{ old('status') == "Draf" ? 'selected' : '' }}>{{__('Draf')}}</option>
                                    </select>

                                    @error('status')
                                        <span class="error invalid-feedback">{{ __($message) }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">{{__('Gambar')}} <span class="text-danger">*</span> </label>
                                    <input id="image" name="image" type="file" onChange='return validasiFile()' class="form-control-file" required>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="reset" class="btn btn-default">
                                    <i class="fas fa-undo mr-1"></i>
                                    {{__('RESET')}}
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save mr-1"></i>
                                    {{__('SIMPAN')}}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="border p-3">
                    <h6 class="text-uppercase border-bottom font-weight-bold font-size-sm pb-2">
                        <i class="fas fa-info-circle mr-2"></i>{{__('DETAIL AGENDA')}}
                    </h6>
                    <table class="table table-striped table-sm">
                        <tr>
                            <td width="30%">{{__('Judul')}}</td>
                            <td width="5px">{{__(':')}}</td>
                            <td style="overflow-x: auto;" id="inputJudul">-</td>
                        </tr>
                        <tr>
                            <td width="30%">{{__('Pelaksanaan')}}</td>
                            <td width="5px">{{__(':')}}</td>
                            <td style="overflow-x: auto;" id="inputPelaksanaan">-</td>
                        </tr>
                        <tr>
                            <td width="30%">{{__('Lokasi')}}</td>
                            <td width="5px">{{__(':')}}</td>
                            <td style="overflow-x: auto;" id="inputLokasi">-</td>
                        </tr>
                        <tr>
                            <td width="30%">{{__('Status')}}</td>
                            <td width="5px">{{__(':')}}</td>
                            <td style="overflow-x: auto;" id="statusNow">-</td>
                        </tr>
                    </table>
                </div>
                <br>
                <div class="card">
                    <div class="card-header p-2">
                        <h3 class="card-title"><b>{{__('Image Preview')}}</b></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <div class="card shadow">
                          <div class="card-body " id="imagePreview">
                            <img class="img-thumbnail img-fluid image-preview__image" src="" alt="">
                            <span class="image-preview__default-text">{{__('Image Preview')}}</span>
                          </div>
                        </div>
                    </div>
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
          ],
          placeholder: 'Deskripsi Agenda' 
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

{{-- Fungsi Validasi File Image --}}
<script>
    function validasiFile() {
        var inputFile = document.getElementById('image');
        var pathFile  = inputFile.value;

        var ekstensiOk = /(\.jpg|\.jpeg|\.png|\.gif|\.bmp|\.webp)$/i;

        if( !ekstensiOk.exec(pathFile) ) {
            alert('Silakan Upload File Yang Memiliki Ekstensi .jpeg, .jpg, .png, .bmp, . webp atau .gif');
        
            inputFile.value = '';
            return false;
        };
    }
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