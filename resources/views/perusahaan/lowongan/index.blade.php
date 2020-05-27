{{-- @extends('perusahaan.layouts.app')
@section('content')
	<div class="container">
		<div class="route">
			<div class="d-flex align-items-center">
				<h2 class="m-0 pl-2">{{__('Portal Perusahaan ')}} {{ __($user->perusahaan->nama_perusahaan) }}</h2>
			</div>
			<div class="d-flex align-items-center justify-content-end">
				<a href="{{ url('/perusahaan') }}">{{__('Beranda')}} </a><span class="float-right ml-2">{{__('/ Lowongan Perusahaan')}}</span>
			</div>
		</div>

		@if (session('success'))
			<div class="alert alert-success mt-3">
				<strong>{{__('Berhasil ')}}</strong>{{ session('success') }}
			</div>
		@endif

		<div class="row mt-4">
			<div class="col">
				<a href="{{ url('/perusahaan/lowongan/create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Lowongan</a>
			</div>
		</div>

		<div class="row mt-3">
			<div class="col">
				<div class="card pt-4 card-tabel-lowongan">
					<h5 class="text-dark font-weight-bold ml-4 mb-4">{{ $jmlLowongan }} {{__('Lowongan')}}</h5>
					<div class="table-responsive">
						<table class="table align-items-center table-flush table-light tabel-list-lowongan">
							<thead>
								<tr class="text-center">
								<th scope="col">{{__('#')}}</th>
								<th scope="col">{{__('Jabatan')}}</th>
								<th scope="col">{{__('Berakhir Pada')}}</th>
								<th scope="col">{{__('Status')}}</th>
								<th scope="col">{{__('Aksi')}}</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($lowongan as $loker => $result)
									<tr class="text-center">
										<td scope="row">{{ $loker + $lowongan->firstitem() }}</th>
										<td>{{ $result->jabatan }}</td>
										<td>{{ date('d, M Y', strtotime($result->batas_akhir_lamaran)) }}</td>
										<td>{{ $result->status }}</td>
										<td>
											<div class="dropdown">
												<a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<i class="fa fa-ellipsis-v"></i>
												</a>
												<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
													<a class="dropdown-item" href="{{ url('/perusahaan/lowongan/' . encrypt($result->id) . '/pelamar') }}"><i class="fa fa-user"></i>{{__(' Lihat Pelamar')}}</a>
													<a class="dropdown-item" href="{{ url('lowongan/' . encrypt($result->id)) }}"><i class="fa fa-eye"></i>{{__(' Lihat')}}</a>
													<a class="dropdown-item" href="{{ url('/perusahaan/lowongan/' . encrypt($result->id) . '/edit') }}"><i class="fa fa-edit"></i>{{__(' Edit')}}</a>
													<a class="dropdown-item" href="#" onclick="onDelete('{{ $result->jabatan }}', '{{ url('/perusahaan/lowongan/' . encrypt($result->id)) }}')"><i class="fa fa-trash"></i>{{__(' Hapus')}}</a>
												</div>
											</div>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<div class="mt-2 ml-2">
					{{ $lowongan->onEachSide(4)->links() }}
				</div>			
			</div>
		</div>
	</div>

	<form id="deleteLowongan" action="" method="post">
		@csrf
		@method('delete')
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

@endsection --}}

















































@extends('perusahaan.layouts.app')
@section('content')

    <div class="container">
        <div class="route">
            <div class="d-flex align-items-center">
                <h2 class="m-0 pl-2">{{__('Portal Perusahaan Monokrom')}}</h2>
            </div>
            <div class="d-flex align-items-center justify-content-end">
                <a href="{{ url('/perusahaan') }}">{{__('Beranda')}} </a>
                <span class="mx-2">/</span>
                <a href="">{{__('Lowongan Perusahaan')}} </a>
                <span class="float-right ml-2">{{__('/ Lihat Pelamar')}}</span>
            </div>
        </div>

		<div class="row mt-4">
			<div class="col">
				<a href="{{ url('/perusahaan/lowongan/create') }}" class="btn btn-success"><i class="fa fa-plus mr-2"></i> Buat Lowongan</a>
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
						<div class="card p-4 pb-4">
                            <h5 class="text-muted "><i class="fa fa-file-text-o mr-2"></i>{{__(' LOWONGAN')}}</h5>
							<hr class="mt-2">
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
                                                <th class="border-0 pb-0" scope="col">Lowongan</th>
                                                <th class="border-0 pb-0" scope="col">:</th>
                                                <th class="border-0 pb-0" scope="col"><a href="{{ url('lowongan/' . encrypt($result->id)) }}">{{__( $result->jabatan )}}</a></th>
                                            </tr>
                                            <tr>
                                                <th class="border-0 pb-0" scope="col">Gaji</th>
                                                <th class="border-0 pb-0" scope="col">:</th>
                                                <th class="border-0 pb-0" scope="col">IDR {{ (number_format($result->gaji_min, 0, '.', '.')) }} {{('-')}} {{ (number_format($result->gaji_max, 0, '.', '.')) }}</th>
                                            </tr>
											<tr>
												<th class="border-0 pb-0" scope="col">Jumlah Pelamar</th>
												<th class="border-0 pb-0" scope="col">:</th>
												<th class="border-0 pb-0" scope="col"> {{ $result->jumlah_pelamar }} </th>
											</tr>
											<tr>
												<th class="border-0 pb-0" scope="col">Pelamar</th>
												<th class="border-0 pb-0" scope="col">:</th>
												<th class="border-0 pb-0" scope="col"> 
													<a href="{{ url('/perusahaan/lowongan/' . encrypt($result->id) . '/pelamar') }}" class="btn btn-sm btn-success"><i class="fa fa-user mr-2"></i> Lihat Pelamar</a>	
												</th>
											</tr>
											<tr>
												<th class="border-0 pb-0" scope="col">Status</th>
												<th class="border-0 pb-0" scope="col">:</th>
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
												<th class="border-0 pb-0" scope="col">Berakhir</th>
												<th class="border-0 pb-0" scope="col">:</th>
												<th class="border-0 pb-0" scope="col"> 
													{{ date('d M Y', strtotime($result->batas_akhir_lamaran)) }}
												</th>
											</tr>
											<tr>
												<th class="border-0 pb-0" scope="col">Aksi</th>
												<th class="border-0 pb-0" scope="col">:</th>
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
                        <div class="card p-4 pb-4">
                            <h5 class="text-muted "><i class="fa fa-paperclip mr-2"></i>{{__(' OPSI')}}</h5>
                            <hr class="mt-2">
                            <div class="w-100">
                                <a href="{{ url('/perusahaan/lowongan') }}">
                                    <div class="py-1">
                                        Semua Lowongan
                                    </div>
                                </a>
                                <a onclick="lowonganByStatus('Aktif')" href="">
                                    <div class="py-1">
                                       Lowongan Aktif
                                    </div>
                                </a>
                                <a onclick="lowonganByStatus('Nonaktif')" href="">
                                    <div class="py-1">
                                        Lowongan Nonaktif
                                    </div>
                                </a>
                                <a onclick="lowonganByStatus('Draf')" href="">
                                    <div class="py-1">
                                        Lowongan Draf
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