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
        <form action="{{ url('/app-admin/users/account/' . encrypt($item->id)) }}" method="post" class="card">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">NAMA<span class="text-danger">*</span></label>
                    <input type="text" required="" name="name" value="{{ old('name') ? old('name') : $item->name}}" class="form-control @error('name') is-invalid @enderror" required=""/>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">EMAIL<span class="text-danger">*</span></label>
                    <input required="" type="email" name="email" value="{{ old('email') ? old('email') : $item->email }}" class="form-control @error('email') is-invalid @enderror {{ (session('wrongEmail') ? 'is-invalid' : '') }}" required=""/>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @if (session('wrongEmail'))
                        <div class="invalid-feedback">{{ session('wrongEmail') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="username">USERNAME<span class="text-danger">*</span></label>
                    <input required="" type="text" name="username" value="{{ old('username') ? old('username') : $item->username }}" class="form-control @error('username') is-invalid @enderror {{ (session('wrongUsername') ? 'is-invalid' : '') }}" required=""/>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @if (session('wrongUsername'))
                        <div class="invalid-feedback">{{ session('wrongUsername') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">KONFIRMASI PASSWORD<span class="text-danger">*</span></label>
                    <input required="" type="password" name="password" value="{{ old('password') }}" class="form-control {{ (session('wrongPassword') ? 'is-invalid' : '') }}" autocomplete="off" required=""/>

                    @if (session('wrongPassword'))
                        <div class="invalid-feedback">{{ session('wrongPassword') }}</div>
                    @endif
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="{{ url('/app-admin/users/account/change-password') }}" class="btn btn-danger">
                    <i class="fas fa-key mr-1"></i>
                    UBAH PASSWORD
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save mr-1"></i>
                    UPDATE
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
