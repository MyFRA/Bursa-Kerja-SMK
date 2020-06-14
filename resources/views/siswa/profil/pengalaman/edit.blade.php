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
                <div class="mt-4">
                    <hr class="py-1">
                    <div class="px-2 pb-5">
                        <span class="mt-5 h5 d-block"><i class="fa fa-briefcase"></i> {{('Pengalaman')}}</span>
                        <p class="mt-3 mb-5">
                            {{__('Halaman Edit Pengalaman')}}
                        </p>
                        <hr>
                        <div class="px-lg-5 mt-4">
                            <div id="container-form-pengalaman" class="mt-4">
                                <form action="{{ url('/siswa/profil/pengalaman/' . encrypt($pengalaman->id)) }}" method="post">
                                    @csrf
                                    @method('put')
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label for="jabatan">{{__('Posisi')}} <span class="text-danger">*</span> </label>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="form-group">
                                                    <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" id="jabatan" required value="{{old('jabatan') ? old('jabatan') : $pengalaman->jabatan}}">
                                                    @error('jabatan')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label for="perusahaan">{{__('Perusahaan')}} <span class="text-danger">*</span> </label>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="form-group">
                                                    <input type="text" class="form-control @error('perusahaan') is-invalid @enderror" name="perusahaan" id="perusahaan" required value="{{old('perusahaan') ? old('perusahaan') : $pengalaman->perusahaan}}">
                                                    @error('perusahaan')
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
                                                            <option value="{{ $item->id }}" {{ $pengalaman->bidang_keahlian_id == $item->id ? 'selected' : '' }} {{ old('bidang_keahlian_id') == $item->id ? 'selected' : '' }}>{{$item->nama}}</option>
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
                                                        @foreach ($programKeahlian as $pK)
                                                            <option value="{{$pK->id}}"
                                                                @if (old('program_keahlian_id'))
                                                                    {{ old('program_keahlian_id') == $pK->id ? 'selected' : '' }}
                                                                @else
                                                                    {{ ($pengalaman->program_keahlian_id == $pK->id) ? 'selected' : '' }}
                                                                @endif
                                                            >{{__($pK->nama)}}</option>
                                                        @endforeach
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
                                                        @foreach ($kompetensiKeahlian as $kK)
                                                            <option value="{{$kK->id}}"
                                                                @if (old('kompetensi_keahlian_id'))
                                                                    {{ old('kompetensi_keahlian_id') == $kK->id ? 'selected' : '' }}
                                                                @else
                                                                    {{ ($pengalaman->kompetensi_keahlian_id == $kK->id) ? 'selected' : '' }}
                                                                @endif
                                                            >{{__($kK->nama)}}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('kompetensi_keahlian_id')
                                                    <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label for="mulai_kerja">{{__('Mulai Bekerja')}} <span class="text-danger">*</span> </label>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <select class="form-control @error('mulai_kerja_tahun') is-invalid @enderror" id="mulai_kerja_tahun" name="mulai_kerja_tahun" required>
                                                                <option value="" selected="" disabled="">{{__(' Tahun ')}}</option>
                                                                @foreach ($tahun as $item)
                                                                <option value="{{ $item }}" {{ $pengalaman->mulai_kerja_tahun == $item  ? 'selected' : ''}}  {{ old('mulai_kerja_tahun') == $item ? 'selected' : '' }}>{{$item}}</option>
                                                                @endforeach
                                                            </select>

                                                            @error('mulai_kerja_tahun')
                                                            <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <select class="form-control @error('mulai_kerja_bulan') is-invalid @enderror" id="mulai_kerja_bulan" name="mulai_kerja_bulan" required>
                                                                <option value="" selected="" disabled="">{{__('Bulan')}}</option>
                                                                <option value="Januari" {{ $pengalaman->mulai_kerja_bulan == 'Januari' ? 'selected' : '' }} {{ old('mulai_kerja_bulan') == 'Januari' ? 'selected' : '' }}>{{__('Januari')}}</option>
                                                                <option value="Februari" {{ $pengalaman->mulai_kerja_bulan == 'Februari' ? 'selected' : '' }} {{ old('mulai_kerja_bulan') == 'Februari' ? 'selected' : '' }}>{{__('Februari')}}</option>
                                                                <option value="Maret" {{ $pengalaman->mulai_kerja_bulan == 'Maret' ? 'selected' : '' }} {{ old('mulai_kerja_bulan') == 'Maret' ? 'selected' : '' }}>{{__('Maret')}}</option>
                                                                <option value="April" {{ $pengalaman->mulai_kerja_bulan == 'April' ? 'selected' : '' }} {{ old('mulai_kerja_bulan') == 'April' ? 'selected' : '' }}>{{__('April')}}</option>
                                                                <option value="Mei" {{ $pengalaman->mulai_kerja_bulan == 'Mei' ? 'selected' : '' }} {{ old('mulai_kerja_bulan') == 'Mei' ? 'selected' : '' }}>{{__('Mei')}}</option>
                                                                <option value="Juni" {{ $pengalaman->mulai_kerja_bulan == 'Juni' ? 'selected' : '' }} {{ old('mulai_kerja_bulan') == 'Juni' ? 'selected' : '' }}>{{__('Juni')}}</option>
                                                                <option value="Juli" {{ $pengalaman->mulai_kerja_bulan == 'Juli' ? 'selected' : '' }} {{ old('mulai_kerja_bulan') == 'Juli' ? 'selected' : '' }}>{{__('Juli')}}</option>
                                                                <option value="Agustus" {{ $pengalaman->mulai_kerja_bulan == 'Agustus' ? 'selected' : '' }} {{ old('mulai_kerja_bulan') == 'Agustus' ? 'selected' : '' }}>{{__('Agustus')}}</option>
                                                                <option value="September" {{ $pengalaman->mulai_kerja_bulan == 'September' ? 'selected' : '' }} {{ old('mulai_kerja_bulan') == 'September' ? 'selected' : '' }}>{{__('September')}}</option>
                                                                <option value="Oktober" {{ $pengalaman->mulai_kerja_bulan == 'Oktober' ? 'selected' : '' }} {{ old('mulai_kerja_bulan') == 'Oktober' ? 'selected' : '' }}>{{__('Oktober')}}</option>
                                                                <option value="November" {{ $pengalaman->mulai_kerja_bulan == 'November' ? 'selected' : '' }} {{ old('mulai_kerja_bulan') == 'November' ? 'selected' : '' }}>{{__('November')}}</option>
                                                                <option value="Desember" {{ $pengalaman->mulai_kerja_bulan == 'Desember' ? 'selected' : '' }} {{ old('mulai_kerja_bulan') == 'Desember' ? 'selected' : '' }}>{{__('Desember')}}</option>
                                                            </select>

                                                            @error('mulai_kerja_bulan')
                                                                <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mt-n2 mb-2">
                                                        <span class="small text-muted">Sampai</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-3">

                                            </div>
                                            <div class="col-lg-9">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    <input class="form-check-input" id="sekarang" name="sekarang" type="checkbox" {{ $pengalaman->sekarang == true ? 'checked' : '' }} > Sekarang
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label for="akhir_kerja">{{__('Akhir Bekerja')}} <span class="text-danger">*</span> </label>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <select class="form-control @error('akhir_kerja_tahun') is-invalid @enderror" id="akhir_kerja_tahun" name="akhir_kerja_tahun" required>
                                                                <option value="" selected="" disabled="">{{__(' Tahun ')}}</option>
                                                                @foreach ($tahun as $item)
                                                                <option value="{{ $item }}" {{ $pengalaman->akhir_kerja_tahun == $item  ? 'selected' : ''}}  {{ old('akhir_kerja_tahun') == $item ? 'selected' : '' }}>{{$item}}</option>
                                                                @endforeach
                                                            </select>

                                                            @error('akhir_kerja_tahun')
                                                            <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <select class="form-control @error('akhir_kerja_bulan') is-invalid @enderror" id="akhir_kerja_bulan" name="akhir_kerja_bulan" required>
                                                                <option {{ $pengalaman->akhir_kerja_bulan == 'Januari' ? 'selected' : '' }} value="Januari" {{ old('akhir_kerja_bulan') == 'Januari' ? 'selected' : '' }}>{{__('Januari')}}</option>
                                                                <option {{ $pengalaman->akhir_kerja_bulan == 'Februari' ? 'selected' : '' }} value="Februari" {{ old('akhir_kerja_bulan') == 'Februari' ? 'selected' : '' }}>{{__('Februari')}}</option>
                                                                <option {{ $pengalaman->akhir_kerja_bulan == 'Maret' ? 'selected' : '' }} value="Maret" {{ old('akhir_kerja_bulan') == 'Maret' ? 'selected' : '' }}>{{__('Maret')}}</option>
                                                                <option {{ $pengalaman->akhir_kerja_bulan == 'April' ? 'selected' : '' }} value="April" {{ old('akhir_kerja_bulan') == 'April' ? 'selected' : '' }}>{{__('April')}}</option>
                                                                <option {{ $pengalaman->akhir_kerja_bulan == 'Mei' ? 'selected' : '' }} value="Mei" {{ old('akhir_kerja_bulan') == 'Mei' ? 'selected' : '' }}>{{__('Mei')}}</option>
                                                                <option {{ $pengalaman->akhir_kerja_bulan == 'Juni' ? 'selected' : '' }} value="Juni" {{ old('akhir_kerja_bulan') == 'Juni' ? 'selected' : '' }}>{{__('Juni')}}</option>
                                                                <option {{ $pengalaman->akhir_kerja_bulan == 'Juli' ? 'selected' : '' }} value="Juli" {{ old('akhir_kerja_bulan') == 'Juli' ? 'selected' : '' }}>{{__('Juli')}}</option>
                                                                <option {{ $pengalaman->akhir_kerja_bulan == 'Agustus' ? 'selected' : '' }} value="Agustus" {{ old('akhir_kerja_bulan') == 'Agustus' ? 'selected' : '' }}>{{__('Agustus')}}</option>
                                                                <option {{ $pengalaman->akhir_kerja_bulan == 'September' ? 'selected' : '' }} value="September" {{ old('akhir_kerja_bulan') == 'September' ? 'selected' : '' }}>{{__('September')}}</option>
                                                                <option {{ $pengalaman->akhir_kerja_bulan == 'Oktober' ? 'selected' : '' }} value="Oktober" {{ old('akhir_kerja_bulan') == 'Oktober' ? 'selected' : '' }}>{{__('Oktober')}}</option>
                                                                <option {{ $pengalaman->akhir_kerja_bulan == 'November' ? 'selected' : '' }} value="November" {{ old('akhir_kerja_bulan') == 'November' ? 'selected' : '' }}>{{__('November')}}</option>
                                                                <option {{ $pengalaman->akhir_kerja_bulan == 'Desember' ? 'selected' : '' }} value="Desember" {{ old('akhir_kerja_bulan') == 'Desember' ? 'selected' : '' }}>{{__('Desember')}}</option>
                                                            </select>

                                                            @error('akhir_kerja_bulan')
                                                                <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label for="negara">{{__('Negara')}}</label>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="form-group">
                                                    <select id="negara" class="form-control @error('negara') is-invalid @enderror" name="negara">
                                                        <option value="" selected="" disabled="">{{__('Negara')}}</option>
                                                        @foreach ($negara as $item)
                                                        <option value="{{ $item->nama_negara }}" {{ $pengalaman->negara == $item->nama_negara ? 'selected' : '' }} {{ old('negara') == $item->nama_negara ? 'selected' : '' }}>{{$item->nama_negara}}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('negara')
                                                    <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label for="provinsi">{{__('Provinsi')}}</label>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="form-group">
                                                    <select id="provinsi" class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi">
                                                        <option value="" selected="" disabled="">{{__('Pilih Provinsi')}}</option>
                                                        @foreach ($provinsi as $prov)
                                                            <option value="{{$prov->nama_provinsi}}"
                                                                @if (old('provinsi'))
                                                                    {{ old('provinsi') == $prov->nama_provinsi ? 'selected' : '' }}
                                                                @else
                                                                    {{ ($pengalaman->provinsi == $prov->nama_provinsi) ? 'selected' : '' }}
                                                                @endif
                                                            >{{__($prov->nama_provinsi)}}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('provinsi')
                                                        <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label for="mata_uang">{{__('Mata Uang')}}</label>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="form-group">
                                                    <select id="mata_uang" class="form-control @error('mata_uang') is-invalid @enderror" id="pilih_mata_uang" name="mata_uang">
                                                        <option value="" selected="" disabled="">{{__('mata uang')}}</option>
                                                        @foreach ($mata_uang as $item)
                                                        <option value="{{ $item->kode }}" {{ $pengalaman->mata_uang == $item->kode ? 'selected' : '' }} {{ old('mata_uang') == $item->kode ? 'selected' : '' }}>{{$item->kode}}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('mata_uang')
                                                    <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label for="gaji_bulanan">{{__('Gaji Bulanan')}}</label>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="form-group">
                                                    <input type="text" class="form-control @error('gaji_bulanan') is-invalid @enderror" name="gaji_bulanan" id="gaji_bulanan" value="{{ old('gaji_bulanan') ? old('gaji_bulanan') : $pengalaman->gaji_bulanan }}" autocomplete="off">

                                                    @error('gaji_bulanan')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
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
                                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ old('keterangan') ? old('keterangan') : $pengalaman->keterangan }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <button class="btn btn-primary float-right mt-2" type="submit">Update</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')

    <script>
        const tombol = document.getElementById('tombol-munculkan-navigasi')
        const navigasi = document.getElementById('navigasi-profil-siswa')

        tombol.addEventListener('click', function(e) {
            e.preventDefault();
            navigasi.classList.toggle('d-none-sm')
        });
    </script>


    <script>
    	const pilihProv = document.getElementById('provinsi');

        document.getElementById('negara').addEventListener('change', function(e) {
            let nama_negara = e.target.value;
            fetch('/getProvinsi/' + nama_negara)
            .then(response => response.json())
            .then(response => {
                let opsiProv;

                response.forEach(function(m) {
                    opsiProv += "<option value='"+ m.nama_provinsi +"'>"+ m.nama_provinsi +"</option>";
                    pilihProv.innerHTML = opsiProv;
                })
            });
        });


		var gaji_bulanan = document.getElementById('gaji_bulanan');
		gaji_bulanan.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			gaji_bulanan.value = formatRupiah(this.value, 'Rp. ');
		});



        /* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

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
        const sekarang = document.getElementById('sekarang')
        const akhirKerjaTahun = document.getElementById('akhir_kerja_tahun')
        const akhirKerjaBulan = document.getElementById('akhir_kerja_bulan')
        const formulir = document.getElementById('form-pengalaman');

        sekarang.addEventListener('click', function() {
            const opsi1 = akhirKerjaBulan.querySelector('option')

            if( sekarang.checked ) {
                let waktu = new Date
                akhirKerjaTahun.setAttribute('readonly', '')
                akhirKerjaTahun.removeAttribute('required')
                akhirKerjaTahun.value = waktu.getFullYear()

                akhirKerjaBulan.setAttribute('readonly', '')
                akhirKerjaBulan.removeAttribute('required')

                let bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']

                let option = document.createElement('option')
                option.value = bulan[waktu.getMonth()]
                let text = document.createTextNode(bulan[waktu.getMonth()])
                option.appendChild(text)
                akhirKerjaBulan.innerHTML = ''
                akhirKerjaBulan.appendChild(option)

            } else {
                akhirKerjaTahun.removeAttribute('readonly')
                akhirKerjaTahun.setAttribute('required', '')
                akhirKerjaTahun.value = ''

                akhirKerjaBulan.removeAttribute('readonly')
                akhirKerjaBulan.setAttribute('required', '')
                let bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']

                akhirKerjaBulan.innerHTML = '<option value="" selected> Bulan </option>'

                bulan.forEach(function(e, i) {
                    let option = document.createElement('option')
                    option.value = bulan[i]
                    let text = document.createTextNode(bulan[i])
                    option.appendChild(text)

                    akhirKerjaBulan.appendChild(option)
                });

            }
        })
    </script>

@endsection
