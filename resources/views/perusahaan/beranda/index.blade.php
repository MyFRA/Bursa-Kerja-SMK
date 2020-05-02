@extends('perusahaan.layouts.app')
@section('content')
<div class="container">
	<div class="route">
		<div class="d-flex align-items-center">
			<h2 class="m-0 pl-2">{{__('Portal Perusahaan Monokrom')}}</h2>
		</div>
		<div class="d-flex align-items-center justify-content-end">
			<a href="">{{__('Beranda')}} </a><span class="float-right ml-2">{{__('/ Dasbor Perusahaan')}}</span>
		</div>
	</div>

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
					<h2>{{__('0')}}</h2>
					<p>{{__('Total Pelamar')}}</p>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-sm-6">
			<div class="card p-3 d-flex flex-row justify-content-center align-items-center">
				<i class="fa fa-bullhorn fa-3x text-success"></i>
				<div class="d-flex justify-content-center align-items-start flex-column ml-1">
					<h2>{{__('0')}}</h2>
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
		<div class="col-lg-3 mt-4">
			<div class="card p-0">
				<div class="header pt-3 pb-2">
					<h6 class="font-weight-bold">{{__('LOG AKTIVITAS')}}</h6>
				</div>
				<div class="body pt-2 pb-1">
					<img src="{{ asset('/images/untitled-1-_1_.png') }}" alt="">
				</div>
			</div>
		</div>
		<div class="col-lg-6  mt-4">
			<div class="card p-0">
				<div class="header pt-3 pb-2">
					<h6 class="font-weight-bold">{{__('LOWONGAN BARU DIPOSKAN')}}</h6>
				</div>
				<div class="body pt-2 pb-1">
					<img src="{{ asset('/images/lightboard_dribbble_-_recent_illustration11.png') }}" alt="">
				</div>
			</div>
		</div>
		<div class="col-lg-3  mt-4">
			<div class="card p-0">
				<div class="header pt-3 pb-2">
					<h6 class="font-weight-bold">{{__('PENDAFTAR LOKER TERBARU')}}</h6>
				</div>
				<div class="body pt-2 pb-1">
					<img src="{{ asset('/images/untitled-1-_1_.png') }}" alt="">
				</div>
			</div>
		</div>
	</div>
</div>
@endsection