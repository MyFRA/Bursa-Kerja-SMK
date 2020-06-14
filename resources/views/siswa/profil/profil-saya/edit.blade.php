@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row mt-4 mb-5">

        @include('widget.trigger-navigasi-profil-siswa')

        <div class="col-lg-3 px-2">

        @include('widget.navigasi-profil-siswa')

        </div>

        <div class="col-lg-9 px-2">
            <div class="card p-3">
                <div>
                    <div class="px-2 mt-4 pb-5">
                        <span class="h5 "><i class="fa fa-user"></i> {{('Profil Saya')}}</span>
                        @if (session('gagal'))
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            <strong>Gagal</strong> {{ session('gagal') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                       </div>
                        @endif

                        @if (session('success'))
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            <strong>Gagal</strong> {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                       </div>
                        @endif

                        <form action="{{ url('/siswa/profil/profil-saya/' . encrypt($siswa->id)) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mt-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="text-muted" for="nama_pertama">Nama Pertama <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control @error('nama_pertama') is-invalid @enderror" id="nama_pertama" name="nama_pertama" placeholder="Nama Pertama" value="{{ old('nama_pertama') ? old('nama_pertama') : $siswa->nama_pertama }}" required>

                                            @error('nama_pertama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="text-muted" for="nama_belakang">Nama Belakang </label>
                                            <input type="text" class="form-control @error('nama_belakang') is-invalid @enderror" id="nama_belakang" name="nama_belakang" placeholder="Nama Belakang" value="{{ old('nama_belakang') ? old('nama_belakang') : $siswa->nama_belakang }}">

                                            @error('nama_belakang')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="text-muted" for="tempat_lahir">Tempat Lahir </label>
                                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="{{ old('tempat_lahir') ? old('tempat_lahir') : $siswa->tempat_lahir }}">

                                            @error('tempat_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="text-muted" for="tanggal_lahir">Tanggal Lahir</label>
                                            <input type="text" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" value="{{ old('tanggal_lahir') ? old('tanggal_lahir') : $siswa->tanggal_lahir }}">

                                            @error('tanggal_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="text-muted" for="email">Email <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') ? old('email') : $siswa->email }}" required>

                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="text-muted" for="jenis_kelamin">Jenis Kelamin </label>
                                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" @error('jenis_kelamin') style="border: 1px solid red" @enderror>
                                                <option value="" selected disabled>Jenis Kelamin</option>
                                                <option value="Laki-laki" {{ $siswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }} {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                <option value="Perempuan" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }} {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                            </select>

                                            @error('jenis_kelamin')
                                                <div class="ml-2 mt-2 text-danger">
                                                   {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-lg-3">
                                        <div class="form-group">
                                            <label class="text-muted" for="facebook">Facebook </label>
                                            <input type="text" class="form-control @error('facebook') is-invalid @enderror" id="facebook" name="facebook" placeholder="Facebook" value="{{ old('facebook') ? old('facebook') : $siswa->facebook }}">

                                            @error('facebook')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3">
                                        <div class="form-group">
                                            <label class="text-muted" for="twitter">Twitter </label>
                                            <input type="text" class="form-control @error('twitter') is-invalid @enderror" id="twitter" name="twitter" placeholder="Twitter" value="{{ old('twitter') ? old('twitter') : $siswa->twitter }}">

                                            @error('twitter')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3">
                                        <div class="form-group">
                                            <label class="text-muted" for="instagram">Instagram </label>
                                            <input type="text" class="form-control @error('instagram') is-invalid @enderror" id="instagram" name="instagram" placeholder="Instagram" value="{{ old('instagram') ? old('instagram') : $siswa->instagram }}">

                                            @error('instagram')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3">
                                        <div class="form-group">
                                            <label class="text-muted" for="linkedin">Linkedin </label>
                                            <input type="text" class="form-control @error('linkedin') is-invalid @enderror" id="linkedin" name="linkedin" placeholder="Linkedin" value="{{ old('linkedin') ? old('linkedin') : $siswa->linkedin }}">

                                            @error('linkedin')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-lg-3">
                                        <div class="form-group">
                                            <label class="text-muted" for="negara">Negara </label>

                                            <select class="form-control" name="negara" id="negara" @error('negara') style="border: 1px solid red" @enderror>
                                                <option value="" selected disabled>Negara</option>
                                                @foreach ($negara as $item)
                                                    <option value="{{ $item }}"
                                                    @if (old('negara'))
                                                        {{ old('negara') == $item ? 'selected' : '' }}
                                                    @else
                                                        {{ $siswa->negara == $item ? 'selected' : '' }}
                                                    @endif
                                                    >{{ $item }}</option>
                                                @endforeach
                                            </select>

                                            @error('negara')
                                                <div class="ml-2 mt-2 text-danger">
                                                   {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3">
                                        <div class="form-group">
                                            <label class="text-muted" for="provinsi">Provinsi</label>
                                            <select class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi">
                                                <option value="" selected="" disabled="">{{__('Pilih Provinsi')}}</option>
                                                @foreach ($provinsi as $prov)
                                                    <option value="{{$prov->nama_provinsi}}"
                                                        @if (old('provinsi'))
                                                            {{ old('provinsi') == $prov->nama_provinsi ? 'selected' : '' }}
                                                        @else
                                                            {{ ($siswa->provinsi == $prov->nama_provinsi) ? 'selected' : '' }}
                                                        @endif
                                                    >{{__($prov->nama_provinsi)}}</option>
                                                @endforeach
                                            </select>

                                            @error('provinsi')
                                                <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3">
                                        <div class="form-group">
                                            <label for="kabupaten">{{__('Kabupaten')}}</label>
                                            <select class="form-control @error('kabupaten') is-invalid @enderror" id="kabupaten" name="kabupaten">
                                                <option value="" selected="" disabled="">{{__('Pilih Kabupaten')}}</option>
                                                @foreach ($kabupaten as $kab)
                                                    <option value="{{$kab->nama_kabupaten}}"
                                                        @if (old('kabupaten'))
                                                            {{ old('kabupaten') == $kab->nama_kabupaten ? 'selected' : '' }}
                                                        @else
                                                            {{ ($siswa->kabupaten == $kab->nama_kabupaten) ? 'selected' : '' }}
                                                        @endif
                                                    >{{__($kab->nama_kabupaten)}}</option>
                                                @endforeach
                                            </select>

                                              @error('kabupaten')
                                             <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                              @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3">
                                        <div class="form-group">
                                            <label class="text-muted" for="kodepos">Kode Pos </label>
                                            <input type="number" class="form-control @error('kodepos') is-invalid @enderror" id="kodepos" name="kodepos" placeholder="Kode Pos" value="{{ old('kodepos') ? old('kodepos') : $siswa->kodepos }}">

                                            @error('kodepos')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="text-muted" for="alamat">Alamat</label>
                                            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3">{{ old('alamat') ? old('alamat') : $siswa->alamat }}</textarea>

                                            @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="text-muted" for="hp">No Hp </label>
                                            <input type="number" class="form-control @error('hp') is-invalid @enderror" id="hp" name="hp" placeholder="No Hp" value="{{ old('hp') ? old('hp') : $siswa->hp }}">

                                            @error('hp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="text-muted" for="kartu_identitas">Kartu Identitas </label>
                                            <select name="kartu_identitas" class="form-control" id="kartu_identitas" @error('kartu_identitas') style="border: 1px solid red" @enderror>
                                                <option value="" selected disabled>Kartu Identitas</option>
                                                <option value="KTP" {{ $siswa->kartu_identitas == 'KTP' ? 'selected' : '' }} {{ old('kartu_identitas') == 'KTP' ? 'selected' : '' }}>KTP</option>
                                                <option value="SIM" {{ $siswa->kartu_identitas == 'SIM' ? 'selected' : '' }} {{ old('kartu_identitas') == 'SIM' ? 'selected' : '' }}>SIM</option>
                                                <option value="NPWP" {{ $siswa->kartu_identitas == 'NPWP' ? 'selected' : '' }} {{ old('kartu_identitas') == 'NPWP' ? 'selected' : '' }}>NPWP</option>
                                                <option value="KARTU PELAJAR" {{ $siswa->kartu_identitas == 'KARTU PELAJAR' ? 'selected' : '' }} {{ old('kartu_identitas') == 'KARTU PELAJAR' ? 'selected' : '' }}>KARTU PELAJAR</option>
                                            </select>

                                            @error('kartu_identitas')
                                                <div class="ml-2 mt-2 text-danger">
                                                   {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="text-muted" for="kartu_identitas_nomor">Kartu Identitas Nomor </label>
                                            <input type="text" class="form-control @error('kartu_identitas_nomor') is-invalid @enderror" id="kartu_identitas_nomor" name="kartu_identitas_nomor" placeholder="Kartu Identitas Nomor" value="{{ old('kartu_identitas_nomor') ? old('kartu_identitas_nomor') : $siswa->kartu_identitas_nomor }}">

                                            @error('kartu_identitas_nomor')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="text-muted" for="pengalaman_level">Pengalaman Level </label>
                                            <input type="text" class="form-control @error('pengalaman_level') is-invalid @enderror" id="pengalaman_level" name="pengalaman_level" placeholder="Pengalaman Level" value="{{ old('pengalaman_level') ? old('pengalaman_level') : $siswa->pengalaman_level }}">

                                            @error('pengalaman_level')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="text-muted" for="pengalaman_level_teks">Pengalaman Level Teks </label>
                                            <input type="text" class="form-control @error('pengalaman_level_teks') is-invalid @enderror" id="pengalaman_level_teks" name="pengalaman_level_teks" placeholder="Pengalaman Level Teks" value="{{ old('pengalaman_level_teks') ? old('pengalaman_level_teks') : $siswa->pengalaman_level_teks }}">

                                            @error('pengalaman_level_teks')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="photo">Photo</label>
                                            <input type="file" onChange='return validasiFile()' class="form-control-file" id="photo" name="photo">
                                          </div>
                                    </div>
                                </div>
                                <div class="row tombol-update-lainya mt-3">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary ">Update</button>
                                        <a href="{{ url('/siswa/profil/profil-saya') }}" type="submit" class="btn btn-secondary">Batalkan</a>
                                    </div>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('/plugins/datePicker/css/DatePickerX.min.css') }}">
@endsection


@section('script')
    <script src="{{ asset('/plugins/datePicker/js/DatePickerX.min.js') }}"></script>

    <script>
        window.addEventListener('DOMContentLoaded', function(){
            var myDatepicker = document.querySelector('input[name="tanggal_lahir"]')

            myDatepicker.style.backgroundColor = 'white'
            myDatepicker.DatePickerX.init({
                // options here
            });

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
        function validasiFile() {
            var inputFile = document.getElementById('photo');
            var pathFile  = inputFile.value;

            var ekstensiOk = /(\.jpg|\.jpeg|\.png|\.gif|\.bmp|\.webp)$/i;

            if( !ekstensiOk.exec(pathFile) ) {
                alert('Silakan Upload File Yang Memiliki Ekstensi jpeg, jpg, png, bmp, webp atau gif')

                inputFile.value = '';
                return false;
            };
        }
    </script>


@endsection



