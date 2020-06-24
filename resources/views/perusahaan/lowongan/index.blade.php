@extends('perusahaan.layouts.app')
@section('content')

    <div class="container">
        <div class="route">
            <div class="d-flex align-items-center">
                <h2 class="m-0 pl-2">{{__('Portal Perusahaan ')}} {{ Auth::user()->perusahaan->nama }}</h2>
            </div>
            <div class="d-flex align-items-center justify-content-end">
                <a href="{{ url('/perusahaan') }}">{{__('Lowongan')}} </a>
				<span class="float-right ml-2">{{__('/')}} {{ ($sidebar == 'Semua Lowongan') ? $sidebar : 'Lowongan ' . $sidebar }}</span>
            </div>
        </div>
		<div class="row mt-4">
			<div class="col">
				<a href="{{ url('/perusahaan/lowongan/create') }}" class="btn btn-success"><i class="fa fa-plus mr-2"></i> {{__('Buat Lowongan')}}</a>
			</div>
		</div>

		@if (session('success'))
			<div class="alert alert-success mt-3">
				<strong>{{__('Berhasil ')}}</strong>{{ session('success') }}
			</div>
		@endif

        <div class="row mt-3">
            <div class="col-lg-8 order-2 order-lg-1">
                <div class="row mt-lg-2 mt-3">
                    <div class="col">
						<div class="card shadow p-4 pb-4">
                            <h5 class="text-muted "><i class="fa fa-file-text-o mr-2"></i>{{__(' LOWONGAN')}}</h5>
							<hr class="mt-2">
							@if (count($lowongan) == 0 )
                                <h4 class="ml-3 text-muted"></h4><br>
                                <div class="d-flex flex-column align-items-center py-3">
                                    <span class="display-1 text-muted"><i class="fa fa-user"></i></span>
                                    <h2 class="quicksand font-weight-bold">{{ ($sidebar == 'Semua Lowongan') ? 'Belum ada lowowngan' : 'Belum ada lowongan ' . $sidebar }}</h2>
                                </div>
							@else
							@foreach ($lowongan as $loker => $result)
							<span class="text-muted font-weight-bold h5 mb-n2 ml-3 mt-4">
								{{ $loker + $lowongan->firstitem() }}
							</span>
							<div class="row">
                                <div class="col-lg-4 d-flex align-items-center justify-content-center">
                                    <div class="text-center">
                                        <img class="w-100 ml-lg-4 w-lg-75 rounded" src="{{  ($result->perusahaan->logo == null ) ? asset('/images/company.png') : asset('/storage/assets/daftar-perusahaan/logo/' . $result->perusahaan->logo) }}" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div>
                                        <table class="table table-responsive">
                                            <tr>
                                                <th class="border-0 pb-0" scope="col">{{__('Lowongan')}}</th>
                                                <th class="border-0 pb-0" scope="col">{{__(':')}}</th>
                                                <th class="border-0 pb-0" scope="col"><a href="{{ url('lowongan/' . encrypt($result->id)) }}">{{__( $result->jabatan )}}</a></th>
                                            </tr>
                                            <tr>
                                                <th class="border-0 pb-0" scope="col">{{__('Gaji')}}</th>
                                                <th class="border-0 pb-0" scope="col">{{__(':')}}</th>
                                                <th class="border-0 pb-0" scope="col">{{__('IDR')}} {{ (number_format($result->gaji_min, 0, '.', '.')) }} {{('-')}} {{ (number_format($result->gaji_max, 0, '.', '.')) }}</th>
                                            </tr>
											<tr>
												<th class="border-0 pb-0" scope="col">{{__('Jumlah Pelamar')}}</th>
												<th class="border-0 pb-0" scope="col">{{__(':')}}</th>
												<th class="border-0 pb-0 d-flex align-items-center" scope="col"> {!! ($result->proses_lamaran == 'Offline') ? '<i class="fa fa-circle text-danger mr-1" style="font-size: 8px"></i> <span>Offline</span>' : $result->jumlah_pelamar !!} </th>
											</tr>
											<tr>
												<th class="border-0 pb-0" scope="col">{{__('Pelamar')}}</th>
												<th class="border-0 pb-0" scope="col">{{__(':')}}</th>
												<th class="border-0 pb-0" scope="col">
													@if ($result->proses_lamaran == 'Offline')
														<i class="fa fa-circle text-danger mr-1" style="font-size: 8px"></i> <span>Offline</span>
													@else
														<a href="{{ url('/perusahaan/lowongan/' . encrypt($result->id) . '/pelamar') }}" class="btn btn-sm btn-success"><i class="fa fa-user mr-2"></i> Lihat Pelamar</a>
													@endif
												</th>
											</tr>
											<tr>
												<th class="border-0 pb-0" scope="col">{{__('Status')}}</th>
												<th class="border-0 pb-0" scope="col">{{__(':')}}</th>
												<th class="border-0 pb-0" scope="col">
													@if ($result->status == 'Aktif')
														<span class="btn btn-sm btn-success"><i class="fa fa-check mr-2"></i> {{$result->status}} </span>
													@elseif($result->status == 'Nonaktif')
														<span class="btn btn-sm btn-danger"><i class="fa fa-ban mr-2"></i> {{$result->status}} </span>
													@elseif($result->status == 'Draf')
														<span class="btn btn-sm btn-secondary"><i class="fa fa-file-text-o mr-2"></i> {{$result->status}} </span>
													@endif
												</th>
											</tr>
											<tr>
												<th class="border-0 pb-0" scope="col">{{__('Proses Lamaran')}}</th>
												<th class="border-0 pb-0" scope="col">{{__(':')}}</th>
												<th class="border-0 pb-0 d-flex align-items-center" scope="col">
													<i class="fa fa-circle mr-1 {{ ($result->proses_lamaran == 'Online') ? 'text-success' : 'text-danger' }}" style="font-size: 8px"></i>
													<span>{{ $result->proses_lamaran }}</span>
												</th>

											</tr>
											<tr>
												<th class="border-0 pb-0" scope="col">{{__('Berakhir')}}</th>
												<th class="border-0 pb-0" scope="col">{{__(':')}}</th>
												<th class="border-0 pb-0" scope="col">
													{{ date('d M Y', strtotime($result->batas_akhir_lamaran)) }}
												</th>
											</tr>
											<tr>
												<th class="border-0 pb-0" scope="col">{{__('Aksi')}}</th>
												<th class="border-0 pb-0" scope="col">{{__(':')}}</th>
												<th class="border-0 pb-0" scope="col">
													<a href="{{ url('/perusahaan/lowongan/' . encrypt($result->id) . '/edit') }}" class="btn btn-sm btn-primary mt-2 mt-lg-0 "><i class="fa fa-edit mr-2"></i> Edit</a>
													<a href="#" onclick="onDelete('{{ $result->jabatan }}', '{{ url('/perusahaan/lowongan/' . encrypt($result->id)) }}')" class="btn btn-sm btn-danger mt-2 mt-lg-0"><i class="fa fa-trash mr-2"></i> Hapus</a>
												</th>
											</tr>
                                        </table>
                                    </div>
                                </div>
							</div>
							<hr>
							@endforeach
							@endif

                        </div>
						<div class="mt-2 ml-2">
							{{ $lowongan->onEachSide(4)->links() }}
						</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-1 order-lg-2">
                <div class="row mt-lg-2 mt-3">
                    <div class="col">
                        <div class="card shadow p-4 pb-4">
                            <h5 class="text-muted "><i class="fa fa-paperclip mr-2"></i>{{__(' OPSI')}}</h5>
                            <hr class="mt-2">
                            <div class="w-100 container-opsi-status">
                                <a class="text-decoration-none" href="{{ url('/perusahaan/lowongan') }}">
                                    <div class="sidebar-opsi-status {{ ($sidebar == 'Semua Lowongan') ? 'active-sidebar-opsi-status' : '' }}">
                                        <span class="ml-2">{{__('Semua Lowongan')}}</span>
                                    </div>
                                </a>
                                <a class="text-decoration-none" onclick="lowonganByStatus('Aktif')" href="">
                                    <div class="sidebar-opsi-status {{ ($sidebar == 'Aktif') ? 'active-sidebar-opsi-status' : '' }}">
										<span class="ml-2">{{__('Lowongan Aktif')}}</span>
                                    </div>
                                </a>
                                <a class="text-decoration-none" onclick="lowonganByStatus('Nonaktif')" href="">
                                    <div class="sidebar-opsi-status {{ ($sidebar == 'Nonaktif') ? 'active-sidebar-opsi-status' : '' }}">
										<span class="ml-2">{{__('Lowongan Nonaktif')}}</span>
                                    </div>
                                </a>
                                <a class="text-decoration-none" onclick="lowonganByStatus('Draf')" href="">
									<div class="sidebar-opsi-status {{ ($sidebar == 'Draf') ? 'active-sidebar-opsi-status' : '' }}">
										<span class="ml-2">{{__('Lowongan Draf')}}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
	</div>

	<form id="deleteLowongan" action="" method="post">
		@csrf
		@method('delete')
	</form>

	<form id="inputByStatus" action="" method="get">
		<input type="hidden" name="status">
	</form>
@endsection



@section('script')

<script>
	function onDelete(nama, url) {
		event.preventDefault()
		$konfirmasi = confirm('Apakah anda yakin akin akan menghapus\nLowongan ' + nama);
		if($konfirmasi) {
			document.getElementById('deleteLowongan').action = url
			document.getElementById('deleteLowongan').submit()
		}
	}
</script>

<script>
	function lowonganByStatus(status) {
		event.preventDefault();

		const _url = "{{ url('/perusahaan/lowongan/status') }}";
		const formInputByStatus = document.getElementById('inputByStatus');
		const availableStatus = ['Aktif', 'Nonaktif', 'Draf'];

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
