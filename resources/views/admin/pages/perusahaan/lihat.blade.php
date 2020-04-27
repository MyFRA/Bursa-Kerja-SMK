<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO -->
    {!! SEO::generate() !!}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/aos-master/dist/aos.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body style="background-color: #F0F2F7" class="pb-5">
    <div id="app">
		<div class="container">
			<div class="row profil-akun">
				<div class="col-md-8 mt-4 urutan-1">
					<div class="own-card d-flex flex-column">
						<div class="image">
							<div class="judul">
								<h1>Informasi Perusahaan</h1>
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
								<h2>{{ $perusahaan->nama }}</h2>
								<p class="mt-n2">{{ $bidangKeahlian->nama }} / {{ $programKeahlian->nama }}</p>
								<a class="text-primary" href="">{{ $perusahaan->email }}</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4 mt-4 urutan-2">
					<div class="own-card p-4">
						<h5 class="font-weight-bold pb-2">Status</h5>
						<div class="d-flex align">
							@if ($user->can('melakukan verifikasi'))
								<i class="fa fa-exclamation-circle fa-5x mr-4 w-25 h-100  my-auto mx-auto text-danger"></i>
							@endif
							@if ($user->can('menunggu verifikasi diterima'))
								<i class="fa fa-refresh fa-5x mr-4 w-25 h-100  my-auto mx-auto text-muted"></i>
							@endif
							@if ($user->can('terverifikasi'))
								<i class="fa fa-check fa-5x mr-4 w-25 h-100  my-auto mx-auto text-success"></i>
							@endif
							<h5 class="font-weight-bold w-75 h-100 my-auto ml-3">
								@if ($user->can('melakukan verifikasi'))
									Belum Verifikasi
								@endif
								@if ($user->can('menunggu verifikasi diterima'))
									Menunggu Verifikasi
								@endif
								@if ($user->can('terverifikasi'))
									Terverifikasi
								@endif
							</h5>
						</div>
					</div>
					<div class="own-card p-4 mt-4">
						<h5 class="font-weight-bold pb-3">Lowongan</h5>
						<div class="d-flex align-items-center justify-content-around">
							<h1 class="mt-n1">10</h1>
							<h5 class="font-weight-bold w-75 h-100 my-auto ml-3">Lowongan Pekerjaan Diposkan</h5>
						</div>
					</div>
				</div>
				<div class="col-md-8 mt-4 urutan-3">
					<div class="card p-4">
						<h6 class="font-weight-bold">INFO KONTAK DAN PERUSAAAN</h6>
						<table class="table tabel-informasi mt-3">
							<tr>
								<td><i class="fa fa-envelope-o mr-2"></i> Email</td>
								<td>{{ $perusahaan->email }}</td>
							</tr>
							<tr>
								<td><i class="fa fa-phone mr-2"></i> Telepon</td>
								<td>{{ $perusahaan->telp }}</td>
							</tr>
							<tr>
								<td><i class="fa fa-building-o mr-2"></i> Kategori</td>
								<td>{{ $perusahaan->kategori }}</td>
							</tr>
							<tr>
								<td><i class="fa fa-map-o mr-2"></i> Alamat</td>
								<td>{{ $perusahaan->alamat }}</td>
							</tr>
						</table>
						<hr class="mt-n1">
						<h6 class="mt-4 text-muted font-weight-bold">INFORMASI ALAMAT</h6>
						<table class="table tabel-informasi mt-3">
							<tr>
								<td>Negara</td>
								<td>{{ $perusahaan->negara }}</td>
							</tr>
							<tr>
								<td>Provinsi</td>
								<td>{{ $perusahaan->provinsi }}</td>
							</tr>
							<tr>
								<td>Kabupaten / Kota</td>
								<td>{{ $perusahaan->kabupaten }}</td>
							</tr>
							<tr>
								<td>Kode Pos</td>
								<td>{{ $perusahaan->kodepos }}</td>
							</tr>
						</table>
						<hr class="mt-n1">
						<h6 class="mt-4 text-muted font-weight-bold">INFORMASI PERUSAHAAN</h6>
						<table class="table tabel-informasi mt-3">
							<tr>
								<td>Bidang Keahlian</td>
								<td>{{ $bidangKeahlian->nama }}</td>
							</tr>
							<tr>
								<td>Program Keahlian</td>
								<td>{{ $programKeahlian->nama }}</td>
							</tr>
							<tr>
								<td>Jumlah Karyawan</td>
								<td>{{ $perusahaan->jumlah_karyawan }}</td>
							</tr>
							<tr>
								<td>Waktu Proses Perekrutan</td>
								<td>{{ $perusahaan->waktu_proses_perekrutan }}</td>
							</tr>
							<tr>
								<td>Gaya Berpakaian</td>
								<td>{{ $perusahaan->gaya_berpakaian }}</td>
							</tr>
							<tr>
								<td>Bahasa</td>
								<td>{{ $perusahaan->bahasa }}</td>
							</tr>
							<tr>
								<td>Waktu Bekerja</td>
								<td>{{ $perusahaan->waktu_bekerja }}</td>
							</tr>
							<tr>
								<td>Tunjangan</td>
								<td>{{ $perusahaan->tunjangan }}</td>
							</tr>
							<tr>
								<td>Overview</td>
								<td>{{ $perusahaan->overview }}</td>
							</tr>
							<tr>
								<td>Alasan Harus Melamar</td>
								<td>{{ $perusahaan->alasan_harus_melamar }}</td>
							</tr>
						</table>
						<hr class="mt-n1">
						<h6 class="mt-4 text-muted font-weight-bold">INFORMASI LAINYA</h6>
						<table class="table tabel-informasi mt-3">
							<tr>
								<td>Fax</td>
								<td>{{ $perusahaan->fax }}</td>
							</tr>
							<tr>
								<td>Site</td>
								<td>{{ $perusahaan->site }}</td>
							</tr>
							<tr>
								<td>Facebook</td>
								<td>{{ $perusahaan->facebook }}</td>
							</tr>
							<tr>
								<td>Instagram</td>
								<td>{{ $perusahaan->instagram }}</td>
							</tr>
							<tr>
								<td>Linkedin</td>
								<td>{{ $perusahaan->linkedin }}</td>
							</tr>
						</table>
					</div>


				</div>
				<div class="col-md-4 mt-4 urutan-4">
					<div class="own-card p-4">
						<h5 class="font-weight-bold pb-2">Image Perusahaan</h5>
						@if ($perusahaan->image == null)
							<img class="cover w-100" src="{{ asset('/images/jakarta-office-building-vector-illustration_47305-12.jpg') }}" alt="">
						@else
							<img class="cover w-100" src="/storage/assets/daftar-perusahaan/image/{{ $perusahaan->image }}" alt="">
						@endif
					</div>
				</div>
			</div>
		</div>
    </div>
    <script src="{{ asset('plugins/aos-master/dist/aos.js') }}"></script>
    @yield('script')
    <script>   
       AOS.init(); 
    </script>
</body>
</html>
