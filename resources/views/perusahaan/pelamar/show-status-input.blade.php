@extends('perusahaan.layouts.app')
@section('content')

<div class="container">
    <div class="row mt-2 mb-4 container-proposal-lamaran">
        <div class="col-lg-7 px-2 order-lg-1 order-2 mt-3">
            <div class="card p-4 pb-4">
                <form id="input-form" action="{{ url('/perusahaan/lowongan/status-pelamaran/' . encrypt($pelamaran->statusPelamaran->id)) }}" method="post">
                  @csrf
                  @method('PUT')
                    <input type="hidden" name="status" value="{{ $status }}">
                    <div class="form-group">
                        <h5 class="text-muted mb-4"><i class="fa fa-paper-plane mr-2"></i>{{__(' PESAN')}}</h5>
                        <textarea name="pesan" id="pesan" class="summernote" style="">{{ old('pesan') }}</textarea>
                        <small style="font-size: 13px" class="form-text mt-3 text-muted">
                          @if ($status == 'diterima')
                            {{__('Dengan menekan tombol "Terima Lamaran", Maka anda telah setuju, menerima lamaran siswa tersebut')}}
                          @elseif($status == 'ditolak')
                            {{__('Dengan menekan tombol "Tolak Lamaran", Maka anda telah setuju, Menolak lamaran siswa tersebut')}}
                          @else
                            {{__('Dengan menekan tombol "Kirim Panggilan", Maka anda telah setuju, untuk memanggil siswa tersebut, terkait dengan interview')}}
                          @endif
                          
                        </small>

                          @error('pesan')
                              <div>
                                <p class="font-italic text-danger ml-2">{{ $message }}</p>
                            </div>
                          @enderror
                    </div>
                    <div class="mt-4">
                        @if ($status == 'diterima')
                            <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane mr-2"></i>  Terima Lamaran</button>
                        @elseif($status == 'ditolak')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-paper-plane mr-2"></i>  Tolak Lamaran</button>
                        @else
                            <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane mr-2"></i>  Kirim Panggilan</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-5 px-2 order-lg-2 order-1 mt-3">
            <div class="card p-4 pb-4">
                <h5 class="text-muted mb-4"><i class="fa fa-paperclip mr-2"></i>{{__(' pelamaran')}}</h5>
                <div class="text-center mt-2">
                    <img class="w-50 rounded" src="{{  ($pelamaran->siswa->photo == null ) ? asset('/images/profile.svg') : asset('/storage/assets/daftar-siswa/' . $pelamaran->siswa->photo) }}" alt="">
                </div>
                <div class="text-center mt-2">
                  <hr class="w-75 mb-0">
                </div>
                <div class="mt-3">
                  <table class="table table-responsive">
                    <thead>
                      <tr class="border-0">
                        <th class="border-0 pb-1" scope="col">Nama</th>
                        <th class="border-0 pb-1" scope="col">:</th>
                        <th class="border-0 pb-1" scope="col"><a href="{{ url('/perusahaan/show/' . encrypt($pelamaran->siswa->id)) }}">{{__( $pelamaran->siswa->nama_pertama )}} {{__( $pelamaran->siswa->nama_belakang )}}</a></th>
                      </tr>
                      <tr>
                        <th class="border-0 pb-1" scope="col">Lowongan</th>
                        <th class="border-0 pb-1" scope="col">:</th>
                        <th class="border-0 pb-1" scope="col"><a href="{{ url('lowongan/' . encrypt($pelamaran->lowongan->id)) }}">{{__( $pelamaran->lowongan->jabatan )}}</a></th>
                      </tr>
                      <tr>
                        <th class="border-0 pb-1" scope="col">Gaji Diharapkan</th>
                        <th class="border-0 pb-1" scope="col">:</th>
                        <th class="border-0 pb-1" scope="col">IDR {{ (number_format($pelamaran->siswa->siswaLainya->gaji_diharapkan, 0, '.', '.')) }} </th>
                      </tr>
                    </thead>
                  </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('stylesheet')
  <link rel="stylesheet" href="{{ asset('/plugins/summernote/summernote-lite.min.css') }}">
@endsection

@section('script')
	<script src="{{ asset('/plugins/tags-autocomplete/jquery.min.js') }}"></script>
  <script src="{{ asset('/plugins/summernote/summernote-lite.min.js') }}"></script>
    
    <script>
		// Fungsi Pembuatan Summernote ( WYSIYG ) 
		(function($) {
			$(document).ready(function(){
		    	$('.summernote').summernote({
		    		height: 175,
            placeholder: 'Pesan bersifat informasi satu arah, <br> Pesan bisa digunakan untuk memberitahukan informasi terkait pelamaran, contohnya seperti, kapan interview dilakukan, kapan bisa mulai bekerja dll.',
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
    const form = document.getElementById('input-form');
    const pesan = document.getElementById('pesan');

    form.addEventListener('submit', function() {
      if( pesan.value == '' ) {
        event.preventDefault();
        alert('Pesan tidak boleh kosong');
      }
    });

  </script>
@endsection