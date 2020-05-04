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
            @guest
                <div class="col-lg-4">
                    <div class="card mt-lg-n4 mt-md-4">
                        <div class="card-body">

                            <form action="{{ route('siswa.register') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="nama_depan" class="mb-0">{{ __('Nama Depan') }} <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_depan" placeholder="{{ __('Tuliskan nama depan') }}" autocomplete="off" class="form-control form-control-lg" required="">
                                
                                    @error('nama_depan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama_belakang" class="mb-0">{{ __('Nama Belakang') }}</label>
                                    <input type="text" name="nama_belakang" placeholder="{{ __('Tuliskan nama belakang') }}" autocomplete="off" class="form-control form-control-lg">
                                
                                    @error('nama_belakang')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="username" class="mb-0">{{ __('Username') }} <span class="text-danger">*</span></label>
                                    <input type="text" name="username" placeholder="{{ __('Tuliskan username') }}" autocomplete="off" class="form-control form-control-lg" required="">
                                
                                    @error('username')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email" class="mb-0">{{ __('E-Mail') }} <span class="text-danger">*</span></label>
                                    <input type="email" name="email" placeholder="{{ __('mail@example.com') }}" autocomplete="off" class="form-control form-control-lg" required="">
                                
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-0">
                                    <label for="password" class="mb-0">{{ __('Kata Sandi') }} <span class="text-danger">*</span></label>
                                    <input type="password" name="password" placeholder="{{ __('Buat kata sandi') }}"
                                        autocomplete="off" class="form-control form-control-lg" required="">
                                
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
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
            @else
            
            @endguest
            
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
            <span>Cari Lowongan Pekerjaan Berdasarkan Kompetensi Keahlian</span>  
        </div>

        <div class="row">
            @for($i = 0; $i < 20; $i++)
            <div class="col-md-4 justify-content-between">
                <i class="fa fa-angle-double-right mr-2"></i>
                Rekayasa Perangkat Lunak
                
                <label class="badge badge-pill badge-secondary ml-2">123</label>
            </div>
            @endfor
        </div>
    </div>
</section>

<section class="testimonial">
    <div class="container">
        <div class="category-title">
            <h3>TESTIMONIAL</h3>
            <span>Kepuasan Siswa yang Menggunakan Aplikasi ini</span>  
        </div>

        <div id="carouselExampleIndicators" class="carousel slide container" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active row">
                    <div class="row">
                        <div class="col-6 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h1>1 of 3</h1>
                                    <div class="card-text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ornare pharetra elit vitae mollis. Mauris consectetur semper diam ac pretium.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h1>1 of 3</h1>
                                    <div class="card-text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ornare pharetra elit vitae mollis. Mauris consectetur semper diam ac pretium.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-md-block d-none">
                            <div class="card">
                                <div class="card-body">
                                    <h1>1 of 3</h1>
                                    <div class="card-text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ornare pharetra elit vitae mollis. Mauris consectetur semper diam ac pretium.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-6 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h1>2 of 3</h1>
                                    <div class="card-text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ornare pharetra elit vitae mollis. Mauris consectetur semper diam ac pretium.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h1>2 of 3</h1>
                                    <div class="card-text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ornare pharetra elit vitae mollis. Mauris consectetur semper diam ac pretium.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-md-block d-none">
                            <div class="card">
                                <div class="card-body">
                                    <h1>2 of 3</h1>
                                    <div class="card-text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ornare pharetra elit vitae mollis. Mauris consectetur semper diam ac pretium.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-6 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h1>3 of 3</h1>
                                    <div class="card-text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ornare pharetra elit vitae mollis. Mauris consectetur semper diam ac pretium.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h1>3 of 3</h1>
                                    <div class="card-text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ornare pharetra elit vitae mollis. Mauris consectetur semper diam ac pretium.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-md-block d-none">
                            <div class="card">
                                <div class="card-body">
                                    <h1>3 of 3</h1>
                                    <div class="card-text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ornare pharetra elit vitae mollis. Mauris consectetur semper diam ac pretium.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>

<section class="company">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                A
            </div>
            <div class="col-md-2">
                B
            </div>
        </div>
    </div>
</section>
@endsection
