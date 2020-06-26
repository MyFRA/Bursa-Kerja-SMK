@extends('layouts.app')

@section('content')
<section class="pages pb-md-3 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-n3 d-flex justify-content-between align-items-center">
                <h3 class="page-title"><i class="fa fa-address-card-o mr-3"></i>{{__('Hubungi Kami')}}</h3>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="">{{__('Hubungi Kami')}}</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-body">
                        <a href="{{ url()->previous() }}" class="h5"><i class="fa fa-arrow-left fa-0x mr-2"></i>Kembali</a>
                    </div>
                    <hr class="mt-0">
                    <div class="card-body px-5 pt-2 pb-5">
                        <h3>Skagata Career Center - Bursa Kerja Online</h3>
                        <p class="text-justify mt-3" style="font-size: 13px">
                            Privasi Anda penting untuk Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta. Harap baca Pemberitahuan Privasi ini dengan hati-hati karena ini merupakan bagian dari Syarat Penggunaan yang mengatur penggunaan Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta dan Situs Web Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta.
                        </p>
                        <div class="section-list">
                            <p class="font-weight-bold mt-4">Pemberitahuan Privasi ini menjelaskan:</p>
                            <div style="font-size: 13px">
                                <ol>
                                    <li>Jenis informasi pribadi tentang Anda yang diproses oleh Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta saat Anda menggunakan Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta dan / atau Situs Web Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta;</li>
                                    <li>Bagaimana Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta memproses informasi pribadi tentang Anda ketika Anda menggunakan Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta dan Situs Web Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta;</li>
                                    <li>Tujuan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta mengumpulkan dan memproses informasi pribadi Anda;</li>
                                    <li>Hak Anda untuk mengakses dan memperbaiki informasi pribadi Anda;</li>
                                    <li>Kelas dari pihak ketiga yang Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta dapat mengungkapkan informasi pribadi Anda kepada;</li>
                                    <li>Apakah itu wajib atau secara sukarela bagi Anda untuk memberikan informasi pribadi dan konsekuensi dari kegagalan untuk memberikan informasi pribadi Anda ketika itu wajib; dan</li>
                                    <li>
                                        Bagaimana Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta menjaga kerahasiaan dan keamanan informasi pribadi Anda?
                                        <ul>
                                            <li>Setiap perubahan akan diberitahukan kepada Anda melalui alamat e-mail yang disediakan oleh Anda saat pendaftaran atau melalui pengumuman yang sesuai di Situs Web Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta. Jika kami membuat perubahan materi, kami akan memberi tahu Anda melalui email (dikirim ke alamat email yang ditentukan dalam akun Anda) atau melalui pemberitahuan di Situs ini sebelum perubahan menjadi efektif. Perubahan akan berlaku untuk penggunaan Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta dan Situs Web Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta setelah Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta telah memberi Anda pemberitahuan. Jika Anda tidak ingin menerima Ketentuan baru, Anda tidak harus terus menggunakan Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta dan / atau Situs Web Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta. Jika Anda terus menggunakan Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta dan / atau Situs Web Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta setelah tanggal saat perubahan berlaku, penggunaan Anda atas Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta dan / atau Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta.</li>
                                            <li>
                                                Dalam Pemberitahuan Privasi ini:
                                                <ul>
                                                    <li>Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta ", " Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta ", " Situs Web Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta ", " Anda ", " Pengiklan " dan " Pengusaha " akan memiliki arti yang sama seperti yang didefinisikan dalam Persyaratan Penggunaan.</li>
                                                    <li>Informasi pribadi ” adalah data yang dapat digunakan untuk mengidentifikasi seorang individu.</li>
                                                    <li>Pemrosesan " termasuk tetapi tidak terbatas pada pengumpulan, penyimpanan, penyimpanan, pencatatan, pengorganisasian, adaptasi, penggunaan, pengungkapan, koreksi, penghancuran.</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div class="section-list">
                            <p class="font-weight-bold mt-5">Koleksi Informasi Pribadi</p>
                            <div style="font-size: 13px">
                                <ol>
                                    <li>Ketika Anda mendaftar untuk Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta</li>
                                    <li>Setiap kali ketika Anda mendaftar ke Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta untuk salah satu Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta, Anda akan diminta untuk memberikan informasi pribadi tertentu tentang diri Anda untuk membuat akun Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta.</li>
                                    <li>Informasi pribadi yang dikumpulkan selama proses pendaftaran termasuk tetapi tidak terbatas pada alamat email Anda, nama, kebangsaan, nomor kartu identitas, nomor paspor, negara tempat tinggal.</li>
                                    <li>Kapanpun informasi pribadi yang diminta oleh Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta ditandai sebagai “Wajib Diisi”, Anda harus memberikan dan menyetujui pemrosesan informasi pribadi ini oleh Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta. Jika Anda tidak setuju untuk memberikan informasi pribadi ini dan / atau tidak setuju dengan kami memprosesnya dengan cara yang ditetapkan dalam Pemberitahuan Privasi ini, maka Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta tidak akan dapat memberikan layanan yang relevan kepada Anda dan aplikasi Anda untuk layanan tersebut akan ditolak.</li>
                                    <li>
                                        Dari penggunaan Anda atas Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta dan / atau Situs Web Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta
                                        <ol>
                                            <li style="list-style: lower-alpha">Kami mengumpulkan informasi pribadi langsung dari Anda ketika Anda memilih untuk melibatkan salah satu Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta dan / atau menggunakan Situs Web Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta. Berikut ini adalah contoh informasi pribadi Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta dapat mengumpulkan langsung dari Anda: </li>
                                            <li style="list-style: lower-alpha">Usia</li>
                                            <li style="list-style: lower-alpha">Tanggal Lahir</li>
                                            <li style="list-style: lower-alpha">Nomor telepon atau nomor ponsel;</li>
                                            <li style="list-style: lower-alpha">Gambar Anda;</li>
                                            <li style="list-style: lower-alpha">Kualifikasi akademik;</li>
                                            <li style="list-style: lower-alpha">Dokumen identifikasi yang diberikan oleh sekolah / perguruan tinggi / universitas / institut;</li>
                                            <li style="list-style: lower-alpha">Lanjut;</li>
                                            <li style="list-style: lower-alpha">Kepentingan dan preferensi pribadi;</li>
                                            <li style="list-style: lower-alpha">Rincian kartu kredit atau kartu debit</li>
                                        </ol>
                                    </li>
                                    <li>
                                        Informasi lain yang terkait dengan resume untuk aplikasi pekerjaan
                                        <ol>
                                            <li style="list-style: lower-alpha">Jika Anda memilih untuk menambah referensi ke resume Anda, Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta akan menanyakan nama, nomor telepon, email, jabatan jabatan, dan hal-hal lain yang relevan. Informasi ini akan diapit sebagai bagian dari aplikasi pekerjaan Anda dan pengusaha dapat menghubungi mereka untuk mendapatkan referensi untuk aplikasi Anda.</li>
                                            <li style="list-style: lower-alpha">Jika Anda memilih untuk menggunakan Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta untuk memberi tahu seorang teman tentang layanannya atau Situs Web Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta, SSkagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta akan menanyakan nama dan alamat email teman Anda. E-mail yang mengundang teman Anda untuk menggunakan Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta atau mengunjungi Situs Web Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta akan dikirimkan kepadanya secara otomatis.</li>
                                            <li style="list-style: lower-alpha">Jika Anda ingin menghentikan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta dari memproses jenis informasi pribadi tentang Anda, Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta tidak akan lagi dapat memberikan layanan yang relevan kepada Anda.</li>
                                            <li style="list-style: lower-alpha">Selain itu, Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta dapat meminta izin Anda untuk memposting kesaksian atau kisah sukses Anda. Jika Anda setuju untuk memposting materi Anda di Situs Web Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta, Anda harus menyadari bahwa setiap informasi pribadi yang Anda kirimkan dapat dibaca, dikumpulkan, atau digunakan oleh pengguna lain dari Situs Web Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta dan dapat digunakan untuk mengirimi Anda pesan yang tidak diminta. Jika Anda ingin memperbarui atau menghapus testimonial Anda, Anda dapat menghubungi kami di sini .</li>
                                        </ol>
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div class="section-list">
                            <p class="font-weight-bold mt-5">Saat Anda mengunjungi Situs Web Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta</p>
                            <div style="font-size: 13px">
                                <ol>
                                    <li>Ketika Anda mengunjungi Situs Web Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta, server web kami secara otomatis mengumpulkan informasi tentang kunjungan Anda ke situs web ini, termasuk alamat Protokol Internet (IP) Anda, waktu, tanggal dan durasi kunjungan Anda. alamat IP Anda adalah pengenal unik untuk komputer Anda atau perangkat akses lainnya</li>
                                    <li>Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta dapat melacak kunjungan Anda ke Situs Web Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta apa pun dengan menempatkan "cookie" di komputer atau perangkat akses lainnya ketika Anda masuk. Cookie adalah file teks kecil yang ditempatkan di komputer Anda atau perangkat akses lain oleh situs web yang Anda kunjungi. Mereka banyak digunakan untuk membuat situs web bekerja, atau bekerja lebih efektif, serta memberikan informasi kepada pemilik situs web.</li>
                                    <li>Cookie memungkinkan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta menyimpan preferensi untuk Anda sehingga Anda tidak perlu memasukkannya lagi saat Anda berkunjung. Cookie juga membantu Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta mengumpulkan data aliran klik anonim untuk melacak tren dan pola pengguna. Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta dapat menggunakan data aliran klik anonim untuk membantu Pengiklan menayangkan iklan yang ditargetkan lebih baik.</li>
                                    <li>Anda dapat menghapus cookie dengan mengikuti petunjuk yang disediakan di file “bantuan” browser internet Anda. Anda harus memahami bahwa area situs web tertentu tidak akan berfungsi dengan baik jika Anda mengatur browser internet Anda untuk tidak menerima cookie.</li>
                                    <li>Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta juga menggunakan gif yang jelas dalam email berbasis HTML untuk mengetahui email mana yang telah dibuka oleh penerima. Ini memungkinkan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta untuk mengukur efektivitas komunikasi tertentu dan keefektifan kampanye pemasarannya.</li>
                                    <li>Mitra kami dan penyedia layanan menggunakan cookie untuk mengumpulkan informasi tentang penggunaan Situs Web Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta. Penggunaan cookie oleh mitra dan penyedia layanan kami tidak dicakup oleh kebijakan privasi kami. Kami tidak memiliki akses atau kontrol atas cookies ini.</li>
                                </ol>
                            </div>
                        </div>
                        <div class="section-list">
                            <p class="font-weight-bold mt-5">Tujuan Mengumpulkan Informasi Anda</p>
                            <div style="font-size: 13px">
                                <ol>
                                    <li>Untuk memverifikasi identitas Anda;</li>
                                    <li>Untuk menilai dan / atau memverifikasi kelayakan kerja dan kelayakan kredit Anda;</li>
                                    <li>Untuk mengelola dan mengelola Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta yang disediakan untuk Anda;</li>
                                    <li>Untuk menghubungi Anda sehubungan dengan Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta;</li>
                                    <li>Untuk memverifikasi kualifikasi akademik dan profesional Anda dengan menghubungi sekolah / perguruan tinggi / universitas / lembaga / badan kualifikasi profesional;</li>
                                    <li>Untuk menghubungi wasit dan / atau penjamin yang rinciannya telah Anda sediakan;</li>
                                    <li>Untuk memproses pesanan Anda untuk Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta yang Anda minta;</li>
                                    <li>Untuk menyelidiki dan menyelesaikan salah satu Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta, pertanyaan penagihan, keluhan atau pertanyaan lain yang Anda kirimkan ke Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta mengenai Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta;</li>
                                    <li>Untuk meningkatkan peluang penempatan bagi Anda atau untuk menyesuaikan layanan khusus kepada Anda;</li>
                                    <li>Untuk mengelola pelatihan staf dan jaminan kualitas;</li>
                                    <li>Untuk memantau dan meningkatkan kinerja Situs Web Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta dan Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta;</li>
                                    <li>Untuk memelihara dan mengembangkan Situs Web Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta dan Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta;</li>
                                    <li>Untuk mendapatkan pemahaman tentang informasi dan kebutuhan komunikasi Anda agar Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta dapat meningkatkan dan menyesuaikan Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta;</li>
                                    <li>Untuk melakukan penelitian dan pengembangan serta analisis statistik sehubungan dengan Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta untuk mengidentifikasi tren dan mengembangkan layanan baru yang mencerminkan minat Anda;</li>
                                    <li>Untuk membantu Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta dalam memahami preferensi penelusuran Anda di Situs Web Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta sehingga Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta dapat menyesuaikan konten dengan sesuai;</li>
                                    <li>Untuk mendeteksi dan mencegah aktivitas penipuan.</li>
                                </ol>
                                <p class="my-4 text-justify">Anda tidak dapat membatasi pemrosesan informasi pribadi Anda untuk tujuan yang ditetapkan dalam Klausul 2.1 di atas. Jika Anda tidak menyetujui Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta memproses informasi pribadi Anda untuk tujuan tersebut, Anda harus mengakhiri perjanjian yang relevan dengan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta untuk Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta dan berhenti menggunakan Situs Web Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta.</p>
                                <p class="text-justify">Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta akan meminta persetujuan Anda sebelum memproses informasi pribadi Anda selain yang ditetapkan dalam Klausul 2.1.</p>
                                <p class="text-justify">Selain itu, Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta dapat menggunakan informasi pribadi Anda untuk tujuan berikut:</p>
                                <ol>
                                    <li>Untuk mempromosikan dan memasarkan kepada Anda:</li>
                                    <li>Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta lainnya; atau</li>
                                    <li>Layanan dari pihak ketiga yang menurut Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakartamungkin menarik bagi Anda;</li>
                                    <li>Untuk mengirimkan pesan ucapan musiman dan / atau pesan yang memberitahukan Anda tentang kesalahan kinerja yang kritis di Situs Web Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta dan / atau Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta.</li>
                                    <li>Untuk mengirimi Anda kiat, saran, dan informasi survei untuk memaksimalkan pengembangan karier Anda termasuk tetapi tidak terbatas pada penggunaan Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta dan / atau Situs Web Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta.</li>
                                </ol>
                            </div>
                        </div>
                        <div class="section-list">
                            <p class="font-weight-bold mt-4">Lainya</p>
                            <div style="font-size: 13px">
                                <p>Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta memberi Anda pilihan untuk memasukkan resume Anda di Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta Resume Database asalkan Anda menggunakan format preset Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta untuk mengunggah resume Anda. Ada bebrapa alternatif cara untuk melakukannya:</p>
                                <ol>
                                    <li>Anda dapat menyimpan resume Anda di Database Lanjutkan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta, tetapi tidak memungkinkan untuk dapat dicari oleh Pengusaha atau Pengiklan yang potensial atau Perusahaan yang menggunakan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta. Tidak mengizinkan resume Anda untuk dicari berarti Anda dapat menggunakannya untuk melamar pekerjaan secara online, tetapi Pengusaha atau Pengiklan atau Perusahaan yang menggunakan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta tidak akan memiliki akses untuk mencari melalui Database Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta.</li>
                                    <li>Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta menggunakan upaya terbaiknya untuk membatasi akses ke Database Resume Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta hanya kepada mereka yang telah berlangganan Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta, pihak-pihak ini dapat menyimpan salinan resume Anda dalam file atau database mereka sendiri.</li>
                                    <li>Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta akan mengambil langkah-langkah yang wajar untuk memastikan bahwa pihak-pihak selain yang disebutkan di atas tidak akan, tanpa persetujuan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta, mendapatkan akses ke Database Lanjutkan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta. Namun, Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta tidak bertanggung jawab atas retensi, penggunaan atau privasi resume oleh pihak ketiga.</li>
                                    <li>Tanpa mengesampingkan Klausul 3.1, Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta berhak untuk memiliki akses penuh ke resume Anda untuk tujuan yang ditetapkan dalam Klausul 3 untuk melakukan Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta.</li>
                                </ol>
                            </div>
                        </div>
                        <div class="section-list">
                            <p class="font-weight-bold mt-4">Pilihan Akses dan Informasi Pribadi</p>
                            <div style="font-size: 13px">
                                <ol>
                                    <li>
                                        Anda mungkin memiliki masalah privasi yang berbeda. Tujuan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta adalah untuk menghapus informasi apa yang dikumpulkannya, sehingga Anda dapat membuat pilihan yang berarti tentang bagaimana itu digunakan. Sebagai contoh:
                                        <ol>
                                            <li style="list-style: lower-alpha">Anda dapat mengontrol siapa yang Anda bagikan informasi pribadi Anda dengan;</li>
                                            <li style="list-style: lower-alpha">Anda dapat meninjau dan mengontrol langganan Anda ke berbagai preferensi pemasaran, Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta;</li>
                                            <li style="list-style: lower-alpha">Anda dapat melihat, mengedit, atau menghapus informasi pribadi dan preferensi Anda kapan saja.</li>
                                            <li style="list-style: lower-alpha">Anda dapat memilih untuk tidak menerima materi pemasaran apa pun dari Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta;</li>
                                            <li style="list-style: lower-alpha">Anda juga dapat berlangganan Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta tambahan dengan masuk ke akun Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta;</li>
                                        </ol>
                                    </li>
                                    <li>Anda dapat menghapus akun MySkagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta Anda kapan saja di mana acara Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta akan menghapus semua akses ke akun Anda dan melanjutkan dalam database. Penghapusan akun Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta Anda tidak mempengaruhi resume yang telah Anda kirim ke Pengusaha atau sebelumnya diunduh oleh Pengusaha, Pengiklan, atau Perusahaan yang menggunakan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta</li>
                                </ol>
                            </div>
                        </div>
                        <div class="section-list">
                            <p class="font-weight-bold mt-4">Retensi Informasi Pribadi</p>
                            <div style="font-size: 13px">
                                <p>Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta akan menyimpan informasi pribadi Anda untuk periode yang diperlukan untuk memenuhi tujuan yang ditetapkan dalam Klausul 2 di atas dan segala tujuan hukum atau bisnis.</p>
                            </div>
                        </div>
                        <div class="section-list">
                            <p class="font-weight-bold mt-4">Keamanan Informasi Pribadi</p>
                            <div style="font-size: 13px">
                                <ol>
                                    <li>Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta berkomitmen untuk menjaga keamanan informasi pribadi. Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta memiliki prosedur teknis, administratif, dan fisik yang tepat untuk melindungi informasi pribadi dari kehilangan, pencurian, dan penyalahgunaan, serta terhadap akses, pengungkapan, pengubahan, dan penghancuran yang tidak sah. Informasi sensitif (seperti nomor kartu kredit) yang dimasukkan pada layanan gateway pembayaran kami dienkripsi selama transmisi informasi tersebut menggunakan teknologi lapisan soket aman (SSL).</li>
                                    <li>Tidak ada metode transmisi melalui Internet, atau metode penyimpanan elektronik, yang 100% aman. Oleh karena itu, kami tidak dapat menjamin keamanan mutlaknya. Jika Anda memiliki pertanyaan tentang keamanan di situs web kami, Anda dapat menghubungi kami di sini.</li>
                                </ol>
                            </div>
                        </div>
                        <div class="section-list">
                            <p class="font-weight-bold mt-4">Ke Mana Saja Informasi Probadi Ditutup</p>
                            <div style="font-size: 13px">
                                <p>Informasi pribadi yang disebutkan dalam Klausul 1 di atas dapat diungkapkan kepada kelas pihak ketiga sebagai berikut agar Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta dapat mengelola bisnisnya secara efektif termasuk untuk membuat Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta kepada Anda untuk mencapai tujuan yang dijelaskan :</p>
                                <ol>
                                    <li>Pengiklan;</li>
                                    <li>Pengusaha;</li>
                                    <li>
                                        Pihak ketiga yang dikontrak oleh Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta untuk membantu Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta dalam memberikan semua atau sebagian dari Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta kepada Anda, termasuk tanpa batasan, pada hal-hal berikut:
                                        <ol>
                                            <li style="list-style: lower-alpha">Layanan gateway pembayaran untuk layanan opsional;</li>
                                            <li style="list-style: lower-alpha">Layanan profiling / penilaian;</li>
                                            <li style="list-style: lower-alpha">Layanan iklan online;</li>
                                            <li style="list-style: lower-alpha">Layanan pemetaan;</li>
                                            <li style="list-style: lower-alpha">Layanan pemeliharaan dan perbaikan; dan</li>
                                            <li style="list-style: lower-alpha">Riset pasar dan layanan analisis penggunaan situs web.</li>
                                            <li style="list-style: lower-alpha">Mitra strategis yang bekerja dengan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta untuk menyediakan Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta atau yang membantu memasarkan dan mempromosikan Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta dan / atau Situs Web Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta;</li>
                                            <li style="list-style: lower-alpha">Sekolah / perguruan tinggi / universitas / institut yang Anda pelajari dan wasit Anda untuk memverifikasi kualifikasi akademik Anda;</li>
                                            <li style="list-style: lower-alpha">Badan kualifikasi profesional di mana Anda memperoleh akreditasi Anda;</li>
                                            <li style="list-style: lower-alpha">Badan pengatur, badan pemerintah, atau pihak berwenang lainnya jika diperlukan atau diberi wewenang untuk melakukan hal tersebut untuk memberhentikan fungsi pengaturan apa pun, di bawah undang-undang atau terkait dengan perintah atau putusan pengadilan;</li>
                                            <li style="list-style: lower-alpha">Badan pengatur, badan pemerintah atau pihak berwenang lainnya untuk tujuan deteksi atau pencegahan kejahatan, kegiatan ilegal atau melanggar hukum atau penipuan atau untuk penangkapan atau penuntutan terhadap pelanggar, atau untuk penyelidikan yang berkaitan dengan hal-hal tersebut;</li>
                                            <li style="list-style: lower-alpha">Setiap pihak yang terlibat dalam atau terkait dengan proses hukum (atau proses hukum prospektif), untuk keperluan proses hukum;</li>
                                            <li style="list-style: lower-alpha">Pihak ketiga yang mengakuisisi semua atau sebagian aset atau bisnis Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta (termasuk akun dan piutang dagang) untuk tujuan pihak ketiga tersebut terus menyediakan semua atau bagian dari Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta yang diperolehnya; dan</li>
                                            <li style="list-style: lower-alpha">Pihak ketiga yang mengakuisisi semua atau sebagian aset atau bisnis Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta (termasuk akun dan piutang dagang) untuk tujuan pihak ketiga tersebut terus menyediakan semua atau bagian dari Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta yang diperolehnya; dan</li>
                                            <li style="list-style: lower-alpha">Jika tidak diizinkan di bawah undang-undang perlindungan data.</li>
                                        </ol>
                                    </li>
                                </ol>
                                <p>Selain yang ditetapkan di atas, Anda akan menerima pemberitahuan ketika informasi pribadi tentang Anda mungkin pergi ke pihak ketiga, dan Anda akan memiliki kesempatan untuk memilih untuk tidak membagikan informasi tersebut.</p>
                                <p>Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta tidak menjual atau menyewakan informasi pribadi apa pun yang dikumpulkan ke pihak lain.</p>
                            </div>
                        </div>
                        <div class="section-list">
                            <p class="font-weight-bold mt-4">Kewajiban Anda Mengenai Informasi Pribadi Anda</p>
                            <div style="font-size: 13px">
                                <ol>
                                    <li>Anda bertanggung jawab untuk memberikan informasi yang akurat, tidak menyesatkan, lengkap dan terbaru ke Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta tentang diri Anda dan orang lain yang informasi pribadinya Anda berikan kepada kami dan untuk memperbarui informasi pribadi ini sebagaimana dan ketika itu menjadi tidak akurat, menyesatkan, tidak lengkap dan kedaluwarsa dengan menghubungi Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta.</li>
                                    <li>Dalam keadaan Anda mungkin perlu memberikan informasi pribadi Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta tentang seseorang selain diri Anda sendiri (misalnya, wasit atau penjamin Anda). Jika demikian, kami mengandalkan Anda untuk menginformasikan individu ini bahwa Anda memberikan informasi pribadi mereka ke Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta, untuk memastikan mereka menyetujui Anda memberi kami informasi mereka dan memberi tahu mereka tentang di mana mereka dapat menemukan salinan Pemberitahuan Privasi ini ( di situs web kami di Kebijakan Privasi.</li>
                                </ol>
                            </div>
                        </div>
                        <div class="section-list">
                            <p class="font-weight-bold mt-4">Transfer Dari Informasi Pribadi Anda di Luar Yuridiksi Lokal Anda</p>
                            <div style="font-size: 13px">
                                <p>Mungkin diperlukan untuk Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta untuk mentransfer informasi pribadi Anda di luar yurisdiksi lokal Anda jika salah satu penyedia layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta atau mitra strategis ("entitas luar negeri") terlibat dalam menyediakan bagian dari Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta.</p>
                            </div>
                        </div>
                        <div class="section-list">
                            <p class="font-weight-bold mt-4">Situs Terkait</p>
                            <div style="font-size: 13px">
                                <ol>
                                    <li>Situs Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta yang mungkin berisi tautan ke situs pihak ketiga.</li>
                                    <li>Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta tidak bertanggung jawab atas situs pihak ketiga tersebut. Informasi pribadi apa pun yang disediakan oleh Anda di situs-situs tersebut tidak akan mendapatkan manfaat dari Pemberitahuan Privasi ini dan akan tunduk pada kebijakan privasi pihak ketiga yang relevan (jika ada).</li>
                                    <li>Anda dapat masuk ke situs kami menggunakan layanan masuk seperti Facebook Connect. Layanan ini akan mengotentikasi identitas Anda dan memberi Anda opsi untuk berbagi informasi pribadi tertentu dengan kami seperti nama dan alamat email Anda untuk mengisi formulir pendaftaran kami. Layanan seperti Facebook Connect memberi Anda opsi untuk memposting informasi tentang aktivitas Anda di situs web ini ke halaman profil Anda untuk dibagikan dengan orang lain dalam jaringan Anda.</li>
                                    <li>Situs web kami mencakup Fitur Media Sosial, seperti tombol dan widget Facebook, atau program mini interaktif yang berjalan di situs kami. Fitur-fitur ini dapat mengumpulkan alamat IP Anda, halaman mana yang Anda kunjungi di situs kami, dan dapat mengatur cookie untuk mengaktifkan Fitur berfungsi dengan benar. Fitur dan widget Media Sosial dapat diselenggarakan oleh pihak ketiga atau dihosting langsung di situs kami. interaksi Anda dengan Fitur ini diatur oleh kebijakan privasi perusahaan yang menyediakannya.</li>
                                </ol>
                            </div>
                        </div>
                        <div class="section-list">
                            <p class="font-weight-bold mt-4">Persyaratan Anda</p>
                            <div style="font-size: 13px">
                                <ol>
                                    <li>Dalam menggunakan Layanan Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta dan / atau Situs Web Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta, Anda menyetujui pengumpulan dan penggunaan informasi pribadi oleh Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta dengan cara-cara yang diuraikan di sini di atas (yang dapat berubah dari waktu ke waktu) kecuali dan sampai Anda memberi tahu Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta.</li>
                                    <li>Selanjutnya, Anda setuju dengan wasit Anda, sekolah / perguruan tinggi / universitas / institut tempat Anda telah belajar, badan kualifikasi profesional di mana Anda menerima akreditasi Anda dan Pengusaha untuk mengungkapkan informasi pribadi Anda ke Skagata Career Center - Bursa Kerja Online - Skagata Career Center - Bursa Kerja Khusus SMKN 3 Yogyakarta.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
