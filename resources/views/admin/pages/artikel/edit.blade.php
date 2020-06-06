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
<div class="row">
    <div class="col-md-12">
        <form action="{{ url('/app-admin/artikel/' . encrypt($item->id)) }}" method="post" class="row" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-9">
                <div class="form-group">
                    <label for="judul">{{__('Judul Artikel')}} <span class="text-danger">*</span> </label>
                    <input type="text" value="{{ old('judul') ? old('judul') : $item->judul }}" name="judul" class="form-control form-control-lg @error('judul') is-invalid @enderror" placeholder="Masukan judul artikel disini" required/>
                
                    @error('judul')
                        <span class="error invalid-feedback">{{ __($message) }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="konten">{{__('Konten')}} <span class="text-danger ">*</span> </label>
                    <textarea name="konten" rows="15" class="form-control summernote">{!! old('konten') ? old('konten') : $item->konten !!}</textarea>
                
                    @error('konten')
                        <span class="text-danger">{{ __($message) }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="deskripsi">{{__('Deskripsi')}} <span class="text-danger">*</span> </label>
                    <textarea id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3" name="deskripsi" placeholder="Tulis Deskripsi ..." required>{{ old('deskripsi') ? old('deskripsi') : $item->deskripsi }}</textarea>
                    
                    @error('deskripsi')
                        <span class="error invalid-feedback">{{ __($message) }}</span>
                    @enderror
                    <span id="help" class="form-text text-muted">{{__('Deskripsi, berisi penjelasan singkat mengenai artikel. Disarankan Maks 225 Karakter')}}</span>
                </div>

            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header p-2">
                        <h5 class="card-title">{{__('Publikasi')}}</h5>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <small class="p-0 m-0 d-block">
                            {{__('STATUS: ')}}
                            <span class="font-weight-bold mr-1">{{ $item->status }}</span> 
                            <a href="" onclick="tampilkanStatus()"><i class="fas fa-edit"></i></a>
                        </small>
                        <small class="p-0 m-0 d-block">
                          {{__('  PENGUNJUNG: ')}}
                            <span class="font-weight-bold mr-1">{{ $item->counter }}</span>
                        </small>
                        <small class="p-0 m-0 d-block">
                            {{__('PUBLISH PADA:')}} <br />
                            <span class="font-weight-bold mr-1">
                                {{ $item->created_at->format('d M Y H:i:s') }}
                            </span> 
                        </small>
                        <small class="p-0 m-0 d-block">
                            {{__('DIPERBARUI PADA: ')}}<br />
                            <span class="font-weight-bold mr-1">
                                {{ $item->updated_at->format('d M Y H:i:s') }}
                            </span> 
                        </small>
                    </div>
                    <div class="card-footer text-right p-2">
                        <button type="submit" id="simpan-draf" class="btn btn-default btn-sm">
                            {{__('SIMPAN KE DRAF')}}
                        </button>
                        <button type="submit" id="publish" class="btn btn-primary btn-sm">
                            <i class="fas fa-paper-plane mr-1"></i>{{__('UPDATE')}}
                        </button>
                    </div>
                </div>
                <div class="card collapsed-card">
                    <div class="card-header p-2">
                        <h5 class="card-title">{{__('Tags')}}</h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <div class="form-group" data-select2-id="39">
                          <div class="select2-purple" data-select2-id="38">
                                <input type="text" id="tags" name="tags" value="{{ old('tags') ? old('tags') : $item->tags }}">
                          </div>
                        </div>
                    </div>
                </div>
                <div class="card collapsed-card">
                    <div class="card-header p-2">
                        <h5 class="card-title">{{__('Images')}}</h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <div class="form-group">
                            <img class="img-fluid img-thumbnail image-preview__image" src="{{ asset('/storage/assets/artikel') }}/{{ $item->image }}" alt="">
                            <div class="custom-file">
                              <input id="inpFile" onChange='return validasiFile()' type="file" class="custom-file-input" name="image">
                              <label class="custom-file-label" for="customFile">{{__('Choose file')}}</label>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="card collapsed-card">
                    <div class="card-header p-2">
                        <h5 class="card-title">{{__('Status')}}</h5>
                        <div class="card-tools">
                            <button type="button" id="button-status" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <div class="form-group">
                            <select name="status" class="form-control" required>
                                <option value="Aktif" 
                                @if (old('status'))
                                    {{ old('status') == 'Aktif' ? 'selected' : '' }}
                                @else
                                    {{ $item->status == 'Aktif' ? 'selected' : '' }}
                                @endif
                                >{{__('Aktif')}}</option>
                                <option value="Nonaktif" 
                                @if (old('status'))
                                    {{ old('status') == 'Nonaktif' ? 'selected' : '' }}
                                @else
                                    {{ $item->status == 'Nonaktif' ? 'selected' : '' }}
                                @endif
                                >{{__('Nonaktif')}}</option>
                                <option value="Draf" 
                                @if (old('status'))
                                    {{ old('status') == 'Draf' ? 'selected' : '' }}
                                @else
                                    {{ $item->status == 'Draf' ? 'selected' : '' }}
                                @endif
                                >{{__('Draf')}}</option>
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
<link rel="stylesheet" href="{{ asset('/app-admin/plugins/tagging-Input-Bootstrap-4/dist/jquery-tagsinput.min.css') }}">

@endsection

@section('script')
<script src="{{ asset('/app-admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('/app-admin/plugins/tagging-Input-Bootstrap-4/src/jquery-tagsinput.js') }}"></script>

<script>
    $('#tags').tagsInput();
</script>

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
    inpFile.addEventListener("change", function() {
      const previewImage = document.querySelector(".image-preview__image");
      const file = this.files[0];

      if (file) {
        const reader = new FileReader();

        reader.addEventListener('load', function() {
          previewImage.setAttribute('src', this.result);
        });

        reader.readAsDataURL(file); 
      } 
    });
</script>

@if (Session::get('alert'))
    <script>
        alert('file yang kamu upload bukan gambar');
    </script>
@endif


<script>
    // Fungsi Validasi File Photo
    function validasiFile() {
        var inputFile = document.getElementById('inpFile');
        var pathFile  = inputFile.value;

        var ekstensiOk = /(\.jpg|\.jpeg|\.png|\.gif|\.bmp|\.webp)$/i;

        if( !ekstensiOk.exec(pathFile) ) {
            alert('Silakan Upload File Yang Memiliki Ekstensi .jpeg, .jpg, .png, .bmp, . webp atau .gif');
        
            inputFile.value = '';
            return false;
        };
    }
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
@endsection