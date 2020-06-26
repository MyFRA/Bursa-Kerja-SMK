@extends('admin.layouts.app')

@section('page-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fas fa-share-alt mr-2"></i>
                    UPDATE PROFIL
                </h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-5">
        <form action="{{ url('/app-admin/users/account/change-password/' . encrypt($item->id)) }}" method="post" class="card">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="new_password">PASSWORD BARU<span class="text-danger">*</span></label>
                    <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror {{ (session('wrongNewPasswordConfirmation')) ? 'is-invalid' : '' }}" autocomplete="off" value="{{ old('new_password') }}" required=""/>

                    @error('new_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @if (session('wrongNewPasswordConfirmation'))
                        <div class="invalid-feedback">{{ session('wrongNewPasswordConfirmation') }}</div>
                    @endif

                </div>
                <div class="form-group">
                    <label for="new_password_confirmation">ULANGI PASSWORD<span class="text-danger">*</span></label>
                    <input type="password" name="new_password_confirmation" class="form-control @error('new_password_confirmation') is-invalid @enderror {{ (session('wrongNewPasswordConfirmation') ? 'is-invalid' : '') }}" value="{{ old('new_password_confirmation') }}" required=""/>

                    @error('new_password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @if (session('wrongNewPasswordConfirmation'))
                        <div class="invalid-feedback">{{ session('wrongNewPasswordConfirmation') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="old_password_confirmation">KONFIRMASI PASSWORD<span class="text-danger">*</span></label>
                    <input required="" type="password" name="old_password_confirmation" class="form-control {{ (session('wrongOldPasswordConfirmation') ? 'is-invalid' : '') }}" autocomplete="off" value="{{ old('old_password_confirmation') }}" required=""/>

                    @if (session('wrongOldPasswordConfirmation'))
                        <div class="invalid-feedback">{{ session('wrongOldPasswordConfirmation') }}</div>
                    @endif
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="{{ url('/app-admin/users/account/' . encrypt($item->id)) }}" class="btn btn-secondary">
                    <i class="fas fa-undo mr-1"></i>
                    KEMBALI
                </a>
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-save mr-1"></i>
                    UPDATE PASSWORD
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('stylesheet')
@endsection

@section('script')
@endsection
