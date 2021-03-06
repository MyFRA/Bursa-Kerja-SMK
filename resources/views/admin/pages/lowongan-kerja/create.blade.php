@extends('admin.layouts.app')

@section('page-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fas fa-share-alt mr-2"></i>
                    {{__('Lowongan Kerja')}}
                </h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ url('/app-admin/lowongan-kerja') }}" class="btn btn-default rounded-0">
                    <i class="fas fa-table mr-1"></i> {{__('Daftar Lowongan')}}
                </a>
                <a href="{{ url('/app-admin/lowongan-kerja/create') }}" class="btn btn-primary rounded-0">
                    <i class="fas fa-plus-circle mr-1"></i> {{__('Lowongan Baru')}}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <form id="form-create-lowongan" action="{{ route('lowongan-kerja.store') }}" method="post" class="card" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>{{__('Perusahaan')}} <span class="text-danger">*</span></label>
                    <select name="perusahaan_id" class="form-control select2 @error('perusahaan_id') is-invalid @enderror" style="width: 100%;" required>
                        <option></option>
                        @foreach($list_perusahaan as $perusahaan)
                            @if (is_null($perusahaan->user))
                                <option value="{{ $perusahaan->id }}" {{ old('perusahaan_id') == $perusahaan->id ? 'selected' : '' }}>{{ $perusahaan->nama }}</option>
                            @endif
                        @endforeach
                    </select>

                    @error('perusahaan_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jabatan">{{__('Jabatan')}} <span class="text-danger">*</span></label>
                    <input type="text" name="jabatan" value="{{ old('jabatan') }}" class="form-control @error('jabatan') is-invalid @enderror" required />

                    @error('jabatan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="deskripsi">{{__('Deskripsi Pekerjaan')}} <span class="text-danger font-italic">* Wajib Diisi</span></label>
                    <textarea name="deskripsi" class="summernote" style="display: none;" required="">{{ old('deskripsi') }}</textarea>
                    <small style="font-size: 13px" class="form-text font-italic mt-3">Contoh : PT. Loker Indonesia Bergerak dibidang teknologi informasi saat ini membutuhkan kandidat untuk mengisi posisi sebagai : IT Programmer</small>

                    @error('deskripsi')
                        <div>
                            <p class="font-italic text-danger ml-2">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label class="font-weight-bold" for="persyaratan">Persyaratan <span class="text-danger font-italic">* Wajib Diisi</span></label>
                    <textarea name="persyaratan" class="summernote" style="display: none;" required="">{{ old('persyaratan') }}</textarea>
                    <small style="font-size: 13px" class="form-text font-italic mt-3">Contoh : Maksimal Berusia 25 Tahun, dan tidak terikat dengan perusahaan manapun</small>

                    @error('persyaratan')
                        <div>
                            <p class="font-italic text-danger ml-2">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="kompetensi_keahlian">Kompetensi Keahlian <span class="text-danger">*</span></label>
                    <select class="select2" multiple="multiple" style="width: 100%;" id="kompetensi_keahlian" name="kompetensi_keahlian[]" required>
                        @foreach ($programKeahlian as $progKeahlian)
                            <optgroup label="{{ $progKeahlian->nama }}">
                                @foreach ($kompetensi_keahlian as $kompKeahlian)
                                    @if ($kompKeahlian->program_keahlian_id == $progKeahlian->id)
                                        <option value="{{ $kompKeahlian->nama }}"
                                            @if (old('kompetensi_keahlian'))
                                                @foreach (old('kompetensi_keahlian') as $oldKompetensiKeahlian)
                                                    {{ ($oldKompetensiKeahlian == $kompKeahlian->nama ) ? 'selected' : '' }}
                                                @endforeach
                                            @endif
                                        >{{$kompKeahlian->nama}}
                                        </option>
                                    @endif
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="keahlian">Keahlian <span class="text-danger">*</span></label>
                    <select class="select2" multiple="multiple" style="width: 100%;" id="keahlian" name="keahlian[]" required>
                        @foreach ($keterampilan as $item)
                                <option value="{{ $item->nama }}"

                                    @if (old('keahlian'))
                                    @foreach (old('keahlian') as $oldKeahlian)
                                        {{ ($oldKeahlian == $item->nama ) ? 'selected' : '' }}
                                    @endforeach
                                @endif

                                >{{$item->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold mt-md-3" for="gaji_min">Gaji Min <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('gaji_min') is-invalid @enderror" name="gaji_min" id="gaji_min" value="{{ old('gaji_min') }}" required autocomplete="off">

                    @error('gaji_min')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="font-weight-bold mt-md-3" for="gaji_max">Gaji Max <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('gaji_max') is-invalid @enderror" name="gaji_max" id="gaji_max" value="{{ old('gaji_max') }}" required autocomplete="off">

                    @error('gaji_max')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="font-weight-bold mt-md-3" for="batas_akhir_lamaran">Batas Akhir Lamaran <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('batas_akhir_lamaran') is-invalid @enderror" name="batas_akhir_lamaran" id="batas_akhir_lamaran" value="{{ old('batas_akhir_lamaran') }}" autocomplete="off" required="">

                    @error('batas_akhir_lamaran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
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
                    <label for="image">Image <span class="text-danger">*</span></label>
                    <input onChange='return validasiFile()' id="image" type="file" name="image" value="{{ old('image') }}" class="form-control @error('image') is-invalid @enderror" required="" />

                    @error('image')
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
    <div class="col-md-6">
        <div class="border p-3">
            <h6 class="text-uppercase border-bottom font-weight-bold font-size-sm pb-2">
                <i class="fas fa-info-circle mr-2"></i>DETAIL LOWONGAN
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
    <link rel="stylesheet" href="{{ asset('/plugins/summernote/summernote-lite.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-admin/plugins/jquery-ui/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('/app-admin/plugins/sweetalert2/sweetalert2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/app-admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/app-admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

@endsection

@section('script')
    <script src="{{ asset('/app-admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('/plugins/summernote/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('/app-admin/plugins/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('/app-admin/plugins/select2/js/select2.full.min.js') }}"></script>


    <script>
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
        $(function () {
            $('.select2').select2({
                theme: 'bootstrap4'
            })
        });
    </script>

    <script type="text/javascript">

        var gaji_min = document.getElementById('gaji_min');
        gaji_min.addEventListener('keyup', function(e){
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            gaji_min.value = formatRupiah(this.value, 'Rp. ');
        });

        var gaji_max = document.getElementById('gaji_max');
        gaji_max.addEventListener('keyup', function(e){
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            gaji_max.value = formatRupiah(this.value, 'Rp. ');
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix){
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split           = number_string.split(','),
            sisa            = split[0].length % 3,
            rupiah          = split[0].substr(0, sisa),
            ribuan          = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if(ribuan){
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>
    <script>
        (function($) {
            $('#batas_akhir_lamaran').datepicker()
        })(jQuery);
    </script>
    <script>
        function validasiFile() {
            var inputFile = document.getElementById('image');
            var pathFile  = inputFile.value;

            var ekstensiOk = /(\.jpg|\.jpeg|\.png|\.gif|\.bmp|\.webp)$/i;

            if( !ekstensiOk.exec(pathFile) ) {
                alert('Silakan Upload File Yang Memiliki Ekstensi .jpeg, .jpg, .png, .gif, .bmp, atau .webp')

                inputFile.value = '';
                return false;
            };
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
