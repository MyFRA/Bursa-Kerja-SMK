@extends('layouts.app')

@section('content')
<div class="banner-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="content-text">
                    <h2>{{ __('SMK BISA KERJA') }}</h1>
                    <h3>{{ __('Dikembangkan oleh SMK Negeri 1 Bojongsari') }}</h3>
                    <h4>{{ __('SMK Bisa Kerja menyediakan informasi lowongan pekerjaan yang diberikan untuk lulusan SMA/SMK Sederajat
                        khususnya bagi para alumni SMK Negeri 1 Bojongsari') }}.</h4>

                    <div class="counting">
                        <b>320</b> {{ __('Lowongan tersedia') }}, <b>978</b> {{ __('Pengguna aktif') }}, <b>127</b> {{ __('Mitra Kerjasama') }}.
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="username" class="mb-0">{{ __('Username') }}</label>
                                <input type="text" name="username" placeholder="{{ __('Tuliskan username') }}" autocomplete="off" class="form-control form-control-lg">
                            </div>
                            <div class="form-group">
                                <label for="email" class="mb-0">{{ __('E-Mail') }}</label>
                                <input type="email" name="email" placeholder="{{ __('mail@example.com') }}" autocomplete="off" class="form-control form-control-lg">
                            </div>
                            <div class="form-group mb-0">
                                <label for="password" class="mb-0">{{ __('Kata Sandi') }}</label>
                                <input type="password" name="password" placeholder="{{ __('Buat kata sandi') }}"
                                    autocomplete="off" class="form-control form-control-lg">
                            </div>
                            <div class="role-form mt-2">
                                {{ __('Pastikan lebih dari 15 karakter ATAU setidaknya 8 karakter termasuk angka dan huruf kecil') }}.
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-lg btn-block btn-submit">
                                    {{ __('Daftar Sekarang') }}
                                </button>
                            </div>
                            <div class="role-form text-center">
                                Dengan mengklik "Daftar", Anda setuju dengan
                                    <a href="">Ketentuan Layanan</a> dan <a href="">Kebijakan Privasi</a> kami.
                                    Kami sesekali akan mengirimi Anda email terkait akun.
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        {{ __('Anda sudah memiliki akun') }}?<br />
                        <a href="">{{ __('Silahkan masuk') }}!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="info-service">
    <div class="container">
        <div class="row">
            <div class="col-md-4 service-item text-center">
                <a href="">
                    <div class="service-icon">
                        <i class="fa fa-bullhorn"></i>
                    </div>
                    <h3>{{ __('Info Lowongan') }}</h3>
                    <p>Dapatkan informasi lowongan kerja sesuai dengan minat dan keahlianmu, dan ajukan lamaran secara online.</p>
                </a>
            </div>
            <div class="col-md-4 service-item text-center">
                <a href="">
                    <div class="service-icon">
                        <i class="fa fa-file-text-o"></i>
                    </div>
                    <h3>Buat Resume</h3>
                    <p>Masukan datamu secara lengkap untuk bisa membuat resume secara profesional kepada perusahaan yang meliharnya.</p>
                </a>
            </div>
            <div class="col-md-4 service-item text-center">
                <a href="">
                    <div class="service-icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <h3>Iklan Lowongan</h3>
                    <p>Perusahaan bisa mempublikasi lowongan untuk mendapatkan karyawan yang handal dan profesional.</p>
                </a>
            </div>
        </div>
    </div>
</div>

<section class="job-categories">
    <div class="container">
        <div class="category-title">
            <h3>KATEGORI LOWONGAN</h3>
            <span>Cari Lowongan Pekerjaan Berdasarkan Kategori</span>  
        </div>

        <div class="row">
            <div class="col-12 col-lg-2 col-md-3 col-sm-6">
                <div class="card rounded-0">
                    <div class="card-body text-center">
                        <i class="fa fa-desktop fa-4x"></i>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-2 col-md-3 col-sm-6">
                <div class="card rounded-0">
                    <div class="card-body text-center">
                        <i class="fa fa-car fa-4x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
