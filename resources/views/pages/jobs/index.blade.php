@extends('layouts.app')

@section('content')
<div class="bg-gray p-3 mt-3">
    <div class="container justify-content-between">
        <div class="row">
            <div class="col-6">
                lowongan di <b>Indonesia</b>
            </div>
            <div class="col-6 text-right">
                {{ $jmlLoker }} lowongan
            </div>
        </div>
    </div>
</div>

<div class="container py-2">
    <div class="row">
        <div class="col-md-3 px-2">
            <div class="widgets select-job-criteria card shadow-xl mb-3">
                <div class="card-body p-3">
                    <h4 class="widget-title">{{__('Pilih Kriteria')}}</h4>

                    <form id="form-search" action="{{ url('/lowongan/cari/pekerjaan') }}" method="get">
                        <input type="hidden" name="urutBerdasarkan" value="terbaru">
                        <div class="form-group">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-search"></i>
                                    </span>
                                </div>
                                <input type="text" name="judul" class="form-control" placeholder="Judul, Posisi, Kata Kunci atau ..." value="{{ (isset($oldInput['judul'])) ? $oldInput['judul'] : '' }}" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group">
                            <select name="provinsi" id="" class="form-control form-control-sm" style="cursor: pointer">
                                <option value="">{{__('Semua Lokasi')}}</option>
                                @foreach ($provinsi as $prov)
                                    <option value="{{ $prov->nama_provinsi }}"
                                    @if (isset($oldInput['provinsi']))
                                        {{ ($oldInput['provinsi'] == $prov->nama_provinsi) ? 'selected' : '' }}
                                    @endif
                                    >{{ $prov->nama_provinsi }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <select name="kompetensi_keahlian" id="" class="form-control form-control-sm" style="cursor: pointer">
                                <option value="">{{__('Semua Jurusan')}}</option>
                                @foreach ($kompetensiKeahlian as $kompKeahlian)
                                    <option value="{{ $kompKeahlian->nama }}"
                                    @if (isset($oldInput['kompetensi_keahlian']))
                                        {{ ($oldInput['kompetensi_keahlian'] == $kompKeahlian->nama) ? 'selected' : '' }}
                                    @endif
                                    >{{ $kompKeahlian->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="gaji_min" id="" class="form-control form-control-sm" style="cursor: pointer">
                                <option value="" style="cursor: pointer">{{__('Gaji Minimal IDR')}}</option>
                                @foreach ($gaji_minimal as $gaji_min)
                                    <option value="{{ $gaji_min }}"
                                    @if (isset($oldInput['gaji_min']))
                                        {{ ($oldInput['gaji_min'] == $gaji_min) ? 'selected' : '' }}
                                    @endif
                                    >IDR {{ number_format($gaji_min, 0, '.', '.') }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="button_cont text-center" ><button class="example_a" type="submit">Cari Lowongan</button></div>
                    </form>
                </div>
            </div>

            <div class="nav-list-page-for-dekstop">
                <!-- navigation-list-page -->
                @include('widget.navigation-list-page')
            </div>

        </div>
        <div class="col-md-9 px-3">
            <div class="card mb-3 shadow-md">
                <div class="card-body py-1">
                    <div class="row m-0">
                        <ul class="nav col-md-9">
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold href-dark-to-blue active-for-nav-link-atas-loker-and-perusahaan" href="{{ url('/lowongan') }}">{{__('Semua Lowongan')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold href-dark-to-blue " href="{{ url('/daftar-perusahaan') }}">{{__('Perusahaan')}}</a>
                            </li>
                        </ul>
                        <div class="col-md-3 text-right mt-1 mb-3 my-lg-1">
                            <select id="urutkan-berdasarkan" class="form-control form-control-sm" style="cursor: pointer">
                                <option value="terbaru"
                                    @if (isset($oldInput['urutBerdasarkan']))
                                        {{ ($oldInput['urutBerdasarkan'] == 'terbaru') ? 'selected' : '' }}
                                    @endif
                                >{{__('Terbaru')}}</option>
                                <option value="gaji_terendah"
                                    @if (isset($oldInput['urutBerdasarkan']))
                                        {{ ($oldInput['urutBerdasarkan'] == 'gaji_terendah') ? 'selected' : '' }}
                                    @endif
                                >{{__('Gaji Terendah')}}</option>
                                <option value="gaji_tertinggi"
                                    @if (isset($oldInput['urutBerdasarkan']))
                                        {{ ($oldInput['urutBerdasarkan'] == 'gaji_tertinggi') ? 'selected' : '' }}
                                    @endif
                                >{{__('Gaji Tertinggi')}}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div style="animation: tememplek 0.5s;"  id="card-lowongan" class="card shadow-2xl p-3 mt-3">
                <span class="h4 font-weight-bold mb-1 text-dark"><i class="fa fa-bullhorn mr-2"></i>{{__(' Lowongan')}}</span>
                @if ($lowongan->isEmpty())
                <div class="d-flex flex-column align-items-center justify-content-center text-center py-3">
                    <span class="display-1 text-muted"><i class="fa fa-bullhorn"></i></span>
                    <h3 class="quicksand font-weight-bold">{{__('Maaf, Lowongan ')}}{{ (isset($oldInput['judul'])) ? $oldInput['judul'] : '' }}{{__(' tidak ditemukan')}}</h3>
                </div>
                @else
                    @foreach ($lowongan as $loker)
                    <hr>
                        <div id="lowongan" class="my-3">
                            <div id="njero-lowongan" class="d-flex justify-content-between w-100">
                                <div style="flex: 3">
                                    <a href="{{ url('lowongan/' . encrypt($loker->id_from_lowongan)) }}" class="h5 font-weight-bold text-primary mb-0">{{__( $loker->jabatan )}}</a>
                                    <a href="{{ url('perusahaan/show/' . encrypt($loker->perusahaan_id)) }}" class="text-primary d-block">{{__( $loker->nama_perusahaan )}}</a>
                                    <span class="d-block mt-2" ><i class="fa fa-cogs mr-2"></i>
                                        @php
                                            $arr = json_decode($loker->keahlian);
                                            foreach ($arr as $key => $value) {
                                                echo ($key >= 1) ? ' <b>/</b> ' . $value . ' ': $value;
                                            }
                                        @endphp
                                    </span>
                                    <span class="d-block mt-2"><i class="fa fa-map-marker mr-2"></i> {{__( $loker->perusahaan->provinsi )}}</span>
                                    <span class="d-block text-muted mb-3"><i class="fa fa-dollar mr-2"></i> {{__('IDR')}} {{__( number_format($loker->gaji_min, 0, '.', '.') )}} {{__('-')}} {{__( number_format($loker->gaji_max, 0, '.', '.') )}}</span>
                                    <span id="waktu" class="text-muted">{{__('Sampai,')}} {{ __( date('d M Y', strtotime($loker->batas_akhir_lamaran)) ) }}</span>
                                </div>
                                <div id="contain-img" style="flex: 1">
                                    @if (!is_null($loker->perusahaan->logo))
                                        <img class="float-right w-100 rounded" src="{{ asset('/storage/assets/daftar-perusahaan/logo/' . $loker->perusahaan->logo) }}" alt="" width="150">
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="mt-2 ml-2">
                {{ $lowongan->onEachSide(5)->links() }}
            </div>
        </div>
        {{-- <div class="col-md-2 px-2">
            <img src="https://www.wmtips.com/i/art/547/160x600.gif" alt="">
        </div> --}}
        <div class="col-12 px-2 mt-2">
            <div class="nav-list-page-for-mobile">
                <!-- navigation-list-page -->
                @include('widget.navigation-list-page')
            </div>
        </div>
    </div>
</div>
@endsection



@section('script')

<script>

    // Fungsi Penambahan RP, di Gaji Min & Gaji Max
		var gaji_min = document.getElementById('gaji_min');
		gaji_min.addEventListener('keyup', function(e){

			gaji_min.value = formatRupiah(this.value, 'Rp. ');

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
    document.getElementById('urutkan-berdasarkan').addEventListener('change', function(element) {
        const formSearch = document.getElementById('form-search');
        let inputOrderBy = formSearch.querySelector('input[name="urutBerdasarkan"]');
        inputOrderBy.value = this.value;

        formSearch.submit()
    })
</script>

@endsection
