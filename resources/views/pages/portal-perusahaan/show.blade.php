@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row profil-akun">
        <div class="col-md-7 px-0">
            <div class="col mt-4">
                <div class="own-card d-flex flex-column">
                    <div class="image">
                        <div class="judul">
                            <h1>Informasi Perusahaan</h1>
                            <hr class="w-75">
                        </div>
                    </div>
                    <div class="profil">
                        <div class="foto-profil">
                            @if ( $perusahaan->logo === null )
                                <img class="rounded-circle" src="{{ asset('/images/noimagecompany.png') }}" alt="">
                            @else
                                <img src="/storage/assets/daftar-perusahaan/logo/{{ $perusahaan->logo }}" alt="">
                            @endif
                        </div>
                        <div class="informasi ml-2 d-flex flex-column justify-content-start">
                            <h2>{{ $perusahaan->nama }}</h2>
                            <p class="mt-n2">{{ $perusahaan->bidangKeahlian->nama }} / {{ $perusahaan->programKeahlian->nama }}</p>
                            <a class="text-primary" href="">{{ $perusahaan->email }}</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col mt-4">
                <div class="card p-4">
                    <h6 class="font-weight-bold">INFO KONTAK DAN PERUSAAAN</h6>
                    <table class="table tabel-informasi mt-3">
                        <tr>
                            <td><i class="fa fa-envelope-o mr-2"></i> Email</td>
                            <td>{{ $perusahaan->email }}</td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-phone mr-2"></i> Telepon</td>
                            <td>{{ $perusahaan->telp }}</td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-building-o mr-2"></i> Kategori</td>
                            <td>{{ $perusahaan->kategori }}</td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-map-o mr-2"></i> Alamat</td>
                            <td>{{ $perusahaan->alamat }}</td>
                        </tr>
                    </table>
                    <hr class="mt-n1">
                    <h6 class="mt-4 text-muted font-weight-bold">INFORMASI ALAMAT</h6>
                    <table class="table tabel-informasi mt-3">
                        <tr>
                            <td>Negara</td>
                            <td>{{ $perusahaan->negara }}</td>
                        </tr>
                        <tr>
                            <td>Provinsi</td>
                            <td>{{ $perusahaan->provinsi }}</td>
                        </tr>
                        <tr>
                            <td>Kabupaten / Kota</td>
                            <td>{{ $perusahaan->kabupaten }}</td>
                        </tr>
                        <tr>
                            <td>Kode Pos</td>
                            <td>{{ $perusahaan->kodepos }}</td>
                        </tr>
                    </table>
                    <hr class="mt-n1">
                    <h6 class="mt-4 text-muted font-weight-bold">INFORMASI PERUSAHAAN</h6>
                    <table class="table tabel-informasi mt-3">
                        <tr>
                            <td>Bidang Keahlian</td>
                            <td>{{ $perusahaan->bidangKeahlian->nama }}</td>
                        </tr>
                        <tr>
                            <td>Program Keahlian</td>
                            <td>{{ $perusahaan->programKeahlian->nama }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah Karyawan</td>
                            <td>{{ $perusahaan->jumlah_karyawan }}</td>
                        </tr>
                        <tr>
                            <td>Waktu Proses Perekrutan</td>
                            <td>{{ $perusahaan->waktu_proses_perekrutan }}</td>
                        </tr>
                        <tr>
                            <td>Gaya Berpakaian</td>
                            <td>{{ $perusahaan->gaya_berpakaian }}</td>
                        </tr>
                        <tr>
                            <td>Bahasa</td>
                            <td>{{ $perusahaan->bahasa }}</td>
                        </tr>
                        <tr>
                            <td>Waktu Bekerja</td>
                            <td>{{ $perusahaan->waktu_bekerja }}</td>
                        </tr>
                        <tr>
                            <td>Tunjangan</td>
                            <td>{{ $perusahaan->tunjangan }}</td>
                        </tr>
                    </table>
                    <hr class="mt-n1">
                    <h6 class="mt-4 text-muted font-weight-bold">INFORMASI LAINYA</h6>
                    <table class="table tabel-informasi mt-3">
                        <tr>
                            <td>Fax</td>
                            <td>{{ $perusahaan->fax }}</td>
                        </tr>
                        <tr>
                            <td>Site</td>
                            <td>{{ $perusahaan->site }}</td>
                        </tr>
                        <tr>
                            <td>Facebook</td>
                            <td>{{ $perusahaan->facebook }}</td>
                        </tr>
                        <tr>
                            <td>Instagram</td>
                            <td>{{ $perusahaan->instagram }}</td>
                        </tr>
                        <tr>
                            <td>Linkedin</td>
                            <td>{{ $perusahaan->linkedin }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-5 px-0">
                <div class="col mt-4">
                    <div class="own-card p-4">
                        <h5 class="font-weight-bold pb-2">Status</h5>
                        <div class="d-flex align">
                            @if ($perusahaan->user->can('melakukan verifikasi'))
                                <i class="fa fa-exclamation-circle fa-5x mr-4 w-25 h-100  my-auto mx-auto text-danger"></i>
                            @endif
                            @if ($perusahaan->user->can('menunggu verifikasi diterima'))
                                <i class="fa fa-refresh fa-5x mr-4 w-25 h-100  my-auto mx-auto text-muted"></i>
                            @endif
                            @if ($perusahaan->user->can('terverifikasi'))
                                <i class="fa fa-check fa-5x mr-4 w-25 h-100  my-auto mx-auto text-success"></i>
                            @endif
                            <h5 class="font-weight-bold w-75 h-100 my-auto ml-3">
                                @if ($perusahaan->user->can('melakukan verifikasi'))
                                    Belum Verifikasi
                                @endif
                                @if ($perusahaan->user->can('menunggu verifikasi diterima'))
                                    Menunggu Verifikasi
                                @endif
                                @if ($perusahaan->user->can('terverifikasi'))
                                    Terverifikasi
                                @endif
                            </h5>
                        </div>
                    </div>
                    <div class="own-card p-4 mt-4">
                        <h5 class="font-weight-bold pb-3">Lowongan</h5>
                        <div class="d-flex align-items-center justify-content-around">
                            <h1 class="mt-n1">10</h1>
                            <h5 class="font-weight-bold w-75 h-100 my-auto ml-3">Lowongan Pekerjaan Diposkan</h5>
                        </div>
                    </div>
                </div>
                <div class="col mt-4">
                    <div class="own-card p-4">
                        <h5 class="font-weight-bold pb-2">Image Perusahaan</h5>
                        @if ($perusahaan->image == null)
                            <img class="cover w-100" src="{{ asset('/images/jakarta-office-building-vector-illustration_47305-12.jpg') }}" alt="">
                        @else
                            <img class="cover w-100" src="/storage/assets/daftar-perusahaan/image/{{ $perusahaan->image }}" alt="">
                        @endif
                    </div>
                </div>
                <div class="col mt-4">
                    <div class="own-card p-4">
                        <h5 class="font-weight-bold pb-2">Gambaran Perusahaan</h5>
                        <div class="px-3">
                            {!! $perusahaan->overview !!}
                        </div>
                    </div>
                </div>
                <div class="col mt-4">
                    <div class="own-card p-4">
                        <h5 class="font-weight-bold pb-2">Alasan Harus Melamar</h5>
                        <div class="px-3">
                            {!! $perusahaan->alasan_harus_melamar !!}
                        </div>
                    </div>
                </div>
        </div>


    </div>
</div>

@endsection