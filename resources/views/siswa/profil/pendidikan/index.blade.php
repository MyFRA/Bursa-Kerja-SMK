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
                        <span class=" h5 "><i class="fa fa-mortar-board"></i> {{('Pendidikan')}}</span>
                        <a id="trigger-tambah-pendidikan" class="float-right" href=""><i class="fa fa-plus-circle"></i> Tambah</a>

                        @if (session('gagal'))
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            <strong>Gagal</strong> {{ session('gagal') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif


                        <div id="container-form-pendidikan" class="d-none mt-4">
                            <form action="{{ url('/siswa/profil/pendidikan') }}" method="post">
                                @csrf
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label for="nama_sekolah">{{__('Nama Sekolah')}} <span class="text-danger">*</span> </label>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="form-group">
                                                <input type="text" placeholder="Nama Sekolah"  class="form-control @error('nama_sekolah') is-invalid @enderror" name="nama_sekolah" id="nama_sekolah" required value="{{old('nama_sekolah')}}">
                                                @error('nama_sekolah')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label for="bidang_keahlian_id">{{__('Bidang Keahlian')}} <span class="text-danger">*</span> </label>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="form-group">
                                                <select class="form-control @error('bidang_keahlian_id') is-invalid @enderror" id="pilih_bidang_keahlian" name="bidang_keahlian_id" required>
                                                    <option value="" selected="" disabled="">{{__(' Pilih Bidang Keahlian ')}}</option>
                                                    @foreach ($bidangKeahlian as $item)
                                                    <option value="{{ $item->id }}" {{ old('bidang_keahlian_id') == $item->id ? 'selected' : '' }}>{{$item->nama}}</option>
                                                    @endforeach
                                                </select>

                                                @error('bidang_keahlian_id')
                                                <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label for="program_keahlian_id">{{__('Program Keahlian')}} <span class="text-danger">*</span> </label>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="form-group">
                                                <select class="form-control @error('program_keahlian_id') is-invalid @enderror" id="pilih_program_keahlian" name="program_keahlian_id" required>
                                                <option value="" selected="" disabled="">{{__(' Pilih Program Keahlian ')}}</option>
                                                </select>

                                                @error('program_keahlian_id')
                                                <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label for="kompetensi_keahlian_id">{{__('Kompetensi Keahlian')}} <span class="text-danger">*</span> </label>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="form-group">
                                                <select class="form-control @error('kompetensi_keahlian_id') is-invalid @enderror" id="pilih_kompetensi_keahlian" name="kompetensi_keahlian_id" required>
                                                <option value="" selected="" disabled="">{{__(' Pilih Kompetensi Keahlian ')}}</option>
                                                </select>

                                                @error('kompetensi_keahlian_id')
                                                <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label for="tahun_lulus">{{__('Tahun Lulus')}} <span class="text-danger">*</span> </label>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="form-group">
                                                <select class="form-control @error('tahun_lulus') is-invalid @enderror" id="tahun_lulus" name="tahun_lulus" required>
                                                    <option value="" selected="" disabled="">{{__(' Tahun ')}}</option>
                                                    @foreach ($tahun as $item)
                                                    <option value="{{ $item }}" {{ old('tahun_lulus') == $item ? 'selected' : '' }}>{{$item}}</option>
                                                    @endforeach
                                                </select>

                                                @error('tahun_lulus')
                                                <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label for="bulan_lulus">{{__('Bulan Lulus')}} <span class="text-danger">*</span> </label>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="form-group">
                                                <select class="form-control @error('bulan_lulus') is-invalid @enderror" id="bulan_lulus" name="bulan_lulus" required>
                                                    <option value="" selected="" disabled="">{{__('Bulan')}}</option>
                                                    <option value="Januari" {{ old('bulan_lulus') == 'Januari' ? 'selected' : '' }}>{{__('Januari')}}</option>
                                                    <option value="Februari" {{ old('bulan_lulus') == 'Februari' ? 'selected' : '' }}>{{__('Februari')}}</option>
                                                    <option value="Maret" {{ old('bulan_lulus') == 'Maret' ? 'selected' : '' }}>{{__('Maret')}}</option>
                                                    <option value="April" {{ old('bulan_lulus') == 'April' ? 'selected' : '' }}>{{__('April')}}</option>
                                                    <option value="Mei" {{ old('bulan_lulus') == 'Mei' ? 'selected' : '' }}>{{__('Mei')}}</option>
                                                    <option value="Juni" {{ old('bulan_lulus') == 'Juni' ? 'selected' : '' }}>{{__('Juni')}}</option>
                                                    <option value="Juli" {{ old('bulan_lulus') == 'Juli' ? 'selected' : '' }}>{{__('Juli')}}</option>
                                                    <option value="Agustus" {{ old('bulan_lulus') == 'Agustus' ? 'selected' : '' }}>{{__('Agustus')}}</option>
                                                    <option value="September" {{ old('bulan_lulus') == 'September' ? 'selected' : '' }}>{{__('September')}}</option>
                                                    <option value="Oktober" {{ old('bulan_lulus') == 'Oktober' ? 'selected' : '' }}>{{__('Oktober')}}</option>
                                                    <option value="November" {{ old('bulan_lulus') == 'November' ? 'selected' : '' }}>{{__('November')}}</option>
                                                    <option value="Desember" {{ old('bulan_lulus') == 'Desember' ? 'selected' : '' }}>{{__('Desember')}}</option>
                                                </select>

                                                @error('bulan_lulus')
                                                    <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label for="tingkat_sekolah">{{__('Tingkat Sekolah')}} <span class="text-danger">*</span> </label>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="form-group">
                                                <select class="form-control @error('tingkat_sekolah') is-invalid @enderror" id="tingkat_sekolah" name="tingkat_sekolah" required>
                                                    <option value="" selected="" disabled="">{{__('Tingkat Sekolah')}}</option>
                                                    <option value="SD" {{ old('tingkat_sekolah') == 'SD' ? 'selected' : '' }}>{{__('SD')}}</option>
                                                    <option value="SMP/MTS" {{ old('tingkat_sekolah') == 'SMP/MTS' ? 'selected' : '' }}>{{__('SMP/MTS')}}</option>
                                                    <option value="SMK/SMA/MA" {{ old('tingkat_sekolah') == 'SMK/SMA/MA' ? 'selected' : '' }}>{{__('SMK/SMA/MA')}}</option>
                                                    <option value="S1" {{ old('tingkat_sekolah') == 'S1' ? 'selected' : '' }}>{{__('S1')}}</option>
                                                    <option value="S2" {{ old('tingkat_sekolah') == 'S2' ? 'selected' : '' }}>{{__('S2')}}</option>
                                                    <option value="S3" {{ old('tingkat_sekolah') == 'S3' ? 'selected' : '' }}>{{__('S3')}}</option>
                                                </select>

                                                @error('tingkat_sekolah')
                                                    <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label for="nilai_akhir">{{__('Nilai Akhir')}} <span class="text-danger">*</span> </label>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="form-group">
                                                <select class="form-control @error('nilai_akhir') is-invalid @enderror" id="nilai_akhir" name="nilai_akhir" required>
                                                    <option value="" selected="" disabled="">{{__('Nilai Akhir')}}</option>
                                                    <option value="IPK" {{ old('nilai_akhir') == 'IPK' ? 'selected' : '' }}>{{__('IPK')}}</option>
                                                    <option value="NEM" {{ old('nilai_akhir') == 'NEM' ? 'selected' : '' }}>{{__('NEM')}}</option>
                                                    <option value="Tidak Tamat" {{ old('nilai_akhir') == 'Tidak Tamat' ? 'selected' : '' }}>{{__('Tidak Tamat')}}</option>
                                                    <option value="Masih Belajar" {{ old('nilai_akhir') == 'Masih Belajar' ? 'selected' : '' }}>{{__('Masih Belajar')}}</option>
                                                </select>

                                                @error('nilai_akhir')
                                                    <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label for="nilai_skor">Nilai Skor <span class="text-danger">*</span> </label>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="form-group">
                                                <input type="number" class="form-control @error('nilai_skor') is-invalid @enderror" id="nilai_skor" name="nilai_skor" placeholder="Nilai Skor" required value="{{ old('nilai_skor') }}">
                                                <small id="emailHelp" class="form-text text-muted h6">Maksimal 255</small>
                                                @error('nilai_skor')
                                                  <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                              </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label for="keterangan">Keterangan</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="form-group">
                                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ old('keterangan') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <button class="btn btn-primary float-right mt-2" type="submit">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @foreach ($pendidikan as $item)
                             <div class="row mt-5">
                                <div class="col">
                                    <div class="row title-pengalaman">
                                        <div class="col-md-3">
                                            <span class="small text-muted">{{__($item->bulan_lulus)}}</span>
                                            <span class="small text-muted">{{__($item->tahun_lulus)}}</span>
                                        </div>
                                        <div class="col-md-7">
                                            <p class="h5 font-weight-bold">{{__( $item->nama_sekolah )}}</p>
                                            <div class="p">
                                                <span>{{__( $item->tingkat_sekolah )}} </span>
                                                <span class="ml-2">{{__( $item->kompetensiKeahlian->nama)}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-end">
                                            <a class="h5" href="{{ url('/siswa/profil/pendidikan/' . encrypt($item->id) . '/edit') }}"><i class="fa fa-edit"></i></a>
                                            <a class="h5 ml-2" href="" onclick="onHapus('{{ $item->nama_sekolah }}', '{{ url('/siswa/profil/pendidikan/' . encrypt($item->id)) }}')"><i class="fa fa-trash-o"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form id="form-hapus" action="" method="post">
    @method('delete')
    @csrf
</form>

@endsection


@section('script')

<script>
    const tombolTrigger = document.getElementById('trigger-tambah-pendidikan')
    const containerForm = document.getElementById('container-form-pendidikan')

    tombolTrigger.addEventListener('click', function(e) {
        e.preventDefault()

        containerForm.classList.toggle('d-none')
    })
</script>

<script>
    const pilihBk = document.getElementById('pilih_bidang_keahlian');
    const pilihPk = document.getElementById('pilih_program_keahlian');
    const pilihKk = document.getElementById('pilih_kompetensi_keahlian');

    pilihBk.addEventListener('change', function(e) {
        bkId = e.target.value;
        fetch('/getProgramKeahlian/' + bkId)
        .then(response => response.json())
        .then(response => {
        let optionPk;

        response.forEach(function(m) {
            optionPk += "<option value='"+ m.id +"'>"+ m.nama +"</option>";
            pilihPk.innerHTML = optionPk
                    pilihKk.innerHTML = '<option value="" selected disabled> -- Pilih Kompetensi Keahlian -- </option>';
        })
        });
    });


    pilihPk.addEventListener('change', function(e) {
        pkId = e.target.value;
        fetch('/getKompetensiKeahlian/' + pkId)
        .then(response => response.json())
        .then(response => {
        let optionKk;

        response.forEach(function(m) {
            optionKk += "<option value='"+ m.id +"'>"+ m.nama +"</option>";
            pilihKk.innerHTML = optionKk
        })
        });
    });
</script>

<script>
    function onHapus(jabatan, url) {
        event.preventDefault();
        const formHapus = document.getElementById('form-hapus')
        formHapus.setAttribute('action', url)
        return confirm('apakah anda yakin, \nmenghapus ' + jabatan) ? formHapus.submit() : false

    }
</script>

<script>
    const tombol = document.getElementById('tombol-munculkan-navigasi')
    const navigasi = document.getElementById('navigasi-profil-siswa')

    tombol.addEventListener('click', function(e) {
        e.preventDefault();
        navigasi.classList.toggle('d-none-sm')
    });
</script>

@endsection
