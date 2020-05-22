@extends('perusahaan.layouts.app')
@section('content')
	<div class="container">
		<div class="route">
			<div class="d-flex align-items-center">
				<h2 class="m-0 pl-2">{{__('Edit Data Perusahaan')}}</h2>
			</div>
			<div class="d-flex align-items-center justify-content-end">
				<a href="{{ url('/perusahaan') }}">{{__('Beranda ')}}</a><span class="float-right ml-2 text-secondary">{{__(" / Verifikasi")}}</span>
			</div>
		</div>

		@if (session('success'))
			<div class="row">
				<div class="col mt-4">
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>{{__('Berhasil')}}</strong> {{ session('success') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			</div>
		@endif

		@if (session('gagal'))
			<div class="row">
				<div class="col mt-4">
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>{{__('Gagal')}}</strong> {{ session('gagal') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			</div>
		@endif

		<div class="row mt-4 form-verifikasi-perusahaan">
			<div class="col-lg-8 {{ session('success') || session('gagal') ? 'mt-2' : 'mt-2' }}">
				<div class="card">
					<h6 class="font-weight-bold mt-2 mb-3">{{__("EDIT INFORMASI PERUSAHAAN")}}</h6>
					<form method="post" action="{{ url('/perusahaan/profil/update') }}" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="form-group">
							<div class="title"></div>
							<h4>{{__('Unggah Logo dan Foto Sampul Perusahaan')}}</h4>
							<p>{{__('Disarankan, logo perusahaan yang anda unggah adalah persegi guna memaksimalkan tampilan.')}}</p>
						</div>		
						<div class="form-group">
							<label for="logo">{{__('Upload Logo Perusahaan')}}</label>
							<input type="file" onChange='return validasiFile(this)' class="form-control-file mt-1" id="logo" name="logo">
						</div>
						<div class="form-group">
							<label for="image">{{__('Upload Foto Sampul Perusahaan')}}</label>
							<input type="file" onChange='return validasiFile(this)' class="form-control-file mt-1" id="image" name="image">
						</div>
						<div class="form-group">
							<h4>{{__('Informasi Dasar Perusahaan')}}</h4>
							<p>{{__('Informasi berisi nama perusahan anda, bidang perusahaan dan informasi umum lainnya.')}}</p>
						</div>
						<div class="d-flex">
							<div>
								<div class="form-group">
									<label for="nama">{{__('Nama Perusahaan ')}}<span class="text-danger">{{__('*')}}</span></label>
									<input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama Perusahaan" required="" value="{{ old('nama') ? old('nama') : $perusahaan->nama }}">
								
									@error('nama')
									<h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
									@enderror
								</div>
							</div>
							<div>
								<div class="form-group">
									<label for="kategori">{{__('Kategori ')}}<span class="text-danger">{{__('*')}}</span></label>
									<select class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori" required>
										<option value="" disabled="" selected>{{__('-- Pilih Kategori --')}}</option>
										<option value="Negeri" 
											@if (old('kategori'))
												{{ (old('kategori') == 'Negeri') ? 'selected' : '' }}
											@else
												{{ ($perusahaan->kategori == 'Negeri') ? 'selected' : '' }}
											@endif
										>{{__('Negeri')}}</option>

										<option value="Swasta" 
											@if (old('kategori'))
												{{ (old('kategori') == 'Swasta') ? 'selected' : '' }}
											@else
												{{ ($perusahaan->kategori == 'Swasta') ? 'selected' : '' }}
											@endif
										>{{__('Swasta')}}</option>

										<option value="BUMN" 
											@if (old('kategori'))
												{{ (old('kategori') == 'BUMN') ? 'selected' : '' }}
											@else
												{{ ($perusahaan->kategori == 'BUMN') ? 'selected' : '' }}
											@endif
										>{{__('BUMN')}}</option>
									</select>
								
									@error('kategori')
									<h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
									@enderror
								</div>
							</div>
						</div>
						<div class="d-flex">
							<div>
								<div class="form-group">
									<label for="pilih_bidang_keahlian">{{__('Bidang Keahlian')}} <span class="text-danger">{{__('*')}}</span></label>
									<select class="form-control @error('bidang_keahlian_id') is-invalid @enderror" id="pilih_bidang_keahlian" name="bidang_keahlian_id" required>
										<option value="" selected="" disabled="">{{__('-- Pilih Bidang Keahlian --')}}</option>
										@foreach ($bidangKeahlian as $bk)
											<option value="{{ $bk->id }}" 
												@if (old('bidang_keahlian_id'))
													{{ (old('bidang_keahlian_id') == $bk->id) ? 'selected' : '' }}
												@else
													{{ ($perusahaan->bidang_keahlian_id == $bk->id) ? 'selected' : '' }}
												@endif	
											>{{$bk->nama}}</option>
										@endforeach
									</select>
								
									@error('bidang_keahlian_id')
									<h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
									@enderror
								</div>
							</div>
							<div>
								<div class="form-group">
									<label for="pilih_program_keahlian">{{__('Program Keahlian')}} <span class="text-danger">*</span></label>
									<select class="form-control @error('program_keahlian_id') is-invalid @enderror" id="pilih_program_keahlian" name="program_keahlian_id" required> 
									<option value="" selected="" disabled="">{{__('-- Pilih Program Keahlian --')}}</option>
										@foreach ($programKeahlian as $pK)
											<option value="{{ $pK->id }}" 
												@if (old('program_keahlian_id'))
													{{ old('program_keahlian_id') == $pK->id ? 'selected' : '' }}
												@else
													{{ $perusahaan->program_keahlian_id == $pK->id ? 'selected' : '' }}
												@endif	
											>{{$pK->nama}}</option>
										@endforeach
									</select>
								
									@error('program_keahlian_id')
									<h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
									@enderror
								</div>
							</div>
						</div>
						<div class="d-flex">
							<div>
								<div class="form-group">
									<label for="telp">{{__('Telp')}}</label>
									<input type="text" class="form-control @error('telp') is-invalid @enderror" id="telp" name="telp" placeholder="Masukan No Telp" value="{{ old('telp') ? old('telp') : $perusahaan->telp }}">
								
									@error('telp')
									<h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
									@enderror
								</div>
							</div>
							<div>
								<div class="form-group">
									<label for="email">{{__('Email ')}}<span class="text-danger">{{__('*')}}</span></label>
									<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukan Email" value="{{ old('email') ? old('email') : $perusahaan->email }}" required="">
								
									@error('email')
									<h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
									@enderror
								</div>
							</div>
							<div>
								<div class="form-group">
									<label for="kodepos">{{__('Kode Pos')}}</label>
									<input type="text" class="form-control @error('kodepos') is-invalid @enderror" id="kodepos" name="kodepos" placeholder="Masukan Kode Pos" value="{{ old('kodepos') ? old('kodepos') : $perusahaan->kodepos  }}">
								
									@error('kodepos')
									<h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
									@enderror
								</div>
							</div>
						</div>
						<div class="d-flex">
							<div>
								<div class="form-group">
									<label for="fax">{{__('Fax')}}</label>
									<input type="text" class="form-control @error('fax') is-invalid @enderror" id="fax" name="fax" placeholder="Masukan Fax" value="{{ old('fax') ? old('fax') : $perusahaan->fax  }}">
								
									@error('fax')
									<h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
									@enderror
								</div>
							</div>
							<div>
								<div class="form-group">
									<label for="site">{{__('Site')}}</label>
									<input type="text" class="form-control @error('site') is-invalid @enderror" id="site" name="site" placeholder="Masukan Situs" value="{{ old('site') ? old('site') : $perusahaan->site  }}">
								
									@error('site')
									<h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
									@enderror
								</div>
							</div>
							<div>
							<div class="form-group">
								<label for="linkedin">{{__('Linkedin')}}</label>
								<input type="text" class="form-control @error('linkedin') is-invalid @enderror" id="linkedin" name="linkedin" placeholder="Masukan Linkedin" value="{{ old('linkedin') ? old('linkedin') : $perusahaan->linkedin  }}">
							
								@error('linkedin')
								<h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
								@enderror
							</div>
							</div>
						</div>
						<div class="d-flex">
							<div>
								<div class="form-group">
									<label for="facebook">{{__('Facebook')}}</label>
									<input type="text" class="form-control @error('facebook') is-invalid @enderror" id="facebook" name="facebook" placeholder="Masukan Facebook" value="{{ old('facebook') ? old('facebook') : $perusahaan->facebook  }}">
								
									@error('facebook')
									<h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
									@enderror
								</div>
							</div>
							<div>
								<div class="form-group">
									<label for="twitter">{{__('Twitter')}}</label>
									<input type="text" class="form-control @error('twitter') is-invalid @enderror" id="twitter" name="twitter" placeholder="Masukan Twitter" value="{{ old('twitter') ? old('twitter') : $perusahaan->twitter  }}">
								
									@error('twitter')
									<h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
									@enderror
								</div>
							</div>
							<div>
								<div class="form-group">
									<label for="instagram">{{__('Instagram')}}</label>
									<input type="text" class="form-control @error('instagram') is-invalid @enderror" id="instagram" name="instagram" placeholder="Masukan Instagram" value="{{ old('instagram') ? old('instagram') : $perusahaan->instagram  }}">
								
									@error('instagram')
									<h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
									@enderror
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="alamat">{{__('Alamat')}}</label>
							<input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Masukan Alamat" value="{{ old('alamat') ? old('alamat') : $perusahaan->alamat  }}">
						
							@error('alamat')
							<h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
							@enderror
						</div>
						<div class="d-flex">
							<div>
								<div class="form-group">
									<label for="negara">{{__('Negara')}}</label>
									<select class="form-control @error('negara') is-invalid @enderror" id="negara" name="negara">
									<option value="" selected="" disabled="">{{__('Pilih Negara')}}</option>
									@foreach ($negara as $n)
										<option value="{{ $n->nama_negara }}" 
											@if (old('negara'))
												{{ (old('negara') == $n->nama_negara) ? 'selected' : '' }}
											@else
												{{ $perusahaan->negara == $n->nama_negara ? 'selected' : '' }}
											@endif
										>{{ $n->nama_negara }}</option>
									@endforeach
									</select>
								
									@error('negara')
									<h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
									@enderror
								</div>
							</div>
							<div>
								<div class="form-group">
									<label for="provinsi">{{__('Provinsi')}}</label>
									<select class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi">
									<option value="" selected="" disabled="">{{__('Pilih Provinsi')}}</option>
										@foreach ($provinsi as $prov)
											<option value="{{$prov->nama_provinsi}}" 
												@if (old('provinsi'))
													{{ old('provinsi') == $prov->nama_provinsi ? 'selected' : '' }}
												@else
													{{ ($perusahaan->provinsi == $prov->nama_provinsi) ? 'selected' : '' }}
												@endif
											>{{__($prov->nama_provinsi)}}</option>
										@endforeach
									</select>
								
									@error('provinsi')
										<h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
									@enderror
								</div>
							</div>
							<div>
								<div class="form-group">
									<label for="kabupaten">{{__('Kabupaten')}}</label>
									<select class="form-control @error('kabupaten') is-invalid @enderror" id="kabupaten" name="kabupaten">
									<option value="" selected="" disabled="">{{__('Pilih Kabupaten')}}</option>
										@foreach ($kabupaten as $kab)
											<option value="{{$kab->nama_kabupaten}}" 
												@if (old('kabupaten'))
													{{ old('kabupaten') == $kab->nama_kabupaten ? 'selected' : '' }}
												@else
													{{ ($perusahaan->kabupaten == $kab->nama_kabupaten) ? 'selected' : '' }}
												@endif
											>{{__($kab->nama_kabupaten)}}</option>
										@endforeach
									</select>
								
									@error('kabupaten')
									<h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
									@enderror
								</div>						
							</div>
						</div>
						<div style="border: 1.3px solid #ddd">
							<label class="mt-5 mb-2 ml-2 text-muted" for="overview">{{__('Gambaran Perusahaan')}}</label>
							<textarea name="overview" class="form-control summernote" style="display: none;" required="">{{ old('overview') ? old('overview') : $perusahaan->overview }}</textarea>
						
							@error('overview')
							<h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
							@enderror
						</div>
						<div style="border: 1.3px solid #ddd">
							<label class="mt-5 mb-2 ml-2 text-muted" for="alasan_harus_melamar">{{__('Alasan Harus Melamar')}}</label>
							<textarea name="alasan_harus_melamar" class="form-control summernote" style="display: none;" required="">{{ old('alasan_harus_melamar') ? old('alasan_harus_melamar') : $perusahaan->alasan_harus_melamar }}</textarea>
						
							@error('alasan_harus_melamar')
							<h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
							@enderror
						</div>
						<div class="d-flex">
							<div>
								<div class="form-group">
									<label for="jumlah_karyawan">{{__('Jumlah Karyawan')}}</label>
									<input type="text" class="form-control @error('jumlah_karyawan') is-invalid @enderror" id="jumlah_karyawan" name="jumlah_karyawan" placeholder="Jumlah Karyawan" value="{{ old('jumlah_karyawan') ? old('jumlah_karyawan') : $perusahaan->jumlah_karyawan  }}">
								
									@error('jumlah_karyawan')
									<h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
									@enderror
								</div>
							</div>
							<div>
								<div class="form-group">
									<label for="tunjangan">{{__('Tunjangan')}}</label>
									<input type="text" class="form-control @error('tunjangan') is-invalid @enderror" id="tunjangan" name="tunjangan" placeholder="Masukan Tunjangan (Opsional)" value="{{ old('tunjangan') ? old('tunjangan') : $perusahaan->tunjangan  }}">
								
									@error('tunjangan')
									<h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
									@enderror
								</div>
							</div>
						</div>
						<div class="d-flex">
							<div>
								<div class="form-group">
									<label for="waktu_proses_perekrutan">{{__('Waktu Proses Perekritan')}}</label>
									<input type="text" class="form-control @error('waktu_proses_perekrutan') is-invalid @enderror" id="waktu_proses_perekrutan" name="waktu_proses_perekrutan" placeholder="Waktu Proses Perekrutan" value="{{ old('waktu_proses_perekrutan') ? old('waktu_proses_perekrutan') : $perusahaan->waktu_proses_perekrutan  }}">
								
									@error('waktu_proses_perekrutan')
									<h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
									@enderror
								</div>
							</div>
							<div>
								<div class="form-group">
									<label for="waktu_bekerja">{{__('Hari Bekerja')}}</label>
									<input type="text" class="form-control @error('waktu_bekerja') is-invalid @enderror" id="waktu_bekerja" name="waktu_bekerja" placeholder="Waktu Bekerja" value="{{ old('waktu_bekerja') ? old('waktu_bekerja') : $perusahaan->waktu_bekerja  }}">
								
									@error('waktu_bekerja')
									<h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
									@enderror
								</div>
							</div>
						</div>
						<div class="d-flex">
							<div>
								<div class="form-group">
									<label for="gaya_berpakaian">{{__('Gaya Berpakaian')}}</label>
									<input type="text" class="form-control @error('gaya_berpakaian') is-invalid @enderror" id="gaya_berpakaian" name="gaya_berpakaian" placeholder="Gaya Berpakaian" value="{{ old('gaya_berpakaian') ? old('gaya_berpakaian') : $perusahaan->gaya_berpakaian  }}">
								
									@error('gaya_berpakaian')
									<h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
									@enderror
								</div>
							</div>
							<div>
								<div class="form-group">
									<label for="bahasa">{{__('Bahasa')}}</label>
									<select class="form-control @error('bahasa') is-invalid @enderror" id="bahasa" name="bahasa">
										<option value="" selected="" disabled="">{{__('Pilih Bahasa')}}</option>
										@foreach ($bahasa as $bhs)
											<option value="{{ $bhs->nama }}" 
												@if (old('bahasa'))
													{{ old('bahasa') == $bhs->nama ? 'selected' : '' }}
												@else
													{{ $perusahaan->bahasa == $bhs->nama ? 'selected' : '' }}
												@endif	
											>{{$bhs->nama}}</option>
										@endforeach
									</select>
								
									@error('bahasa')
									<h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
									@enderror
								</div>
							</div>
						</div>
						<div class="form-group">
							<button type="submit">{{__('Update Data')}}</button>
						</div>
					</form>
				</div>
			</div>
			<div class="col-lg-4 mt-2">
				<div class="card">
					<h6 class="font-weight-bold pb-3">{{__('STATUS KEMITRAAN')}}</h6>
					<div class="d-flex justify-content-center align-items-center text-center">
						@can('melakukan verifikasi')
							<i class="fa fa-warning fa-4x text-danger"></i>
						@endcan
						@can('menunggu verifikasi diterima')
							<i class="fa fa-refresh fa-4x text-muted"></i>
						@endcan
						@can('terverifikasi')
							<i class="fa fa-check-square-o fa-4x text-success"></i>
						@endcan
						<span class="mt-1 register d-flex align-items-center justify-content-center flex-column text-center">
							@can('melakukan verifikasi')
								<h5>{{__("Belum Diproses")}}</h5>
							@endcan
							@can('menunggu verifikasi diterima')
								<h5>{{__("Diproses")}}</h5>
							@endcan
							@can('terverifikasi')
								<h5>{{__("Terverifikasi")}}</h5>
							@endcan
							<p class="register-at text-muted">{{__("Registrasi pada " . $perusahaan->created_at->format('d M Y'))}}</p>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection


@section('stylesheet')
	<link rel="stylesheet" href="{{ asset('/plugins/summernote/summernote-lite.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/plugins/select2/select2.min.css') }}">
@endsection


@section('script')
	<script src="{{ asset('/plugins/tags-autocomplete/jquery.min.js') }}"></script>
	<script src="{{ asset('/plugins/summernote/summernote-lite.min.js') }}"></script>
	<script src="{{ asset('/plugins/select2/select2.min.js') }}"></script>

	<script>
		// Fungsi Pembuatan Summernote ( WYSIYG ) 
		(function($) {
			$(document).ready(function(){
		    	$('.summernote').summernote({
		    		height: 175,
		    		toolbar: [
						['style', ['style']],
						['font', ['bold', 'underline', 'clear']],
						['fontname', ['fontname']],         
						['color', ['color']], 
						['para', ['ul', 'ol', 'paragraph']],
						['table', ['table']],
						['insert', ['link']],
						['view', ['fullscreen', 'codeview', 'help']]                 
		    		]
		    	})
			});
	    })(jQuery);
	</script>

	<script>
		// Ajax Form
		const pilihBk = document.getElementById('pilih_bidang_keahlian');
		const pilihPk = document.getElementById('pilih_program_keahlian');
		const pilihProv = document.getElementById('provinsi');
		const pilihKab = document.getElementById('kabupaten');

		pilihBk.addEventListener('change', function(e) {
			bkId = e.target.value;
			fetch('/getProgramKeahlian/' + bkId)
			.then(response => response.json())
			.then(response => {
				let optionPk;

				response.forEach(function(m) {
					optionPk += "<option value='"+ m.id +"'>"+ m.nama +"</option>";
					pilihPk.innerHTML = optionPk
				})
			});
		});

		document.getElementById('negara').addEventListener('change', function(e) {
			let nama_negara = e.target.value;
			fetch('/getProvinsi/' + nama_negara)
			.then(response => response.json())
			.then(response => {
				let opsiProv;

				response.forEach(function(m) {
					opsiProv += "<option value='"+ m.nama_provinsi +"'>"+ m.nama_provinsi +"</option>";
					pilihProv.innerHTML = opsiProv;
					pilihKab.innerHTML = '<option value="" selected disabled>Pilih Kabupaten</option>';
				})
			});
		});

		document.getElementById('provinsi').addEventListener('change', function(e) {
			let nama_provinsi = e.target.value;
			fetch('/getKabupaten/' + nama_provinsi)
			.then(response => response.json())
			.then(response => {
				let opsiKab;

				response.forEach(function(m) {
					opsiKab += "<option value='"+ m.nama_kabupaten +"'>"+ m.nama_kabupaten +"</option>";
					pilihKab.innerHTML = opsiKab
				})
			});
		});
	</script>	

	{{-- <script>
		// Fungsi Validasi File Gambar
		function validasiFile(element) {
			var inputFile = element;
			var pathFile  = inputFile.value;

			var ekstensiOk = /(\.jpg|\.jpeg|\.png|\.gif|\.bmp|\.webp)$/i;

			if( !ekstensiOk.exec(pathFile) ) {
				alert('Silakan Upload File Yang Memiliki Ekstensi .jpeg, .jpg, .png, .bmp, . webp atau .gif');
			
				inputFile.value = '';
				return false;
			};
		}
	</script> --}}

@endsection