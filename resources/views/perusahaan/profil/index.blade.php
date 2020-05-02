@extends('perusahaan.layouts.app')
@section('content')
<div class="container">
	<div class="route">
		<div class="d-flex align-items-center">
			<h2 class="m-0 pl-2">{{__('Halaman Profil Perusahaan')}}</h2>
		</div>
		<div class="d-flex align-items-center justify-content-end">
			<a href="{{ url('/perusahaan') }}">{{__('Beranda ')}}</a><span class="float-right ml-2 text-secondary">{{__(" / Profil")}}</span>
		</div>
	</div>
	<div class="row profil-akun">
		<div class="col-md-8 mt-4 urutan-1">
			<div class="own-card d-flex flex-column">
				<div class="image">
					<div class="judul">
						<h1>{{__('Informasi Perusahaan')}}</h1>
						<hr class="w-75">
					</div>
				</div>
				<div class="profil">
					<div class="foto-profil">
						@if ( $perusahaan->logo === null )
							<img class="rounded-circle" src="{{ asset('/images/noimagecompany.png') }}" alt="">
						@else
							<img src="/storage/assets/daftar-perusahaan/logo/{{ $perusahaan->logo }}" alt="">
						@endif
					</div>
					<div class="informasi ml-2 d-flex flex-column justify-content-start">
						<h2>{{ __($perusahaan->nama) }}</h2>
						<p class="mt-n2">{{ __($bidangKeahlian->nama) }} / {{ __($programKeahlian->nama) }}</p>
						<a class="text-primary" href="">{{ __($perusahaan->email) }}</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4 mt-4 urutan-2">
			<div class="own-card p-4">
				<h5 class="font-weight-bold pb-2">{{__('Status')}}</h5>
				<div class="d-flex align">
					@if ($user->can('melakukan verifikasi'))
						<i class="fa fa-exclamation-circle fa-5x mr-4 w-25 h-100  my-auto mx-auto text-danger"></i>
					@endif
					@if ($user->can('menunggu verifikasi diterima'))
						<i class="fa fa-refresh fa-5x mr-4 w-25 h-100  my-auto mx-auto text-muted"></i>
					@endif
					@if ($user->can('terverifikasi'))
						<i class="fa fa-check-square-o fa-5x mr-4 w-25 h-100  my-auto mx-auto text-success"></i>
					@endif
					<h5 class="font-weight-bold w-75 h-100 my-auto ml-3">
						@if ($user->can('melakukan verifikasi'))
							{{__('Belum Verifikasi')}}
						@endif
						@if ($user->can('menunggu verifikasi diterima'))
							{{__('Menunggu Verifikasi')}}
						@endif
						@if ($user->can('terverifikasi'))
							{{__('Terverifikasi')}}
						@endif
					</h5>
				</div>
			</div>
			<div class="own-card p-4 mt-4">
				<h5 class="font-weight-bold pb-3">{{__('Lowongan')}}</h5>
				<div class="d-flex align-items-center justify-content-around">
					<h1 class="mt-n1">{{ __($jmlLowongan) }}</h1>
					<h5 class="font-weight-bold w-75 h-100 my-auto ml-3">{{__('Lowongan Pekerjaan Diposkan')}}</h5>
				</div>
			</div>
		</div>
		<div class="col-md-8 mt-4 urutan-3">
			<div class="card p-4">
				<h6 class="font-weight-bold">{{__('INFO KONTAK DAN PERUSAAAN')}}</h6>
				<table class="table tabel-informasi mt-3">
					<tr>
						<td><i class="fa fa-envelope-o mr-2"></i> {{__('Email')}}</td>
						<td>{{ $perusahaan->email }}</td>
					</tr>
					<tr>
						<td><i class="fa fa-phone mr-2"></i> {{__('Telepon')}}</td>
						<td>{{ $perusahaan->telp }}</td>
					</tr>
					<tr>
						<td><i class="fa fa-building-o mr-2"></i> {{__('Kategori')}}</td>
						<td>{{ $perusahaan->kategori }}</td>
					</tr>
					<tr>
						<td><i class="fa fa-map-o mr-2"></i> {{__('Alamat')}}</td>
						<td>{{ $perusahaan->alamat }}</td>
					</tr>
				</table>
				<hr class="mt-n1">
				<h6 class="mt-4 text-muted font-weight-bold">{{__('INFORMASI ALAMAT')}}</h6>
				<table class="table tabel-informasi mt-3">
					<tr>
						<td>{{__('Negara')}}</td>
						<td>{{ $perusahaan->negara }}</td>
					</tr>
					<tr>
						<td>{{__('Provinsi')}}</td>
						<td>{{ $perusahaan->provinsi }}</td>
					</tr>
					<tr>
						<td>{{__('Kabupaten / Kota')}}</td>
						<td>{{ $perusahaan->kabupaten }}</td>
					</tr>
					<tr>
						<td>{{__('Kode Pos')}}</td>
						<td>{{ $perusahaan->kodepos }}</td>
					</tr>
				</table>
				<hr class="mt-n1">
				<h6 class="mt-4 text-muted font-weight-bold">{{__('INFORMASI PERUSAHAAN')}}</h6>
				<table class="table tabel-informasi mt-3">
					<tr>
						<td>{{__('Bidang Keahlian')}}</td>
						<td>{{ $bidangKeahlian->nama }}</td>
					</tr>
					<tr>
						<td>{{__('Program Keahlian')}}</td>
						<td>{{ $programKeahlian->nama }}</td>
					</tr>
					<tr>
						<td>{{__('Jumlah Karyawan')}}</td>
						<td>{{ $perusahaan->jumlah_karyawan }}</td>
					</tr>
					<tr>
						<td>{{__('Waktu Proses Perekrutan')}}</td>
						<td>{{ $perusahaan->waktu_proses_perekrutan }}</td>
					</tr>
					<tr>
						<td>Gaya Berpakaian</td>
						<td>{{ $perusahaan->gaya_berpakaian }}</td>
					</tr>
					<tr>
						<td>{{__('Bahasa')}}</td>
						<td>{{ $perusahaan->bahasa }}</td>
					</tr>
					<tr>
						<td>{{__('Waktu Bekerja')}}</td>
						<td>{{ $perusahaan->waktu_bekerja }}</td>
					</tr>
					<tr>
						<td>{{__('Tunjangan')}}</td>
						<td>{{ $perusahaan->tunjangan }}</td>
					</tr>
					<tr>
						<td>{{__('Overview')}}</td>
						<td>{{ $perusahaan->overview }}</td>
					</tr>
					<tr>
						<td>{{__('Alasan Harus Melamar')}}</td>
						<td>{{ $perusahaan->alasan_harus_melamar }}</td>
					</tr>
				</table>
				<hr class="mt-n1">
				<h6 class="mt-4 text-muted font-weight-bold">{{__('INFORMASI LAINYA')}}</h6>
				<table class="table tabel-informasi mt-3">
					<tr>
						<td>{{__('Fax')}}</td>
						<td>{{ $perusahaan->fax }}</td>
					</tr>
					<tr>
						<td>{{__('Site')}}</td>
						<td>{{ $perusahaan->site }}</td>
					</tr>
					<tr>
						<td>{{__('Facebook')}}</td>
						<td>{{ $perusahaan->facebook }}</td>
					</tr>
					<tr>
						<td>{{__('Instagram')}}</td>
						<td>{{ $perusahaan->instagram }}</td>
					</tr>
					<tr>
						<td>{{__('Linkedin')}}</td>
						<td>{{ $perusahaan->linkedin }}</td>
					</tr>
				</table>
			</div>
			<a class="text-decoration-none" href="{{ url('/perusahaan/profil/ubah') }}">
				<div class="card w-100 text-center p-2 mt-2 text-dark" style="font-size: 1rem">
					<span><i class="fa fa-edit text-primary"></i> {{__('Ubah Data Perusahaan')}}</span>
				</div>
			</a>


		</div>
		<div class="col-md-4 mt-4 urutan-4">
			<div class="own-card p-4">
				<h5 class="font-weight-bold pb-2">{{__('Image Perusahaan')}}</h5>
				@if ($perusahaan->image == null)
					<img class="cover w-100" src="{{ asset('/images/jakarta-office-building-vector-illustration_47305-12.jpg') }}" alt="">
				@else
					<img class="cover w-100" src="/storage/assets/daftar-perusahaan/image/{{ $perusahaan->image }}" alt="">
				@endif
			</div>
		</div>
	</div>
</div>
@endsection