@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row mt-4 mb-5">

        @include('widget.trigger-navigasi-profil-siswa')

        <div class="col-lg-3 px-2">

        @include('widget.navigasi-profil-siswa')

        </div>

        <div class="col-lg-9 px-2">
            <div class="card p-3">
                <div>
                    <div class="px-2 mt-4 pb-5">
                        <span class="h5 "><i class="fa fa-cogs"></i> {{(' Pengaturan Akun')}}</span>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                <strong>Berhasil</strong>  {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="row mt-lg-4 mt-2">
                            <div class="col">
                                <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                    <div class="col-md-3">
                                        <p class=" text-muted">Nama</p>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mt-n3 mt-lg-0">{{ $siswa->name }}</p>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="float-right mr-5" href="{{ url('/siswa/profil/profil-saya/' . encrypt($siswa->siswa->id) . '/edit', []) }}"><i class="fa fa-edit"></i> Edit</a>
                                    </div>
                                </div>
                                <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                    <div class="col-md-3">
                                        <p class=" text-muted">Email</p>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mt-n3 mt-lg-0">{{ $siswa->email }}</p>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="float-right mr-5" href="{{ url('/siswa/profil/profil-saya/' . encrypt($siswa->siswa->id) . '/edit', []) }}"><i class="fa fa-edit"></i> Edit</a>
                                    </div>
                                </div>
                                <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                    <div class="col-md-3">
                                        <p class=" text-muted">Username</p>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mt-n3 mt-lg-0">{{ $siswa->username }}</p>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="float-right mr-5" href="{{ url('/siswa/profil/akun/username/' . encrypt($siswa->id) . '/edit') }}"><i class="fa fa-edit"></i> Edit</a>
                                    </div>
                                </div>
                                <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                    <div class="col-md-3">
                                        <p class=" text-muted">Password</p>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mt-n3 mt-lg-0">{{ __('******') }}</p>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="float-right mr-5" href="{{ url('/siswa/profil/akun/password/' . encrypt($siswa->id) . '/edit') }}"><i class="fa fa-edit"></i> Edit</a>
                                    </div>
                                </div>
                                <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                    <div class="col-md-3">
                                        <p class=" text-muted">Status</p>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mt-n3 mt-lg-0">{{ __($siswa->level) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
