@extends('admin.layouts.app')

@section('page-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fas fa-share-alt mr-2"></i>
                    AGENDA
                </h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ url('/app-admin/agenda') }}" class="btn btn-default rounded-0">
                    <i class="fas fa-table mr-1"></i> Daftar Agenda
                </a>
                <a href="{{ url('/app-admin/agenda/create') }}" class="btn btn-primary rounded-0">
                    <i class="fas fa-plus-circle mr-1"></i> Agenda Baru
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
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Agenda</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputJudul">Judul Agenda</label>
                                    <input type="text" id="inputJudul" name="judul" onkeyup="getValue('inputJudul')" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="inputDeskripsi">Deskripsi</label>
                                    <textarea id="inputDeskripsi" name="deskripsi" onkeyup="getValue('inputDeskripsi')" class="form-control" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputPelaksanaan">Pelaksanaan</label>
                                    <input type="text" id="inputPelaksanaan" name="pelaksanaan" onkeyup="getValue('inputPelaksanaan')" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputLokasi">Lokasi</label>
                                    <input type="text" id="inputLokasi" name="lokasi" onkeyup="getValue('inputLokasi')" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">Status</label>
                                    <select id="select-status" name="status" class="form-control custom-select" required="">
                                        <option value="" selected="" disabled="">-- Pilih Status --</option>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Nonaktif">Nonaktif</option>
                                        <option value="Draf">Draf</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="image">Gambar</label>
                                    <input id="image" name="image" type="file" class="form-control-file" >
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="reset" class="btn btn-default">
                                    <i class="fas fa-undo mr-1"></i>
                                    RESET
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save mr-1"></i>
                                    SIMPAN
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="border p-3">
                    <h6 class="text-uppercase border-bottom font-weight-bold font-size-sm pb-2">
                        <i class="fas fa-info-circle mr-2"></i>DETAIL AGENDA
                    </h6>
                    <table class="table table-striped table-sm">
                        <tr>
                            <td width="30%">Judul</td>
                            <td width="5px">:</td>
                            <td style="overflow-x: auto;" id="inputJudul">-</td>
                        </tr>
                        <tr>
                            <td width="30%">Deskripsi</td>
                            <td width="5px">:</td>
                            <td style="overflow-x: auto;" id="inputDeskripsi">-</td>
                        </tr>
                        <tr>
                            <td width="30%">Pelaksanaan</td>
                            <td width="5px">:</td>
                            <td style="overflow-x: auto;" id="inputPelaksanaan">-</td>
                        </tr>
                        <tr>
                            <td width="30%">Lokasi</td>
                            <td width="5px">:</td>
                            <td style="overflow-x: auto;" id="inputLokasi">-</td>
                        </tr>
                        <tr>
                            <td width="30%">Status</td>
                            <td width="5px">:</td>
                            <td style="overflow-x: auto;" id="statusNow">-</td>
                        </tr>
                    </table>
                </div>
                <br>
                <div class="card">
                    <div class="card-header p-2">
                        <h3 class="card-title"><b>Image Preview</b></h3>
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
                            <span class="image-preview__default-text">Image Preview</span>
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
@endsection