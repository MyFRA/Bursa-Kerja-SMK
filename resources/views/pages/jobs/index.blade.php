@extends('layouts.app')

@section('content')
<div class="bg-gray p-3">
    <div class="container justify-content-between">
        <div class="row">
            <div class="col-6">
                lowongan di <b>Indonesia</b>
            </div>
            <div class="col-6 text-right">
                1 - 20 of 27,783 lowongan
            </div>
        </div>
    </div>
</div>

<div class="container py-2">
    <div class="row">
        <div class="col-md-3 px-2">
            <div class="widgets select-job-criteria card rounded-0 mb-3">
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
                                <input type="text" name="judul" class="form-control" placeholder="Judul, Posisi, Kata Kunci atau ..." value="{{ (isset($oldInput['judul'])) ? $oldInput['judul'] : '' }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <select name="provinsi" id="" class="form-control form-control-sm">
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
                            <select name="program_keahlian_id" id="" class="form-control form-control-sm">
                                <option value="">{{__('Semua Program Keahlian')}}</option>
                                @foreach ($programKeahlian as $progKeahlian)
                                    <option value="{{ $progKeahlian->id }}" 
                                    @if (isset($oldInput['program_keahlian_id']))
                                        {{ ($oldInput['program_keahlian_id'] == $progKeahlian->id) ? 'selected' : '' }}
                                    @endif    
                                    >{{ $progKeahlian->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="text" name="gaji_min" id="gaji_min" placeholder="Gaji Minimum (IDR)" class="form-control form-control-sm" value="{{ (isset($oldInput['gaji_min'])) ? $oldInput['gaji_min'] : '' }}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-block btn-warning bg-dark-green">
                                {{__('Cari Lowongan')}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="nav-list-page-for-dekstop">
                <!-- navigation-list-page -->
                @include('widget.navigation-list-page')
            </div>

        </div>
        <div class="col-md-7 px-2">
            <div class="card mb-3 rounded-0">
                <div class="card-body p-0">
                    <div class="row m-0">
                        <ul class="nav col-md-9">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('/lowongan') }}">{{__('Semua Lowongan')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">{{__('Prakerin')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">{{__('Perusahaan')}}</a>
                            </li>
                        </ul>
                        <div class="col-md-3 text-right py-2">
                            <select id="urutkan-berdasarkan" class="form-control form-control-sm">
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

            <div style="animation: tememplek 0.5s;"  id="card-lowongan" class="card p-3 mt-3">
                <span class="h4 font-weight-bold mb-1 text-primary"><i class="fa fa-bullhorn mr-2"></i>{{__(' Lowongan')}}</span>
                @if ($lowongan->isEmpty())
                    <h3 class="my-3 mx-2 text-muted">{{__('Maaf, Lowongan ')}}{{ (isset($oldInput['judul'])) ? $oldInput['judul'] : '' }}{{__(' tidak ditemukan')}}</h3>
                @else
                    @foreach ($lowongan as $loker)
                        <div id="lowongan" class="my-3">
                            <hr>
                            <div id="njero-lowongan" class="d-flex justify-content-between w-100">
                                <div style="flex: 3">
                                    <a href="{{ url('lowongan/' . encrypt($loker->id_from_lowongan)) }}" class="h5 font-weight-bold text-primary mb-0">{{__( $loker->jabatan )}}</a>
                                    <a href="{{ url('perusahaan/show/' . encrypt($loker->perusahaan_id)) }}" class="text-primary d-block">{{__( $loker->nama_perusahaan )}}</a>
                                    <span class="d-block mt-2"><i class="fa fa-map-marker"></i> {{__( $loker->perusahaan->alamat )}}</span>
                                    <span class="d-block text-muted mb-3"><i class="fa fa-dollar"></i> {{__('IDR')}} {{__( number_format($loker->gaji_min, 0, '.', '.') )}} {{__('-')}} {{__( number_format($loker->gaji_max, 0, '.', '.') )}}</span>
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
        <div class="col-md-2 px-2">
            <img src="https://www.wmtips.com/i/art/547/160x600.gif" alt="">
        </div>
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