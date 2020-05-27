@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-2 mb-4 container-proposal-lamaran">
            <div class="col-lg-7 px-2 order-lg-1 order-2 mt-3">
                <div class="card p-4 pb-4">
                    <form id="input-form" action="{{ url('/siswa/lamaran/' . encrypt($pelamaran->id)) }}" method="post">
                      @csrf
                      @method('PUT')
                        <div class="form-group">
                            <h5 class="text-muted mb-4"><i class="fa fa-paper-plane mr-2"></i>{{__(' PROPOSAL PELAMARAN')}}</h5>
                            <textarea name="proposal_pelamaran" id="proposal_pelamaran" class="summernote" style="">{!! old('proposal_pelamaran') ? old('proposal_pelamaran') : $pelamaran->proposal_pelamaran !!}</textarea>
                            <small style="font-size: 13px" class="form-text mt-3 text-muted">{{__('Dengan menekan tombol "Kirim Lamaran", Saya telah membaca dan menyetujui peraturan Bursa Kerja SMK tentang pemanggilan interview')}}</small>

                              @error('proposal_pelamaran')
                                  <div>
                                    <p class="font-italic text-danger ml-2">{{ $message }}</p>
                                </div>
                              @enderror
                        </div>
                        <div class="mt-4">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane mr-2"></i>  Update Lamaran</button>
                          <a href="{{ url('pelamaran/' . encrypt($pelamaran->id)) }}" class="btn btn-secondary border-secondary ml-2"><i class="fa fa-close mr-1"></i>  Batal</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 px-2 order-lg-2 order-1 mt-3">
                <div class="card p-4 pb-4">
                    <h5 class="text-muted mb-4"><i class="fa fa-paperclip mr-2"></i>{{__(' pelamaran')}}</h5>
                    <div class="text-center mt-2">
                        <img class="w-50 rounded" src="{{  ($pelamaran->lowongan->perusahaan->logo == null ) ? asset('/images/company.png') : asset('/storage/assets/daftar-perusahaan/logo/' . $pelamaran->lowongan->perusahaan->logo) }}" alt="">
                    </div>
                    <div class="text-center mt-2">
                      <hr class="w-75 mb-0">
                    </div>
                    <div class="mt-3">
                      <table class="table table-responsive">
                        <thead>
                          <tr class="border-0">
                            <th class="border-0 pb-1" scope="col">Perusahaan</th>
                            <th class="border-0 pb-1" scope="col">:</th>
                            <th class="border-0 pb-1" scope="col"><a href="{{ url('/perusahaan/show/' . encrypt($pelamaran->lowongan->perusahaan->id)) }}">{{__( $pelamaran->lowongan->perusahaan->nama )}}</a></th>
                          </tr>
                          <tr>
                            <th class="border-0 pb-1" scope="col">Jabatan</th>
                            <th class="border-0 pb-1" scope="col">:</th>
                            <th class="border-0 pb-1" scope="col"><a href="{{ url('lowongan/' . encrypt($pelamaran->lowongan->id)) }}">{{__( $pelamaran->lowongan->jabatan )}}</a></th>
                          </tr>
                          <tr>
                            <th class="border-0 pb-1" scope="col">Gaji</th>
                            <th class="border-0 pb-1" scope="col">:</th>
                            <th class="border-0 pb-1" scope="col">IDR {{ (number_format($pelamaran->lowongan->gaji_min, 0, '.', '.')) }} {{('-')}} {{ (number_format($pelamaran->lowongan->gaji_max, 0, '.', '.')) }}</th>
                          </tr>
                          <tr>
                            <th class="border-0 pb-1" scope="col">Alamat</th>
                            <th class="border-0 pb-1" scope="col">:</th>
                            <th class="border-0 pb-1" scope="col">{{ __( ($pelamaran->lowongan->perusahaan->alamat == null) ? '-' : $pelamaran->lowongan->perusahaan->alamat  ) }}</th>
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
            placeholder: 'Beritahu pelamaran mengapa Anda paling cocok untuk posisi ini. Sebutkan keterampilan khusus dan bagaimana Anda berkontribusi. Hindari hal generik seperti Saya bertanggung jawab.',
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
    const proposal = document.getElementById('proposal');

    form.addEventListener('submit', function() {
      if( proposal.value == '' ) {
        event.preventDefault();
        alert('Proposal tidak boleh kosong');
      }
    });

  </script>
@endsection