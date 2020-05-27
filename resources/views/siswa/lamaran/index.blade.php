@extends('layouts.app')
@section('content')

<div class="container py-3">
    @if (session('success'))
        <div class="row mt-4">
            <div class="col">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil </strong> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-8 px-2 mt-2 order-2 order-lg-1">
            <div class="card p-3 pb-4">
                <h5 class="text-muted"><i class="fa fa-list-alt mr-2"></i>{{__(' Lamaran')}}</h5>
            @foreach ($lamaran as $pelamaran)
            <div>
                <div class="row">
                    <div class="col-lg-4 d-flex justify-content-center align-items-center my-4">
                        <img class="w-50" src="{{ asset('/storage/assets/daftar-perusahaan/logo/' . $pelamaran->lowongan->perusahaan->logo) }}" alt="">
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-9">
                                <table class="table table-responsive">
                                    <tr class="border-0">
                                        <th class="border-0 pb-0" scope="col">Perusahaan</th>
                                        <th class="border-0 pb-0" scope="col">:</th>
                                        <th class="border-0 pb-0" scope="col"><a href="{{ url('/perusahaan/show/' . encrypt($pelamaran->lowongan->perusahaan_id)) }}">{{__( $pelamaran->lowongan->perusahaan->nama )}} </a></th>
                                    </tr>
                                    <tr class="border-0">
                                        <th class="border-0 pb-0" scope="col">Jabatan</th>
                                        <th class="border-0 pb-0" scope="col">:</th>
                                        <th class="border-0 pb-0" scope="col"><a href="{{ url('lowongan/' . encrypt($pelamaran->lowongan->id)) }}">{{__( $pelamaran->lowongan->jabatan )}} </a></th>
                                    </tr>
                                    <tr class="border-0">
                                        <th class="border-0 pb-0" scope="col">Status</th>
                                        <th class="border-0 pb-0" scope="col">:</th>
                                        <th class="border-0 pb-0" scope="col">
                                            @if ($pelamaran->statusPelamaran->status == 'menunggu')
                                                <span class="btn btn-sm btn-secondary"><i class="fa fa-warning mr-1"></i> Menunggu</span>
                                            @elseif ($pelamaran->statusPelamaran->status == 'diterima')
                                                <span class="btn btn-sm btn-success"><i class="fa fa-check mr-1"></i> Diterima</span>
                                            @elseif ($pelamaran->statusPelamaran->status == 'ditolak')
                                                <span class="btn btn-sm btn-danger"><i class="fa fa-close mr-1"></i> Ditolak</span>
                                            @elseif ($pelamaran->statusPelamaran->status == 'dipanggil')
                                                <span class="btn btn-sm btn-primary"><i class="fa fa-bullhorn mr-1"></i> Dipanggil</span>
                                            @endif
                                        </th>
                                    </tr>
                                    <tr class="border-0">
                                        <th class="border-0 pb-0" scope="col">Aksi</th>
                                        <th class="border-0 pb-0" scope="col">:</th>
                                        <th class="border-0 pb-0" scope="col">
                                            <a href="{{ url('/siswa/lamaran/' . encrypt($pelamaran->id) . '/edit') }}" class="btn btn-sm mt-1 mt-lg-0 btn-primary"><i class="fa fa-edit mr-1"></i> Edit</a>
                                        <button onclick="return hapusLamaran('{{ $pelamaran->lowongan->perusahaan->nama }}', '{{ url('/siswa/lamaran/' . encrypt($pelamaran->id)) }}')" type="button" class="btn btn-sm mt-1 mt-lg-0 btn-danger"><i class="fa fa-trash mr-1"></i> Hapus</button>
                                        </th>
                                    </tr>
                                    <tr class="border-0">
                                        <th class="border-0 pb-0" scope="col">Melamar Pada</th>
                                        <th class="border-0 pb-0" scope="col">:</th>
                                        <th class="border-0 pb-0" scope="col">{{ __( date('d M Y', strtotime($pelamaran->created_at)) ) }}</th>
                                    </tr>
                                    <tr class="border-0">
                                        <th class="border-0 pb-0" scope="col">Batas Akhir</th>
                                        <th class="border-0 pb-0" scope="col">:</th>
                                        <th class="border-0 pb-0" scope="col">{{ __( date('d M Y', strtotime($pelamaran->lowongan->batas_akhir_lamaran)) ) }}</th>
                                    </tr>
                                    <tr class="border-0">
                                        <th class="border-0 pb-0" scope="col">Pesan</th>
                                        <th class="border-0 pb-0" scope="col">:</th>
                                        <th class="border-0 pb-0" scope="col">
                                            @if ($pelamaran->statusPelamaran->status == 'menunggu')
                                                Belum Ada
                                            @else
                                                <a href="{{ url('/siswa/lamaran/' . encrypt($pelamaran->id)) }}" class="btn btn-sm btn-success"><i class="fa fa-envelope mr-1"></i> Lihat Pesan</a>
                                            @endif
                                        </th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>   
            @endforeach
            </div>
        </div>
        <div class="col-lg-4 px-2 order-1 order-lg-2">
            <div class="row mt-lg-2">
                <div class="col">
                    <div class="card p-4 pb-4">
                        <h5 class="text-muted "><i class="fa fa-paperclip mr-2"></i>{{__(' OPSI')}}</h5>
                        <hr class="mt-2">
                        <div class="w-100">
                            <a href="">
                                <div class="py-1">
                                    Semua Lamaran
                                </div>
                            </a>
                            <a href="">
                                <div class="py-1">
                                   Lamaran Dipanggil
                                </div>
                            </a>
                            <a href="">
                                <div class="py-1">
                                    Lamaran Diterima
                                </div>
                            </a>
                            <a href="">
                                <div class="py-1">
                                    Lamaran Ditolak
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<form id="hapusLamaran" action="" method="post">
    @csrf
    @method('DELETE')
</form>

@endsection



@section('script')

<script>
    function hapusLamaran(perusahaan, url) {
        event.preventDefault();
        let konfirmasi = confirm('Yakin, akan menghapus lamaran ' + perusahaan);

        if(konfirmasi) {
            let form = document.getElementById('hapusLamaran');
            form.setAttribute('action', url);
            form.submit();
        }
    }
</script>

@endsection