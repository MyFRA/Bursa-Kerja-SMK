@extends('admin.layouts.app')

@section('page-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fas fa-share-alt mr-2"></i>
                    Artikel
                </h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ url('/app-admin/artikel') }}" class="btn btn-default rounded-0">
                    <i class="fas fa-table mr-1"></i> Daftar Artikel
                </a>
                <a href="{{ url('/app-admin/artikel/create') }}" class="btn btn-primary rounded-0">
                    <i class="fas fa-plus-circle mr-1"></i> Artikel Baru
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
                    <input type="text" id="inputJudul" onkeyup="getValue('inputJudul', 'tdJudul')" name="judul" class="form-control form-control-lg" placeholder="Masukan judul artikel disini" value="{{ old('judul') }}" required="" />
                </div>
                <div class="form-group">
                    <textarea name="konten" rows="15" class="form-control summernote">{{ @old('konten') }}</textarea>
                </div>
            </div>
            <div class="col-md-3">
                <div>
                    <div class="card collapsed-card">
                        <div class="card-header p-2">
                            <h5 class="card-title">Tags</h5>
                            <div class="card-tools">
                                <button id="tombolAktifTags" type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            <div class="form-group" data-select2-id="39">
                                <input type="text" id="tags" name="tags">
                            </div>
                        </div>
                    </div>
                    <div class="card collapsed-card">
                        <div class="card-header p-2">
                            <h5 class="card-title">Images</h5>
    
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-2">
                                <div class="card-body " id="imagePreview">
                                    <img class="img-thumbnail img-fluid image-preview__image" src="" alt="">
                                    <span class="image-preview__default-text">Image Preview</span>
                                </div>
                            <div class="form-group">
                                <!-- <label for="customFile">Custom File</label> -->
    
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="image" name="image">
                                  <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                              </div>
                        </div>
                    </div>
                    <div class="card collapsed-card">
                        <div class="card-header p-2">
                            <h5 class="card-title">Status</h5>
    
                            <div class="card-tools">
                                <button type="button" id="tombolAktifStatus" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            <div class="form-group">
                                <select name="status" class="form-control" id="select-status" required="">
                                    <option value="">--Pilih Status--</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Nonaktif">Nonaktif</option>
                                    <option value="Draf">Draf</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card collapsed-card">
                        <div class="card-header p-2">
                            <h5 class="card-title">Deskripsi</h5>
    
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            <div class="form-group">
                                <textarea id="inputDeskripsi" onkeyup="getValue('inputDeskripsi', 'tdDeskripsi')" class="form-control" rows="3" name="deskripsi" placeholder="Tulis Deskripsi ...">{{ @old('deskripsi') }}</textarea>
                          </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="border p-3">
                    <h6 class="text-uppercase border-bottom font-weight-bold font-size-sm pb-2">
                        <i class="fas fa-info-circle mr-2"></i>DETAIL ARTIKEL
                    </h6>
                    <table class="table table-striped table-sm">
                        <tr>
                            <td width="30%">Judul</td>
                            <td width="5px">:</td>
                            <td style="overflow-x: auto" id="tdJudul">{{ old('judul') ? old('judul') : '-' }}</td>
                        </tr>
                        <tr>
                            <td width="30%">Deskripsi</td>
                            <td width="5px">:</td>
                            <td style="overflow-x: auto" id="tdDeskripsi">{{ old('deskripsi') ? old('deskripsi') : '-' }}</td>
                        </tr>
                        <tr>
                            <td width="30%">Tags</td>
                            <td width="5px">:</td>
                            <td style="overflow-x: auto" id="tdTags"><a style="color: blue; cursor: pointer;" onclick="tampilkanCollapse('tombolAktifTags')"><i class="fas fa-edit"></i></a></td>
                        </tr>
                        <tr>
                            <td width="30%">Status</td>
                            <td width="5px">:</td>
                            <td style="overflow-x: auto" id="statusNow">{{ old('status') ? old('status') : '' }}  @error('status') {!! $message !!} @enderror</td>
                        </tr>
                    </table>
                </div> --}}
                <div class="card-footer text-right p-2">
                    <button id="simpan-draf" type="submit" class="btn btn-default btn-sm">
                        SIMPAN KE DRAF
                    </button>
                    <button onclick="tampilkanCollapse('tombolAktifStatus')" type="submit" class="btn btn-primary btn-sm">
                        <i class="fas fa-paper-plane mr-1"></i> PUBLISH
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
    function getValue(id, tdata) {
        let inputForm = document.getElementById(id);
        let selector = 'table tr td#' + tdata;
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
    function tampilkanCollapse(id)
    {
        let opened = document.getElementById(id);
        opened.click();
    }
</script>
@if (Session::get('alert'))
    <script>
        alert('file yang kamu upload bukan gambar');
    </script>
@endif
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
<script>
    let simpanDraf = document.getElementById('simpan-draf');
    
    simpanDraf.addEventListener('click', function() {
        for (let i = 0; i < opsiStatus.length ; i++) {
            opsiStatus[i].setAttribute('value', 'Draf');
        }
    });
</script>
@endsection