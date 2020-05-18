@extends('layouts.app')
@section('content')
	<div class="pages-beranda-lowongan">
		<div class="pages-beranda-cari-lowongan">
			{{-- For Dekstop --}}
			<input id="for-dekstop" type="text" placeholder="Mencari berdasarkan posisi, keahlian dan kata kunci">
			<button id="for-dekstop"><i class="fa fa-search"></i></button>
			{{-- For Mobile --}}
			<input id="for-mobile" class="d-none w-100" type="text" placeholder="Mencari berdasarkan posisi, keahlian dan kata kunci">
			<button id="for-mobile" ><i class="fa fa-search"></i></button>
		</div>
		<div class="container beranda-lowongan-index">
			<div class="row">
				<div class="col-lg-8 px-2 mt-3">
			        <div style="animation: tememplek 0.5s;"  class="card p-3 ">
			        	<div id="atas-kotakan-profil" class="d-md-flex justify-content-between">
			        		<div id="kotakan-profil" class="d-md-flex justify-content-start align-items-center" style="flex: 2">
								<img src="{{ url('/images/resume-no-photo.webp') }}" alt="" width="60px" height="60" style="object-fit: cover;object-position: center;">
				        		<div class="d-md-flex section-profil flex-column ml-md-4">
				        			<span class="h4 mb-1 "><a href="">{{ $user->name }}</a></span>
				        			<span style="font-size: 13px">{{ $user->siswa->siswaPendidikan->tingkat_sekolah }}, {{ $kompetensiKeahlian->nama }} ({{ $user->siswa->siswaPendidikan->bulan_lulus }} {{ $user->siswa->siswaPendidikan->tahun_lulus }})</span>
				        			<span style="font-size: 13px">{{ $user->siswa->siswaPendidikan->nama_sekolah }}</span>
				        		</div>
			        		</div>
				        	<div class="d-md-flex align-items-end flex-column section-perb-profil-saya" style="flex: 1;">
				        		<a class="btn btn-primary" href="{{ url('/siswa/profil') }}">Perbarui Profil Saya</a>
				        		<span class="small mt-2">Diperbarui pada 21-09-2020</span>
				        	</div>
			        	</div>
	        		</div>
	        		<div style="animation: tememplek 0.5s;"  id="card-lowongan" class="card p-3 mt-3">
	        			<span class="h4 font-weight-bold mb-1 text-primary"><i class="fa fa-bullhorn"></i> Rekomendasi Lowongan</span>
	        			<span class="mt-3">Rekomendasi lowongan berdasarkan profil dan resume Anda</span>
	        			<div id="lowongan">
	        				<hr>
	        				<div id="njero-lowongan" class="d-flex justify-content-between w-100">
	        					<div style="flex: 3">
									<a href="{{ url('/lowongan/programmer-pt-dua-putra-5348') }}" class="h5 font-weight-bold text-primary mb-0">Programmer</a>
			        				<span class="text-muted d-block">PT Dua Putra Utama Makmur Tbk </span>
			        				<span class="d-block mt-2"><i class="fa fa-map-marker"></i> Bali, Jakarta Raya, Jawa Barat, Jawa Tengah, Jawa Timur</span>
			        				<span class="d-block text-muted mb-3"><i class="fa fa-dollar"></i> IDR 4,000,000 - 6,000,000</span>
	        						<p id="deskripsi" class="mt-4">Deskripsi Pekerjaan: Membuat website, aplikasi, dan report sesuai kebutuhan perusahaan. Mengembangkan aplikasi yang sudah berjalan. Membuat manual...</p>
	        						<span id="waktu" class="text-muted">30 Apr - 1:00 AM</span>
	        					</div>
	        					<div id="contain-img" style="flex: 1">
	        						<img class="float-right" src="{{ asset('/images/offer.png') }}" alt="" width="150">
	        					</div>
	        				</div>
	        			</div>
	        			<div id="lowongan">
	        				<hr>
	        				<div id="njero-lowongan" class="d-flex justify-content-between w-100">
	        					<div style="flex: 3">
	        			        	<a href="" class="h5 font-weight-bold text-primary mb-0">Programmer</a>
			        				<span class="text-muted d-block">PT Dua Putra Utama Makmur Tbk </span>
			        				<span class="d-block mt-2"><i class="fa fa-map-marker"></i> Bali, Jakarta Raya, Jawa Barat, Jawa Tengah, Jawa Timur</span>
			        				<span class="d-block text-muted mb-3"><i class="fa fa-dollar"></i> IDR 4,000,000 - 6,000,000</span>
	        						<p id="deskripsi" class="mt-4">Deskripsi Pekerjaan: Membuat website, aplikasi, dan report sesuai kebutuhan perusahaan. Mengembangkan aplikasi yang sudah berjalan. Membuat manual...</p>
	        						<span id="waktu" class="text-muted">30 Apr - 1:00 AM</span>
	        					</div>
	        					<div id="contain-img" style="flex: 1">
	        						<img class="float-right" src="{{ asset('/images/13352_logo_0.jpg') }}" alt="" width="150">
	        					</div>
	        				</div>
	        			</div>
	        			<div id="lowongan">
	        				<hr>
	        				<div id="njero-lowongan" class="d-flex justify-content-between w-100">
	        					<div style="flex: 3">
	        			        	<a href="" class="h5 font-weight-bold text-primary mb-0">Programmer</a>
			        				<span class="text-muted d-block">PT Dua Putra Utama Makmur Tbk </span>
			        				<span class="d-block mt-2"><i class="fa fa-map-marker"></i> Bali, Jakarta Raya, Jawa Barat, Jawa Tengah, Jawa Timur</span>
			        				<span class="d-block text-muted mb-3"><i class="fa fa-dollar"></i> IDR 4,000,000 - 6,000,000</span>
	        						<p id="deskripsi" class="mt-4">Deskripsi Pekerjaan: Membuat website, aplikasi, dan report sesuai kebutuhan perusahaan. Mengembangkan aplikasi yang sudah berjalan. Membuat manual...</p>
	        						<span id="waktu" class="text-muted">30 Apr - 1:00 AM</span>
	        					</div>
	        					<div id="contain-img" style="flex: 1">
	        						<img class="float-right" src="{{ asset('/images/offer.png') }}" alt="" width="150">
	        					</div>
	        				</div>
	        			</div>
	        			<div id="lowongan">
	        				<hr>
	        				<div id="njero-lowongan" class="d-flex justify-content-between w-100">
	        					<div style="flex: 3">
	        			        	<a href="" class="h5 font-weight-bold text-primary mb-0">Programmer</a>
			        				<span class="text-muted d-block">PT Dua Putra Utama Makmur Tbk </span>
			        				<span class="d-block mt-2"><i class="fa fa-map-marker"></i> Bali, Jakarta Raya, Jawa Barat, Jawa Tengah, Jawa Timur</span>
			        				<span class="d-block text-muted mb-3"><i class="fa fa-dollar"></i> IDR 4,000,000 - 6,000,000</span>
	        						<p id="deskripsi" class="mt-4">Deskripsi Pekerjaan: Membuat website, aplikasi, dan report sesuai kebutuhan perusahaan. Mengembangkan aplikasi yang sudah berjalan. Membuat manual...</p>
	        						<span id="waktu" class="text-muted">30 Apr - 1:00 AM</span>
	        					</div>
	        					<div id="contain-img" style="flex: 1">
	        						<img class="float-right" src="{{ asset('/images/13352_logo_0.jpg') }}" alt="" width="150">
	        					</div>
	        				</div>
	        			</div>
	        		</div>
	        	</div>
		        <div style="animation: tememplek 0.5s;"  class="col-lg-4 px-2 mt-3">
		        	<div class="card p-3">
	        			<span class="h4 font-weight-bold mb-1 text-primary"><i class="fa fa-bullhorn"></i> Iklan</span>
	        			<img class="mt-3 w-100" src="{{ asset('/images/13114884417508000838.gif') }}" alt="">
		        	</div>
		        	<div class="card p-3 mt-3">
	        			<span class="h4 font-weight-bold mb-1 text-primary"><i class="fa fa-commenting-o"></i> Sosial Media</span>
		        		<div class="mt-4">
		        			<div class="h5 d-flex align-items-center mt-1">
			        			<i class="fa fa-facebook-square fa-2x" style="color: #3B5999"></i>
			        			<a class="ml-2" href=""> Facebook</a>
			        		</div>
			        		<div class="h5 d-flex align-items-center mt-1">
			        			<i class="fa fa-twitter-square fa-2x" style="color: #2CA9E1"></i>
			        			<a class="ml-2" href=""> Twitter</a>
			        		</div>
			        		<div class="h5 d-flex align-items-center mt-1">
			        			<i class="fa fa-instagram fa-2x" style="color: #EF5686"></i>
			        			<a class="ml-2" href=""> Instagram</a>
			        		</div>
		        		</div>
		        	</div>
		        </div>
			</div>
		</div>
		<br>
		<br>
	</div>
@endsection


@section('script')

	<script>
		const tombol = document.querySelector('.pages-beranda-cari-lowongan button#for-mobile');
		const input  = document.querySelector('.pages-beranda-cari-lowongan input#for-mobile');



		tombol.addEventListener('click', function () {
			if( input.classList.contains('d-none') ) {
				input.classList.remove('d-none');
			} else {
				alert(input.value)
			}
		});

	</script>

@endsection