@extends('perusahaan.layouts.app')
@section('content')

<div class="container">
    <div class="route">
        <div class="d-flex align-items-center">
            <h2 class="m-0 pl-2">{{__('Halaman Setelan Akun')}}</h2>
        </div>
        <div class="d-flex align-items-center justify-content-end">
            <a href="{{ url('/perusahaan/profil') }}">{{__('Profil ')}}</a><span class="mx-2"> / </span><a href="{{ url('/perusahaan/profil/setelan-akun') }}">{{__(' Setelan Akun') }}</a><span class="float-right ml-2">{{__(" / Edit Password")}}</span>
        </div>
    </div>


    <div class="col-lg-9 mt-4 px-2">
        <div class="card shadow p-3">
            <div>
                <div class="px-2 mt-4 pb-5">
                    <span class="h5 "><i class="fa fa-cogs"></i> {{(' Pengaturan Akun')}}</span>
                    <form action="{{ url('/perusahaan/profil/setelan-akun/password/' . encrypt($user->id)) }}" method="post">
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
                                             <input type="password" class="form-control @error('new_password') is-invalid @enderror {{ (session('wrongNewPasswordConfirmation')) ? 'is-invalid' : '' }}" name="new_password" id="new_password" placeholder="password baru" autocomplete="off" required>


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
                                             <input type="password" class="form-control {{ (session('wrongNewPasswordConfirmation')) ? 'is-invalid' : '' }}" name="new_password_confirmation" id="new_password_confirmation" placeholder="ulangi password baru" autocomplete="off" required>


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
                                             <input type="password" class="form-control {{ (session('wrongOldPasswordConfirmation')) ? 'is-invalid' : '' }}" name="old_password_confirmation" id="old_password_confirmation" placeholder="password saat ini" autocomplete="off" required>

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
                                        <a href="{{ url('/perusahaan/profil/setelan-akun') }}" class="btn btn-secondary">Kembali</a>
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

@endsection
