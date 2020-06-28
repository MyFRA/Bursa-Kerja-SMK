@extends('layouts.app')

@section('content')
<div class="container py-3">
    <div class="row">
        <div class="col-lg-8 px-2 mt-3">
            <div class="card shadow p-3 pb-4">
                <h5 class="text-muted"><i class="fa fa-list-alt mr-2"></i>{{__(' Lowongan')}}</h5>
                <div class="row">
                    <div class="col-lg-4 d-flex justify-content-center align-items-center my-4">
                        @if (is_null($lowongan->perusahaan->logo))
                            <img class="w-50 w-lg-75 rounded" src="{{ asset('/images/company.png') }}" alt="">
                        @else
                            <img class="w-50 w-lg-75 rounded" src="{{ asset('/storage/assets/daftar-perusahaan/logo/' . $lowongan->perusahaan->logo) }}" alt="">
                        @endif
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-9">
                                <table class="table table-responsive">
                                    <tr class="border-0">
                                        <th class="border-0 pb-0" scope="col">{{__('Perusahaan')}}</th>
                                        <th class="border-0 pb-0" scope="col">:</th>
                                        <th class="border-0 pb-0" scope="col"><a href="{{ url('/perusahaan/show/' . encrypt($lowongan->perusahaan_id)) }}">{{__( $lowongan->perusahaan->nama )}} </a></th>
                                    </tr>
                                    <tr class="border-0">
                                        <th class="border-0 pb-0" scope="col">{{__('Lowongan')}}</th>
                                        <th class="border-0 pb-0" scope="col">:</th>
                                        <th class="border-0 pb-0" scope="col">{{ __( $lowongan->jabatan ) }}</th>
                                    </tr>
                                    <tr class="border-0">
                                        <th class="border-0 pb-0" scope="col">{{__('Gaji')}}</th>
                                        <th class="border-0 pb-0" scope="col">:</th>
                                        <th class="border-0 pb-0" scope="col">{{__('IDR')}} {{ __(number_format($lowongan->gaji_min, 0, '.', '.')) }} {{__('-')}}  {{__( number_format($lowongan->gaji_max, 0, '.', '.') )}}</th>
                                    </tr>
                                    <tr class="border-0">
                                        <th class="border-0 pb-0" scope="col">{{__('Kategori')}}</th>
                                        <th class="border-0 pb-0" scope="col">:</th>
                                        <th class="border-0 pb-0" scope="col"> {{ (is_null($lowongan->perusahaan->kategori) ? '-' : $lowongan->perusahaan->kategori) }} </th>
                                    </tr>
                                    <tr class="border-0">
                                        <th class="border-0 pb-0" scope="col">{{__('Alamat')}}</th>
                                        <th class="border-0 pb-0" scope="col">:</th>
                                        <th class="border-0 pb-0" scope="col">{{ ( is_null($lowongan->perusahaan->alamat) ? '-' : $lowongan->perusahaan->alamat ) }}</th>
                                    </tr>
                                    <tr class="border-0">
                                        <th class="border-0 pb-0" scope="col">{{__('Batas Akhir')}}</th>
                                        <th class="border-0 pb-0" scope="col">:</th>
                                        <th class="border-0 pb-0" scope="col">{{ __( date('d M Y', strtotime($lowongan->batas_akhir_lamaran)) ) }}</th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 px-2 mt-3">
            <div class="card shadow p-3 pb-4">
                <h5 class="text-muted mb-4"><i class="fa fa-list-alt mr-2"></i>{{__(' Pelamar')}}</h5>

                @if (count($pelamar) == 0)
                <div class="d-flex flex-column align-items-center py-3">
                    <span class="display-1 text-muted"><i class="fa fa-user"></i></span>
                    <h5 class="quicksand font-weight-bold">{{__('Belum ada pelamar')}}</h5>
                </div>
                @else
                    @foreach ($pelamar as $lamaran)
                        <div class="row">
                            <div class="col-4">
                                <div class="mx-auto">
                                    @if (is_null($lamaran->siswa->photo))
                                        <img class="ml-4 rounded" style="object-fit: cover; object-position: center" height="80px" width="80px" src="{{ asset('/images/profile.svg') }}" alt="">
                                    @else
                                        <img class="ml-4 rounded" style="object-fit: cover; object-position: center" height="80px" width="80px" src="{{ asset('/storage/assets/daftar-siswa/' . $lamaran->siswa->photo) }}" alt="">
                                    @endif
                                </div>
                            </div>
                            <div class="col-8">
                                <table class="table table-responsive">
                                    <tr class="border-0">
                                        <td class="border-0 pb-0" scope="col">{{__('Nama')}}</td>
                                        <td class="border-0 pb-0 px-0" scope="col">:</td>
                                        <td class="border-0 pb-0" scope="col">{{__( $lamaran->siswa->nama_pertama )}} {{ __( $lamaran->siswa->nama_belakang ) }}</td>
                                    </tr>
                                    <tr class="border-0">
                                        <td class="border-0 pb-0" scope="col">{{__('Melamar')}}</td>
                                        <td class="border-0 pb-0 px-0" scope="col">:</td>
                                        <td class="border-0 pb-0" scope="col">{{ date('d M Y', strtotime($lamaran->created_at)) }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    {{ $pelamar->onEachSide(5)->links() }}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
