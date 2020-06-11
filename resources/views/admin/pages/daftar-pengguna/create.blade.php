@extends('admin.layouts.app')

@section('page-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fas fa-share-alt mr-2"></i>
                    TAMBAH PENGGUNA
                </h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ url('/app-admin/daftar-pengguna') }}" class="btn btn-default rounded-0">
                    <i class="fas fa-table mr-1"></i> Daftar Pengguna
                </a>
                <a href="{{ url('/app-admin/daftar-pengguna/create') }}" class="btn btn-primary rounded-0">
                    <i class="fas fa-plus-circle mr-1"></i> Pengguna Baru
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-5">
        <form action="{{ route('daftar-pengguna.store') }}" method="post" class="card">
            @csrf

            <div class="card-body">
                <div class="form-group">
                    <label for="name">NAMA<span class="text-danger">*</span></label>
                    <input type="text" required="" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required=""/>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">EMAIL<span class="text-danger">*</span></label>
                    <input required="" type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required=""/>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="username">USERNAME<span class="text-danger">*</span></label>
                    <input required="" type="text" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" required=""/>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">PASSWORD<span class="text-danger">*</span></label>
                    <input required="" type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror @if(Session::get('gagal')) is-invalid @endif" required=""/>

                    @if(Session::get('gagal'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ Session::get('gagal') }}</strong>
                        </span>
                    @endif
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="confPassword">KONFIRMASI PASSWORD<span class="text-danger">*</span></label>
                    <input required="" type="password" name="confPassword" value="{{ old('confPassword') }}" class="form-control @if(Session::get('gagal')) is-invalid @endif" required=""/>

                    @if(Session::get('gagal'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ Session::get('gagal') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="level">LEVEL<span class="text-danger">*</span></label>
                    <select name="level" id="" required="" class="form-control select2">
                        <option value="" disabled="">-- Pilih Level Pengguna --</option>
                        @if (Auth::user()->hasRole('superadmin'))
                            <option value="superadmin" {{ old('level') == "superadmin" ? 'selected' : '' }}>Superadmin</option>
                        @endif
                        <option value="admin" {{ old('level') == "admin" ? 'selected' : '' }}>Admin</option>
                        <option value="guru" {{ old('level') == "guru" ? 'selected' : '' }}>Guru</option>
                        <option value="perusahaan" {{ old('level') == "perusahaan" ? 'selected' : '' }}>Perusahaan</option>
                        <option value="siswa" {{ old('level') == "siswa" ? 'selected' : '' }}>Siswa</option>
                    </select>
                    @error('level')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="reset" class="btn btn-default">
                    <i class="fas fa-undo mr-1"></i>
                    RESET
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save mr-1"></i>
                    SIMPAN
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
