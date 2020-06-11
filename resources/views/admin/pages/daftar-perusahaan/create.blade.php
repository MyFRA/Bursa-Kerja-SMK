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
                <a href="{{ url('/app-admin/daftar-perusahaan') }}" class="btn btn-default rounded-0">
                    <i class="fas fa-table mr-1"></i> Daftar Perusahaan
                </a>
                <a href="{{ url('/app-admin/daftar-perusahaan/create') }}" class="btn btn-primary rounded-0">
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
        <form action="{{ route('daftar-perusahaan.store') }}" method="post" class="card" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="bidang_keahlian_id">Bidang Keahlian<span class="text-danger">*</span></label>
                    <select name="bidang_keahlian_id" id="bidang_keahlian_id" class="form-control custom-select" required="">
                        <option value="" disabled="" selected="">-- Pilih Bidang Keahlian --</option>
                        @foreach ($bidangKeahlian as $bidangKeahlianPerOne)
                            <option value="{{ $bidangKeahlianPerOne->id }}" {{ old('bidang_keahlian_id') == $bidangKeahlianPerOne->id ? 'selected' : '' }}>{{ $bidangKeahlianPerOne->nama }}</option>
                        @endforeach
                    </select>
                    @error('bidang_keahlian_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="program_keahlian_id">Program Keahlian<span class="text-danger">*</span></label>
                    <select name="program_keahlian_id" id="program_keahlian_id" class="form-control custom-select" required="">
                        @if (old('program_keahlian_id'))
                            <option value="{{ old('program_keahlian_id') }}">{{ $bidangKeahlianPerOne->nama }}</option>
                        @else
                            <option value="" disabled="" selected="">-- Pilih Program Keahlian --</option>
                        @endif
                    </select>
                    @error('program_keahlian_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama Perusahaan<span class="text-danger">*</span></label>
                    <input required="" type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" / >

                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori<span class="text-danger">*</span></label>
                    <select name="kategori" id="" class="form-control custom-select" required="">
                        <option value="" disabled="" selected>-- Pilih Kategori --</option>
                        <option value="Negeri {{ old('kategori') == 'Negeri' ? 'selected' : '' }}">Negeri</option>
                        <option value="Swasta" {{ old('kategori') == 'Swasta' ? 'selected' : '' }}>Swasta</option>
                        <option value="BUMN" {{ old('kategori') == 'BUMN' ? 'selected' : '' }}>BUMN</option>
                    </select>
                    @error('kategori')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="logo">Logo</label>
                    <input id="image" type="file" name="logo" value="{{ old('logo') }}" class="form-control @error('logo') is-invalid @enderror" / >

                    @error('logo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input id="image2" type="file" name="image" value="{{ old('image') }}" class="form-control @error('image') is-invalid @enderror" / >

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="telp">Telp</label>
                    <input type="text" name="telp" value="{{ old('telp') }}" class="form-control @error('telp') is-invalid @enderror" / >

                    @error('telp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" / >

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="fax">Fax</label>
                    <input type="text" name="fax" value="{{ old('fax') }}" class="form-control @error('fax') is-invalid @enderror" / >

                    @error('fax')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="site">Site</label>
                    <input type="text" name="site" value="{{ old('site') }}" class="form-control @error('site') is-invalid @enderror" / >

                    @error('site')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="facebook">Facebook</label>
                    <input type="text" name="facebook" value="{{ old('facebook') }}" class="form-control @error('facebook') is-invalid @enderror" / >

                    @error('facebook')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="twitter">Twitter</label>
                    <input type="text" name="twitter" value="{{ old('twitter') }}" class="form-control @error('twitter') is-invalid @enderror" / >

                    @error('twitter')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="instagram">Instagram</label>
                    <input type="text" name="instagram" value="{{ old('instagram') }}" class="form-control @error('instagram') is-invalid @enderror" / >

                    @error('instagram')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="linkedin">Linkedin</label>
                    <input type="text" name="linkedin" value="{{ old('linkedin') }}" class="form-control @error('linkedin') is-invalid @enderror" / >

                    @error('linkedin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="4">{{ old('alamat') }}</textarea>

                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-muted" for="negara">Negara </label>

                    <select class="form-control" name="negara" id="negara" @error('negara') style="border: 1px solid red" @enderror>
                        <option value="" selected >Pilih Negara</option>
                        @foreach ($negara as $item)
                            <option value="{{ $item }}" {{ old('negara') == $item ? 'selected' : '' }}>{{ $item }}</option>
                        @endforeach
                    </select>

                    @error('negara')
                        <div class="ml-2 mt-2 text-danger">
                           {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-muted" for="provinsi">Provinsi</label>

                    <select class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi">
                        <option value="" selected="" disabled="">{{__('Pilih Provinsi')}}</option>
                    </select>

                    @error('provinsi')
                        <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kabupaten">{{__('Kabupaten')}}</label>
                    <select class="form-control @error('kabupaten') is-invalid @enderror" id="kabupaten" name="kabupaten">
                        <option value="" selected disabled>{{__('Pilih Kabupaten')}}</option>
                    </select>

                      @error('kabupaten')
                     <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                      @enderror
                </div>
                <div class="form-group">
                    <label for="kodepos">Kode Pos</label>
                    <input type="text" name="kodepos" value="{{ old('kodepos') }}" class="form-control @error('kodepos') is-invalid @enderror" / >

                    @error('kodepos')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jumlah_karyawan">Jumlah Karyawan</label>
                    <input type="text" name="jumlah_karyawan" value="{{ old('jumlah_karyawan') }}" class="form-control @error('jumlah_karyawan') is-invalid @enderror" / >

                    @error('jumlah_karyawan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="waktu_proses_perekrutan">Waktu Proses Perekrutan</label>
                    <input type="text" name="waktu_proses_perekrutan" value="{{ old('waktu_proses_perekrutan') }}" class="form-control @error('waktu_proses_perekrutan') is-invalid @enderror" / >

                    @error('waktu_proses_perekrutan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gaya_berpakaian">Gaya Berpakaian</label>
                    <input type="text" name="gaya_berpakaian" value="{{ old('gaya_berpakaian') }}" class="form-control @error('gaya_berpakaian') is-invalid @enderror" / >

                    @error('gaya_berpakaian')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bahasa">{{__('Bahasa')}}</label>
                    <select class="form-control @error('bahasa') is-invalid @enderror" id="bahasa" name="bahasa">
                          <option value="" selected="" disabled="">{{__('Pilih Bahasa')}}</option>
                      @foreach ($bahasa as $bhs)
                          <option value="{{ $bhs->nama }}" {{ old('bahasa') == $bhs->nama ? 'selected' : '' }}>{{$bhs->nama}}</option>
                      @endforeach
                    </select>

                      @error('bahasa')
                     <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                      @enderror
                  </div>
                <div class="form-group">
                    <label for="waktu_bekerja">Waktu Bekerja</label>
                    <input type="text" name="waktu_bekerja" value="{{ old('waktu_bekerja') }}" class="form-control @error('waktu_bekerja') is-invalid @enderror" / >

                    @error('waktu_bekerja')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tunjangan">Tunjangan</label>
                    <textarea id="tunjangan" name="tunjangan" class="form-control @error('tunjangan') is-invalid @enderror" rows="4">{{ old('tunjangan') }}</textarea>

                    @error('tunjangan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="overview">{{__('Gambaran Perusahaan')}}</label>
                    <textarea name="overview" class="summernote" style="display: none;" >{{ old('overview') }}</textarea>

                    @error('overview')
                        <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alasan_harus_melamar">{{__('Alasan Harus Melamar')}}</label>
                    <textarea name="alasan_harus_melamar" class="summernote" style="display: none;" >{{ old('alasan_harus_melamar') }}</textarea>

                      @error('alasan_harus_melamar')
                     <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
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
                <h3 class="card-title"><b>Logo Preview</b></h3>
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
                  <div class="card-body " id="imagePreview2">
                    <img class="img-thumbnail img-fluid image-preview__image2" src="" alt="">
                    <span class="image-preview__default-text2">Image Preview</span>
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
<link rel="stylesheet" href="{{ asset('/plugins/summernote/summernote-lite.min.css') }}">
@endsection

@section('script')
<script src="{{ asset('/plugins/tags-autocomplete/jquery.min.js') }}"></script>
<script src="{{ asset('/app-admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('/plugins/summernote/summernote-lite.min.js') }}"></script>

<script>
    // Fungsi Pembuatan Summernote ( WYSIYG )
    (function($) {
        $(document).ready(function(){
            $('.summernote').summernote({
                height: 175,
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
        });
    })(jQuery);
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
<script>
    $('#bidang_keahlian_id').on('change', function(e) {
        const bkID = e.target.value;

        // Ajax
        $.get('/app-admin/daftar-perusahaan/ajax/' + bkID, function(data) {
            // success data
            $('#program_keahlian_id').empty();
            $.each(data, function(index, progKeahlian){
                $('#program_keahlian_id').append('<option value="' + progKeahlian.id + '"> ' + progKeahlian.nama + ' </option>')
            });
        })
    });
</script>

<script>
    const pilihProv = document.getElementById('provinsi');
    const pilihKab = document.getElementById('kabupaten');

    document.getElementById('negara').addEventListener('change', function(e) {
        let nama_negara = e.target.value;
        fetch('/getProvinsi/' + nama_negara)
        .then(response => response.json())
        .then(response => {
            let opsiProv;

            response.forEach(function(m) {
                opsiProv += "<option value='"+ m.nama_provinsi +"'>"+ m.nama_provinsi +"</option>";
                pilihProv.innerHTML = opsiProv;
                pilihKab.innerHTML = '<option value="" selected disabled>Pilih Kabupaten</option>';
            })
        });
    });

    document.getElementById('provinsi').addEventListener('change', function(e) {
        let nama_provinsi = e.target.value;
        fetch('/getKabupaten/' + nama_provinsi)
        .then(response => response.json())
        .then(response => {
            let opsiKab;

            response.forEach(function(m) {
                opsiKab += "<option value='"+ m.nama_kabupaten +"'>"+ m.nama_kabupaten +"</option>";
                pilihKab.innerHTML = opsiKab
            })
        });
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
