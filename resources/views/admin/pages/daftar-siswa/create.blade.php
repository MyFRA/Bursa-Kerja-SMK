@extends('admin.layouts.app')

@section('page-header')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fas fa-share-alt mr-2"></i>
                    Tambah Siswa
                </h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ url('/app-admin/daftar-siswa') }}" class="btn btn-default rounded-0">
                    <i class="fas fa-table mr-1"></i> Daftar Siswa
                </a>
                <a href="{{ url('/app-admin/daftar-siswa/create') }}" class="btn btn-primary rounded-0">
                    <i class="fas fa-plus-circle mr-1"></i> Siswa Baru
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-5">
        <form action="{{ route('daftar-siswa.store') }}" method="post" class="card" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_pertama">Nama Pertama<span class="text-danger">*</span></label>
                    <input required="" type="text" name="nama_pertama" value="{{ old('nama_pertama') }}" class="form-control @error('nama_pertama') is-invalid @enderror" / >

                    @error('nama_pertama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_belakang">Nama Belakang</label>
                    <input type="text" name="nama_belakang" value="{{ old('nama_belakang') }}" class="form-control @error('nama_belakang') is-invalid @enderror" / >

                    @error('nama_belakang')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="photo">Foto</label>
                    <input id="image" type="file" name="photo" value="{{ old('photo') }}" class="form-control @error('photo') is-invalid @enderror" / >

                    @error('photo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" class="form-control @error('tempat_lahir') is-invalid @enderror" / >

                    @error('tempat_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="text" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="form-control @error('tanggal_lahir') is-invalid @enderror" autocomplete="off"/>

                    @error('tanggal_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="" class="form-control">
                        <option value="" selected disabled>-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <br>
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
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
                    <label for="hp">No HP</label>
                    <input type="text" name="hp" value="{{ old('hp') }}" class="form-control @error('hp') is-invalid @enderror" / >

                    @error('hp')
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
                    <label for="kodepos">Kode Pos</label>
                    <input type="number" name="kodepos" value="{{ old('kodepos') }}" class="form-control @error('kodepos') is-invalid @enderror" / >

                    @error('kodepos')
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
                    <label for="kartu_identitas">KARTU IDENTITAS</label>
                    
                    <select name="kartu_identitas" id="kartu_identitas" class="form-control">
                        <option value="" selected="" disabled="" required>-- Pilih Kartu Identitas --</option>
                        <option value="" >Belum Memiliki Satupun</option>
                        <option value="KTP" {{ old('kartu_identitas') == 'KTP' ? 'selected' : '' }}>KTP</option>
                        <option value="SIM" {{ old('kartu_identitas') == 'SIM' ? 'selected' : '' }}>SIM</option>
                        <option value="NPWP" {{ old('kartu_identitas') == 'NPWP' ? 'selected' : '' }}>NPWP</option>
                        <option value="KARTU PELAJAR" {{ old('kartu_identitas') == 'KARTU PELAJAR' ? 'selected' : '' }}>KARTU PELAJAR</option>
                    </select>
                    @error('kartu_identitas')
                        <br>
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kartu_identitas_nomor">Kartu Identitas Nomor</label>
                    <input type="text" name="kartu_identitas_nomor" value="{{ old('kartu_identitas_nomor') }}" class="form-control @error('kartu_identitas_nomor') is-invalid @enderror" / >

                    @error('kartu_identitas_nomor')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pengalaman_level">Pengalaman Level</label>
                    <input type="text" name="pengalaman_level" value="{{ old('pengalaman_level') }}" class="form-control @error('pengalaman_level') is-invalid @enderror" / >

                    @error('pengalaman_level')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pengalaman_level_teks">Pengalaman Level Teks</label>
                    <input type="text" name="pengalaman_level_teks" value="{{ old('pengalaman_level_teks') }}" class="form-control @error('pengalaman_level_teks') is-invalid @enderror" / >

                    @error('pengalaman_level_teks')
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
</div>
@endsection

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('/app-admin/plugins/sweetalert2/sweetalert2.min.css') }}" />
<link rel="stylesheet" href="{{ asset('/app-admin/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('/app-admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/plugins/datePicker/css/DatePickerX.min.css') }}">
@endsection

@section('script')
<script src="{{ asset('/app-admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('/app-admin/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('/plugins/datePicker/js/DatePickerX.min.js') }}"></script>

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

<script>
    // Fungsi DatePicker
    window.addEventListener('DOMContentLoaded', function(){
        var myDatepicker = document.querySelector('input[name="tanggal_lahir"]')

        myDatepicker.style.backgroundColor = 'white'
        myDatepicker.DatePickerX.init({
            // options here
        });
    });

</script>

<script>
    $(function () {
        $('.select2').select2({
            theme: 'bootstrap4'
        })
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