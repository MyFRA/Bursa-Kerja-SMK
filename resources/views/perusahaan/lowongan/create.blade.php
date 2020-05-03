@extends('perusahaan.layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-7 mt-3">
			<div class="card p-4 pr-5">
				<p class="text-primary judul-iklan" style="font-size: 1.25rem">Pasang Iklan Lowongan Pekerjaan <span class="float-right font-weight-bold">1</span></p>
				<hr class="mt-0" style="border: 1px solid #094370">

				<h4 class="mt-4">--Formulir Lowongan</h4>
				<hr class="mt-2">
				<form id="form-create-lowongan" method="POST" action="{{ url('/perusahaan/lowongan') }}" enctype="multipart/form-data">
					@csrf
				  <div class="form-group">
					    <label class="font-weight-bold" for="jabatan">Posisi Pekerjaan <span class="text-danger">*</span></label>
					    <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" id="jabatan" value="{{ old('jabatan') }}" required="">
				  		
				  		@error('jabatan')
				  		    <div class="invalid-feedback">
						        {{ $message }}
						    </div>
				  		@enderror
				  </div>
				    <div class="form-group">
					    <label class="font-weight-bold" for="deskripsi">Deskripsi Pekerjaan <span class="text-danger font-italic">* Wajib Diisi</span></label>
					    <textarea name="deskripsi" class="summernote" style="display: none;" required="">{{ old('deskripsi') }}</textarea>
				  		<small style="font-size: 13px" class="form-text font-italic mt-3">Contoh : PT. Loker Indonesia Bergerak dibidang teknologi informasi saat ini membutuhkan kandidat untuk mengisi posisi sebagai : IT Programmer</small>
				  	
				  		@error('deskripsi')
				  		    <div>
						        <p class="font-italic text-danger ml-2">{{ $message }}</p>
						    </div>
				  		@enderror
				  	</div>
				  	<div class="form-group mt-2">
					    <label class="font-weight-bold" for="persyaratan">Persyaratan <span class="text-danger font-italic">* Wajib Diisi</span></label>
					    <textarea name="persyaratan" class="summernote" style="display: none;" required="">{{ old('persyaratan') }}</textarea>
				  		<small style="font-size: 13px" class="form-text font-italic mt-3">Contoh : Maksimal Berusia 25 Tahun, dan tidak terikat dengan perusahaan manapun</small>
				  	
				  		@error('persyaratan')
				  		    <div>
						        <p class="font-italic text-danger ml-2">{{ $message }}</p>
						    </div>
				  		@enderror
				  	</div>
				  	<div class="form-group mt-2">
					    <label class="font-weight-bold" for="gambaran_perusahaan">Gambaran Perusahaan</label>
					    <textarea name="gambaran_perusahaan" class="summernote" style="display: none;">{{ old('gambaran_perusahaan') }}</textarea>
				  		<small style="font-size: 13px" class="form-text font-italic mt-3">Contoh : PT. Loker Indonesia Bergerak dibidang teknologi informasi</small>
				  	
				  		@error('gambaran_perusahaan')
				  		    <div>
						        <p class="font-italic text-danger ml-2">{{ $message }}</p>
						    </div>
				  		@enderror			  	
				  	</div>
			</div>
		</div>
		<div class="col-md-5 mt-3">
			<div class="card p-4 pr-5">
				<p class="text-primary judul-iklan"><span class="float-right font-weight-bold">2</span></p>
				<hr class="mt-0" style="border: 1px solid #094370">
				<div class="form-group">
			  		<input type="hidden" id="kompetensi_keahlian-hidden" name="kompetensi_keahlian">
				    <label class="font-weight-bold mt-md-3" for="kompetensi_keahlian">Kompetensi Keahlian <span class="text-danger">*</span></label>
				    <input type="text" class="form-control " name="kompetensi_keahlian" @error('kompetensi_keahlian') style="border: 1px solid red" @enderror id="kompetensi_keahlian" value="{{ old('kompetensi_keahlian') }}" required="">
			  	
			  		@error('kompetensi_keahlian')
			  		    <div>
					        <p class="font-italic text-danger ml-2">{{ $message }}</p>
					    </div>
			  		@enderror						
			  	</div>
			  	<div class="form-group">
			  		<input type="hidden" id="keahlian-hidden" name="keahlian">
				    <label class="font-weight-bold mt-md-3" for="keahlian">Keahlian <span class="text-danger">*</span></label>
				    <input type="text" class="form-control @error('keahlian') is-invalid @enderror" id="keahlian" value="{{ old('keahlian') }}" required="">

			  		@error('keahlian')
			  		    <div>
					        <p class="font-italic text-danger ml-2">{{ $message }}</p>
					    </div>
			  		@enderror		
			  	</div>
			  	<div class="form-group">
				    <label class="font-weight-bold mt-md-3" for="gaji_min">Gaji Min <span class="text-danger">*</span></label>
				    <input type="text" class="form-control @error('gaji_min') is-invalid @enderror" name="gaji_min" id="gaji_min" value="{{ old('gaji_min') }}" required autocomplete="off">
			  	
			  		@error('gaji_min')
			  		    <div class="invalid-feedback">
					        {{ $message }}
					    </div>
			  		@enderror
			  	</div>
			  	<div class="form-group">
				    <label class="font-weight-bold mt-md-3" for="gaji_max">Gaji Max <span class="text-danger">*</span></label>
				    <input type="text" class="form-control @error('gaji_max') is-invalid @enderror" name="gaji_max" id="gaji_max" value="{{ old('gaji_max') }}" required autocomplete="off">
			  	
			  		@error('gaji_max')
			  		    <div class="invalid-feedback">
					        {{ $message }}
					    </div>
			  		@enderror
			  	</div>
			  	<div class="form-group">
				    <label class="font-weight-bold mt-md-3" for="batas_akhir_lamaran">Batas Akhir Lamaran <span class="text-danger">*</span></label>
				    <input type="text" class="form-control @error('batas_akhir_lamaran') is-invalid @enderror" name="batas_akhir_lamaran" id="batas_akhir_lamaran" value="{{ old('batas_akhir_lamaran') }}" autocomplete="off" required="">
			  	
			  		@error('batas_akhir_lamaran')
			  		    <div class="invalid-feedback">
					        {{ $message }}
					    </div>
			  		@enderror
			  	</div>
				  	<div class="form-group">
					    <label class="font-weight-bold mt-md-3" for="proses_lamaran">Proses Lamaran <span class="text-danger">*</span></label>
					    <select class="form-control @error('proses_lamaran') is-invalid @enderror" id="proses_lamaran" name="proses_lamaran" required="">
					      	<option value="" selected="" disabled="">-- Pilih Proses Lamaran --</option>
					      	<option value="Online"  {{ old('proses_lamaran') == 'Online' ? 'selected' : '' }} >Online</option>
					      	<option value="Offline" {{ old('proses_lamaran') == 'Offline' ? 'selected' : '' }} >Offline</option>
					    </select>
					
						@error('proses_lamaran')
				  		    <div class="invalid-feedback">
						        {{ $message }}
						    </div>
				  		@enderror
					</div>
				<div class="form-group">
			    	<label class="font-weight-bold mt-md-3" for="status">Status <span class="text-danger">*</span></label>
				    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required="">
				      	<option value="" selected="" disabled="">-- Pilih Status --</option>
				      	<option value="Aktif"  {{ old('status') == 'Aktif' ? 'selected' : '' }} >Aktif</option>
				      	<option value="Nonaktif"  {{ old('status') == 'Nonaktif' ? 'selected' : '' }} >Nonaktif</option>
				      	<option value="Draf"  {{ old('status') == 'Draf' ? 'selected' : '' }} >Draf</option>		  		
				    </select>

				    @error('status')
			  		    <div class="invalid-feedback">
					        {{ $message }}
					    </div>
			  		@enderror	
				</div>
				<div class="form-group">
				    <label class="font-weight-bold mt-md-3" for="image">Image <span class="text-danger">*</span></label>
				    <input type="file" onChange='return validasiFile()' class="form-control-file @error('image') is-invalid @enderror" id="image" name="image" required="">
				
					@error('image')
			  		    <div class="invalid-feedback">
					        {{ $message }}
					    </div>
			  		@enderror
				</div>
				<button type="submit" class="btn btn-primary mt-3">Buat Lowongan</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection



@section('stylesheet')
	<link rel="stylesheet" href="{{ asset('/plugins/summernote/summernote-lite.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/app-admin/plugins/jquery-ui/jquery-ui.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/plugins/tags-autocomplete/bootstrap-tokenfield.min.css') }}">
@endsection

@section('script')
	<script src="{{ asset('/plugins/tags-autocomplete/jquery.min.js') }}"></script>
	<script src="{{ asset('/app-admin/plugins/jquery-ui/jquery-ui.js') }}"></script>
	<script src="{{ asset('/plugins/tags-autocomplete/bootstrap-tokenfield.js') }}"></script>
	<script src="{{ asset('app-admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('/plugins/summernote/summernote-lite.min.js') }}"></script>

	<script>
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
	<script type="text/javascript">
	    (function($) {
	        $(document).ready(function(){
				$('#keahlian').tokenfield({
					autocomplete: {
						source: [
							@foreach ($keterampilan as $nama_keterampilan)
								<?= "'". $nama_keterampilan ."'," ?>
							@endforeach
						],
						delay: 100
					},
					showAutocompleteOnFocus: true
				});
			});
	    })(jQuery);
	</script>
	<script type="text/javascript">
	    (function($) {
	        $(document).ready(function(){
				$('#kompetensi_keahlian').tokenfield({
					autocomplete: {
						source: [
							@foreach ($kompetensi_keahlian as $nama_kompetensi_keahlian)
								<?= "'". $nama_kompetensi_keahlian ."'," ?>
							@endforeach							
						],
						delay: 100
					},
					showAutocompleteOnFocus: true
				});
			});
	    })(jQuery);
	</script>
	<script>
	    (function($) {
	    	$('#batas_akhir_lamaran').datepicker()
	    })(jQuery);
	</script>
	<script type="text/javascript">
		
		var gaji_min = document.getElementById('gaji_min');
		gaji_min.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			gaji_min.value = formatRupiah(this.value, 'Rp. ');
		});

		var gaji_max = document.getElementById('gaji_max');
		gaji_max.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			gaji_max.value = formatRupiah(this.value, 'Rp. ');
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
		function validasiFile() {
			var inputFile = document.getElementById('image');
			var pathFile  = inputFile.value;

			var ekstensiOk = /(\.jpg|\.jpeg|\.png|\.gif|\.bmp|\.webp)$/i;

			if( !ekstensiOk.exec(pathFile) ) {
				alert('Silakan Upload File Yang Memiliki Ekstensi .jpeg, .jpg, .png atau .gif')
			
				inputFile.value = '';
				return false;
			};
		}
	</script>
	<script>
		document.getElementById('form-create-lowongan').addEventListener('submit', function() {
			document.getElementById('keahlian-hidden').value = document.getElementById('keahlian').value
			document.getElementById('kompetensi_keahlian-hidden').value = document.getElementById('kompetensi_keahlian').value
		});
	</script>
@endsection