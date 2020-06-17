@extends('layouts.app')

@section('content')
<section class="pages pb-md-3 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-n3 d-flex justify-content-between align-items-center">
                <h3 class="page-title"><i class="fa fa-address-card-o mr-3"></i>{{__('Apa Itu SBK?')}}</h3>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="">{{__('Apa Itu SBK?')}}</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url()->previous() }}" class="h5"><i class="fa fa-arrow-left fa-0x mr-2"></i>Kembali</a>
                    </div>
                    <hr class="mt-0">
                    <div class="card-body px-5 pb-4 pt-3">
                        <h3>Skagata Career Center - Bursa Kerja Online</h3>
                        <p class="font-weight-bold mt-4">BURSA KERJA ONLINE | BKK ONLINE | LOWONGAN SMK</p>
                        <p>SKAGATA (SMKN 3 Yogyakarta) CAREER CENTER adalah Portal Karir milik Bursa Kerja Khusus (BKK) SMK Negeri 3 Yogyakarta. Sejak tahun 1993 hingga saat ini, BKK SMKN 3 Yogyakarta telah melayani ribuan tamatan SMK untuk mendapatkan pekerjaan, baik alumni SMKN 3 Yogyakarta maupun SMK lain di DIY dan Jateng. Mulai 1 Agustur 2018 Skagata Career Center resmi diluncurkan untuk menjembatani antara pencari kerja lulusan SMK, BKK, dan perusahaan dalam satu portal, layanan ini merupakan pertama kali di Indonesia yang diinisiasi oleh SMK (https://lifestyle.kontan.co.id/news/portal-karir-smk-pertama-di-indonesia-dirilis) .</p>
                        <p>Kini dengan perkembangan teknologi dan munculnya banyak lembaga layanan job placement, BKK SMKN 3 Yogyakarta berusaha memberikan layanan terbaik kepada mitra perusahaan dengan memberikan layanan publikasi informasi lowongan kerja berbasis website dan social media, tempat rekrutment, layanan petugas rekrutment dengan lembaga psikologi mitra BKK, serta layanan medical check up dengan laboratorium mitra BKK.</p>
                        <p class="font-weight-bold">Kami ingin membantu perusahaan agar lebih mudah mendapatkan calon tenaga kerja lulusan SMK yang sesuai dengan kualifikasi perusahaan, Skagata Career Center adalah solusi yang kami tawarkan.</p>
                        <p class="font-weight-bold mt-5">Layanan Portal Karir SKAGATA CAREER CENTER</p>
                        <p>Kami ingin memudahkan memberikan layanan bagi perusahaan di portal karir ini :</p>
                        <ul>
                            <li>Pendaftaran Akun Perusahaan</li>
                            <li>Pembuatan lowongan kerja sesuai dengan kebutuhan</li>
                            <li>Laporan Statistik serta Curriculum Vitae Kandidat Pelamar</li>
                            <li>Fitur Seleksi Online dengan melihat CV Kandidat yang telah masuk</li>
                            <li>Fitur Panggilan Online melalui email kandidat yang telah melamar</li>
                            <li>Fitur informasi hasil final seleksi</li>
                            <li>Log aktivitas akun untuk keamanan</li>
                            <li>Poster lowongan kerja yang telah dibuat dilengkapi QR Code agar memudahkan kandidat melamar</li>
                            <li>Distribusi Informasi Lowongan melalui Social Media dan Messenger BKK SMKN 3 Yogyakarta</li>
                        </ul>
                        <p class="font-weight-bold mt-4">Layanan Bursa Kerja Khusus SMKN 3 Yogyakarta</p>
                        <p>Bursa Kerja Khusus SMKN 3 Yogyakarta menyediakan layanan yang dapat Perusahaan gunakan :</p>
                        <ul>
                            <li>
                                Layanan Publikasi Informasi Lowongan Kerja
                                <ul>
                                    <li style="list-style: disc">
                                        Layanan Publikasi Informasi Lowongan Kerja
                                    </li>
                                </ul>
                            </li>
                            <li>
                                Tempat Rekrutmen Perusahaan <br>
                                SMKN 3 Yogyakarta memiliki 3 ruangan yang dapat dipergunakan untuk pelaksanaan Rekrutment
                                <ul>
                                    <li style="list-style: disc">Ruang Sidang : Kapasitas 48 orang, Ber-AC</li>
                                    <li style="list-style: disc">Ruang Olah Raga : Kapasitas 100-150 Kursi, Tidak Ber-AC</li>
                                    <li style="list-style: disc">Ruang Aula : Kapasitas 150-200 Kursi, Ber-AC</li>
                                    <li style="list-style: disc">Ruang Walk In Interview : Tidak ber-AC</li>
                                </ul>
                            </li>
                            <li>
                                Test Rekrutment oleh Lembaga Psikologi mitra BKK SMKN 3 Yogyakarta<br>
                                BKK SMKN 3 Yogyakarta memiliki mitra lembaga psikologi Independen yang dapat membantu pelaksanaan rekrutmen mulai dari Test Tertulis/Psikotest, Interview, dan Pelaporan hasil Test.
                            </li>
                            <li>
                                Test Medical Check Up oleh Laboratorium mitra BKK SMKN 3 Yogyakarta<br>
                                BKK SMKN 3 Yogyakarta memiliki mitra Laboratorium Kesehatan Independen yang dapat membantu pelaksanaan Medical Check Up Kandidat sesesuai dengan kebutuhan perusahaan.
                            </li>
                            <li>
                                Sosialiasi Perusahaan<br>
                                BKK SMKN 3 Yogyakarta dapat membantu perusahaan agar dapat memberikan informasi kepada Kandidat atau Calon Kandidat agar mendapatkan Kandidat tenaga kerja yang terbaik.
                            </li>
                        </ul>
                        <p class="font-weight-bold mt-4">Legalitas Bursa Kerja Khusus SMKN 3 Yogyakarta</p>
                        <ul>
                            <li>Surat Keputusan Depnaker Nomor : 10/W.11/K.1/IX/1993 tanggal 23 September 1993</li>
                            <li>Surat Tanda Terdaftar Bursa Kerja Khusus Dinas Koperasi, UKM, Tenaga Kerja dan Transmigrasi Pemerintah Kota Yogyakarta Nomor : 562/109/X/2017 tanggal 2 Oktober 2017</li>
                            <li>Surat Keputusan Kepala SMKN 3 Yogyakarta Nomor 800/1058 Tanggal 2 Juli 2018</li>
                        </ul>
                        <p class="font-weight-bold mt-4"> Pengurus BKK :</p>
                        <div class="px-3">
                            <div>
                                <span class="font-weight-bold d-block">1. Penanggung Jawab</span>
                                <ul>
                                    <li style="list-style-type: square">Kepala SMKN 3 Yogyakarta</li>
                                </ul>
                            </div>
                            <div>
                                <span class="font-weight-bold d-block">2. Pembina</span>
                                <ul>
                                    <li style="list-style-type: square">WKS Urusan Humas</li>
                                </ul>
                            </div>
                            <div>
                                <span class="font-weight-bold d-block">3. Ketua BKK</span>
                                <ul>
                                    <li style="list-style-type: square">Faiz Mudhokhi, M.Pd</li>
                                </ul>
                            </div>
                            <div>
                                <span class="font-weight-bold d-block">4. Petugas Administrasi/Tata Usaha & Pendaftaran</span>
                                <ul>
                                    <li style="list-style-type: square">Sri Wahyuni</li>
                                </ul>
                            </div>
                            <div>
                                <span class="font-weight-bold d-block">5. Petugas Penyuluhan & Bimbingan Jabatan dan Analisis Jabatan</span>
                                <ul>
                                    <li style="list-style-type: square">Dian Ungki Yunita Dewi, S.Pd</li>
                                </ul>
                            </div>
                            <div>
                                <span class="font-weight-bold d-block">6. Petugas Informasi Pasar Kerja dan Penelusuran Alumni</span>
                                <ul>
                                    <li style="list-style-type: square">Nur Widiyanti Eko Yuniarti, S.Pd,</li>
                                </ul>
                            </div>
                            <div>
                                <span class="font-weight-bold d-block">7. Petugas Penempatan Kerja dan Kunjungan Perusahaan</span>
                                <ul>
                                    <li style="list-style-type: square;">Marseno, S.Pd,</li>
                                </ul>
                            </div>
                        </div>
                        <br><br>
                        <hr class="mb-n4">
                        <div class="d-flex justify-content-around mt-5 mb-lg-5 mb-4 about-us-socmed">
                            <a href="" class="text-secondary">
                                <i class="fa fa-facebook-f mr-2"></i>
                                <span>Skagata Career Center - Bursa Kerja Online</span>
                            </a>
                            <a href="" class="text-secondary">
                                <i class="fa fa-instagram mr-2"></i>
                                <span>Skagata Career Center - Bursa Kerja Online</span>
                            </a>
                            <a href="" class="text-secondary">
                                <i class="fa fa-twitter mr-2"></i>
                                <span>Skagata Career Center - Bursa Kerja Online</span>
                            </a>
                        </div>
                        <div class="mt-4">
                            <h3 class="text-center">Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta</h3>
                            <p class="text-center mt-3">Jl. R.W. Monginsidi No.2, Cokrodiningratan, Jetis, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55233</p>

                            <div class="text-center mt-5 mb-4">
                                <a class="text-secondary h5 text-center" href=""><i class="fa fa-envelope"></i> bkk@smkn3jogja.sch.id</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
