@extends('perusahaan.layouts.app')
@section('content')

<div class="container">
    <div class="route">
        <div class="d-flex align-items-center">
            <h2 class="m-0 pl-2">{{__('Halaman Setelan Akun')}}</h2>
        </div>
        <div class="d-flex align-items-center justify-content-end">
            <a href="{{ url('/perusahaan/profil') }}">{{__('Profil ')}}</a><span class="float-right ml-2">{{__(" / Setelan Akun")}}</span>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 mt-4">
            <div class="card shadow">
                <div class=" p-3">
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
                                            <p class="mt-n3 mt-lg-0">{{ $user->name }}</p>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="float-right mr-5" href="{{ url('/perusahaan/profil/ubah/') }}"><i class="fa fa-edit"></i> Edit</a>
                                        </div>
                                    </div>
                                    <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                        <div class="col-md-3">
                                            <p class=" text-muted">Email</p>
                                        </div>
                                        <div class="col-md-7">
                                            <p class="mt-n3 mt-lg-0">{{ $user->email }}</p>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="float-right mr-5" href="{{ url('/perusahaan/profil/ubah/') }}"><i class="fa fa-edit"></i> Edit</a>
                                        </div>
                                    </div>
                                    <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                        <div class="col-md-3">
                                            <p class=" text-muted">Username</p>
                                        </div>
                                        <div class="col-md-7">
                                            <p class="mt-n3 mt-lg-0">{{ $user->username }}</p>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="float-right mr-5" href="{{ url('/perusahaan/profil/setelan-akun/username/' . encrypt($user->id) . '/edit') }}"><i class="fa fa-edit"></i> Edit</a>
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
                                            <a class="float-right mr-5" href="{{ url('/perusahaan/profil/setelan-akun/password/' . encrypt($user->id) . '/edit') }}"><i class="fa fa-edit"></i> Edit</a>
                                        </div>
                                    </div>
                                    <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                        <div class="col-md-3">
                                            <p class=" text-muted">Status</p>
                                        </div>
                                        <div class="col-md-7">
                                            <p class="mt-n3 mt-lg-0">{{ __($user->level) }}</p>
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
</div>

@endsection
