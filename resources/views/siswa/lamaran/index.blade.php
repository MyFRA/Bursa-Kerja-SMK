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
            <div class="card shadow p-3 pb-4">
                <h4 class="font-weight-bold quicksand" style="letter-spacing: 0.6px"><i class="fa fa-list-alt mr-2"></i>{{__('Lamaran')}}</h4>
                @if (count($lamaran) == 0)
                <div class="d-flex flex-column align-items-center py-3">
                    <span class="display-1 text-muted"><i class="fa fa-list-alt"></i></span>
                    <h2 class="quicksand font-weight-bold">{{ ($status == 'Semua Lamaran') ? 'Belum ada lamaran' : 'Belum ada lamaran ' . $status }}</h2>
                </div>
                @else
                    @foreach ($lamaran as $pelamaran)
                        <div>
                            <div class="row">
                                <div class="col-lg-4 d-flex justify-content-center align-items-center my-4">
                                    @if (is_null($pelamaran->lowongan->perusahaan->logo))
                                        <img class="text-center w-50 w-lg-75" src="{{ asset('/images/company.png') }}" alt="">
                                    @else
                                        <img class="text-center w-50 w-lg-75" src="{{ asset('/storage/assets/daftar-perusahaan/logo/' . $pelamaran->lowongan->perusahaan->logo) }}" alt="">
                                    @endif
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
                                                    <th class="border-0 pb-0" scope="col">Lowongan</th>
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
                                                    <th class="border-0 pb-0" scope="col">Lamaran</th>
                                                    <th class="border-0 pb-0" scope="col">:</th>
                                                    <th class="border-0 pb-0" scope="col">
                                                        <a href="{{ url('/siswa/lamaran/' . encrypt($pelamaran->id)) }}" class="btn btn-sm mt-1 btn-success"><i class="fa fa-edit mr-1"></i> Lihat</a>
                                                        <a href="{{ url('/siswa/lamaran/' . encrypt($pelamaran->id) . '/edit') }}" class="btn btn-sm mt-1 btn-primary"><i class="fa fa-edit mr-1"></i> Edit</a>
                                                        <button onclick="return hapusLamaran('{{ $pelamaran->lowongan->perusahaan->nama }}', '{{ url('/siswa/lamaran/' . encrypt($pelamaran->id)) }}')" type="button" class="btn btn-sm mt-1 btn-danger"><i class="fa fa-trash mr-1"></i> Hapus</button>
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
                                                            <a href="{{ url('/siswa/lamaran/' . encrypt($pelamaran->id) . '/pesan') }}" class="btn btn-sm btn-success"><i class="fa fa-envelope mr-1"></i> Lihat Pesan</a>
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
                @endif
            </div>
        </div>
        <div class="col-lg-4 px-2 order-1 order-lg-2">
            <div class="row mt-lg-2">
                <div class="col">
                    <div class="card shadow p-4 pb-4">
                        <h5 class="font-weight-bold quicksand" style="letter-spacing: 0.6px"><i class="fa fa-paperclip mr-2"></i>{{__('Opsi')}}</h5>
                        <hr class="mt-2">
                        <div class="w-100">
                            <a class="text-decoration-none" href="{{ url('/siswa/lamaran') }}">
                                <div class="sidebar-opsi-status {{ ($status == 'Semua Lamaran') ? 'active-sidebar-opsi-status' : '' }}">
                                    <span class="ml-2">Semua Lamaran</span>
                                </div>
                            </a>
                            <a class="text-decoration-none" onclick="lamaranByStatus('diterima')" href="">
                                <div class="sidebar-opsi-status {{ ($status == 'diterima') ? 'active-sidebar-opsi-status' : '' }}">
                                    <span class="ml-2">Lamaran Diterima</span>
                                </div>
                            </a>
                            <a class="text-decoration-none" onclick="lamaranByStatus('ditolak')" href="">
                                <div class="sidebar-opsi-status {{ ($status == 'ditolak') ? 'active-sidebar-opsi-status' : '' }}">
                                    <span class="ml-2">Lamaran Ditolak</span>
                                </div>
                            </a>
                            <a class="text-decoration-none" onclick="lamaranByStatus('dipanggil')" href="">
                                <div class="sidebar-opsi-status {{ ($status == 'dipanggil') ? 'active-sidebar-opsi-status' : '' }}">
                                    <span class="ml-2">Lamaran Panggilan Interview</span>
                                </div>
                            </a>
                            <a class="text-decoration-none" onclick="lamaranByStatus('menunggu')" href="">
                                <div class="sidebar-opsi-status {{ ($status == 'menunggu') ? 'active-sidebar-opsi-status' : '' }}">
                                    <span class="ml-2">Lamaran Menunggu Jawaban</span>
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

<form id="inputByStatus" action="" method="get">
    <input type="hidden" name="status">
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


<script>
    function lamaranByStatus(status) {
        event.preventDefault();

        const _url = '<?= url('/siswa/lamaran/status/lamaran') ?>'
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
