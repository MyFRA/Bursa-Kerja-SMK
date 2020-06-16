@extends('perusahaan.layouts.app')
@section('content')

<div class="container">
	<div class="route">
		<div class="d-flex align-items-center">
			<h2 class="m-0 pl-2">{{__('Portal Perusahaan ')}} {{ $user->name }}</h2>
		</div>
		<div class="d-flex align-items-center justify-content-end">
			<a href="">{{__('Beranda')}} </a><span class="float-right ml-2">{{__('/ Dasbor Perusahaan')}}</span>
		</div>
	</div>

	@if (session('success'))
		<div class="row">
			<div class="col mt-4">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>{{__('Terima Kasih')}}</strong>{{ session('success') }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		</div>
	@endif

	@can('melakukan verifikasi')
	  	<div class="row minta-verivikasi">
			<div class="col">
				<div class="card d-flex flex-column justify-content-center text-center">
					<h2>{{__('Untuk proses verifikasi kemitraan, mohon lengkapi data perusahaan anda')}}</h2>
					<p class="mt-2 text-muted">{{__('Mohon maaf, anda belum dapat melakukan posting lowongan dan menggunakan fitur perusahaan ini sebelum status kemitraan perusahaan anda terverifikasi oleh BKK. Jika dalam waktu 1 minggu belum ada proses verifikasi dari BKK, anda dapat mengirim email ke BKK di bkk@smkn3jogja.sch.id')}}</p>
					<a href="{{ url('/perusahaan/verifikasi') }}">{{__('Lengkapi Data Perusahaan Sekarang')}}</a>
				</div>
			</div>
		</div>
	@endcan

	@can('menunggu verifikasi diterima')
		<div class="row minta-verivikasi">
			<div class="col">
				<div class="card d-flex flex-column justify-content-center text-center">
					<h2>{{__('Menunggu Verifikasi Diterima')}}</h2>
					<p class="mt-2 text-muted">{{__('Terimakasih, karena telah melakukan verifikasi perusahaan. Jika dalam waktu 1 minggu belum ada konfirmasi dari BKK, anda dapat mengirim email ke BKK di bkk@smkn3jogja.sch.id.')}} </p>
					<a href="{{ url('/perusahaan/profil/ubah') }}">{{__('Ubah Data Perusahaan')}}</a>
				</div>
			</div>
		</div>
	@endcan

	<div class="row kumpulan-card-beranda mt-4">
		<div class="col-lg-3 col-sm-6">
			<div class="card p-3 d-flex flex-row justify-content-center align-items-center">
				<i class="fa fa-suitcase fa-3x text-danger"></i>
				<div class="d-flex justify-content-center align-items-start flex-column ml-1">
					<h2>{{__($jmlLowongan)}}</h2>
					<p>{{__('Lowongan Diinput')}}</p>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-sm-6">
			<div class="card p-3 d-flex flex-row justify-content-center align-items-center">
				<i class="fa fa-users fa-3x text-primary"></i>
				<div class="d-flex justify-content-center align-items-start flex-column ml-1">
					<h2>{{__( $jmlLamaran )}}</h2>
					<p>{{__('Total Pelamar')}}</p>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-sm-6">
			<div class="card p-3 d-flex flex-row justify-content-center align-items-center">
				<i class="fa fa-bullhorn fa-3x text-success"></i>
				<div class="d-flex justify-content-center align-items-start flex-column ml-1">
					<h2>{{__( $panggilanTes )}}</h2>
					<p>{{__('Panggilan Tes Diposkan')}}</p>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-sm-6">
			<div class="card p-3 d-flex flex-row justify-content-center align-items-center">
				@if ($user->can('melakukan verifikasi'))
					<i class="fa fa-warning fa-3x text-danger"></i>
				@endif
				@if ($user->can('menunggu verifikasi diterima'))
					<i class="fa fa-refresh fa-3x text-secondary"></i>
				@endif
				@if ($user->can('terverifikasi'))
					<i class="fa fa-check-square-o fa-3x text-success"></i>
				@endif
				<div class="d-flex justify-content-center align-items-start flex-column ml-1">
					@if ($user->can('melakukan verifikasi'))
						<h3>{{__('Belum')}}</h3>
					@endif
					@if ($user->can('menunggu verifikasi diterima'))
						<h3>{{__('Diproses')}}</h3>
					@endif
					@if ($user->can('terverifikasi'))
						<h3>{{__('Terverifikasi')}}</h3>
					@endif
					<p>{{__('Status Kemitraan')}}</p>
				</div>
			</div>
		</div>
	</div>

	<div class="row kumpulan-card-beranda-bawah ">
		<div class="col-lg-3 mt-4 order-3 order-lg-1">
			<div class="card p-0">
				<div class="header pt-3 pb-2">
					<h6 class="font-weight-bold">{{__('LOG AKTIVITAS')}}</h6>
				</div>
				<div class="body pt-2 pb-1">
					<img src="{{ asset('/images/untitled-1-_1_.png') }}" alt="">
				</div>
			</div>
		</div>
		<div class="col-lg-6 mt-4 order-1 order-lg-2">
			<div class="card p-0">
				<div class="header pt-3 pb-2">
					<h6 class="font-weight-bold">{{__('LOWONGAN BARU DIPOSKAN')}}</h6>
				</div>
				<div class="body pt-2 pb-1">
					@if (empty($lastLowongan))
						<img src="{{ asset('/images/lightboard_dribbble_-_recent_illustration11.png') }}" alt="">
					@else
						<div class="row px-2 d-flex align-items-center justify-content-center">
							<div class="col-lg-4">
								<div class="text-center">
									<img class="rounded w-50 w-lg-75" src="{{  ($perusahaan->logo == null ) ? asset('/images/company.png') : asset('/storage/assets/daftar-perusahaan/logo/' . $perusahaan->logo) }}" alt="">
								</div>
							</div>
							<div class="col-lg-8">
								<div class="mt-3">
									<table class="table table-responsive">
										<tr>
											<th class="border-0 pb-0" scope="col">Lowongan</th>
											<th class="border-0 pb-0" scope="col">:</th>
											<th class="border-0 pb-0" scope="col"><a href="{{ url('lowongan/' . encrypt($lastLowongan->id)) }}">{{__( $lastLowongan->jabatan )}}</a></th>
										</tr>
										<tr>
                                            <tr>
												<th class="border-0 pb-0" scope="col">{{__('Jumlah Pelamar')}}</th>
												<th class="border-0 pb-0" scope="col">{{__(':')}}</th>
												<th class="border-0 pb-0" scope="col"> {!! ($lastLowongan->proses_lamaran == 'Offline') ? '<i class="fa fa-circle text-danger mr-1" style="font-size: 8px"></i> <span>Offline</span>' : $lastLowongan->jumlah_pelamar !!} </th>
										</tr>
										<tr>
											<th class="border-0 pb-0" scope="col">Pelamar</th>
                                            <th class="border-0 pb-0" scope="col">:</th>
                                            <th class="border-0 pb-0" scope="col">
                                                @if ($lastLowongan->proses_lamaran == 'Offline')
                                                    <i class="fa fa-circle text-danger mr-1" style="font-size: 8px"></i> <span>Offline</span>
                                                @else
                                                    <a href="{{ url('/perusahaan/lowongan/' . encrypt($lastLowongan->id) . '/pelamar') }}" class="btn btn-sm btn-success"><i class="fa fa-user mr-2"></i> Lihat Pelamar</a>
                                                @endif
                                            </th>
										</tr>
										<tr>
											<th class="border-0 pb-0" scope="col">Status</th>
											<th class="border-0 pb-0" scope="col">:</th>
											<th class="border-0 pb-0" scope="col">
												@if ($lastLowongan->status == 'Aktif')
													<span class="btn btn-sm btn-success"><i class="fa fa-check mr-2"></i> {{$lastLowongan->status}} </span>
												@elseif($lastLowongan->status == 'Nonaktif')
													<span class="btn btn-sm btn-danger"><i class="fa fa-ban mr-2"></i> {{$lastLowongan->status}} </span>
												@elseif($lastLowongan->status == 'Draf')
													<span class="btn btn-sm btn-secondary"><i class="fa fa-file-text-o mr-2"></i> {{$lastLowongan->status}} </span>
												@endif
											</th>
										</tr>
										<tr>
											<th class="border-0 pb-0" scope="col">Berakhir</th>
											<th class="border-0 pb-0" scope="col">:</th>
											<th class="border-0 pb-0" scope="col">
												{{ date('d M Y', strtotime($lastLowongan->batas_akhir_lamaran)) }}
											</th>
										</tr>
									</table>
								</div>
							</div>
						</div>
					@endif
				</div>
			</div>
		</div>
		<div class="col-lg-3 mt-4 order-2 order-lg-3">
			<div class="card p-0">
				<div class="header pt-3 pb-2">
					<h6 class="font-weight-bold">{{__('PENDAFTAR LOKER TERBARU')}}</h6>
				</div>
				<div class="body pt-2 pb-1">
					@if (empty($lastPelamar))
						<img src="{{ asset('/images/untitled-1-_1_.png') }}" alt="">
					@else
						<ul class="mt-2">
							@foreach ($lastPelamar as $pelamar)
								<li>
									<a href="{{ url('/perusahaan/lowongan/show/pelamar/' . encrypt($pelamar->id)) }}">{{ $pelamar->siswa->user->name }}</a>
								</li>
							@endforeach
						</ul>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
