@extends('admin.layouts.app')

@section('page-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fas fa-share-alt mr-2"></i>
                    {{__('Artikel')}}
                </h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ url('/app-admin/artikel') }}" class="btn btn-default rounded-0">
                    <i class="fas fa-table mr-1"></i> {{__('Daftar Artikel')}}
                </a>
                <a href="{{ url('/app-admin/artikel/create') }}" class="btn btn-primary rounded-0">
                    <i class="fas fa-plus-circle mr-1"></i>{{__(' Artikel Baru')}}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row py-2">
    <div class="col-md-12">
        <form action="{{ route('artikel.store') }}" method="post" class="row" enctype="multipart/form-data">
            @csrf

            <div class="col-md-9">
                <div class="form-group">
                    <label for="judul">{{__('Judul Artikel')}} <span class="text-danger">*</span> </label>
                    <input type="text" id="judul" name="judul" class="form-control form-control-lg @error('judul') is-invalid @enderror" placeholder="Masukan judul artikel disini" value="{{ old('judul') }}" required=""/>
                
                    @error('judul')
                        <span class="error invalid-feedback">{{ __($message) }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="konten">{{__('Konten')}} <span class="text-danger">*</span> </label>
                    <textarea name="konten" rows="15" class="form-control summernote">{!! old('konten') !!}</textarea>
                
                    @error('konten')
                        <span class="text-danger">{{ __($message) }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="deskripsi">{{__('Deskripsi')}} <span class="text-danger">*</span> </label>
                    <textarea id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3" name="deskripsi" placeholder="Tulis Deskripsi Artikel" required>{{ old('deskripsi') }}</textarea>
                    
                    @error('deskripsi')
                        <span class="error invalid-feedback">{{ __($message) }}</span>
                    @enderror
                    <span id="help" class="form-text text-muted">{{__('Deskripsi, berisi penjelasan singkat mengenai artikel. Disarankan Maksimal 225 Karakter')}}</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="mt-md-2">
                    <br>

                    <div class="card collapsed-card">
                        <div class="card-header p-2">
                            <h5 class="card-title">{{__('Tags')}}</h5>
                            <div class="card-tools">
                                <button id="tombolAktifTags" type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            <div class="form-group" data-select2-id="39">
                                <input type="text" id="tags" name="tags" value="{{ old('tags') }}">
                            </div>
                        </div>
                    </div>

                    <div class="card collapsed-card">
                        <div class="card-header p-2">
                            <h5 class="card-title">{{__('Image')}} <span class="text-danger">*</span> </h5>
                            <div class="card-tools">
                                <button type="button" id="tombolAktifImage" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-2">
                                <div class="card-body" id="imagePreview">
                                    <img class="img-thumbnail img-fluid image-preview__image" src="" alt="">
                                    <span class="image-preview__default-text">{{__('Image Preview')}}</span>
                                </div>
                            <div class="form-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" onChange='return validasiFile()' id="image" name="image" required>
                                  <label class="custom-file-label" for="customFile">{{__('Choose file')}}</label>
                                </div>
                              </div>
                        </div>
                    </div>

                    <div class="card collapsed-card">
                        <div class="card-header p-2">
                            <h5 class="card-title">{{__('Status')}} <span class="text-danger">*</span> </h5>
    
                            <div class="card-tools">
                                <button type="button" id="tombolAktifStatus" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            <div class="form-group">
                                <select name="status" class="form-control" id="status" required="">
                                    <option value="" selected>{{__('--Pilih Status--')}}</option>
                                    <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>{{__('Aktif')}}</option>
                                    <option value="Nonaktif" {{ old('status') == 'Nonaktif' ? 'selected' : '' }}>{{__('Nonaktif')}}</option>
                                    <option value="Draf" {{ old('status') == 'Draf' ? 'selected' : '' }}>{{__('Draf')}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-footer text-right p-2">
                    <button id="simpan-draf" type="submit" onclick="tampilkanCollapse('tombolAktifStatus', 'tombolAktifImage')" class="btn btn-default btn-sm">
                        {{__('SIMPAN KE DRAF')}}
                    </button>
                    <button id="publish" type="submit" onclick="tampilkanCollapse('tombolAktifStatus', 'tombolAktifImage')" class="btn btn-primary btn-sm">
                        <i class="fas fa-paper-plane mr-1"></i> {{__('PUBLISH')}}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>












@endsection

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('/app-admin/plugins/summernote/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('/app-admin/plugins/tagging-Input-Bootstrap-4/dist/jquery-tagsinput.min.css') }}">
@endsection

@section('script')
<script src="{{ asset('/app-admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('/app-admin/plugins/tagging-Input-Bootstrap-4/src/jquery-tagsinput.js') }}"></script>

{{-- Tags Input --}}
<script>
    $('#tags').tagsInput();
</script>

{{-- Summernote --}}
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

{{-- Tampilkan Collapse --}}
<script>
    function tampilkanCollapse(id1, id2)
    {
        let collapse1 = document.getElementById(id1);
        let collapse2 = document.getElementById(id2);

        collapse1.click();
        collapse2.click();
    }
</script>

@if (Session::get('alert'))
    <script>
        alert('file yang kamu upload bukan gambar');
    </script>
@endif

{{-- Preview Image --}}
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


{{-- Tombol di Klik --}}
<script>
    const simpanDraf = document.getElementById('simpan-draf');
    const publish = document.getElementById('publish');
    let opsiStatus = document.querySelectorAll('select option');

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
@endsection