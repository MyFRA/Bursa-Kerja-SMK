@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row mt-2 mb-4 container-proposal-lamaran">
            <div class="col-lg-7 px-2 order-lg-1 order-2 mt-3">
                <div class="card shadow p-4 pb-5">
                    <h5 class="text-muted mb-4"><i class="fa fa-envelope-open-o mr-2"></i>{{__(' PESAN')}}</h5>
                    <div>
                        <table class="table table-responsive">
                            <tbody>
                                <tr class="border-0">
                                    <th class="border-0 pb-0" scope="col">Pengirim</th>
                                    <th class="border-0 pb-0" scope="col">:</th>
                                    <th class="border-0 pb-0" scope="col"><a href="{{ url('/perusahaan/show/' . encrypt($pelamaran->lowongan->perusahaan->id)) }}">{{__( $pelamaran->lowongan->perusahaan->nama )}}</a></th>
                                </tr>
                                <tr class="border-0">
                                    <th class="border-0 pb-1" scope="col">Lamaran</th>
                                    <th class="border-0 pb-1" scope="col">:</th>
                                    <th class="border-0 pb-1" scope="col"> {{ $pelamaran->statusPelamaran->status }} </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="px-3">
                        {!! $pelamaran->statusPelamaran->pesan !!}
                    </div>
                    <div class="mt-2">
                        <a class="float-right mr-3" href="{{ url('/perusahaan/show/' . encrypt($pelamaran->lowongan->perusahaan->id)) }}">{{__( $pelamaran->lowongan->perusahaan->nama )}}</a>
                    </div>

                </div>
            </div>
            <div class="col-lg-5 px-2 order-lg-2 order-1 mt-3">
                <div class="card shadow p-4 pb-4">
                    <h5 class="text-muted mb-4"><i class="fa fa-paperclip mr-2"></i>{{__(' LOWONGAN')}}</h5>
                    <div class="text-center mt-2">
                        <img class="w-50 rounded" src="{{  ($pelamaran->lowongan->perusahaan->logo == null ) ? asset('/images/company.png') : asset('/storage/assets/daftar-perusahaan/logo/' . $pelamaran->lowongan->perusahaan->logo) }}" alt="">
                    </div>
                    <div class="text-center mt-2">
                      <hr class="w-75 mb-0">
                    </div>
                    <div class="mt-3">
                      <table class="table table-responsive">
                        <tbody>
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
                        </tbody>
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
            placeholder: 'Beritahu perusahaan mengapa Anda paling cocok untuk posisi ini. Sebutkan keterampilan khusus dan bagaimana Anda berkontribusi. Hindari hal generik seperti Saya bertanggung jawab.',
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
