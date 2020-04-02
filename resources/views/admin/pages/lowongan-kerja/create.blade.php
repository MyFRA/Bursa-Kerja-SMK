@extends('admin.layouts.app')

@section('page-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fas fa-share-alt mr-2"></i>
                    Perusahaan
                </h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ url('/app-admin/lowongan-kerja') }}" class="btn btn-default rounded-0">
                    <i class="fas fa-table mr-1"></i> Daftar Perusahaan
                </a>
                <a href="{{ url('/app-admin/lowongan-kerja/create') }}" class="btn btn-primary rounded-0">
                    <i class="fas fa-plus-circle mr-1"></i> Perusahaan Baru
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-5">
        <form action="{{ route('lowongan-kerja.store') }}" method="post" class="card" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="perusahaan_id">Perusahaan<span class="text-danger">*</span></label>
                    <select name="perusahaan_id" id="" class="form-control custom-select" required="">
                        <option value="" disabled="" selected="">-- Pilih Perusahaan --</option>
                        @foreach ($perusahaan as $perusahaanPerOne)
                            <option value="{{ $perusahaanPerOne->id }}">{{ $perusahaanPerOne->nama }}</option>
                        @endforeach
                    </select>
                    @error('perusahaan_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_perusahaan">Nama Perusahaan<span class="text-danger">*</span></label>
                    <input required="" type="text" name="nama_perusahaan" value="{{ old('nama_perusahaan') }}" class="form-control @error('nama_perusahaan') is-invalid @enderror" / >

                    @error('nama_perusahaan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gambaran_perusahaan">Gambaran Perusahaan</label>
                    <textarea id="gambaran_perusahaan" name="gambaran_perusahaan" class="form-control @error('gambaran_perusahaan') is-invalid @enderror" rows="4">{{ old('gambaran_perusahaan') }}</textarea>
                
                    @error('gambaran_perusahaan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" name="jabatan" value="{{ old('jabatan') }}" class="form-control @error('jabatan') is-invalid @enderror" / >

                    @error('jabatan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kompetensi_keahlian">Kompetensi Keahlian</label>
                    <input type="text" name="kompetensi_keahlian" value="{{ old('kompetensi_keahlian') }}" class="form-control @error('kompetensi_keahlian') is-invalid @enderror" / >

                    @error('kompetensi_keahlian')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="keahlian">Keahlian</label>
                    <input type="text" name="keahlian" value="{{ old('keahlian') }}" class="form-control @error('keahlian') is-invalid @enderror" / >

                    @error('keahlian')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gaji_min">Gaji Min</label>
                    <input type="text" name="gaji_min" value="{{ old('gaji_min') }}" class="form-control @error('gaji_min') is-invalid @enderror" / >

                    @error('gaji_min')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gaji_max">Gaji Max</label>
                    <input type="text" name="gaji_max" value="{{ old('gaji_max') }}" class="form-control @error('gaji_max') is-invalid @enderror" / >

                    @error('gaji_max')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="persyaratan">Persyaratan</label>
                    <textarea id="persyaratan" name="persyaratan" class="form-control @error('persyaratan') is-invalid @enderror" rows="4">{{ old('persyaratan') }}</textarea>
                
                    @error('persyaratan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4">{{ old('deskripsi') }}</textarea>
                
                    @error('deskripsi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="batas_akhir_lamaran">Batas Akhir Lamaran</label>
                    <input type="date" name="batas_akhir_lamaran" value="{{ old('batas_akhir_lamaran') }}" class="form-control @error('batas_akhir_lamaran') is-invalid @enderror" / >

                    @error('batas_akhir_lamaran')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="proses_lamaran">Proses Lamaran<span class="text-danger">*</span></label>
                    <select name="proses_lamaran" id="" class="form-control custom-select" required="">
                        <option value="" disabled="" selected>-- Pilih Proses Lamaran --</option>
                        <option value="Online">Online</option>
                        <option value="Offline">Offline</option>
                    </select>
                    @error('proses_lamaran')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status<span class="text-danger">*</span></label>
                    <select name="status" id="" class="form-control custom-select" required="">
                        <option value="" disabled="" selected>-- Pilih Status --</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Nonaktif">Nonaktif</option>
                        <option value="Draf">Draf</option>
                    </select>
                    @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input id="image" type="file" name="image" value="{{ old('image') }}" class="form-control @error('image') is-invalid @enderror" / >

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jumlah_pelamar">Jumlah Pelamar</label>
                    <input id="jumlah_pelamar" type="text" name="jumlah_pelamar" value="{{ old('jumlah_pelamar') }}" class="form-control @error('jumlah_pelamar') is-invalid @enderror" / >

                    @error('jumlah_pelamar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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
        </form>
    </div>
    <div class="col-md-7">
        <div class="border p-3">
            <h6 class="text-uppercase border-bottom font-weight-bold font-size-sm pb-2">
                <i class="fas fa-info-circle mr-2"></i>DETAIL SISWA
            </h6>
            <table class="table table-striped table-sm"></table>
        </div>
        <br>
        <div class="row">
         <div class="card col-md-6">
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
    </div>
</div>
@endsection

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('/app-admin/plugins/sweetalert2/sweetalert2.min.css') }}" />
@endsection

@section('script')
<script src="{{ asset('/app-admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
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
    const inpFile2 = document.getElementById('image2');
    const previewContainer2 = document.getElementById('imagePreview2');
    const previewImage2 = previewContainer2.querySelector(".image-preview__image2");
    const previewDefaultText2 = previewContainer2.querySelector(".image-preview__default-text2");

    inpFile2.addEventListener("change", function() {
      const file = this.files[0];

      if (file) {
        const reader = new FileReader();

        previewDefaultText2.style.display = 'none';
        previewImage2.style.display = 'block';

        reader.addEventListener('load', function() {
          previewImage2.setAttribute('src', this.result);
        });

        reader.readAsDataURL(file); 
      } else {
        previewDefaultText2.style.display = null;
        previewImage2.style.display = null;
        previewImage2.setAttribute('src', '');

      }
    });
</script>
@if(Session::get('success'))
<script>
Swal.fire(
  'Sukses',
  '{{ Session::get('success') }}',
  'success'
)
</script>
@elseif(Session::get('gagal'))
<script>
Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: '{{ Session::get('gagal') }}',
})
</script>
@endif
@endsection