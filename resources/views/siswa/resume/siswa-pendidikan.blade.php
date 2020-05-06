@extends('layouts.app')

@section('content')

<div class="resume-siswa-pendidikan">
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="row">
                        <div class=" col-lg-5 p-5">
                          <span  class="h3 w-100 d-block float-left text-primary align-self-start"> {{__('1 / 2')}}</span>
                            <div class="d-flex h-75 w-100 align-items-center justify-content-center">
                              <img style="animation: tememplek 0.5s;" class="w-50" src="{{ asset('/images/profile.svg') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 p-lg-4">
                          <h1 style="animation: tememplek 0.5s;" class="text-center">{{__('Siswa Pendidikan')}}</h1>
                          <form action="{{ url('/siswa/create-resume/siswa-pendidikan') }}" method="post">
                            @csrf
                            <div style="animation: tememplek 0.5s;" class="row mt-4 mt-lg-5 p-3 p-lg-0">
                              <div class="col-lg-6 mt-2">
                                <div class="form-group">
                                  <label class="font-weight-bold" for="pilih_bidang_keahlian">{{__('Bidang Keahlian')}} <span class="text-danger">*</span></label>
                                  <select class="form-control @error('bidang_keahlian_id') is-invalid @enderror" id="pilih_bidang_keahlian" name="bidang_keahlian_id" required>
                                      <option value="" selected="" disabled="">{{__('-- Pilih Bidang Keahlian --')}}</option>
                                      @foreach ($bidangKeahlian as $item)
                                        <option value="{{ $item->id }}" {{ old('bidang_keahlian_id') == $item->id ? 'selected' : '' }}>{{$item->nama}}</option>
                                      @endforeach
                                  </select>
                                
                                  @error('bidang_keahlian_id')
                                    <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                  @enderror
                                </div>
                              </div>
                              <div class="col-lg-6 mt-2">
                                <div class="form-group">
                                  <label class="font-weight-bold" for="pilih_program_keahlian">{{__('Program Keahlian')}} <span class="text-danger">*</span></label>
                                  <select class="form-control @error('program_keahlian_id') is-invalid @enderror" id="pilih_program_keahlian" name="program_keahlian_id" required> 
                                    <option value="" selected="" disabled="">{{__('-- Pilih Program Keahlian --')}}</option>
                                  </select>
                                
                                  @error('program_keahlian_id')
                                    <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                  @enderror
                                </div>
                              </div>
                              <div class="col-lg-6 mt-2">
                                <div class="form-group">
                                  <label class="font-weight-bold" for="pilih_kompetensi_keahlian">{{__('Kompetensi Keahlian')}} <span class="text-danger">*</span></label>
                                  <select class="form-control @error('kompetensi_keahlian_id') is-invalid @enderror" id="pilih_kompetensi_keahlian" name="kompetensi_keahlian_id" required> 
                                    <option value="" selected="" disabled="">{{__('-- Pilih Kompetensi Keahlian --')}}</option>
                                  </select>
                                
                                  @error('kompetensi_keahlian_id')
                                    <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                  @enderror
                                </div>
                              </div>
                              <div class="col-lg-6 mt-2">
                                <div class="form-group">
                                  <label class="font-weight-bold" for="nama_sekolah">{{__('Nama Sekolah')}} <span class="text-danger">*</span></label>
                                  <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror" id="nama_sekolah" name="nama_sekolah" placeholder="Nama Sekolah" required value="{{ old('nama_sekolah') }}">
                                
                                  @error('nama_sekolah')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                                </div>
                              </div>
                              <div class="col-lg-6 mt-2">
                                <div class="form-group">
                                  <label class="font-weight-bold" for="tahun_lulus">{{__('Tahun Lulus')}} <span class="text-danger">*</span></label>
                                  <input type="number" class="form-control @error('tahun_lulus') is-invalid @enderror" id="tahun_lulus" name="tahun_lulus" placeholder="Tahun Lulus" required value="{{ old('tahun_lulus') }}">
                                
                                  @error('tahun_lulus')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                                </div>
                              </div>
                              <div class="col-lg-6 mt-2">
                                <div class="form-group">
                                  <label class="font-weight-bold" for="bulan_lulus">{{__('Bulan Lulus')}} <span class="text-danger">*</span></label>
                                  <select class="form-control @error('bulan_lulus') is-invalid @enderror" id="bulan_lulus" name="bulan_lulus" required> 
                                    <option value="" selected="" disabled="">{{__('-- Pilih Bulan Lulus --')}}</option>
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
                              <div class="col-lg-6 mt-2">
                                <div class="form-group">
                                  <label class="font-weight-bold" for="tingkat_sekolah">{{__('Tingkat Sekolah')}} <span class="text-danger">*</span></label>
                                  <select class="form-control @error('tingkat_sekolah') is-invalid @enderror" id="tingkat_sekolah" name="tingkat_sekolah" required> 
                                    <option value="" selected="" disabled="">{{__('-- Pilih Tingkat Sekolah --')}}</option>
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
                              <div class="col-lg-6 mt-2">
                                <div class="form-group">
                                  <label class="font-weight-bold" for="nilai_akhir">{{__('Nilai Akhir')}} <span class="text-danger">*</span></label>
                                  <select class="form-control @error('nilai_akhir') is-invalid @enderror" id="nilai_akhir" name="nilai_akhir" required> 
                                    <option value="" selected="" disabled="">{{__('-- Pilih Nilai Akhir --')}}</option>
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
                              <div class="col-lg-6 mt-2">
                                <div class="form-group">
                                  <label class="font-weight-bold" for="nilai_skor">{{__('Nilai Skor')}} <span class="text-danger">*</span></label>
                                  <input type="text" class="form-control @error('nilai_skor') is-invalid @enderror" id="nilai_skor" name="nilai_skor" placeholder="Nilai Skor" required value="{{ old('nilai_skor') }}">
                                  <small id="emailHelp" class="form-text text-muted h6">Contoh: 4.5, 34.7, 52, dll</small>
                                  @error('nilai_skor')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="form-group">
                                  <label for="keterangan">{{__('Keterangan')}}</label>
                                  <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Tambahkan Keterangan">{{ old('keterangan') }}</textarea>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-12">
                              <button class="btn btn-primary w-100 mt-2" type="submit">{{__('Submit')}}</button>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

@endsection



@section('script')

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

@endsection