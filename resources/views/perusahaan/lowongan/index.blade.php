@extends('perusahaan.layouts.app')
@section('content')
<div class="container">
	<div class="route">
		<div class="d-flex align-items-center">
			<h2 class="m-0 pl-2">{{__('Portal Perusahaan Monokrom')}}</h2>
		</div>
		<div class="d-flex align-items-center justify-content-end">
			<a href="">{{__('Beranda')}} </a><span class="float-right ml-2">{{__('/ Lowongan Perusahaan')}}</span>
		</div>
	</div>

	@if (session('success'))
	    <div class="alert alert-success mt-3">
	        <strong>Sukses </strong>{{ session('success') }}
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
				<h5 class="text-dark font-weight-bold ml-4 mb-4">{{ $jmlLowongan }} Lowongan</h5>
				<div class="table-responsive">
					<table class="table align-items-center table-flush table-light tabel-list-lowongan">
					  <thead>
					    <tr class="text-center">
					      <th scope="col">#</th>
					      <th scope="col">Jabatan</th>
					      <th scope="col">Berakhir Pada</th>
					      <th scope="col">Status</th>
					      <th scope="col">Aksi</th>
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
										    <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Lihat Pelamar</a>
										    <a class="dropdown-item" href="#"><i class="fa fa-eye"></i> Lihat</a>
										    <a class="dropdown-item" href="{{ url('/perusahaan/lowongan/' . encrypt($result->id) . '/edit') }}"><i class="fa fa-edit"></i> Edit</a>
										    <a class="dropdown-item" href="#" onclick="onDelete('{{ $result->jabatan }}', '{{ url('/perusahaan/lowongan/' . encrypt($result->id)) }}')"><i class="fa fa-trash"></i> Hapus</a>
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

@endsection