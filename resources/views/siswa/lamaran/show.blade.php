@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-7 px-2 mt-2 order-2 order-lg-1">
                <div class="card shadow p-4 pb-4">
                    <h5 class="text-muted "><i class="fa fa-bullhorn mr-2"></i>{{__(' LOWONGAN')}}</h5>
                    <div>
                        <table class="table table-responsive">
                            <tbody>
                                <tr class="border-0">
                                    <th class="border-0 pb-0" scope="col">Perusahaan</th>
                                    <th class="border-0 pb-0" scope="col">:</th>
                                    <th class="border-0 pb-0" scope="col"><a href="{{ url('/perusahaan/show/' . encrypt($pelamar->lowongan->perusahaan->id)) }}">{{__( $pelamar->lowongan->perusahaan->nama )}}</a></th>
                                </tr>
                                <tr class="border-0">
                                    <th class="border-0 pb-0" scope="col">Lowongan</th>
                                    <th class="border-0 pb-0" scope="col">:</th>
                                    <th class="border-0 pb-0" scope="col"><a href="{{ url('lowongan/' . encrypt($pelamar->lowongan->id)) }}">{{__( $pelamar->lowongan->jabatan )}}</a></th>
                                </tr>
                                <tr class="border-0">
                                    <th class="border-0 pb-0" scope="col">Berakhir Pada</th>
                                    <th class="border-0 pb-0" scope="col">:</th>
                                    <th class="border-0 pb-0" scope="col"> {{ date('d M Y', strtotime($pelamar->lowongan->batas_akhir_lamaran)) }} </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card shadow p-4 pb-4 mt-3">
                    <h5 class="text-muted "><i class="fa fa-file-text-o mr-2"></i>{{__(' PROPOSAL')}}</h5>
                    <div>
                        <table class="table table-responsive">
                            <tbody>
                                <tr class="border-0">
                                    <th class="border-0 pb-0" scope="col">Nama</th>
                                    <th class="border-0 pb-0" scope="col">:</th>
                                    <th class="border-0 pb-0" scope="col"><a href="{{ url('/siswa/profil') }}"> {{ $pelamar->siswa->user->name }} </a></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="px-4 mt-3">
                        {!! $pelamar->proposal_pelamaran !!}
                    </div>
                    <div class="mt-2">
                        <a class="float-right mr-3" href="{{ url('/siswa/profil') }}">{{__( $pelamar->siswa->nama_pertama )}} {{ __( $pelamar->siswa->nama_belakang ) }} </a></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 px-2 mt-2 order-1 order-lg-2">
                <div class="card shadow p-4 ">
                    <h5 class="text-muted "><i class="fa fa-user mr-2"></i>{{__(' PELAMAR')}}</h5>
                    <div class="mt-4 d-flex justify-content-center align-items-center">
                        @if(is_null($pelamar->siswa->photo))
                            <img class="w-50 w-lg-50 rounded" src="{{ asset('/images/profile.svg') }}" alt="">
                        @else
                            <img class="w-50 w-lg-50 rounded" src="{{ url('/storage/assets/daftar-siswa/' . $pelamar->siswa->photo) }}" alt="">
                        @endif
                    </div>
                    <hr class="mt-4">
                    <div>
                        <table class="table table-responsive">
                            <tr class="border-0">
                                <th class="border-0 pb-0" scope="col">Nama</th>
                                <th class="border-0 pb-0" scope="col">:</th>
                                <th class="border-0 pb-0" scope="col"><a href="{{ url('/siswa/profil') }}"> {{ $pelamar->siswa->user->name }} </a></th>
                            </tr>
                            <tr>
                                <th class="border-0 pb-0" scope="col">Gaji Diharapkan</th>
                                <th class="border-0 pb-0" scope="col">:</th>
                                <th class="border-0 pb-0" scope="col">IDR {{ (number_format($pelamar->siswa->siswaLainya->gaji_diharapkan, 0, '.', '.')) }}</th>
                            </tr>
                            <tr class="border-0">
                                <th class="border-0 pb-0" scope="col">Status</th>
                                <th class="border-0 pb-0" scope="col">:</th>
                                <th class="border-0 pb-0" scope="col">
                                    @if ($pelamar->statusPelamaran->status == 'menunggu')
                                        <span class="btn btn-sm btn-secondary"><i class="fa fa-warning mr-1"></i> Menunggu</span>
                                    @elseif ($pelamar->statusPelamaran->status == 'diterima')
                                        <span class="btn btn-sm btn-success"><i class="fa fa-check mr-1"></i> Diterima</span>
                                    @elseif ($pelamar->statusPelamaran->status == 'ditolak')
                                        <span class="btn btn-sm btn-danger"><i class="fa fa-close mr-1"></i> Ditolak</span>
                                    @elseif ($pelamar->statusPelamaran->status == 'dipanggil')
                                        <span class="btn btn-sm btn-primary"><i class="fa fa-bullhorn mr-1"></i> Dipanggil </span>
                                    @endif
                                </th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
