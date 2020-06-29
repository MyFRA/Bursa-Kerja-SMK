@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row mt-4 mb-5">

        @include('widget.trigger-navigasi-profil-siswa')

        <div class="col-lg-3 px-2">

        @include('widget.navigasi-profil-siswa')

        </div>


        <div class="col-lg-9 px-2">
            <div class="card shadow p-3">
                <div>
                    <div class="px-2 mt-4 pb-5">
                        <span class="h5 "><i class="fa fa-cogs"></i> {{(' Pengaturan Akun')}}</span>
                        <form action="{{ url('/siswa/profil/akun/username/' . encrypt($user->id)) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row mt-lg-4 mt-2">
                                <div class="col">
                                    <div class="row d-flex align-items-center title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                        <div class="col-md-3">
                                            <p class="text-muted">Username</p>
                                        </div>
                                        <div class="col-md-5">
                                             <div class="form-group mt-n2 mt-lg-0">
                                                 <input type="text" class="form-control @error('username') is-invalid @enderror {{ (session('wrongUsername') ? 'is-invalid' : '') }}" name="username" id="username" placeholder="Username" value="{{ old('username') ? old('username') : $user->username }}" required>


                                                 @error('username')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                                @if (session('wrongUsername'))
                                                    <div class="invalid-feedback">{{ session('wrongUsername') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                        <div class="col-md-3">
                                            <p class="text-muted">Konfirmasi Password</p>
                                        </div>
                                        <div class="col-md-5">
                                             <div class="form-group mt-n2 mt-lg-0">
                                                 <input type="password" class="form-control {{ (session('wrongPassword') ? 'is-invalid' : '') }}" name="password" id="password" placeholder="password" value="" autocomplete="off">

                                                 @if (session('wrongPassword'))
                                                    <div class="invalid-feedback">{{ session('wrongPassword') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row title-pengalaman keterampilan-list mt-lg-4 mt-3">
                                        <div class="col-md-3">

                                        </div>
                                        <div class="col-md-5 tombol-update-lainya">
                                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                            <a href="{{ url('/siswa/profil/akun') }}" class="btn btn-secondary">Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
