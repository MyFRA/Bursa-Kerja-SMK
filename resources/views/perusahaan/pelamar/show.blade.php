@extends('perusahaan.layouts.app')
@section('content')
    <div class="container">

        <div class="route mb-4">
            <div class="d-flex align-items-center">
                <h2 class="m-0 pl-2">{{__('Proposal')}}</h2>
            </div>
            <div class="d-flex align-items-center justify-content-end">
                <a href="">{{__('Lowongan')}} </a>
                <span class="mx-2">/</span>
                <a href="{{ url('/perusahaan/lowongan/' . encrypt($pelamar->lowongan->id) . '/pelamar') }}">{{__('Pelamar')}} </a>
                <span class="float-right ml-2">{{__('/ Proposal Pelamaran')}}</span>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-7 px-2 mt-2 order-2 order-lg-1">
                <div class="card p-4 pb-4">
                    <h5 class="text-muted "><i class="fa fa-file-text-o mr-2"></i>{{__(' LOWONGAN')}}</h5>
                    <div>
                        <table class="table table-responsive">
                            <tbody>
                                <tr class="border-0">
                                    <th class="border-0 pb-0" scope="col">{{__('Perusahaan')}}</th>
                                    <th class="border-0 pb-0" scope="col">{{__(':')}}</th>
                                    <th class="border-0 pb-0" scope="col"><a href="{{ url('/perusahaan/profil') }}">{{__( $pelamar->lowongan->perusahaan->nama )}}</a></th>
                                </tr>
                                <tr class="border-0">
                                    <th class="border-0 pb-0" scope="col">{{__('Lowongan')}}</th>
                                    <th class="border-0 pb-0" scope="col">{{__(':')}}</th>
                                    <th class="border-0 pb-0" scope="col"><a href="{{ url('lowongan/' . encrypt($pelamar->lowongan->id)) }}">{{__( $pelamar->lowongan->jabatan )}}</a></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card p-4 pb-4 mt-3">
                    <h5 class="text-muted "><i class="fa fa-file-text-o mr-2"></i>{{__(' PROPOSAL')}}</h5>
                    <div>
                        <table class="table table-responsive">
                            <tbody>
                                <tr class="border-0">
                                    <th class="border-0 pb-0" scope="col">{{__('Nama')}}</th>
                                    <th class="border-0 pb-0" scope="col">{{__(':')}}</th>
                                    <th class="border-0 pb-0" scope="col"><a href="{{ url('profil-siswa/' . encrypt($pelamar->siswa->user->id) . '/' . encrypt($pelamar->lowongan->id)) }}">{{__( $pelamar->siswa->nama_pertama )}} {{ __( $pelamar->siswa->nama_belakang ) }} </a></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="px-4 mt-3">
                        {!! $pelamar->proposal_pelamaran !!}
                    </div>
                    <div class="mt-2">
                        <a class="float-right mr-3" href="{{ url('profil-siswa/' . encrypt($pelamar->siswa->user->id) . '/' . encrypt($pelamar->lowongan->id)) }}">{{__( $pelamar->siswa->nama_pertama )}} {{ __( $pelamar->siswa->nama_belakang ) }} </a></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 px-2 mt-2 order-1 order-lg-2">
                <div class="card p-4 ">
                    <h5 class="text-muted "><i class="fa fa-user mr-2"></i>{{__(' PELAMAR')}}</h5>
                    <div class="mt-4 d-flex justify-content-center align-items-center">
                        @if(is_null($pelamar->siswa->photo))
                        <img class="w-50 rounded" src="{{ asset('/images/profile.svg') }}" alt="">
                        @else
                        <img class="w-50 rounded" src="{{ url('/storage/assets/daftar-siswa/' . $pelamar->siswa->photo) }}" alt="">
                        @endif
                    </div>
                    <hr class="mt-4">
                    <div>
                        <table class="table table-responsive">
                            <tr class="border-0">
                                <th class="border-0 pb-0" scope="col">Nama</th>
                                <th class="border-0 pb-0" scope="col">:</th>
                                <th class="border-0 pb-0" scope="col"><a href="{{ url('profil-siswa/' . encrypt($pelamar->siswa->user->id) . '/' . encrypt($pelamar->lowongan->id)) }}">{{__( $pelamar->siswa->nama_pertama )}} {{ __( $pelamar->siswa->nama_belakang ) }} </a></th>
                            </tr>
                            <tr>
                                <th class="border-0 pb-0" scope="col">{{__('Gaji Diharapkan')}}</th>
                                <th class="border-0 pb-0" scope="col">{{__(':')}}</th>
                                <th class="border-0 pb-0" scope="col">{{__('IDR')}} {{ (number_format($pelamar->siswa->siswaLainya->gaji_diharapkan, 0, '.', '.')) }}</th>
                            </tr>
                            <tr class="border-0">
                                <th class="border-0 pb-0" scope="col">{{__('Status')}}</th>
                                <th class="border-0 pb-0" scope="col">{{__(':')}}</th>
                                <th class="border-0 pb-0" scope="col">
                                    @if ($pelamar->statusPelamaran->status == 'menunggu')
                                        <span class="btn btn-sm btn-secondary"><i class="fa fa-warning mr-1"></i> {{__('Menunggu')}}</span>
                                    @elseif ($pelamar->statusPelamaran->status == 'diterima')
                                        <span class="btn btn-sm btn-success"><i class="fa fa-check mr-1"></i> {{__('Diterima')}}</span>
                                    @elseif ($pelamar->statusPelamaran->status == 'ditolak')
                                        <span class="btn btn-sm btn-danger"><i class="fa fa-close mr-1"></i> {{__('Ditolak')}}</span>
                                    @elseif ($pelamar->statusPelamaran->status == 'dipanggil')
                                        <span class="btn btn-sm btn-primary"><i class="fa fa-bullhorn mr-1"></i> {{__('Dipanggil')}} </span>
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <th class="border-0 pb-0" scope="col">{{__('Lamaran')}}</th>
                                <th class="border-0 pb-0" scope="col">{{__(':')}}</th>
                                <th class="border-0 pb-0" scope="col">
                                    @if ($pelamar->statusPelamaran->status == 'menunggu')
                                        <a href="" onclick="statusPelamaran('diterima', '{{ encrypt($pelamar->id) }}')" class="btn btn-sm btn-success mt-1"><i class="fa fa-check mr-1"></i> Terima</a>
                                        <a href="" onclick="statusPelamaran('ditolak', '{{  encrypt($pelamar->id) }}')" class="btn btn-sm btn-danger mt-1"><i class="fa fa-close mr-1"></i> Tolak</a>
                                        <a href="" onclick="statusPelamaran('dipanggil', '{{  encrypt($pelamar->id) }}')" class="btn btn-sm btn-primary mt-1"><i class="fa fa-bullhorn mr-1"></i> Panggil Interview</a>
                                    @else
                                    <a href="{{ url('/perusahaan/lowongan/status-pelamaran/' . encrypt($pelamar->statusPelamaran->id) . '/edit') }}" class="btn btn-sm btn-primary mt-1"><i class="fa fa-edit mr-1"></i> Edit</a>
                                    @endif
                                </th>
                            </tr>
                        </table>
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

@endsection
