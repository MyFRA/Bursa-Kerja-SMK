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
<div class="row">
    <div class="col-md-12">
        <form action="{{ url('/app-admin/artikel/' . encrypt($item->id)) }}" method="post" class="row" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-9">
                <div class="form-group">
                    <input type="text" value="{{old('judul') ? old('judul') : $item->judul }}" name="judul" class="form-control form-control-lg @error('judul') is-invalid @enderror" placeholder="Masukan judul artikel disini" />
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
                            <span class="font-weight-bold mr-1">{{ $item->status }}</span> 
                            <a href="" data-toggle="modal" data-target="#modal-status"><i class="fas fa-edit"></i></a>
                        </small>
                        <small class="p-0 m-0 d-block">
                            PENGUNJUNG: 
                            <span class="font-weight-bold mr-1">{{ $item->counter }}</span>
                        </small>
                        <small class="p-0 m-0 d-block">
                            PUBLISH PADA: <br />
                            <span class="font-weight-bold mr-1">
                                {{ $item->created_at->format('d M Y H:i:s') }}
                            </span> 
                            <a href=""><i class="fas fa-edit"></i>Edit</a>
                        </small>
                        <small class="p-0 m-0 d-block">
                            DIPERBARUI PADA: <br />
                            <span class="font-weight-bold mr-1">
                                {{ $item->updated_at->format('d M Y H:i:s') }}
                            </span> 
                            <a href=""><i class="fas fa-edit"></i> Edit</a>
                        </small>
                    </div>
                    <div class="card-footer text-right p-2">
                        <button type="submit" id="simpan-draf" class="btn btn-default btn-sm">
                            SIMPAN KE DRAF
                        </button>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-paper-plane mr-1"></i> UPDATE
                        </button>
                    </div>
                </div>
                <div class="card collapsed-card">
                    <div class="card-header p-2">
                        <h5 class="card-title">Tags</h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <div class="form-group" data-select2-id="39">
                          <div class="select2-purple" data-select2-id="38">
                                <input type="text" id="tags" name="tags" value="{{ $item->tags }}">
                          </div>
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
                        <div class="form-group">
                            <img class="img-fluid img-thumbnail image-preview__image" src="{{ asset('/storage/assets/artikel') }}/{{ $item->image }}" alt="">
                            <div class="custom-file">
                              <input id="inpFile" type="file" class="custom-file-input" id="customFile" name="image">
                              <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                          </div>
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
                            <select name="status" class="form-control">
                                <option value="{{ $item->status }}">{{ $item->status }}</option>
                                <option value="Aktif" style="{{ $item->status == 'Aktif' ? 'display:none' : '' }}">Aktif</option>
                                <option value="Nonaktif" style="{{ $item->status == 'Nonaktif' ? 'display:none' : '' }}">Nonaktif</option>
                                <option value="Draf" style="{{ $item->status == 'Draf' ? 'display:none' : '' }}">Draf</option>
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
                        <textarea class="form-control" rows="3" name="deskripsi" placeholder="">{{ $item->deskripsi }}</textarea>
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

<script>
    let simpanDraf = document.getElementById('simpan-draf');

    simpanDraf.addEventListener('click', function() {
        for (let i = 0; i < opsiStatus.length ; i++) {
            opsiStatus[i].setAttribute('value', 'Draf');
        }
    });
</script>
@if (Session::get('alert'))
    <script>
        alert('file yang kamu upload bukan gambar');
    </script>
@endif
@endsection