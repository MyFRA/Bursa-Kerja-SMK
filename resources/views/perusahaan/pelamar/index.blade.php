@extends('perusahaan.layouts.app')
@section('content')

    <div class="container">
        <div class="route">
            <div class="d-flex align-items-center">
                <h2 class="m-0 pl-2">{{__('Portal Perusahaan Monokrom')}}</h2>
            </div>
            <div class="d-flex align-items-center justify-content-end">
                <a href="{{ url('/perusahaan/lowongan') }}">{{__('Lowongan')}} </a>
                <span class="mx-2">/</span>
                <a href="">{{__('Pelamar')}} </a>
                <span class="float-right ml-2">{{__('/')}} {{ ($sidebar == 'Semua Pelamar') ? $sidebar : 'Pelamar ' . $sidebar }}</span>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-8">
                <div class="row mt-lg-2 mt-3">
                    <div class="col">
                        <div class="card p-4 pb-4">
                            <h5 class="text-muted "><i class="fa fa-paperclip mr-2"></i>{{__(' LOWONGAN')}}</h5>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="text-center">
                                        <img class="w-50 w-lg-75 rounded" src="{{  ($perusahaan->logo == null ) ? asset('/images/company.png') : asset('/storage/assets/daftar-perusahaan/logo/' . $perusahaan->logo) }}" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div>
                                        <table class="table table-responsive">
                                            <tr class="border-0">
                                                <th class="border-0 pb-0" scope="col">Perusahaan</th>
                                                <th class="border-0 pb-0" scope="col">:</th>
                                                <th class="border-0 pb-0" scope="col"><a href="{{ url('/perusahaan/profil') }}">{{__( $perusahaan->nama )}}</a></th>
                                            </tr>
                                            <tr>
                                                <th class="border-0 pb-0" scope="col">Lowongan</th>
                                                <th class="border-0 pb-0" scope="col">:</th>
                                                <th class="border-0 pb-0" scope="col"><a href="{{ url('lowongan/' . encrypt($lowongan->id)) }}">{{__( $lowongan->jabatan )}}</a></th>
                                            </tr>
                                            <tr>
                                                <th class="border-0 pb-0" scope="col">Gaji</th>
                                                <th class="border-0 pb-0" scope="col">:</th>
                                                <th class="border-0 pb-0" scope="col">IDR {{ (number_format($lowongan->gaji_min, 0, '.', '.')) }} {{('-')}} {{ (number_format($lowongan->gaji_max, 0, '.', '.')) }}</th>
                                            </tr>
                                            <tr>
                                                <th class="border-0 pb-0" scope="col">Alamat</th>
                                                <th class="border-0 pb-0" scope="col">:</th>
                                                <th class="border-0 pb-0" scope="col">{{ __( ($perusahaan->alamat == null) ? '-' : $perusahaan->alamat  ) }}</th>
                                            </tr>
                                        </table>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row mt-lg-2 mt-3">
                    <div class="col">
                        <div class="card p-4 pb-4">
                            <h5 class="text-muted "><i class="fa fa-paperclip mr-2"></i>{{__(' OPSI')}}</h5>
                            <hr class="mt-2">
                            <div class="w-100">
                                <a class="text-decoration-none" href="{{ url('/perusahaan/lowongan/' . encrypt($lowongan->id) . '/pelamar') }}">
                                    <div class="sidebar-opsi-status {{ ($sidebar == 'Semua Pelamar') ? 'active-sidebar-opsi-status' : '' }}">
                                        <span class="ml-2">Semua Pelamar</span>
                                    </div>
                                </a>
                                <a class="text-decoration-none" onclick="pelamarByStatus('diterima')" href="">
                                    <div class="sidebar-opsi-status {{ ($sidebar == 'diterima') ? 'active-sidebar-opsi-status' : '' }}">
										<span class="ml-2">Pelamar Diterima</span>
                                    </div>
                                </a>
                                <a class="text-decoration-none" onclick="pelamarByStatus('ditolak')" href="">
                                    <div class="sidebar-opsi-status {{ ($sidebar == 'ditolak') ? 'active-sidebar-opsi-status' : '' }}">
										<span class="ml-2">Pelamar Ditolak</span>
                                    </div>
                                </a>
                                <a class="text-decoration-none" onclick="pelamarByStatus('dipanggil')" href="">
									<div class="sidebar-opsi-status {{ ($sidebar == 'dipanggil') ? 'active-sidebar-opsi-status' : '' }}">
										<span class="ml-2">Pelamar Panggilan Interview</span>
                                    </div>
                                </a>
                                <a class="text-decoration-none" onclick="pelamarByStatus('menunggu')" href="">
									<div class="sidebar-opsi-status {{ ($sidebar == 'menunggu') ? 'active-sidebar-opsi-status' : '' }}">
										<span class="ml-2">Pelamar Menunggu Jawaban</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row mt-lg-n5">
            <div class="col-lg-8">
                <div class="row mt-3">
                    <div class="col">
                        <div class="card p-4 pb-4">
                            <h5 class="text-muted mt-2"><i class="fa fa-user mr-2"></i>{{__(' PELAMAR')}}</h5>
                            @if (count($pelamaran) == 0 )
								<h4 class="ml-3 text-muted">{{ ($sidebar == 'Semua Pelamar') ? 'Pelamar belum ada' : 'Pelamar ' . $sidebar . ' belum ada' }}</h4>
							@else
                                @foreach ($pelamaran as $org)
                                <div class="row">
                                    <div class="col">
                                        <div class="row my-4">
                                            <div class="col-lg-3">
                                                <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                                    @if(is_null($org->siswa->photo))
                                                    <img class="w-50 w-lg-75 rounded" src="{{ asset('/images/profile.svg') }}" alt="">
                                                    @else
                                                    <img class="w-50 w-lg-75 rounded" src="{{ url('/storage/assets/daftar-siswa/' . $org->siswa->photo) }}" alt="">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-9 mt-lg-0 mt-4">
                                                <table class="table table-responsive">
                                                    <tr class="border-0">
                                                        <th class="border-0 pb-0" scope="col">Nama</th>
                                                        <th class="border-0 pb-0" scope="col">:</th>
                                                        <th class="border-0 pb-0" scope="col"><a href="{{ url('profil-siswa/' . encrypt($org->siswa->user->id)) }}">{{__( $org->siswa->nama_pertama )}} {{ __( $org->siswa->nama_belakang ) }} </a></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="border-0 pb-0" scope="col">Gaji Diharapkan</th>
                                                        <th class="border-0 pb-0" scope="col">:</th>
                                                        <th class="border-0 pb-0" scope="col">IDR {{ (number_format($org->siswa->siswaLainya->gaji_diharapkan, 0, '.', '.')) }}</th>
                                                    </tr>
                                                    <tr>
                                                        <th class="border-0 pb-0" scope="col">Proposal</th>
                                                        <th class="border-0 pb-0" scope="col">:</th>
                                                        <th class="border-0 pb-0" scope="col">
                                                            <a href="{{ url('/perusahaan/lowongan/show/pelamar/' . encrypt($org->id)) }}" class="btn btn-sm btn-success"> Lihat Proposal</a>
                                                        </th>
                                                    </tr>
                                                    <tr class="border-0">
                                                        <th class="border-0 pb-0" scope="col">Status</th>
                                                        <th class="border-0 pb-0" scope="col">:</th>
                                                        <th class="border-0 pb-0" scope="col">
                                                            @if ($org->statusPelamaran->status == 'menunggu')
                                                                <span class="btn btn-sm btn-secondary"><i class="fa fa-warning mr-1"></i> Menunggu</span>
                                                            @elseif ($org->statusPelamaran->status == 'diterima')
                                                                <span class="btn btn-sm btn-success"><i class="fa fa-check mr-1"></i> Diterima</span>
                                                            @elseif ($org->statusPelamaran->status == 'ditolak')
                                                                <span class="btn btn-sm btn-danger"><i class="fa fa-close mr-1"></i> Ditolak</span>
                                                            @elseif ($org->statusPelamaran->status == 'dipanggil')
                                                                <span class="btn btn-sm btn-primary"><i class="fa fa-bullhorn mr-1"></i> Dipanggil </span>
                                                            @endif
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="border-0 pb-0" scope="col">Lamaran</th>
                                                        <th class="border-0 pb-0" scope="col">:</th>
                                                        <th class="border-0 pb-0" scope="col">
                                                            @if ($org->statusPelamaran->status == 'menunggu')
                                                                <a href="" onclick="statusPelamaran('diterima', '{{ encrypt($org->id) }}')" class="btn btn-sm btn-success mt-1"><i class="fa fa-check mr-1"></i> Terima</a>
                                                                <a href="" onclick="statusPelamaran('ditolak', '{{  encrypt($org->id) }}')" class="btn btn-sm btn-danger mt-1"><i class="fa fa-close mr-1"></i> Tolak</a>
                                                                <a href="" onclick="statusPelamaran('dipanggil', '{{  encrypt($org->id) }}')" class="btn btn-sm btn-primary mt-1"><i class="fa fa-bullhorn mr-1"></i> Panggil Interview</a>
                                                            @else
                                                                <a href="{{ url('/perusahaan/lowongan/status-pelamaran/' . encrypt($org->statusPelamaran->id) . '/edit') }}" class="btn btn-sm btn-primary mt-1"><i class="fa fa-edit mr-1"></i> Edit</a>
                                                            @endif
                                                        </th>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <form id="status-pelamaran" action="{{ url('/perusahaan/lowongan/status-pelamaran') }}" method="post">
        @csrf
        <input type="hidden" name="status" value="">
        <input type="hidden" name="pelamaran" value="">
    </form>

	<form id="inputByStatus" action="" method="get">
		<input type="hidden" name="status">
	</form>

@endsection



@section('script')

    <script>
        function statusPelamaran(status, idPelamar) {
            event.preventDefault();
            let form = document.getElementById('status-pelamaran');

            if(['diterima', 'ditolak', 'dipanggil'].includes(status)){
                form.children[1].setAttribute('value', status);
                form.children[2].setAttribute('value', idPelamar);
                form.submit();
            } else {
                alert('status tidak tersedia');
            }
        }
    </script>

    <script>
        function pelamarByStatus(status) {
            event.preventDefault();

            const _url = '<?= url('/perusahaan/lowongan/' . encrypt($lowongan->id) . '/pelamar/status') ?>'
            const formInputByStatus = document.getElementById('inputByStatus');
            const availableStatus = ['diterima', 'ditolak', 'dipanggil', 'menunggu'];

            if( availableStatus.includes(status) ) {
                formInputByStatus.setAttribute('action', _url);
                formInputByStatus.children[0].value = status;
                console.log(formInputByStatus);
                formInputByStatus.submit();
            } else {
                alert('status tidak tersedia');
            }
        }
    </script>

@endsection