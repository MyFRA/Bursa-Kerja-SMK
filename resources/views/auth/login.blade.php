@extends('layouts.app')

@section('content')
<div class="container">
    <div style="animation: tememplek 500ms" class="row mt-5 mb-5">
        <div class="col-lg-6 offset-lg-3">
            <div style="border-radius: 20px" class="card pt-4 pb-3 pl-4 pr-4">
                <form action="{{ url('/siswa/login')}}" method="post">
                    @csrf
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img class="w-25" src="{{ asset('/images/profile.svg') }}" alt="">
                        <h1 class="font-weight-bold mt-4">Masuk</h1>
                        <div class=" w-75 form-group mt-3 d-flex align-items-center flex-column">
                            <p class="h5">Username / Email <span class="text-danger">*</span> </p>
                            <input type="text" class="form-control mt-2 text-center border-0" style="background-color: #e2e2e2;" id="username" name="username" placeholder="Masukan username / email">
                            
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class=" w-75 form-group mt-3 d-flex align-items-center flex-column">
                            <p class="h5">Passowrd <span class="text-danger">*</span> </p>
                            <input type="password" class="form-control mt-2 text-center border-0" style="background-color: #e2e2e2;" id="password" name="password" placeholder="Masukan password">
                        
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class=" w-75 form-group mt-3 d-flex align-items-center flex-column">
                            <button type="submit" class="btn btn-primary w-100">Masuk</button>
                        </div>
                        <div class=" w-75 form-group mt-3 d-flex align-items-center flex-column">
                        <span>Belum mempunyai akun? <a href="{{ url('/') }}">Daftar</a></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
