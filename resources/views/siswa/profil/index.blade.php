@extends('layouts.app')

@section('content')

    @can('siswa belum update data')
        <div class="harus-update-profil">
            <div class="container beranda-lowongan-index">
                <div class="row">
                    <div class="col px-2 mt-3">
                        <div id="card-lowongan" class="card p-4 pr-lg-5 pl-lg-5 pt-5 mt-3">
                            <span class="h5 font-weight-bold mb-1 text-dark text-center">Agar Kamu Bisa Mendaftar Lowongan, Harap Lengkapi Profil </span>
                            <span class="mt-3 mb-3 text-justify">Update Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repudiandae atque, ut perferendis eveniet quibusdam veritatis. profil sangat dibutuhkan, agar perusahaan bisa Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, sed?</span>
                            <a href="{{ url('/siswa/profil/create-resume/siswa-pendidikan') }}" style="font-size: 17px; letter-spacing: 1px;" class="w-100 bg-primary text-white text-center mt-3 text-decoration-none pt-1 pb-1">Lengkapi Profil Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan

@endsection