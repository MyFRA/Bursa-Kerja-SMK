@extends('perusahaan.layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-7 mt-3">
			<div class="card p-4 pr-5">
				<p class="text-primary judul-iklan" style="font-size: 1.25rem">{{__('Edit Iklan Lowongan Pekerjaan ')}}<span class="float-right font-weight-bold">{{__('1')}}</span></p>
				<hr class="mt-0" style="border: 1px solid #094370">
				<h4 class="mt-4">{{__('-- Formulir Edit Lowongan')}}</h4>
				<hr class="mt-2">
				<form id="form-create-lowongan" method="POST" action="{{ url('/perusahaan/lowongan/' . encrypt($lowongan->id)) }}" enctype="multipart/form-data">
					@csrf
					@method('PUT')
				  	<div class="form-group">
					    <label class="font-weight-bold" for="jabatan">{{__('Posisi Pekerjaan ')}}<span class="text-danger">{{__('*')}}</span></label>
					    <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" id="jabatan" value="{{ old('jabatan') ? old('jabatan') : $lowongan->jabatan }}" required>
				  		
				  		@error('jabatan')
				  		    <div class="invalid-feedback">
						        {{ $message }}
						    </div>
				  		@enderror
				  	</div>
				    <div class="form-group">
					    <label class="font-weight-bold" for="deskripsi">{{__('Deskripsi Pekerjaan ')}}<span class="text-danger font-italic">{{__('*')}}</span></label>
					    <textarea name="deskripsi" class="summernote" style="display: none;" required="">{{ old('deskripsi') ? old('deskripsi') : $lowongan->deskripsi }}</textarea>
						<small style="font-size: 13px" class="form-text font-italic mt-3">{{__('Contoh : PT. Loker Indonesia, yang bergerak dibidang teknologi informasi saat ini sedang membutuhkan kandidat untuk mengisi posisi sebagai : IT Programmer')}}</small>
				  	
				  		@error('deskripsi')
				  		    <div>
						        <p class="font-italic text-danger ml-2">{{ $message }}</p>
						    </div>
				  		@enderror
				  	</div>
				  	<div class="form-group mt-2">
					    <label class="font-weight-bold" for="persyaratan">{{__('Persyaratan ')}}<span class="text-danger font-italic">{{__('*')}}</span></label>
					    <textarea name="persyaratan" class="summernote" style="display: none;" required="">{{ old('persyaratan') ? old('persyaratan') : $lowongan->persyaratan }}</textarea>
						<small style="font-size: 13px" class="form-text font-italic mt-3">{{__('Contoh : Maksimal berusia 25 tahun, memiliki semangat kerja yang tinggi, memiliki ketertarikan yang tinggi terhadap teknologi, mampu bekerja secara tim, dll')}}</small>
				  	
				  		@error('persyaratan')
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
				    <label class="font-weight-bold mt-md-3" for="kompetensi_keahlian">{{__('Kompetensi Keahlian ')}}<span class="text-danger">{{__('*')}}</span></label>
				    <select class="js-example-basic-multiple form-control @error('kompetensi_keahlian') is-invalid @enderror" id="kompetensi_keahlian" name="kompetensi_keahlian[]" multiple="multiple" required>						
						@foreach ($kompetensi_keahlian as $item)
						  <option value="{{ $item }}" 
							@if (old('kompetensi_keahlian'))
								@foreach (old('kompetensi_keahlian') as $oldKompetensiKeahlian)
									@if ($oldKompetensiKeahlian == $item)
										{{ 'selected' }}
									@endif
								@endforeach 
							@else
								<?php $lowonganKompetensiKeahlian = json_decode($lowongan->kompetensi_keahlian) ?>
								@foreach ($lowonganKompetensiKeahlian as $lokerKompetensiKeahlian)
									@if ($lokerKompetensiKeahlian == $item)
										{{ 'selected' }}
									@endif
								@endforeach 
							@endif
						  >{{$item}}</option>
						@endforeach
					</select>
				  
					@error('kompetensi_keahlian')
					  <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
					@enderror						
			  	</div>
				<div class="form-group">
				    <label class="font-weight-bold mt-md-3" for="keahlian">{{__('Keahlian ')}}<span class="text-danger">{{__('*')}}</span></label>
					<select class="js-example-basic-multiple form-control @error('keahlian') is-invalid @enderror" id="keahlian" name="keahlian[]" multiple="multiple" required>
						@foreach ($keterampilan as $item)
							<option value="{{ $item }}" 
								@if (old('keahlian'))
									@foreach (old('keahlian') as $oldKeahlian)
										@if ($oldKeahlian == $item)
											{{ 'selected' }}
										@endif
									@endforeach 
								@else
									<?php $keahlian = json_decode($lowongan->keahlian) ?>
									@foreach ($keahlian as $keahlianBy1)
										@if ($item == $keahlianBy1)
											{{ 'selected' }}
										@endif
									@endforeach
								@endif
							>{{$item}}</option>
						@endforeach   
					</select>
				  
					@error('keahlian')
					  <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
					@enderror					
			  	</div>
			  	<div class="form-group">
				    <label class="font-weight-bold mt-md-3" for="gaji_min">{{__('Gaji Min ')}}<span class="text-danger">{{__('*')}}</span></label>
				    <input type="text" class="form-control @error('gaji_min') is-invalid @enderror" name="gaji_min" id="gaji_min" value="{{ old('gaji_min') ? old('gaji_min') : $lowongan->gaji_min }}" required autocomplete="off">
			  	
			  		@error('gaji_min')
			  		    <div class="invalid-feedback">
					        {{ $message }}
					    </div>
			  		@enderror
			  	</div>
			  	<div class="form-group">
				    <label class="font-weight-bold mt-md-3" for="gaji_max">{{__('Gaji Max ')}}<span class="text-danger">{{__('*')}}</span></label>
				    <input type="text" class="form-control @error('gaji_max') is-invalid @enderror" name="gaji_max" id="gaji_max" value="{{ old('gaji_max') ? old('gaji_max') : $lowongan->gaji_max }}" required autocomplete="off">
			  	
			  		@error('gaji_max')
			  		    <div class="invalid-feedback">
					        {{ $message }}
					    </div>
			  		@enderror
			  	</div>
			  	<div class="form-group">
				    <label class="font-weight-bold mt-md-3" for="batas_akhir_lamaran">{{__('Batas Akhir Lamaran ')}}<span class="text-danger">{{__('*')}}</span></label>
				    <input type="text" class="form-control @error('batas_akhir_lamaran') is-invalid @enderror" name="batas_akhir_lamaran" id="batas_akhir_lamaran" value="{{ old('batas_akhir_lamaran') ? old('batas_akhir_lamaran') : $lowongan->batas_akhir_lamaran }}" autocomplete="off" required="">
			  	
			  		@error('batas_akhir_lamaran')
			  		    <div class="invalid-feedback">
					        {{ $message }}
					    </div>
			  		@enderror
			  	</div>
				<div class="form-group">
					<label class="font-weight-bold mt-md-3" for="proses_lamaran">{{__('Proses Lamaran ')}}<span class="text-danger">{{__('*')}}</span></label>
					<select class="form-control @error('proses_lamaran') is-invalid @enderror" id="proses_lamaran" name="proses_lamaran" required="">
						<option value="Online" 
							@if (old('proses_lamaran'))
								{{ (old('proses_lamaran') == 'Online') ? 'selected' : '' }}
							@else
								{{ ($lowongan->proses_lamaran == 'Online') ? 'selected' : '' }}
							@endif
						>{{__('Online')}}</option>

						<option value="Offline" 
							@if (old('proses_lamaran'))
								{{ (old('proses_lamaran') == 'Offline') ? 'selected' : '' }}
							@else
								{{ ($lowongan->proses_lamaran == 'Offline') ? 'selected' : '' }}
							@endif
						>{{__('Offline')}}</option>
					</select>
				
					@error('proses_lamaran')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
				</div>
				<div class="form-group">
			    	<label class="font-weight-bold mt-md-3" for="status">{{__('Status ')}}<span class="text-danger">{{__('*')}}</span></label>
				    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required="">
						<option value="Aktif" 
							@if (old('status'))
								{{ (old('status') == 'Aktif') ? 'selected' : '' }}
							@else
								{{ ($lowongan->status == 'Aktif') ? 'selected' : '' }}
							@endif
						>{{__('Aktif')}}</option>

						<option value="Nonaktif" 
							@if (old('status'))
								{{ (old('status') == 'Nonaktif') ? 'selected' : '' }}
							@else
								{{ ($lowongan->status == 'Nonaktif') ? 'selected' : '' }}
							@endif
						>{{__('Nonaktif')}}</option>

						<option value="Draf" 
							@if (old('status'))
								{{ (old('status') == 'Draf') ? 'selected' : '' }}
							@else
								{{ ($lowongan->status == 'Draf') ? 'selected' : '' }}
							@endif
						>{{__('Draf')}}</option>		  		
				    </select>

				    @error('status')
			  		    <div class="invalid-feedback">
					        {{ $message }}
					    </div>
			  		@enderror	
				</div>
				<div class="form-group">
				    <label class="font-weight-bold mt-md-3" for="image">{{__('Image')}} <span class="text-danger">{{__('*')}}</span></label>
				    <input type="file" onChange='return validasiFile()' class="form-control-file @error('image') is-invalid @enderror" id="image" name="image" >
				
					@error('image')
			  		    <div class="invalid-feedback">
					        {{ $message }}
					    </div>
			  		@enderror
				</div>
				<button type="submit" class="btn btn-primary mt-3">{{__('Update Lowongan')}}</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection



@section('stylesheet')
	<link rel="stylesheet" href="{{ asset('/plugins/summernote/summernote-lite.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/datePicker/css/DatePickerX.min.css') }}">
@endsection

@section('script')
	<script src="{{ asset('/plugins/tags-autocomplete/jquery.min.js') }}"></script>
	<script src="{{ asset('/plugins/summernote/summernote-lite.min.js') }}"></script>
	<script src="{{ asset('/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('/plugins/datePicker/js/DatePickerX.min.js') }}"></script>

	<script>
		// Fungsi Summernote WYSIYG
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
		// Multi select selec2
		(function($) {
			$(document).ready(function() {
				$('.js-example-basic-multiple').select2();
			});
		})(jQuery);
	</script>

	<script>
		// Fungsi Date Picker
		window.addEventListener('DOMContentLoaded', function(){
			var myDatepicker = document.querySelector('input[name="batas_akhir_lamaran"]')

			myDatepicker.style.backgroundColor = 'white'
			myDatepicker.DatePickerX.init({
				// options here
			});
		});

	</script>

	<script>
		// Fungsi Gaji menjadi RP
		var gaji_min = document.getElementById('gaji_min');
		gaji_min.addEventListener('keyup', function(e){

			gaji_min.value = formatRupiah(this.value, 'Rp. ');

		});

		var gaji_max = document.getElementById('gaji_max');
		gaji_max.addEventListener('keyup', function(e){

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
		// Validasi File Gambar
		function validasiFile() {
			var inputFile = document.getElementById('image');
			var pathFile  = inputFile.value;

			var ekstensiOk = /(\.jpg|\.jpeg|\.png|\.gif|\.bmp|\.webp)$/i;

			if( !ekstensiOk.exec(pathFile) ) {
				alert('Silakan Upload File Yang Memiliki Ekstensi .jpeg, .jpg, .png, .bmp, . webp atau .gif');
			
				inputFile.value = '';
				return false;
			};
		}
	</script>
@endsection