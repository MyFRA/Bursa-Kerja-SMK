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
                        <form action="{{ url('/siswa/profil/akun/password/' . encrypt($user->id)) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row mt-lg-4 mt-2">
                                <div class="col">
                                    <div class="row d-flex align-items-center title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                        <div class="col-md-3">
                                            <p class="text-muted">Password Baru</p>
                                        </div>
                                        <div class="col-md-5">
                                             <div class="form-group mt-n2 mt-lg-0">
                                                 <input type="password" class="form-control @error('new_password') is-invalid @enderror {{ (session('wrongNewPasswordConfirmation')) ? 'is-invalid' : '' }}" name="new_password" id="new_password" placeholder="password baru" autocomplete="off" value="{{ old('new_password') }}" required>


                                                 @error('new_password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                                @if (session('wrongNewPasswordConfirmation'))
                                                    <div class="invalid-feedback">{{ session('wrongNewPasswordConfirmation') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                        <div class="col-md-3">
                                            <p class="text-muted">Ulangi Password</p>
                                        </div>
                                        <div class="col-md-5">
                                             <div class="form-group mt-n2 mt-lg-0">
                                                 <input type="password" class="form-control {{ (session('wrongNewPasswordConfirmation')) ? 'is-invalid' : '' }}" name="new_password_confirmation" id="new_password_confirmation" placeholder="ulangi password baru" autocomplete="off" value="{{ old('new_password_confirmation') }}" required>


                                                @if (session('wrongNewPasswordConfirmation'))
                                                    <div class="invalid-feedback">{{ session('wrongNewPasswordConfirmation') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row d-flex align-items-center title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                        <div class="col-md-3">
                                            <p class="text-muted">Konfirmasi Password</p>
                                        </div>
                                        <div class="col-md-5">
                                             <div class="form-group mt-n2 mt-lg-0">
                                                 <input type="password" class="form-control {{ (session('wrongOldPasswordConfirmation')) ? 'is-invalid' : '' }}" name="old_password_confirmation" id="old_password_confirmation" placeholder="password saat ini" autocomplete="off" value="{{ old('old_password_confirmation') }}" required>

                                                @if (session('wrongOldPasswordConfirmation'))
                                                    <div class="invalid-feedback">{{ session('wrongOldPasswordConfirmation') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row title-pengalaman keterampilan-list mt-lg-4 mt-3">
                                        <div class="col-md-3">

                                        </div>
                                        <div class="col-md-5 tombol-update-lainya">
                                            <button type="submit" name="submit" class="btn btn-primary">Ubah Password</button>
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
